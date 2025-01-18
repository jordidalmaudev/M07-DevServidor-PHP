<?php

$carpeta="C:/archivosPrueba";

$lista=scandir($carpeta);

foreach($lista as $fichero) {
    $rutaBuena = $carpeta . "/" . $fichero; // ruta completa 
    if(is_file($rutaBuena)) {
        echo $fichero."<br/>";
    }
}

?>