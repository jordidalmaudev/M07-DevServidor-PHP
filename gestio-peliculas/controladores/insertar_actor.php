<?php
require '../db/connexio.php';
$conn = connectBD();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombreActor = $_POST['nombreActor'];
    $nacionalidadActor = $_POST['nacionalidadActor'];
    $imagen = !empty($_POST['imagen']) ? $_POST['imagen'] : 'https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg';

    
    // Insertar el actor en la base de datos
    $query = "INSERT INTO actor (nombreActor, nacionalidadActor, imagen) VALUES ('$nombreActor', '$nacionalidadActor', '$imagen')";
    
    if ($conn->exec($query)) {
        echo "Actor insertado correctamente.";
        echo "Volver al <a href=\"../index.php\">listado de actores</a>";
    } else {
        echo "Error al insertar el actor.";
    }
}
?>