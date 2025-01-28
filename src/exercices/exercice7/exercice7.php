<?php
try {
	$bdd = new PDO('mysql:host=localhost;dbname=nomDB', 'root', 'pwd');
	$reponse = true;
}
catch(Exception $e){
	$reponse = false;
	die('Erreur : ' . $e->getMessage());
}

$sqlQuery = 'SELECT * FROM jeux_video';
$jeuxStatement = $bdd->prepare($sqlQuery);
$jeuxStatement->execute();
$jeuxVideos = $jeuxStatement->fetchAll();
	
	while ($reponse)
	{
	
	        foreach($jeuxVideos as $jeuxVideo){
				echo $jeuxVideo['titre'];
			}
			$reponse = false;

	
	}
	$reponse->closeCursor();
?>
