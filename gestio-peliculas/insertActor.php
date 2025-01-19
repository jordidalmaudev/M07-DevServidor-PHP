<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Actor</title>
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

<form action="insertar_actor.php" method="POST">
    <label for="nombreActor">Nombre del Actor:</label>
    <input type="text" id="nombreActor" name="nombreActor" required><br>

    <label for="nacionalidadActor">Nacionalidad del Actor:</label>
    <select id="nacionalidadActor" name="nacionalidadActor" required>
        <?php foreach ($paises as $pais): ?>
            <option value="<?php echo $pais['idPais']; ?>"><?php echo $pais['nombrePais']; ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="imagen">Imagen del Actor (URL):</label>
    <input type="text" id="imagen" name="imagen"><br>

    <input type="submit" value="Insertar Actor">
</form>
</body>
</html>