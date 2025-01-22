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
    <?php
        require '../functions/funcions.php';
        $conn = connectBD();

        $id = $_GET['id'];

        // Obtener actor por id
        $query = "SELECT * FROM actor WHERE idActor = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([strip_tags($id)]);
        $actor = $stmt->fetch(PDO::FETCH_ASSOC);


    ?>

    <h1 class="mb-4">Eliminar Actor</h1>
    <p>¿Estás seguro de que quieres eliminar el actor <strong><?php echo $actor['nombreActor']; ?></strong>?</p>

    <form action="../controladores/eliminar_actor.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" class="btn btn-danger">Eliminar Actor</button>
        <a href="../index.php" class="btn btn-secondary">Volver al listado de actores</a>
    </form>
</div>
</body>
</html>