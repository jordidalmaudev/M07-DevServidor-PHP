<?php

include 'dades.php';

$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';
$remember = isset($_POST['remember']);

// Verificar credenciales
if ($login === $dades['login'] && $password === $dades['password']) {
    $_SESSION["login"] = true;
    if ($remember) {
        // Crear cookies con los datos
        setcookie('login', $login, time() + 3600, '/');
        setcookie('password', $password, time() + 3600, '/');
    }
    header('Location: inicio.php');
    exit;
} else {
    // Redirigir a formularior
    echo "Credenciales incorrectas. <a href='index.php'>Volver</a>";
}
