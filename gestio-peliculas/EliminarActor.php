<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Actor</title>
</head>
<body>
<?php
include 'connexio.php';
$conn = connectBD();

$id = $_GET['id'];

// Obtener actor por id
$query = "SELECT * FROM actor WHERE idActor = $id";
$stmt = $conn->prepare($query);
$stmt->execute();
$actor = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<h1>Eliminar Actor</h1>
<p>¿Estás seguro de que quieres eliminar el actor <?php echo $actor['nombreActor']; ?>?</p>

<form action="eliminar_actor.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="submit" value="Eliminar Actor">
</form>

<a href="index.php">Volver al listado de actores</a>
</body>
</html>
