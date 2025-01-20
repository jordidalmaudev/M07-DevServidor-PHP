<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data MySQL</title>
</head>
<body>
<?php

include 'validaciones.php';
include 'conexion.php';

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$edad = $_POST['edad'];


if (isMail($email)) {
    $insertDataQuery = "INSERT INTO users (nombre,apellidos,email,edad) VALUES ('$nombre','$apellidos','$email','$edad');";
    if (mysqli_query($conn, $insertDataQuery)) {
        echo " <h2> " . "Data guardada correctamente en la base de datos" . "</h2>";
        echo "<a href='insert.html'>Insertar otro usuario</a> ";
        echo "<a href='index.php'>Inicio</a> ";
        mysqli_close($conn);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    ?>
    <h1>
        <?= "El email no es válido" ?>
    </h1>
    <div>
        <?= "<a href='insert.html'>Volver</a>" ?>
    </div>

    <?php
}

?>

</body>
</html>