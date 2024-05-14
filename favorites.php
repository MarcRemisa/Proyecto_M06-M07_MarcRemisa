<?php

if (isset($_POST['getFavorite'])) {
    getFavorite();
}

if (isset($_POST['addFavorite'])) {
    addFavorite();
}

if (isset($_POST['uploadPhoto'])) {
    storePhoto();
}

if (isset($_POST['downloadPhotos'])) {
    getPhotos();
}

function getPhotos(){
    try {
        session_start();
        $user = $_SESSION['user'];
        $location = $_POST['location'];

        $dbservername = "localhost";
        $dbusername = "root";
        $dbpassword = "claumestra";
        $dbname = "weatherapp";

        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        $sql = "SELECT url FROM photo WHERE location= '" . $location . "';";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $imageUrls = $result->fetch_all(MYSQLI_ASSOC);
            echo json_encode($imageUrls);
        } else {
            echo json_encode("");
        }
    } catch (Exception $e) {
        $errores = "Hay que revisar esos puntos : <br> " . $e->getMessage();
    } finally {
        $conn->close();
    }
    
}

function storePhoto()
{
    try {
        session_start();
        $user = $_SESSION['user'];
        $location = $_POST['name'];

        $targetFile = 'uploads/' . $_FILES['photo']['name'];
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
            //file was successfully uploaded
        }

        $dbservername = "localhost";
        $dbusername = "root";
        $dbpassword = "claumestra";
        $dbname = "weatherapp";

        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        $sql = "SELECT id FROM user WHERE name= '" . $user . "';";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $userId = $result->fetch_assoc()["id"];
        }

        $sql = "INSERT INTO photo(user,location,url) VALUES(".$userId.",'".$location."','".$targetFile."');";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo json_encode("1");
        } else {
            echo json_encode("");
        }
    } catch (Exception $e) {
        $errores = "Hay que revisar esos puntos : <br> " . $e->getMessage();
    } finally {
        $conn->close();
    }
}


function getFavorite()
{
    try {
        session_start();
        $user = $_SESSION['user'];

        $dbservername = "localhost";
        $dbusername = "root";
        $dbpassword = "claumestra";
        $dbname = "weatherapp";

        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        $sql = "SELECT f.name,f.lat,f.lon FROM favorite f JOIN user u ON f.user = u.id WHERE u.name= '" . $user . "';";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $favorites = $result->fetch_all(MYSQLI_ASSOC);           // MSQLI OO
            // $favorites = mysqli_fetch_all($result, MYSQLI_ASSOC); // MSQLI PROCEDIMENTAL
            echo json_encode($favorites);
        } else {
            echo json_encode("");
        }
    } catch (Exception $e) {
        $errores = "Hay que revisar esos puntos : <br> " . $e->getMessage();
    } finally {
        $conn->close();
    }
}

function addFavorite()
{
    try {
        session_start();
        $user = $_SESSION['user'];

        $name = $_POST['name'];
        $lat = $_POST['lat'];
        $lon = $_POST['lon'];

        $dbservername = "localhost";
        $dbusername = "root";
        $dbpassword = "claumestra";
        $dbname = "weatherapp";

        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        $sql = "SELECT id FROM user WHERE name= '" . $user . "';";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $id = $result->fetch_assoc()["id"];
        }

        $name = $conn->real_escape_string($name);

        $sql = 'INSERT INTO favorite(name,lat,lon,user) VALUES("' . $name . '",' . $lat . ',' . $lon . ',' . $id . ');';
        $result = $conn->query($sql);

        echo "1";
    } catch (Exception $e) {
        $errores = "Hay que revisar esos puntos : <br> " . $e->getMessage();
        echo $errores;
    } finally {
        $conn->close();
    }
}


