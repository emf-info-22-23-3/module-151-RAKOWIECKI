<?php
class Wrk
{
    private $bdd;
    
    public function __construct()
    {
        try {
            $this->bdd = new PDO("mysql:host=database;dbname=hockey_stats", "root", "root");
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    
    public function getEquipesFromDB()
    {
        $sqlQuery = 'SELECT * FROM t_equipe';
        $equipeStatement = $this->bdd->prepare($sqlQuery);
        $equipeStatement->execute();
        
        $equipes = $equipeStatement->fetchAll();
        
        $equipesObjects = [];
        foreach ($equipes as $equipe) {
			require_once("Equipe.php");
            $equipeObj = new Equipe($equipe['PK_equipe'], $equipe['Nom']);
            $equipesObjects[] = $equipeObj;
        }
        
        $equipeStatement->closeCursor();

        return $equipesObjects;
    }

    public function getJoueursFromDB()
    {
        $sqlQuery = 'SELECT * FROM t_joueur';
        $equipeStatement = $this->bdd->prepare($sqlQuery);
        $equipeStatement->execute();
        
        $joueurs = $equipeStatement->fetchAll();
        
        $joueursObjects = [];
        foreach ($joueurs as $joueur) {
            $joueurObj = new Joueur($joueur['Nom'], $joueur['Points']);
            $joueursObjects[] = $joueurObj;
        }
        
        $equipeStatement->closeCursor();

        return $joueursObjects;
    }
    
    public function closeConnection()
    {
        $this->bdd = null;
    }
}
?>