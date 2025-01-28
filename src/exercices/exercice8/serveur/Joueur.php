<?php
class Joueur
{
    private $nom;
    private $points;

    // Constructeur
    public function __construct($nom, $points)
    {
        $this->nom = $nom;
        $this->points = $points;
    }

    // Getter pour le nom
    public function getNom()
    {
        return $this->nom;
    }

    // Getter pour les points
    public function getPoints()
    {
        return $this->points;
    }

    // Méthode pour afficher l'objet sous forme de chaîne
    public function toString()
    {
        return $this->nom;
    }

    // Setter pour le nom
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    // Setter pour les points
    public function setPoints($points)
    {
        $this->points = $points;
    }
}
?>