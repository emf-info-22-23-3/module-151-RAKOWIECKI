<?php 
	include_once('boss/BossBDManager.php');
	include_once('../beans/Bosses.php');
        
    if (isset($_SERVER['REQUEST_METHOD']))
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			$bossBD = new BossBDManager();
			
			// Récupération des paramètres 'nom' et 'location' envoyés dans l'URL
			echo $bossBD->getInXML($_GET['nom'] ,$_GET['location']);
		}
	}
?>