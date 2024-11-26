<?php

// Un primer script donde mostréis cómo creáis variables, cómo sobrescribís su valor y cómo lo imprimís.
// También deberéis mostrar el registro de constantes.

// Declaración de variables
$name = "Jordi";
$email = "jordidalmau.alum@insestatut.cat";

// Sobreescribir
$newEmail = "jdalmau.com";
$email = $newEmail;

// Imprimir variables
echo "Mi nombre es " . $name . " y mi email es este: " . $email;

// Constantes
const CODIGO_MARCA = "123456";
define("MARCA", "Toyota");

echo constant("MARCA");
