<?php
$nombre="ejemplo05.php";
$tamanyo=filesize($nombre);
$momento=filemtime($nombre);
$fecha=date("d/m/Y H:i:s",$momento);
echo "El archivo $nombre ocupa $tamanyo bytes";
echo "<br/>";
echo "La última modificación fue el $fecha";
?>