<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays 2</title>
</head>
<body>
<?php

// Domini de les arrays
// b Arrays associatius i multidimensionals

// Crear l’array multidimensional
// Fer que el DNI sigui la key de cada registre

$alumnes = [
    "12345678Q" => array("Bigues", "Sofia", 7.5),
    "87654321A" => array("Hernández", "Adrià", 9),
    "22222222B" => array("Murillo", "Marta", 3.5)
];

?>
<form action="1b.php" method="get">
    <label for="dni">DNI:</label>
    <input name="dni" type="text" maxlength="9">
    <button type="submit">Enviar</button>
</form>

<?php

// Buscar i mostrar el registre demanat

$dni = $_GET["dni"];

// Control d’errors (evitar qualsevol error, warning… i mostrar un missatge quan no troba cap registre coincident, per exemple)

if (isset($alumnes[$dni])) {
    echo "L'alumne amb DNI $dni és " . $alumnes[$dni][1] . " " . $alumnes[$dni][0] . " i la seva nota és " . $alumnes[$dni][2];
} else {
    echo "No s'ha trobat cap alumne amb DNI $dni";
}

?>

</body>
</html>
