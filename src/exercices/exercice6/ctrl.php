<?php

class Ctrl{
  private $equipesFromDB;
  private $wrk;

  public function __construct() {
    require_once('wrk.php');
    $this->wrk = new Wrk();
    $this->equipesFromDB = $this->wrk->getEquipesFromDB();
  }

  public function getEquipesFromDB(){
    return $this->equipesFromDB;
  }

}

?>