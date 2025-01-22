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
    <h1 class="mb-4">Modificar País</h1>
    <?php
    require '../functions/funcions.php';
    $conn = connectBD();

    $id = $_GET['id'];

    $sql = "SELECT * FROM pais WHERE idPais = $id";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $pais = $stm->fetch(PDO::FETCH_ASSOC);
    ?>

    <form action="../controladores/modificar_pais.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="mb-3">
            <label for="nombrePais" class="form-label">Nombre del País:</label>
            <input type="text" id="nombrePais" name="nombrePais" class="form-control" value="<?php echo $pais['nombrePais']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Modificar</button>
        <a href="insertPais.php" class="btn btn-secondary">Volver al listado de países</a>
    </form>
</div>
</body>
</html>