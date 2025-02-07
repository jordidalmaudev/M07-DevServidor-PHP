<?php

require_once '../config/conexion.php';

function obtenerActores($conn, $idPelicula)
{
    $sql = "SELECT actor.nombreActor, interpretacion.personaje 
            FROM interpretacion 
            JOIN actor ON interpretacion.idActor = actor.idActor 
            WHERE interpretacion.idPelicula = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$idPelicula]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
