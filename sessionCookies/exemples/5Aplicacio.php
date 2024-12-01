<?php
//iniciem sessió
session_start();

define("TEMPSINACTIU", 10); //Segons màxims que pot estar l'aplicació inactiva

print_r($_SESSION); //Mostrem contingut de la sessió

//Temps transcorregut des de l'últim accés a la pàgina i la data actual.
$tempsTranscorregut = time() - $_SESSION["ultimAcces"];

if ($tempsTranscorregut >= TEMPSINACTIU) { //Si la sessió ha caducat, han passat 30 segons o més des de l'últim accés...
    session_destroy(); //Destruim sessió
    header("Location: 5Caducitat.php"); //Mostrem la pàgina de caducitat
} else { //Si no ha caducat...
    $_SESSION["ultimAcces"] = time(); //Actualitzem la data per tornar a començar
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <title>Aplicació</title>
    </head>
    <body>
        <p>Benvinguda <strong><?php echo $_SESSION["usuari"]; ?></strong></p>
        <p><a href="5Logout.php">Tanca la sessió</a></p>
        <p><a href="5inici.html">Torna a l'inici</a></p>
    </body>
</html>
