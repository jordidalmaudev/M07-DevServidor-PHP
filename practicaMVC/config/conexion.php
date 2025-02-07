<?php
require_once '../config/database.php';

function connectBD() {
    try {
        $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USERNAME, PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("SET NAMES 'utf8'");
        return $conn;
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
}
?>