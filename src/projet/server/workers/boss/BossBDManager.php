<?php 
  include_once('Connexion.php');
  include_once('../beans/Bosses.php');
        
  /**
   * Classe BossBDManager
   */
  class BossBDManager
  {
    /**
     * Fonction permettant la lecture des bosses.
     * 
     * Cette fonction retourne la liste des bosses correspondant à un nom de boss et une localisation donnés.
     * Elle interroge la base de données pour récupérer les données sur les bosses.
     *
     * @param string $nom Le nom du boss que l'on recherche.
     * @param string $location La localisation du boss que l'on recherche.
     * 
     * @return array Liste des bosses correspondants.
     */
    public function readBoss($nom ,$location)
    {
      $count = 0;
      $liste = array();
      $connection = Connexion::getInstance();
      
      // Requête SQL pour récupérer les bosses et leur localisation en fonction des critères
      $query = $connection->selectQuery("SELECT * FROM mydb.t_boss b JOIN mydb.t_location l ON b.fk_location = l.pk_location WHERE l.location LIKE :location AND b.nom LIKE :nom",
      array(':nom' => "%$nom%", ':location' => $location));

      // Boucle pour remplir la liste avec les objets Bosses récupérés de la base de données
      foreach($query as $data){
        $boss = new Bosses($data['pk_boss'], $data['nom'], $data['hp'], $data['def'], $data['fk_location']);
        $liste[$count++] = $boss;
      }  

      return $liste;
    }

    /**
     * Fonction permettant de retourner la liste des bosses sous forme de XML.
     *
     * Cette fonction génère un XML contenant toutes les informations des bosses retournées par `readBoss`.
     * Elle utilise la méthode `toXML()` de chaque objet `Bosses` pour générer les éléments XML.
     *
     * @param string $nom Le nom du boss que l'on recherche.
     * @param string $location La localisation du boss que l'on recherche.
     * 
     * @return string Liste des bosses au format XML.
     */
    public function getInXML($nom ,$location)
    {
	// Récupère la liste des bosses
      $listBoss = $this->readBoss($nom ,$location);

      $result = '<listeBoss>';

      // Pour chaque boss dans la liste, génère le XML en utilisant la méthode toXML()
      for($i=0;$i<sizeof($listBoss);$i++) 
      {
        $result = $result .$listBoss[$i]->toXML();
      }

      $result = $result . '</listeBoss>';
      return $result;
    }

    public function modifierNomBoss($pkBoss, $modif)
    {
      $connection = Connexion::getInstance();

      // Requête SQL pour mettre à jour le nom du boss
      $query = "UPDATE mydb.t_boss SET nom = :nom WHERE pk_boss = :pk_boss";
      
      // Paramètres pour la requête préparée
      $params = array(':nom' => $modif, ':pk_boss' => $pkBoss);

      // Exécuter la requête
      $result = $connection->executeQuery($query, $params);
      
      // Retourner true si la mise à jour a réussi, false sinon
      return $result;
    }

    public function modifierHpBoss($pkBoss, $modif)
    {
      $connection = Connexion::getInstance();

      // Requête SQL pour mettre à jour le nom du boss
      $query = "UPDATE mydb.t_boss SET hp = :hp WHERE pk_boss = :pk_boss";
      
      // Paramètres pour la requête préparée
      $params = array(':hp' => $modif, ':pk_boss' => $pkBoss);

      // Exécuter la requête
      $result = $connection->executeQuery($query, $params);
      
      // Retourner true si la mise à jour a réussi, false sinon
      return $result;
    }

    public function modifierDefBoss($pkBoss, $modif)
    {
      $connection = Connexion::getInstance();

      // Requête SQL pour mettre à jour le nom du boss
      $query = "UPDATE mydb.t_boss SET def = :def WHERE pk_boss = :pk_boss";
      
      // Paramètres pour la requête préparée
      $params = array(':def' => $modif, ':pk_boss' => $pkBoss);

      // Exécuter la requête
      $result = $connection->executeQuery($query, $params);
      
      // Retourner true si la mise à jour a réussi, false sinon
      return $result;
    }

  }
?>
