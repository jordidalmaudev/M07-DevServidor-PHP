<?php
$nombre="ejemplo04.php";
$propietario=fileowner($nombre);
echo "El propietario de $nombre es $propietario";
echo "Permisos: ".fileperms($nombre);
?>