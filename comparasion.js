// evento en el cual se ejecuta cuando el DOM ha sido completamente cargado
document.addEventListener("DOMContentLoaded", function () {
    // Agregamos eventos de teclado a los campos de ubicación
    document.getElementById("location1").addEventListener("keyup", function (event) {
        // Si la tecla presionada es Enter
        if (event.key === "Enter") {
            // Llamamamos a la función
            compareWeather();
        }
    });
    // es lo mismo que la ubicacion1
    document.getElementById("location2").addEventListener("keyup", function (event) {
        if (event.key === "Enter") {
            compareWeather();
        }
    });

    // Cargamos y mostramos las localizaciones
    loadLocations();
});

// Esta función se llama cuando se presiona Enter en los campos de ubicación
function compareWeather() {
    // Obtenemos los valores de los campos de ubicación
    var location1 = document.getElementById("location1").value;
    var location2 = document.getElementById("location2").value;

    // Llamamos a la función para buscar el clima
    fetchWeather(location1, location2);
}

// Esta función realiza una solicitud para obtener datos climáticos
function fetchWeather(location1, location2) {
    var obtener = new XMLHttpRequest();
    // Hacemos una solicitud GET al archivo PHP para obtener datos climáticos
    obtener.open("GET", "weather.php?action=fetchWeather&location1=" + encodeURIComponent(location1) + "&location2=" + encodeURIComponent(location2), true);
    obtener.onreadystatechange = function () {
        // Si la solicitud ha sido completada y la respuesta es exitosa
        if (obtener.readyState === 4 && obtener.status === 200) {
            // Parseamos la respuesta como JSON
            var response = JSON.parse(obtener.responseText);
            // Obtener los datos climáticos y las ubicaciones desde la respuesta
            var weatherData = response.weatherData;
            var locations = response.locations;
            
            // Dibujamos el gráfico con los datos climáticos
            drawChart(weatherData);
            // Actualizamos la tabla de ubicaciones
            updateLocationsTable(locations);
        }
    };
    obtener.send(); // Enviamos la solicitud
}

// Esta función dibuja el gráfico de temperatura
function drawChart(data) {
    var gráfico = document.getElementById('temperatureChart').getContext('2d');
    
    // Verificamos si ya existe un gráfico y lo destruimos
    if (typeof chartInstance !== 'undefined' && chartInstance !== null) {
        chartInstance.destroy();
    }

    // Creamos un nuevo gráfico con los datos proporcionados
    chartInstance = new Chart(gráfico, {
        type: 'line',
        data: {
            labels: getHoursLabels(), // Obtenemos las etiquetas de horas
            datasets: [{
                label: data.location1.name + ' - Temperatura Máxima',
                data: data.location1.maxTemp,
                pointRadius: 5,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }, {
                label: data.location2.name + ' - Temperatura Máxima',
                data: data.location2.maxTemp,
                pointRadius: 5,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true // Empezar el eje Y desde cero
                }
            }
        }
    });
}

// Esta función devuelve las etiquetas de las horas
function getHoursLabels() {
    var labels = [];
    var currentHour = new Date().getHours();
    for (var i = 0; i < 24; i++) {
        var hour = (currentHour + i) % 24;
        labels.push(hour + ':00');
    }
    return labels;
}

// Esta función carga las ubicaciones
function loadLocations() {
    var cargar = new XMLHttpRequest();
    cargar.open("GET", "weather.php?action=loadLocations", true);
    cargar.onreadystatechange = function () {
        // Si la solicitud ha sido completada y la respuesta es exitosa
        if (cargar.readyState === 4 && cargar.status === 200) {
            // Parseamos la respuesta como JSON
            var locations = JSON.parse(cargar.responseText);
            // Actualizamos la tabla de ubicaciones
            updateLocationsTable(locations);
        }
    };
    cargar.send(); // Enviamos la solicitud
}

// Esta función actualiza la tabla de ubicaciones
function updateLocationsTable(locations) {
    var tableBody = document.getElementById('locationsTable').getElementsByTagName('tbody')[0];
    tableBody.innerHTML = ""; // Limpiamos el cuerpo de la tabla

    // Iteramos sobre las ubicaciones y agregarlas a la tabla
    locations.forEach(function (location) {
        var row = tableBody.insertRow();
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);

        cell1.textContent = location.location1;
        cell2.textContent = location.location2;
        
        // Creamos el botón de eliminación
        var borrarBoton = document.createElement('button');
        borrarBoton.textContent = 'Eliminar';
        borrarBoton.className = 'btn btn-danger btn-sm';
        borrarBoton.onclick = function() {
            deleteLocation(location.id, row); // Llamamos a la función para eliminar la ubicación
        };
        cell3.appendChild(borrarBoton);
    });
}

// Esta función elimina una ubicación
function deleteLocation(id, row) {
    var eliminar = new XMLHttpRequest();
    eliminar.open("POST", "weather.php", true);
    eliminar.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    eliminar.onreadystatechange = function () {
        // Si la solicitud ha sido completada y la respuesta es exitosa
        if (eliminar.readyState === 4 && eliminar.status === 200) {
            // Eliminamos la fila de la tabla
            row.parentNode.removeChild(row);
        }
    };
    eliminar.send("action=deleteLocation&id=" + encodeURIComponent(id)); // Enviar la solicitud POST con el ID de la ubicación a eliminar
}
