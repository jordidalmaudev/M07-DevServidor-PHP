<?php

require '../functions/funcions.php';
$conn = connectBD();

// eliminar actor

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $query = "DELETE FROM actor WHERE idActor = $id";

    if ($conn->exec($query)) {
        echo "Actor eliminado correctamente.";
        echo "Volver al <a href=\"../index.php\">listado de actores</a>";
    } else {
        echo "Error al eliminar el actor.";
    }
}

?>

