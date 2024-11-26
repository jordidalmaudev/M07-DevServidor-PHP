<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays 1</title>
</head>
<body>
<?php

// Domini de les arrays
// a Ordenació d’arrays i treball amb cadenes de text

$noms = "Murillo, marta;Bigues, Sofia; Pérez, Júlia ; amoros, Mireia; Hernandez, Adrià";

//control d’errors (no permetre en les dades minúscules on no toca)

$noms = ucwords($noms);

// 1. Ficar la cadena en una array
$noms = explode(";", $noms);

// 2. control d’errors (no permetre en les dades espais on no toca)

foreach ($noms as $i => $nom) {
    $noms[$i] = trim($nom);
}

// 3. Ordenar l’array alfabèticament
sort($noms);
?>

<!-- mostrar l’array ben maca  -->
<strong>Noms d'alumnes:</strong>
<br>

<?php
foreach ($noms as $nom) {
    echo $nom . "<br>";
}
?>
</body>
</html>
