<?php 
  /**
  * Classe Pays
  *
  * Cette classe représente un pays.
  *
  */
  class Locations
  {
    /**
    * Variable représentant le nom du pays
    * @access private
    * @var string
    */
    private $location;
    /**
    * Variable représentant la pk du pays
    * @access private
    * @var integer
    */
    private $pk_location;

    /**
    * Constructeur de la classe Pays
    *
    * @param int $pk_pays. PK du pays
    * @param string nom. Nom du pays
    * @param int $dossardCoureur. Numéro de dossard du coureur
    */
    public function __construct($pk_location, $location)
    {
      $this->location = $location;
      $this->pk_location = $pk_location;    
    }
    
    /**
    * Fonction qui retourne le nom du pays.
    *
    * @return nom du pays.
    */
    public function getLocation()
    {
      return $this->location;
    }
    
    /**
    * Fonction qui retourne la pk du pays.
    *
    * @return pk du pays.
    */
    public function getPkLocation()
    {
      return $this->pk_location;
    }
    
    /**
    * Fonction qui retourne le contenu du bean au format XML
    * @return le contenu du bean au format XML
    */
    public function toXML()
    {
      $result = '<locations>';
      $result = $result . '<pk_location>'.$this->getPkLocation().'</pk_location>';
      $result = $result . '<location>'.$this->getLocation().'</location>';
      $result = $result . '</locations>';
      return $result;
    }
  }
?>