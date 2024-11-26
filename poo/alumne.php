<?php

namespace Alumne;

class Alumne
{
    private $nom;
    private $cognoms;
    private $email;

    public function __construct($nom, $cognoms, $email)
    {
        $this->nom = $nom;
        $this->cognoms = $cognoms;
        $this->email = $email;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setCognoms($cognoms)
    {
        $this->cognoms = $cognoms;
    }
    public function setEmail($email)
    {
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
    public function getEmail()
    {
        return $this->email;
    }

    public function show()
    {
        echo "MOSTRAR<br>";
        echo "Nom: " . $this->nom . "<br>";
        echo "Cognoms: " . $this->cognoms . "<br>";
        echo "Email: " . $this->email . "<br>";
    }

    public function edit($nom, $cognoms, $email)
    {
        $this->nom = $nom;
        $this->cognoms = $cognoms;
        $this->email = $email;


        echo "EDICION<br>";
        echo "Nom: " . $this->nom . "<br>";
        echo "Cognoms: " . $this->cognoms . "<br>";
        echo "Email: " . $this->email . "<br>";

        echo "editado/a correctamente.";
    }

    // public function create($nom, $cognoms, $email)
    // {
    //     $this->nom = $nom;
    //     $this->cognoms = $cognoms;
    //     $this->email = $email;

    //     echo "Nom: " . $this->nom . "<br>";
    //     echo "Cognoms: " . $this->cognoms . "<br>";
    //     echo "Email: " . $this->email . "<br>";

    //     echo "Creatdo/a correctamente.";
    // }

    public function delete()
    {
        echo "ELIMINAR<br>";
        $this->nom = null;
        $this->cognoms = null;
        $this->email = null;

        echo "Eliminado/a correctamente.";
    }
}


$javi = new Alumne("Javi", "Oliveira", "javioli@estatut.cat");
$javi->show();
$javi->edit("Javi", "Rodriguez Oliveira", "javioli@estatut.cat");
$javi->create("Javi", "Rodriguez Oliveira", "javiloco@estatut.cat");
$javi->delete(); // adios javi
