<?php
require '../functions/funcions.php';
$conn = connectBD();

$message = "";
$alertType = "";

try {
    $idPais = $_POST['id'];
    $nombrePais = $_POST['nombrePais']; 

    $sql = "UPDATE pais SET nombrePais = '$nombrePais' WHERE idPais = $idPais";
    $stm = $conn->prepare($sql);
    $stm->execute();

    $message = "País modificado correctamente.";
    $alertType = "success";
} catch (PDOException $e) {
    $message = "Error: " . $e->getMessage();
    $alertType = "danger";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar País</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <?php if (!empty($message)): ?>
            <div class="alert alert-<?php echo $alertType; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <a href="../vistas/insertPais.php" class="btn btn-primary">Volver a la lista de países</a>
    </div>
</body>
</html>