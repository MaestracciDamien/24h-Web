<?php

class ControleurConnexion{
 
  private $vue;
 
	public function __construct(){
		$this->vue = new Affichage();
	}

	public function connexion($id, $mdp){
		$dao = new Dao();
		$connecte = $dao->getClient();
	}
}