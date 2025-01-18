<?php
$actual=getcwd();
$superior=dirname($actual,1);
echo "Estás en $actual";
echo "<br/>";
echo "El directorio superior es $superior";
?>