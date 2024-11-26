<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar usuario</title>
</head>

<body>

    <?php

    include 'conexion.php';

    //prueba de los :
    if (isset($_GET['eliminar'])) : ?>
        <?php $deleteId = $_GET['eliminar']; ?>
        
        <form method='POST' action='eliminarData.php'>
            <input type='hidden' name='deleteId' value="<?= $deleteId ?>">
            <p>¿Estás seguro de que deseas eliminar el usuario con ID <?= $deleteId ?>?</p>
            <button type='submit' name='confirmarEliminar'>Eliminar</button>
            <a href="index.php">Volver</a>
        </form>
        
    
    <?php endif; ?>

    <?php
    if (isset($_POST['confirmarEliminar'])) {
        $deleteId = $_POST['deleteId'];
        $deleteUser = "DELETE FROM users WHERE id = $deleteId";

        if (mysqli_query($conn, $deleteUser)) {
            echo "<h2>Usuari@ eliminad@ correctamente en la base de datos</h2>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    ?>
</body>

</html>