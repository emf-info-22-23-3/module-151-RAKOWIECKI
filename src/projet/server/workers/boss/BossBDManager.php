<?php 
	include_once('Connexion.php');
	include_once('../beans/Bosses.php');
        
	/**
	* Classe paysBDManager
	*
	* Cette classe permet la gestion des pays dans la base de données dans l'exercice de debbugage
	*
	*/
	class BossBDManager
	{
		/**
		* Fonction permettant la lecture des pays.
		* Cette fonction permet de retourner la liste des pays se trouvant dans la liste
		*
		* @return liste de Pays
		*/
		public function readBoss($nom ,$location)
		{
			$count = 0;
			$liste = array();
			$connection = Connexion::getInstance();
			$query = $connection->selectQuery("SELECT * FROM mydb.t_boss b JOIN mydb.t_location l ON b.fk_location = l.pk_location WHERE l.location LIKE :location AND b.nom LIKE :nom",
			array(':nom' => "%$nom%", ':location' => $location));
            foreach($query as $data){
				$boss = new Bosses($data['pk_boss'], $data['nom'], $data['hp'], $data['def'], $data['fk_location']);
                $liste[$count++] = $boss;
			}	
			return $liste;	
		}
		
		/**
		* Fonction permettant de retourner la liste des pays en XML.
		*
		* @return String. Liste des pays en XML
		*/
		public function getInXML($nom ,$location)
		{
			$listBoss = $this->readBoss($nom ,$location);
			$result = '<listeBoss>';
			for($i=0;$i<sizeof($listBoss);$i++) 
			{
				$result = $result .$listBoss[$i]->toXML();
			}
			$result = $result . '</listeBoss>';
			return $result;
		}
	}
?>