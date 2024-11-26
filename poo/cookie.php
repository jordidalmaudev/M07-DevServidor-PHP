<?php

namespace GestionCookie;


// ejemplo profe

class Cookie {
    private $clau;
    private $valor;
    private $caducitat;

    public function __construct($clau, $valor, $caducitat) 
    {

        $this->clau = $clau;
        $this->valor = $valor;
        $this->caducitat = $caducitat;

        setCookie($clau, $valor, time() + $caducitat);
    }

    public function destroyCookie($clau) 
    {
        setCookie($this->$clau, $this->$valor, -1);
    }
}

class GestionCookie
{
    private $nomCookie;
    private $email;

    public function __construct($email, $nomCookie)
    {
        $this->email = $email;
        $this->nomCookie = $nomCookie;
    }

    public function setCookie($nomCookie, $email)
    {
        setcookie($nomCookie, $email, time() + 3600);
    }

    public function getCookie($nomCookie)
    {
        return $_COOKIE[$nomCookie];
    }

    public function show()
    {
        echo "MOSTRAR<br>";
        foreach ($_COOKIE as $key => $value) {
            echo $key . " => " . $value . "<br>";
        }
    }

    public function deleteCookie($nom)
    {
        setcookie($nomCookie, "", time() - 1);
    }
}
