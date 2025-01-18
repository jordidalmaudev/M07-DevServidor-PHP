<?php

$carpeta = 'D:/xampp/htdocs/sistemaArxius/pruebas/archivosPrueba';
$dir = is_dir($carpeta);

$manejador = scandir($carpeta);
var_dump($manejador);

if ($dir) {
    $fitxer = readdir($manejador);

    while ($fitxer != false) {
        if (is_file($fitxer)) {
             echo $fitxer . "<br/>";
        }
        $fitxer = readdir($manejador);
    }
}
closedir($manejador);
