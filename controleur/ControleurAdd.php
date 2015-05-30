<?php

class ControleurAdd{
 
  private $vue;
 
	public function __construct(){
		$this->vue = new Affichage();
		$this->dao = new DAO();
	}

	public function addUser() {
		if (isset($_POST['login']) && isset($_POST['mdp']) && isset($_POST['type'])) {
			$this->dao->addUser($_POST['login'],$_POST['mdp'],$_POST['type']);
		}
	}

	public function addComp() {
		if (isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['pays']) && isset($_POST['id_user'])) {
			$this->dao->addComp($_POST['nom'],$_POST['adresse'],$_POST['pays'],$_POST['id_user']);
		}
	}
}