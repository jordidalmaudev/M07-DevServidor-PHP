<?php
require '../functions/funcions.php';
$conn = connectBD();

$message = "";
$alertType = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombreActor = $_POST['nombreActor'];
    $nacionalidadActor = $_POST['nacionalidadActor'];
    $imagen = !empty($_POST['imagen']) ? $_POST['imagen'] : 'https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg';

    // Insertar el actor en la base de datos
    $query = "INSERT INTO actor (nombreActor, nacionalidadActor, imagen) VALUES (?,?,?);";
    $stmt = $conn->prepare($query);
    $insertarActor = $stmt->execute([strip_tags($nombreActor), strip_tags($nacionalidadActor), strip_tags($imagen)]);
    
    if ($insertarActor) {
        $message = "Actor insertado correctamente.";
        $alertType = "success";
    } else {
        $message = "Error al insertar el actor.";
        $alertType = "danger";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Actor</title>
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