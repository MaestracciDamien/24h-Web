<?php

class ControleurAdd{
 
  private $vue;
 
	public function __construct(){
		$this->vue = new Affichage();
		$this->dao = new DAO();
	}

	public function addComp() {
		if (isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['pays']) && isset($_POST['id_user'])) {
			$dao->addComp($_POST['nom'],$_POST['adresse'],$_POST['pays'],$_POST['id_user']);
		}
	}
}