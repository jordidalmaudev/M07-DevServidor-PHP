<?php
$carpeta="C:/archivosPrueba";
$manejador=opendir($carpeta);
if($manejador) {
    $fichero=readdir($manejador);
    while($fichero!=FALSE) {
        if(is_file($fichero)) {
            echo $fichero."<br/>";
        }
        $fichero=readdir($manejador);
    }
}
closedir($manejador);
?>