<?php 
	include_once('workers/boss/LocationBDManager.php');
	include_once('beans/Locations.php');
        
    if (isset($_SERVER['REQUEST_METHOD']))
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			$locationBD = new LocationBDManager();
			echo $locationBD->getInXML();
		}
	}
?>