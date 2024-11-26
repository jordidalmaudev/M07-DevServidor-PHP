<?php

// Crear l'estructura d'atributs i mètodes necessari per a iniciar un sistema de gestió. Hem de tindre la classe contacte i les subclasses client i proveidor. diferencias entre proveedor y cliente por ejemplo modo de pago, el cliente es el que compra y proveedor el que te provee de productos.

namespace GestionContactes;

class Contacte
{
    protected $nom;
    protected $cognoms;
    protected $telefon;
    protected $email;

    public function __construct($nom, $cognoms, $telefon, $email)
    {
        $this->nom = $nom;
        $this->cognoms = $cognoms;
        $this->telefon = $telefon;
        $this->email = $email;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getCognoms()
    {
        return $this->cognoms;
    }

    public function getTelefon()
    {
        return $this->telefon;
    }

    public function getEmail()
    {
        return $this->email;
    }
}

class Client extends Contacte
{
    private $metodePagament;

    public function __construct($nom, $cognoms, $telefon, $email, $metodePagament)
    {
        parent::__construct($nom, $cognoms, $telefon, $email);
        $this->metodePagament = $metodePagament;
    }

    public function getMetodePagament()
    {
        return $this->metodePagament;
    }
}

class Proveidor extends Contacte
{
    private $producte;

    public function __construct($nom, $cognoms, $telefon, $email, $producte)
    {
        parent::__construct($nom, $cognoms, $telefon, $email);
        $this->producte = $producte;
    }

    public function getProducte()
    {
        return $this->producte;
    }
}

$nou_contacte = new Contacte("Pep", "Guardiola", 640805445, "pepg@gmail.com");
