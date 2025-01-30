<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Login Page</title>
</head>


<body>
    <div class="container mt-5 d-flex align-items-center flex-column">
        <div class="row w-25 text-center">

            <h1>Login Page</h1>
            <p>Examen UF3 - Preguntas Respuestas</p>
        </div>
        <?php
        if (isset($_SESSION['error_message'])) {
            echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_message'] . '</div>';
            unset($_SESSION['error_message']);
        }
        ?>
        <div class="row w-25">

            <form action="../controladores/login.php" method="POST">
            <div class="form-group d-flex flex-column">
                <input class="form-control" type="email" name="email" placeholder="Email" required>
                <input class="form-control mt-2" type="password" name="password" placeholder="Password" required>
                <button type="submit" class="btn btn-primary mt-3 px-5 align-self-center">Entrar</button>
                <p class="text-center mt-4">Si no tienes usuario: <a href='../vistas/registro.php'>Registrarse</a></p>
            </div>
            </form>
        </div>
    </div>
</body>
</html>
