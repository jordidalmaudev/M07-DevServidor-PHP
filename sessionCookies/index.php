<?php

session_start()

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="post">
        <label for="login">Usuario:</label>
        <input type="email" name="login" id="login" value="<?php echo $_COOKIE['login'] ?? ''; ?>" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" value="<?php echo $_COOKIE['password'] ?? ''; ?>" required>
        <br>
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Recordarme</label>
        <br>
        <button type="submit">Iniciar sesión</button>
    </form>
    <button onClick="location.href='desrecordar.php'">Des-recordar</button>
</body>
</html>
