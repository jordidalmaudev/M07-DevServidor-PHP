<?php
//Iniciem sessió
session_start();

echo"<p>";
//Mostrem el contingut de la sessió creada
print_r($_SESSION);
echo"</p>";

//Afegim contingut a la sessió
$_SESSION["nom"] = "Pepito";
$_SESSION["cognoms"] = "de los palotes";

//echo "<p>Gràcies $nom $cognoms. Les teves dades han estat registrades amb èxit.</p>";
echo "<p>Gràcies ".$_SESSION["nom"]." ".$_SESSION["cognoms"].". Les teves dades han estat registrades amb èxit.</p>";

echo"<p>";
//Mostrem el contingut de la sessió creada i modificada
print_r($_SESSION);
echo"</p>";

?>
