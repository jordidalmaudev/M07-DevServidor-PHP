<?php

require '../app/models/peliculas.php';
require '../app/models/actores.php';

function mostrarFormularioPeliculas($peliculas)
{
    require_once '../app/views/formulario.php';
}

function mostrarResultadoActores($actores)
{
    require_once '../app/views/actores.php';
}

function index() {
    $conn = connectBD();
    $peliculas = obtenerPeliculas($conn);
    $actores = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $idPelicula = $_POST['pelicula'];
        $actores = obtenerActores($conn, strip_tags($idPelicula));
    }

    mostrarFormularioPeliculas($peliculas);
    mostrarResultadoActores($actores);
}