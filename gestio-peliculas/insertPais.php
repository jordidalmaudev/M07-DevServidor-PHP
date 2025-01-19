<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir nuevo país</title>
</head>
<body>
<?php
include 'connexio.php';
$conn = connectBD();

// Obtener la lista de países
$query = "SELECT idPais, nombrePais FROM pais";
$stmt = $conn->prepare($query);
$stmt->execute();
$paises = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Añadir Pais</h1>

<form action="insertar_pais.php" method="POST">
    <label for="nombrePais">Nombre del Pais:</label>
    <input type="text" id="nombrePais" name="nombrePais" required><br>

    <input type="submit" value="Añadir Pais">
</form>
Volver al <a href="index.php">listado de actores</a>
</body>
</html>