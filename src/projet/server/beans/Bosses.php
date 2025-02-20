<?php 
  /**
   * Classe Bosses
   */
  class Bosses
  {
    // Déclaration des propriétés privées
    private $boss; 
    private $pk_boss;
    private $hp_boss; 
    private $def_boss;
    private $location;

    /**
     * Constructeur de la classe Bosses
     *
     * Le constructeur permet d'initialiser un objet Bosses avec les informations de base (PK, nom, HP, DEF, localisation).
     *
     * @param int $pk_boss Identifiant unique (PK) du boss.
     * @param string $boss Nom du boss.
     * @param int $hp_boss Points de vie du boss.
     * @param int $def_boss Défense du boss.
     * @param string $location Localisation du boss.
     */
    public function __construct($pk_boss, $boss, $hp_boss, $def_boss, $location)
    {
      // Initialisation des propriétés avec les valeurs passées en paramètres
      $this->boss = $boss;
      $this->pk_boss = $pk_boss;  
      $this->hp_boss = $hp_boss;  
      $this->def_boss = $def_boss;  
      $this->location = $location;    
    }
    
    /**
     * Fonction qui retourne le nom du boss.
     *
     * @return string Nom du boss.
     */
    public function getBoss()
    {
      return $this->boss;
    }
    
    /**
     * Fonction qui retourne l'identifiant (PK) du boss.
     *
     * @return int Identifiant unique du boss.
     */
    public function getPkBoss()
    {
      return $this->pk_boss;
    }

    /**
     * Fonction qui retourne les points de vie (HP) du boss.
     *
     * @return int Points de vie du boss.
     */
    public function getHPBoss()
    {
      return $this->hp_boss;
    }

    /**
     * Fonction qui retourne la défense (DEF) du boss.
     *
     * @return int Défense du boss.
     */
    public function getDEFBoss()
    {
      return $this->def_boss;
    }

    /**
     * Fonction qui retourne la localisation du boss.
     *
     * @return string Localisation du boss.
     */
    public function getLocation()
    {
      return $this->location;
    }
    
    /**
     * Fonction qui retourne le contenu du bean sous forme de chaîne XML.
     *
     * Cette fonction génère un XML contenant les informations du boss (PK, nom, HP, DEF, localisation).
     *
     * @return string Contenu du bean au format XML.
     */
    public function toXML()
    {
      // Création de la chaîne XML avec les informations du boss
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
