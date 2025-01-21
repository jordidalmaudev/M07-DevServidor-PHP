<?php

session_start();


// Configuración de conexión
$host = "localhost";
$username = "root";
$password = "";
$dbname = "peliculas";

function connectBD() {
    global $host, $username, $password, $dbname;
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // convertir errores en excepciones
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("SET NAMES 'utf8'");
        echo "<h4>Conexión establecida</h4>";
        return $conn;
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
}

function session() {

    if (!isset($_SESSION['user'])) {
    header('Location: ./vistas/login.php');
    } else {
        echo "Bienvenido " . $_SESSION['user'];
    }

}

function logout() {
    session_destroy();
    header('Location: ../vistas/login.php');
}


function navBar()
{
    echo '<nav class="navbar fixed-top navbar-light bg-light shadow">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">Gestió Pel·lícules</a>
    <a class="navbar-item" href="./controladores/logout.php">Logout</a>
    <p> Bienvenido ' . $_SESSION['user'] . '</p>
    </div>
    </nav>';
}


?>
