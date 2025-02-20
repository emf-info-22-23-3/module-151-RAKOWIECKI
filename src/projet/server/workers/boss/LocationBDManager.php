<?php 
	include_once('Connexion.php');
	include_once('../beans/Locations.php');
        
	/**
	* Classe LocationBDManager
	*/
	class LocationBDManager
	{
		/**
		* Fonction permettant la lecture des localisations.
		* 
		* Cette fonction retourne la liste des localisations dans la base de données.
		*
		* @return array Liste des localisations.
		*/
		public function readLocation()
		{
			$count = 0;
			$liste = array();
			$connection = Connexion::getInstance();
            
            // Requête SQL pour récupérer les données sur les localisations
			$query = $connection->selectQuery("SELECT * FROM t_location", array());

            // Boucle pour remplir le tableau avec les objets Locations
			foreach($query as $data){
				$location = new Locations($data['pk_location'], $data['location']);
				$liste[$count++] = $location;
			}	
			return $liste;
		}
		
		/**
		* Fonction permettant de retourner la liste des localisations sous forme de XML.
		*
		* Cette fonction génère un XML contenant toutes les informations des localisations.
		*
		* @return string Liste des localisations au format XML.
		*/
		public function getInXML()
		{
		// Récupère la liste des localisations
			$listLocation = $this->readLocation();

			$result = '<listeLocation>';

            // Boucle pour ajouter chaque localisation au format XML
			for($i=0;$i<sizeof($listLocation);$i++) 
			{
				$result = $result .$listLocation[$i]->toXML();
			}

			$result = $result . '</listeLocation>';
			return $result;
		}
	}
?>
