<?php
require '../db/connexio.php';
$conn = connectBD();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombrePais = $_POST['nombrePais'];

    // Insertar el actor en la base de datos
    $query = "INSERT INTO pais (nombrePais) VALUES (?)";
    $stmt = $conn->prepare($query);
    $insertarPais = $stmt->execute([strip_tags($nombrePais)]);

    if ($insertarPais) {
        echo "Pais insertado correctamente.";
        echo "Volver al <a href=\"../vistas/insertPais.php\">listado de paises</a>";
    } else {
        echo "Error al insertar el pais.";
    }
}

?>