<?php

session_start();


// Configuración de conexión
$host = "localhost";
$username = "root";
$password = "";
$dbname = "preguntasrespuestas";

function connectBD() {
    global $host, $username, $password, $dbname;
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // convertir errores en excepciones
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("SET NAMES 'utf8'");
        return $conn;
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
}

function session() {

    if (!isset($_SESSION['user'])) {
    header('Location: ./vistas/login.php');
    }

}

function logout() {
    session_destroy();
    header('Location: ../vistas/login.php');
}