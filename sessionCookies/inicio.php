<?php

// traer el login de la cookie
$login = $_COOKIE['login'] ?? '';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <?= "Benvingut $login" ?>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
