<?php
//Activem la sessió creada en lapàgina entorior
session_start();

//Mostrem contingut de la sessió creada
//echo "<p>Gràcies $nom $cognoms. Les teves dades han estat registrades amb èxit.</p>";
echo "<p>Gràcies ".$_SESSION["nom"]." ".$_SESSION["cognoms"]."</p>";

/*ini_get() accedeix al valor de la majoria de driectives de configuració
 *de PHP*/

//Mostrem ubicació dels arxius temporals on guardem les dades de les sessions
echo ini_get("session.save_path"); 

//Per accedir com a root des de Linux gksudo nautilus / des de terminal

//Destruim sessió. Això només destrueix les dades de sessió del disc, no 
//destrueix la variable $_SESSION.
session_destroy();

//Mostrem contingut de les variables
echo "<p>Fins un altre ".$_SESSION["nom"]." ".$_SESSION["cognoms"];

//Destruim les variables fetes servir ja que encara que destruim la sessió
//les dades fetes servir encara es troben en la variable $_SESSION fins que 
//finalitzi el script. Si hem de tornar a utilitzar-la abans de que finalitzi
//el script, les dades es conservaran.
unset($_SESSION["nom"]);
unset($_SESSION["cognoms"]);
//Un altre manere de desfer-se de les variables: $_SESSION=array();

//Mostrem contingut de les variables destruides
echo "<p>Fins un altre ".$_SESSION["nom"]." ".$_SESSION["cognoms"].".</p>";

?>
