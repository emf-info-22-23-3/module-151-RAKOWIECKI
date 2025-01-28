<?php
class Equipe
{
    private $pk;
    private $nom;

    // Constructeur
    public function __construct($pk, $nom)
    {
        $this->pk = $pk;
        $this->nom = $nom;
    }

    // Getter pour le nom
    public function getNom()
    {
        return $this->nom;
    }

    // Getter pour le pk
    public function getPk()
    {
        return $this->pk;
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

    // Setter pour le pk
    public function setPk($pk)
    {
        $this->pk = $pk;
    }
}
?>
