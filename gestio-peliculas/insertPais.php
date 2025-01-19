<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir nuevo país</title>
</head>
<body>
<?php
include 'connexio.php';
$conn = connectBD();

// Obtener la lista de países
$query = "SELECT idPais, nombrePais FROM pais";
$stmt = $conn->prepare($query);
$stmt->execute();
$paises = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Añadir Pais</h1>

<div class="container">
    <div class="row">
        <div class="col-md-6">
        <form action="insertar_pais.php" method="POST">
    <label for="nombrePais">Nombre del Pais:</label>
    <input type="text" id="nombrePais" name="nombrePais" required><br>

    <input type="submit" value="Añadir Pais">
</form>
Volver al <a href="index.php">listado de actores</a>
        </div>
        <div class="col-md-6">
            <h2>Lista de paises</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nombre del Pais</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($paises as $pais): ?>
                        <tr>
                            <td><?php echo $pais['nombrePais']; ?></td>
                            <td><a href="modificarPais.php?id=<?php echo $pais['idPais']; ?>">Modificar</a> | <a href="eliminarPais.php?id=<?php echo $pais['idPais']; ?>">Eliminar</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


</body>
</html>