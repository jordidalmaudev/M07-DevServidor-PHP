<?php
include 'connexio.php';
$conn = connectBD();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombrePais = $_POST['nombrePais'];

    // Insertar el actor en la base de datos
    $query = "INSERT INTO pais (nombrePais) VALUES ('$nombrePais')";
    
    if ($conn->exec($query)) {
        echo "Pais insertado correctamente.";
    } else {
        echo "Error al insertar el pais.";
    }
}
?>