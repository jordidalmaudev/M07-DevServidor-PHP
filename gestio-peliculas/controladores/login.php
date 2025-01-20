<?php
require '../db/connexio.php';
$conn = connectBD();

$query = "SELECT * FROM usuario";
$stmt = $conn->prepare($query);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['user'];
    $password = $_POST['password'];

    foreach ($usuarios as $usuario) {
        if($usuario['user'] == $user && $usuario['password'] == $password) {
            header('Location: ../index.php');
            exit;
        }
    }
    header('Location: ../login.php');
}

?>