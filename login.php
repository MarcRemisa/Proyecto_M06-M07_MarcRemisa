<?php
if (isset($_POST['login'])) {
    login();
}

if (isset($_POST['logout'])) {
    logout();
}

if (isset($_POST['checkLogin'])) {
    checkLogin();
}

function checkLogin()
{
    session_start();
    if (isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] == true) {
        echo $_SESSION['user'];
    } else {
        echo "-1";
    }
}

function login()
{
    try {
        session_start();

        $user = $_POST['user'];
        $password = $_POST['password'];

        $dbservername = "localhost";
        $dbusername = "root";
        $dbpassword = "marcremisa10";
        $dbname = "weatherapp";

        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        $sql = "SELECT name, password FROM user WHERE name= '" . $user . "';";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row["password"] == $password) {
                    $_SESSION['loggedIn'] = TRUE;
                    $_SESSION['user'] = $user;
                    echo "1";
                } else {
                    echo "User not authenticated";
                }
            }
        }
        $conn->close();
    } catch (Exception $e) {
        $errores = "Hay que revisar esos puntos : <br> " . $e->getMessage();
    }
}

function logout()
{
    session_start();
    session_unset();
    session_destroy();
}

?>