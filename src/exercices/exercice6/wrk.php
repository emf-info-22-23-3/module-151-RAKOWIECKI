<?php

class Wrk {
  private $equipesFromDB;

  public function __construct() {
    $this->equipesFromDB = $this->getEquipesDB();
  }

  public function getEquipesDB(){
    require_once('beans/Equipe.php');
    $equipes = [];
    $e = json_decode(file_get_contents('equipes.json'), true);
    for ($i = 0; $i < count($e); $i++){
      $equipe = new Equipe($e[$i]);
      $equipes[] = $equipe;
    }
    return $equipes;
  }

  public function getEquipesFromDB(){
    return $this->equipesFromDB;
  }

}

?>