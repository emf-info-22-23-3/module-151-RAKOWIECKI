<?php
class Ctrl
{
    private $wrk;

        public function __construct()
    {
        require_once('Wrk.php');
        $this->wrk = new Wrk();
    }

    public function getEquipes()
    {
        $equipes = $this->wrk->getEquipesFromDB();
        return $equipes;
    }

    public function getJoueurs()
    {
        $joueurs = $this->wrk->getJoueursFromDB();
        return $joueurs;
    }

    public function closeConnection()
    {
        $this->wrk->closeConnection();
    }
}

?>