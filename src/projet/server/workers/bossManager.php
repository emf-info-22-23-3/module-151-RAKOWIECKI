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

		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($_POST['action'] == "modifNom"){

				$pkBoss = $_POST['pkBoss'];
        		$modif = $_POST['modif'];

				$bossBD = new BossBDManager();
        		$result = $bossBD->modifierNomBoss($pkBoss, $modif);

				if ($result) {
					echo '<?xml version="1.0" encoding="UTF-8"?>';
					echo '<response><result>true</result></response>';
				  } else {
					echo '<?xml version="1.0" encoding="UTF-8"?>';
					echo '<response><result>false</result></response>';
				  }
			}
			if($_POST['action'] == "modifHP"){

				$pkBoss = $_POST['pkBoss'];
        		$modif = $_POST['modif'];

				$bossBD = new BossBDManager();
        		$result = $bossBD->modifierHPBoss($pkBoss, $modif);

				if ($result) {
					echo '<?xml version="1.0" encoding="UTF-8"?>';
					echo '<response><result>true</result></response>';
				  } else {
					echo '<?xml version="1.0" encoding="UTF-8"?>';
					echo '<response><result>false</result></response>';
				  }
			}

			if($_POST['action'] == "modifDef"){

				$pkBoss = $_POST['pkBoss'];
        		$modif = $_POST['modif'];

				$bossBD = new BossBDManager();
        		$result = $bossBD->modifierDefBoss($pkBoss, $modif);

				if ($result) {
					echo '<?xml version="1.0" encoding="UTF-8"?>';
					echo '<response><result>true</result></response>';
				  } else {
					echo '<?xml version="1.0" encoding="UTF-8"?>';
					echo '<response><result>false</result></response>';
				  }
			}
			
		}
	}
?>