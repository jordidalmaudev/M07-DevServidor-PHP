<?php
require '../functions/funcions.php';
$conn = connectBD();

$idPais = $_GET['id'];

$sql = "SELECT * FROM pais WHERE idPais = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([strip_tags($idPais)]);
$pais = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar País</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Eliminar País</h1>
    <p>¿Estás seguro de que quieres eliminar el país <strong><?php echo $pais['nombrePais']; ?></strong>?</p>

    <form action="../controladores/eliminar_pais.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $idPais; ?>">
        <button type="submit" class="btn btn-danger">Eliminar País</button>
        <a href="../vistas/insertPais.php" class="btn btn-secondary">Volver a la lista de países</a>
    </form>
</div>
</body>
</html>