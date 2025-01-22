<?php

require '../functions/funcions.php';
$conn = connectBD();

// eliminar actor

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $query = "DELETE FROM actor WHERE idActor = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([strip_tags($id)]);


    $message = "";
    $alertType = "";

    if ($stmt->rowCount() > 0) {
        $message = "Actor eliminado correctamente.";
        $alertType = "success";
    } else {
        $message = "Error al eliminar el actor.";
        $alertType = "danger";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Actor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-<?php echo $alertType; ?>" role="alert">
            <?php echo $message; ?>
        </div>
        <a href="../index.php" class="btn btn-primary">Volver al listado de actores</a>
    </div>
</body>
</html>