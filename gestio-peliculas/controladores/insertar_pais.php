<?php
require '../functions/funcions.php';
$conn = connectBD();

$message = "";
$alertType = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombrePais = $_POST['nombrePais'];

    // Insertar el país en la base de datos
    $query = "INSERT INTO pais (nombrePais) VALUES (?)";
    $stmt = $conn->prepare($query);
    $insertarPais = $stmt->execute([strip_tags($nombrePais)]);

    if ($insertarPais) {
        $message = "País insertado correctamente.";
        $alertType = "success";
    } else {
        $message = "Error al insertar el país.";
        $alertType = "danger";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar País</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <?php if (!empty($message)): ?>
            <div class="alert alert-<?php echo $alertType; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <a href="../vistas/insertPais.php" class="btn btn-primary">Volver al listado de países</a>
    </div>
</body>
</html>