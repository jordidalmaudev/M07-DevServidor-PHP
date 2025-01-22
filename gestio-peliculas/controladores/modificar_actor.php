<?php
require '../functions/funcions.php';
$conn = connectBD();

$message = "";
$alertType = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idActor = $_POST['id'];
    $nombreActor = $_POST['nombreActor'];
    $nacionalidadActor = $_POST['nacionalidadActor'];
    $imagen = !empty($_POST['imagen']) ? $_POST['imagen'] : 'https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg';

    // Actualizar el actor en la base de datos
    $query = "UPDATE actor SET nombreActor = ?, nacionalidadActor = ?, imagen = ? WHERE idActor = ?";
    $stmt = $conn->prepare($query);
    $actualizarActor = $stmt->execute([strip_tags($nombreActor), strip_tags($nacionalidadActor), strip_tags($imagen), strip_tags($idActor)]);
    
    if ($actualizarActor) {
        $message = "Actor modificado correctamente.";
        $alertType = "success";
    } else {
        $message = "Error al modificar el actor.";
        $alertType = "danger";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Actor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <?php if (!empty($message)): ?>
            <div class="alert alert-<?php echo $alertType; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <a href="../index.php" class="btn btn-primary">Volver al listado de actores</a>
    </div>
</body>
</html>