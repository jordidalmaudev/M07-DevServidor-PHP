<?php

function print_dades($dades) {
    foreach($dades as $key=>$value)
    echo "<span>" . $key . ": " . $value . "</span><br>";
}

echo "<h1>Dades del formulari amb el mètode GET:</h1>";
print_dades($_GET);

echo "<h1>Dades del formulari amb el mètode POST:</h1>";
print_dades($_POST);
