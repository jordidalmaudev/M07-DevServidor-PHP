<?php

// Configuración de conexión
$host = "localhost";
$username = "root";
$password = "";
$dbname = "mcgraw_peliculas";

function connectBD() {
    global $host, $username, $password, $dbname;
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // convertir errores en excepciones
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("SET NAMES 'utf8'");
        echo "Conexión establecida";
        return $conn;
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
}

?>