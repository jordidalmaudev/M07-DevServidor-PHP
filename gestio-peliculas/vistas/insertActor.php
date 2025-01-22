<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Actor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Crear Nuevo Actor</h1>
    <?php
    require '../functions/funcions.php';
    $conn = connectBD();

    // Obtener la lista de países
    $query = "SELECT idPais, nombrePais FROM pais";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $paises = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <form action="../controladores/insertar_actor.php" method="POST">
        <div class="mb-3">
            <label for="nombreActor" class="form-label">Nombre del Actor:</label>
            <input type="text" id="nombreActor" name="nombreActor" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nacionalidadActor" class="form-label">Nacionalidad del Actor:</label>
            <select id="nacionalidadActor" name="nacionalidadActor" class="form-select" required>
                <?php foreach ($paises as $pais): ?>
                    <option value="<?php echo $pais['idPais']; ?>"><?php echo $pais['nombrePais']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen del Actor (URL):</label>
            <input type="text" id="imagen" name="imagen" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Insertar Actor</button>
        <a href="../index.php" class="btn btn-secondary">Volver al listado de actores</a>
    </form>
</div>
</body>
</html>