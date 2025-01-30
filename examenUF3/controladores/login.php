<?php
session_start();

require '../functions/functions.php';
$conn = connectBD();

$query = "SELECT * FROM usuario";
$stmt = $conn->prepare($query);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);


// user hola@prof.cat
// pass 1234

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $login_successful = false;

    foreach ($usuarios as $usuario) {
        if ($email == $usuario['email']) {
            if (password_verify($password, $usuario['pass'])) {
                $_SESSION['user'] = $usuario['email'];
                $login_successful = true;
                header('Location: ../index.php');
                exit();
            }
        }
    }

    if (!$login_successful) {
        $_SESSION['error_message'] = "Usuario o contraseña incorrectos. Desear registrarse? <a href='../vistas/registro.php'>Registrarse</a>";
        
    
        header('Location: ../vistas/login.php');
        exit();
    }
}

?>
