<?php
// Mi clave de API para acceder a OpenWeatherMap
$apiKey = "7f334206263064174ebd5c697d76ab7f";

// Datos de conexión a la base de datos
$dbHost = 'localhost';
$dbName = 'weather_comparisons';
$dbUser = 'root';
$dbPass = 'marcremisa10';

// Creamos una conexión a la base de datos con mysqli
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Verificamos si la conexión fue exitosa
if ($conn->connect_error) {
    // Si hay un error de conexión, muestra un mensaje de error
    die("Conexión fallida: " . $conn->connect_error);
}

// Función para obtener el pronóstico del tiempo para una ubicación
function getWeatherForecast($location, $apiKey) {
    $url = "https://api.openweathermap.org/data/2.5/forecast?q=" . urlencode($location) . "&appid=" . $apiKey . "&units=metric";
    $response = file_get_contents($url); // Realizamos una solicitud HTTP para obtener los datos del pronóstico del tiempo
    return json_decode($response, true); // Decodificamos la respuesta JSON y lo devuelve como un array
}

// Obtenmos el valor de la variable action desde la solicitud GET o POST, o establece una cadena vacía si no está presente
$action = $_GET['action'] ?? $_POST['action'] ?? '';

// Si la acción es fetchWeather y están presentes las ubicaciones location1 y location2 en la solicitud GET
if ($action === 'fetchWeather' && isset($_GET['location1']) && isset($_GET['location2'])) {
    // Obtenemos las ubicaciones de la solicitud GET
    $location1 = $_GET['location1'];
    $location2 = $_GET['location2'];

    // Insertamos las ubicaciones en la base de datos
    $stmt = $conn->prepare("INSERT INTO locations (location1, location2) VALUES (?, ?)");
    $stmt->bind_param("ss", $location1, $location2); // Unimos los parámetros a la consulta SQL
    $stmt->execute(); // Ejecutamos la consulta SQL
    $stmt->close(); // Cerramos la sentencia

    // Obtenemos el pronóstico del tiempo para las ubicaciones
    $weatherForecast1 = getWeatherForecast($location1, $apiKey);
    $weatherForecast2 = getWeatherForecast($location2, $apiKey);

    // Inicializamos la respuesta con datos del pronóstico del tiempo y ubicaciones
    $response = array(
        'weatherData' => array(
            'location1' => array(
                'name' => $location1,
                'maxTemp' => array()
            ),
            'location2' => array(
                'name' => $location2,
                'maxTemp' => array()
            )
        ),
        'locations' => array()
    );

    // Procesamos el pronóstico del tiempo para la primera ubicación
    foreach ($weatherForecast1['list'] as $forecast) {
        $time = strtotime($forecast['dt_txt']); // Convertimos la fecha y hora en un timestamp Unix
        if ($time > time() && count($response['weatherData']['location1']['maxTemp']) < 24) {
            $response['weatherData']['location1']['maxTemp'][] = $forecast['main']['temp_max']; // Agregamos la temperatura máxima al array de temperaturas máximas
        }
    }

    // Hacemos lo mismo para la ubicacion 2
    foreach ($weatherForecast2['list'] as $forecast) {
        $time = strtotime($forecast['dt_txt']);
        if ($time > time() && count($response['weatherData']['location2']['maxTemp']) < 24) {
            $response['weatherData']['location2']['maxTemp'][] = $forecast['main']['temp_max'];
        }
    }

    // Obtenemos todas las ubicaciones de la base de datos
    $result = $conn->query("SELECT id, location1, location2 FROM locations");
    while ($row = $result->fetch_assoc()) {
        $response['locations'][] = $row; // Agregamos cada ubicación al array de ubicaciones en la respuesta
    }

    // Establecemos el tipo de contenido de la respuesta como JSON
    header('Content-Type: application/json');
    // Codificamos la respuesta como JSON y la imprime
    echo json_encode($response);

// Si la acción es loadLocations
} elseif ($action === 'loadLocations') {
    // Obtenemos todas las ubicaciones de la base de datos
    $result = $conn->query("SELECT id, location1, location2 FROM locations");
    $response = array();
    while ($row = $result->fetch_assoc()) {
        $response[] = $row; // Agregamos cada ubicación al array de ubicaciones en la respuesta
    }

    // Establecemos el tipo de contenido de la respuesta como JSON
    header('Content-Type: application/json');
    // Codificamos la respuesta como JSON y la imprime
    echo json_encode($response);

// Si la acción es deleteLocation y se proporciona un ID en la solicitud POST
} elseif ($action === 'deleteLocation' && isset($_POST['id'])) {
    $id = $_POST['id']; // Obtenemos el ID de la ubicación a eliminar desde la solicitud POST

    // Eliminamos la ubicación de la base de datos
    $stmt = $conn->prepare("DELETE FROM locations WHERE id = ?");
    $stmt->bind_param("i", $id); // Unimos el parámetro a la consulta SQL
    $stmt->execute(); // Ejecutamos la consulta SQL
    $stmt->close(); // Cerramos la sentencia preparada

    // Imprimimos una respuesta de éxito como JSON
    echo json_encode(array('status' => 'success'));
}

// Cerramos la conexión a la base de datos al final del script
$conn->close();
?>
