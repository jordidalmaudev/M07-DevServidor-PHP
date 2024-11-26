<?php

// Cómo trabajamos con diferentes arrays (posicionales, asociativos y multidimensionales) y cómo accedéis a sus valores
// Buscad también com convertir un string en array y viceversa.

// Posicional
$newArray = array('Enero', 'Febrero', 'Marzo');
echo $newArray[1]; // Febrero

// Asociativo
$primerTrimestre = array("primero" => 'Enero', "segundo" => 'Febrero', "tercero" => 'Marzo');
echo $primerTrimestre["segundo"]; // Febrero

// Multidimensional
$multiArray = array(
    "fruits" => array("apple", "banana", "cherry"),
    "vegetables" => array("carrot", "pea", "potato")
);
echo $multiArray["fruits"][2]; // cherry

// Convertir string en array
$string = "Palestina";
$long = strlen($string);
$arrayFromString = str_split($string, $long);
print_r($arrayFromString);


// Viceversa
$array = ['lastname', 'email', 'phone'];
var_dump(implode(",", $array));
