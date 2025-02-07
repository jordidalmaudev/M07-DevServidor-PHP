<?php
require 'controllers/mainController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    procesarFormulario();
} else {
    mostrarFormulario();
}
?>
