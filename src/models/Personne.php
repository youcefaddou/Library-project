<?php

abstract class Personne
{
    protected $prenom;
    protected $nom;

    public function __construct($prenom, $nom)
    {
        $this->setPrenom($prenom);
        $this->setNom($nom);
    }

    public function getPrenom()
    {
        return $this->prenom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

}
