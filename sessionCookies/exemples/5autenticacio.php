<?php
define("USUARI", "mila"); //Definim nom d'usuari vàlid
define("PASSWORD", "1234"); //Definim contrsenya vàlida

if ($_POST["usuari"] == USUARI && $_POST["contrasenya"] == PASSWORD) {//Si l'autenticació és correcte...
    session_start(); //Iniciem sessió.

    $_SESSION["ultimAcces"] = time(); //Inicialitzem la data d'inici de sessió
    
    //Guardem les dades de l'usuari autenticat en la sessió
    $_SESSION["usuari"] = $_POST["usuari"];
    $_SESSION["contrasenya"] = $_POST["contrasenya"];

    //Mostrem la pàgina de l'aplicació
    header("Location: 5Aplicacio.php");

} else { //Si l'autenticació no és correcte...
   
    
    header("location:5inici.html?usuari=incorrecte"); //Retornem a la pàgina inicial.
}
?>
