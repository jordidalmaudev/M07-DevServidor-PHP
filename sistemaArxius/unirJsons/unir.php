<?php

// Unir dos archivos json

include 'curso.json';
include 'modulos.json';

$cursoJson = json_decode(file_get_contents('curs.json'), true);
$modulosJson = json_decode(file_get_contents('modulos.json'), true);

echo $cursoJson;
echo $modulosJson;
