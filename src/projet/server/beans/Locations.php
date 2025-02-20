<?php 
  /**
   * Classe Locations
   */
  class Locations
  {
    // Déclaration des propriétés privées
    private $location;
    private $pk_location;

    /**
     * Constructeur de la classe Locations
     *
     * Le constructeur permet d'initialiser un objet Locations avec les informations nécessaires : PK et nom.
     *
     * @param int $pk_location Identifiant unique (PK) de la localisation.
     * @param string $location Nom de la localisation.
     */
    public function __construct($pk_location, $location)
    {
      $this->location = $location;
      $this->pk_location = $pk_location;
    }
    
    /**
     * Fonction qui retourne le nom de la localisation.
     *
     * @return string Nom de la localisation.
     */
    public function getLocation()
    {
      return $this->location;
    }
    
    /**
     * Fonction qui retourne l'identifiant unique (PK) de la localisation.
     *
     * @return int Identifiant unique de la localisation.
     */
    public function getPkLocation()
    {
      return $this->pk_location;
    }
    
    /**
     * Fonction qui retourne le contenu de l'objet Locations sous forme de XML
     *
     * Cette fonction génère un XML contenant les informations de la localisation (PK et nom).
     *
     * @return string Contenu de l'objet Locations au format XML.
     */
    public function toXML()
    {
      // Création de la chaîne XML avec les informations de la localisation
      $result = '<locations>';
      $result = $result . '<pk_location>'.$this->getPkLocation().'</pk_location>';
      $result = $result . '<location>'.$this->getLocation().'</location>';
      $result = $result . '</locations>';
      return $result;
    }
  }
?>
