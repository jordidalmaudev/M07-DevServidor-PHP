<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data MySQL</title>
</head>
<body>
<?php

$host = "127.0.0.1";
$user = "root";
$password = "";
$dbname = "m7daw";

try {
    $conn = mysqli_connect($host, $user, $password, $dbname);
    // echo "Connected to $dbname at $host successfully";
} catch (Exception $e) {
    echo "An exception occurred: " . $e->getMessage();
};

$nombre = $_REQUEST['nombre'];
$apellidos = $_REQUEST['apellidos'];
$edad = $_REQUEST['edad'];

$insertDataQuery = "INSERT INTO users (nombre,apellidos,edad) VALUES('$nombre','$apellidos','$edad');";

if (mysqli_query($conn, $insertDataQuery)) {
    echo " <h2> " . "Data guardada correctamente en la base de datos" . "</h2>";
    echo "<a href='insert.html'>Insertar otro usuario</a> ";
    echo "<a href='index.php'>Inicio</a> ";
    mysqli_close($conn);
} else {
    echo "Error: " . mysqli_error($conn);
}

?>

</body>
</html>