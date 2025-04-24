<?php

require_once 'Auteur.php';

class Livres
{
    private string $titre;
    private Auteur $ecrivain;
    private int $year = 0;
    private bool $dispo = true;

    public function __construct(string $titre, Auteur $ecrivain, int $year)
    {
        $this->setTitre($titre);
        $this->setEcrivain($ecrivain);
        $this->setYear($year);
        $ecrivain->ajouterLivre($this);
    }

    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function setEcrivain(Auteur $ecrivain): void
    {
        $this->ecrivain = $ecrivain;
    }

    public function getEcrivain(): Auteur
    {
        return $this->ecrivain;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function getYear(): int
    {
        return $this->year;
    }
    
    public function emprunter(): bool
    {
        if (!$this->dispo) return false;
        $this->dispo = false;
        return true;
    }

    public function rendre(): void
    {
        $this->dispo = true;
    }

    public function estDispo(): bool
    {
        return $this->dispo;
    }

    public function afficherInfos(): string
    {
        return "Titre: {$this->titre}," . "<br>" .  "Auteur: {$this->ecrivain->getNomAuteur()}," . "<br>" .  "Année: {$this->year}," . "<br>" . "Disponible: " . ($this->dispo ? 'Oui' : 'Non'). "<br><br>" ;
    }
}
