<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Alumne</title>
</head>
<body>
<?php

    require_once './servicios/connDB.php';

if (isset($_GET['eliminar'])) : ?>
        <?php $deleteId = $_GET['eliminar']; ?>
        
        <form method='POST' action='eliminar.php'>
            <input type='hidden' name='deleteId' value="<?= $deleteId ?>">
            <p>¿Estás seguro de que deseas eliminar el usuario con ID <?= $deleteId ?>?</p>
            <button type='submit' name='confirmarEliminar'>Eliminar</button>
            <a href="index.php">Volver</a>
        </form>
        
    
<?php endif; ?>

    <?php
    if (isset($_POST['confirmarEliminar'])) {
        $deleteId = $_POST['deleteId'];
        $deleteAlumne = "DELETE FROM alumnes WHERE id = $deleteId";

        if (mysqli_query($mysqlConnection, $deleteAlumne)) : ?>
            <h2>Alumne eliminado correctamente en la base de datos</h2>
            <a href="./index.php">Volver</a>
        <?php else : ?>
                <p>Error: <?= mysqli_error($mysqlConnection); ?></p>
        <?php endif;
        mysqli_close($mysqlConnection);
    }
    ?>
</body>
</html>