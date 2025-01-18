<?php
// Configuración de conexión
$host = "localhost";
$username = "root";
$password = "";
$dbname = "peliculas";

function connectBD() {
    global $host, $username, $password, $dbname;
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("SET NAMES 'utf8'");
        echo "<h4>Conexión establecida</h4>";
        return $conn;
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
}

?>
