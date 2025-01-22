<?php
session_start();

require '../functions/funcions.php';
$conn = connectBD();

$query = "SELECT * FROM usuario";
$stmt = $conn->prepare($query);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['user'];
    $password = $_POST['password'];
    $login_successful = false;

    foreach ($usuarios as $usuario) {
        if ($user == $usuario['nombre']) {
            if (password_verify($password, $usuario['pass'])) {
                $_SESSION['user'] = $usuario['nombre'];
                $login_successful = true;
                header('Location: ../index.php'); 
                exit();
            }
        }
    }

    if (!$login_successful) {
        $_SESSION['error_message'] = 'Usuario o contraseña incorrectos.';
        header('Location: ../vistas/login.php');
        exit();
    }
}

?>