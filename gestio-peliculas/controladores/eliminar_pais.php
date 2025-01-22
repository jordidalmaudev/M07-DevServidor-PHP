<?php
require '../functions/funcions.php';
$conn = connectBD();

$idPais = $_POST['id'];

$message = "";
$alertType = "";

try {
    // Verificar si el país está relacionado con algún actor
    $query = "SELECT COUNT(*) as count FROM actor WHERE nacionalidadActor = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([strip_tags($idPais)]);
    $resultActor = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultActor['count'] > 0) {
        $message = "No se puede eliminar el país porque está relacionado con uno o más actores.";
        $alertType = "danger";
    } else {
        // Eliminar el país
        $query = "DELETE FROM pais WHERE idPais = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([strip_tags($idPais)]);

        $message = "País eliminado correctamente.";
        $alertType = "success";
    }
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
    <title>Eliminar País</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-<?php echo $alertType; ?>" role="alert">
            <?php echo $message; ?>
        </div>
        <a href="../vistas/insertPais.php" class="btn btn-primary">Volver a la lista de países</a>
    </div>
</body>
</html>