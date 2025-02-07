<?php
require 'models/dataModel.php';

function mostrarFormulario() {
    require 'views/formulario.php';
}

function procesarFormulario() {
    $nombre = $_POST['nombre'];
    $resultado = obtenerDatos($nombre);
    require 'views/resultado.php';
}

?>
