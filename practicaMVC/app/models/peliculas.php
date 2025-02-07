<?php

require_once '../config/conexion.php';

function obtenerPeliculas($conn) {
    $sql = "SELECT idPelicula, tituloPelicula FROM pelicula";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>