<?php
//La caducitat d'una sessió per defecte és la que te assignada la variable
//session.cache_expire de php.ini. Normalmentés de 180 mínuts. Es pot modificar
//mitjançant 
$caducitat=session_cache_expire();
echo"<p>La caducitat de la sessió és: $caducitat</p>";

//Modifiquem caducitat de la sessió a 30 minuts. Aquest valor s'ha d'indicar cada
//cop que fem una petició, ja que sino es reinicia al valor per defecte 180'.
session_cache_expire(30);
$caducitat=session_cache_expire();
echo"<p>La nova caducitat de la sessió és: $caducitat</p>";

//Creem sessió
session_start();

//Mostrem SID de la sessió creada
echo "<p>El SID de la teva sessió és ".session_id().".</p>";

//Mostrem nom de la sessió creada
echo "<p>El nom de la teva sessió és ".session_name().".</p>";

//Mostrem els parametres de la cookie de sessió
$parametres=session_get_cookie_params();
echo"<p>";
//Mostrem els paràmetres
print_r($parametres);
echo"</p>";


//Destruim sessió. Sobre tot quan la sessió ha d'acabar abans de tancar 
//el navegador. No destrueix la cookie de la sessió.
session_destroy(); //destruim la informació associada amb la sessió actual
?>
