<?php
$nombre01="ejemplo02.php";
if(file_exists($nombre01)) {
    if(is_file($nombre01)) {
        if(is_writable($nombre01)) {
            echo "El fichero $nombre01 existe y se puede modificar";
        }
    }
    else {
        echo "$nombre01 no es un fichero";
    }
}
else {
    echo "$nombre01 no existe";
}
?>