<?php 
  /**
  * Classe Pays
  *
  * Cette classe représente un pays.
  *
  */
  class Bosses
  {
    /**
    * Variable représentant le nom du pays
    * @access private
    * @var string
    */
    private $boss;
    /**
    * Variable représentant la pk du pays
    * @access private
    * @var integer
    */
    private $pk_boss;

    private $hp_boss;
    private $def_boss;
    private $location;

    /**
    * Constructeur de la classe Pays
    *
    * @param int $pk_pays. PK du pays
    * @param string nom. Nom du pays
    * @param int $dossardCoureur. Numéro de dossard du coureur
    */
    public function __construct($pk_boss, $boss, $hp_boss, $def_boss, $location)
    {
      $this->boss = $boss;
      $this->pk_boss = $pk_boss;  
      $this->hp_boss = $hp_boss;  
      $this->def_boss = $def_boss;  
      $this->location = $location;    
    }
    
    /**
    * Fonction qui retourne le nom du pays.
    *
    * @return nom du pays.
    */
    public function getBoss()
    {
      return $this->boss;
    }
    
    /**
    * Fonction qui retourne la pk du pays.
    *
    * @return pk du pays.
    */
    public function getPkBoss()
    {
      return $this->pk_boss;
    }

    public function getHPBoss()
    {
      return $this->hp_boss;
    }

    public function getDEFBoss()
    {
      return $this->def_boss;
    }

    public function getLocation()
    {
      return $this->location;
    }
    
    /**
    * Fonction qui retourne le contenu du bean au format XML
    * @return le contenu du bean au format XML
    */
    public function toXML()
    {
      $result = '<bosses>';
      $result = $result . '<pk_boss>'.$this->getPkBoss().'</pk_boss>';
      $result = $result . '<nom>'.$this->getBoss().'</nom>';
      $result = $result . '<hp>'.$this->getHPBoss().'</hp>';
      $result = $result . '<def>'.$this->getDEFBoss().'</def>';
      $result = $result . '<location>'.$this->getLocation().'</location>';
      $result = $result . '</bosses>';
      return $result;
    }
  }
?>