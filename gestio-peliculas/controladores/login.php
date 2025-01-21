<?php
session_start();

require '../functions/funcions.php';
$conn = connectBD();

$query = "SELECT * FROM usuario";
$stmt = $conn->prepare($query);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['user'];
    $password = $_POST['password'];

    foreach ($usuarios as $usuario) {
        if ( $user == $usuario['nombre']) {
            if(password_verify($password, $usuario['pass'])) {
                $_SESSION['user'] = $usuario['nombre'];
                header('Location: ../index.php');
            }
        }
    }
    // header('Location: ../login.php');
}

?>