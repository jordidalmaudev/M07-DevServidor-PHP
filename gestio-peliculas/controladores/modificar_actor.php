<?php
require '../functions/funcions.php';
$conn = connectBD();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombreActor = $_POST['nombreActor'];
    $nacionalidadActor = $_POST['nacionalidadActor'];
    $imagen = !empty($_POST['imagen']) ? $_POST['imagen'] : 'https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg';

    // actualizar el actor en bbdd
    $query = "UPDATE actor SET nombreActor = '$nombreActor', nacionalidadActor = '$nacionalidadActor', imagen = '$imagen' WHERE idActor = $id";

    if ($conn->exec($query)) {
        echo "Actor actualizado correctamente.";
        echo "Volver al <a href=\"../index.php\">listado de actores</a>";
    } else {
        echo "Error al actualizar el actor.";
    }
}

?>