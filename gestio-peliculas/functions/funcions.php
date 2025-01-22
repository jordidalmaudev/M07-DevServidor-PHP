<?php

session_start();


// Configuración de conexión
$host = "localhost";
$username = "root";
$password = "";
$dbname = "peliculas";

function connectBD() {
    global $host, $username, $password, $dbname;
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // convertir errores en excepciones
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("SET NAMES 'utf8'");
        
        return $conn;
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
}

function session() {

    if (!isset($_SESSION['user'])) {
    header('Location: ./vistas/login.php');
    }

}

function logout() {
    session_destroy();
    header('Location: ../vistas/login.php');
}


function navBar()
{
    echo '
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gestió Películas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">';
                
    if (isset($_SESSION['user'])) {
        echo '
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Bienvenido, ' . $_SESSION['user'] . '
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="./vistas/insertActor.php">Crear Nuevo Actor</a></li>
                            <li><a class="dropdown-item" href="./vistas/insertPais.php">Añadir País</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="./controladores/logout.php">Logout</a></li>
                        </ul>
                    </li>';
    } else {
        echo '
                    <li class="nav-item">
                        <a class="nav-link" href="./vistas/login.php">Login</a>
                    </li>';
    }

    echo '
                </ul>
            </div>
        </div>
    </nav>';
}


?>
