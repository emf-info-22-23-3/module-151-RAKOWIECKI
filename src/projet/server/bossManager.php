<?php 
	include_once('workers/boss/BossBDManager.php');
	include_once('beans/Bosses.php');
    session_start();

	//Si il il y a une session
	if (isset($_SESSION['logged'])){
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

				//Récuperation des valeurs pkBoss du data ajax
				$pkBoss = $_POST['pkBoss'];
        		$modif = $_POST['modif'];

				$bossBD = new BossBDManager();
        		$result = $bossBD->modifierNomBoss($pkBoss, $modif);

				//Retourne un xml true ou false par rapport a la modification
				if ($result) {
					echo '<?xml version="1.0" encoding="UTF-8"?>';
					echo '<response><result>true</result></response>';
				  } else {
					echo '<?xml version="1.0" encoding="UTF-8"?>';
					echo '<response><result>false</result></response>';
				  }
			}

			if($_POST['action'] == "modifHP"){

				//Récuperation des valeurs pkBoss du data ajax
				$pkBoss = $_POST['pkBoss'];
        		$modif = $_POST['modif'];

				$bossBD = new BossBDManager();
        		$result = $bossBD->modifierHPBoss($pkBoss, $modif);

				//Retourne un xml true ou false par rapport a la modification
				if ($result) {
					echo '<?xml version="1.0" encoding="UTF-8"?>';
					echo '<response><result>true</result></response>';
				  } else {
					echo '<?xml version="1.0" encoding="UTF-8"?>';
					echo '<response><result>false</result></response>';
				  }
			}

			if($_POST['action'] == "modifDef"){

				//Récuperation des valeurs pkBoss du data ajax
				$pkBoss = $_POST['pkBoss'];
        		$modif = $_POST['modif'];

				$bossBD = new BossBDManager();
        		$result = $bossBD->modifierDefBoss($pkBoss, $modif);

				//Retourne un xml true ou false par rapport a la modification
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
	}
?>