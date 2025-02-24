<?php 
	include_once('workers/boss/LocationBDManager.php');
	include_once('beans/Locations.php');
	session_start();

	if (isset($_SESSION['logged'])){
    if (isset($_SERVER['REQUEST_METHOD']))
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			//Récuperer les location en xml
			$locationBD = new LocationBDManager();
			echo $locationBD->getInXML();
		}
	}
}
?>