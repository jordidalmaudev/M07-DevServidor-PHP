<?php

include '../functions/functions.php';
$conn = connectBD();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
<?php

// registro de usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO usuario (email, pass) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([strip_tags($email), password_hash($password, PASSWORD_DEFAULT)]);

    echo "<p>Usuario registrado correctamente</p>";
    echo "<a href='../vistas/login.php'>Login</a>";
}

?>
    
</body>
</html>