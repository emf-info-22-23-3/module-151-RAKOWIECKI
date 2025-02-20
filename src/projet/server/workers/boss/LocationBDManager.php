<?php 
	include_once('Connexion.php');
	include_once('../beans/Locations.php');
        
	/**
	* Classe paysBDManager
	*
	* Cette classe permet la gestion des pays dans la base de données dans l'exercice de debbugage
	*
	*/
	class LocationBDManager
	{
		/**
		* Fonction permettant la lecture des pays.
		* Cette fonction permet de retourner la liste des pays se trouvant dans la liste
		*
		* @return liste de Pays
		*/
		public function readLocation()
		{
			$count = 0;
			$liste = array();
			$connection = Connexion::getInstance();
            $query = $connection->selectQuery("SELECT * FROM t_location", array());
			foreach($query as $data){
				$location = new Locations($data['pk_location'], $data['location']);
				$liste[$count++] = $location;
			}	
			return $liste;	
		}
		
		/**
		* Fonction permettant de retourner la liste des pays en XML.
		*
		* @return String. Liste des pays en XML
		*/
		public function getInXML()
		{
			$listLocation = $this->readLocation();
			$result = '<listeLocation>';
			for($i=0;$i<sizeof($listLocation);$i++) 
			{
				$result = $result .$listLocation[$i]->toXML();
			}
			$result = $result . '</listeLocation>';
			return $result;
		}
	}
?>