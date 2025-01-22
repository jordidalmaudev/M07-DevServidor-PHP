<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir País</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Añadir País</h1>
    <?php
    require '../functions/funcions.php';
    $conn = connectBD();

    // Obtener la lista de países
    $query = "SELECT idPais, nombrePais FROM pais";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $paises = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="row">
        <div class="col-md-6">
            <form action="../controladores/insertar_pais.php" method="POST">
                <div class="mb-3">
                    <label for="nombrePais" class="form-label">Nombre del País:</label>
                    <input type="text" id="nombrePais" name="nombrePais" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Añadir País</button>
                <a href="../index.php" class="btn btn-secondary">Volver al listado de actores</a>
            </form>
        </div>
        <div class="col-md-6">
            <h2>Lista de Países</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre del País</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($paises as $pais): ?>
                        <tr>
                            <td><?php echo $pais['nombrePais']; ?></td>
                            <td>
                                <a href="modificarPais.php?id=<?php echo $pais['idPais']; ?>" class="btn btn-success btn-sm">Modificar</a>
                                <a href="eliminarPais.php?id=<?php echo $pais['idPais']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>