<?php

class ControleurAdd{
 
  private $vue;
 
	public function __construct(){
		$this->vue = new Affichage();
		$this->dao = new DAO();
	}

	public function addUser() {
		if (isset($_POST['pseudo']) && isset($_POST['mdp']) && isset($_POST['type'])) {
			$this->dao->addUser($_POST['pseudo'],$_POST['mdp'],$_POST['type']);
		}
	}

	public function addComp() {
		if (isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['pays']) && isset($_POST['id_user'])) {
			$this->dao->addComp($_POST['nom'],$_POST['adresse'],$_POST['pays'],$_POST['id_user']);
		}
	}

	public function addNavire() {
		if (isset($_POST['nom']) && isset($_POST['evp']) && isset($_POST['id_comp'])) {
			$this->dao->addNavire($_POST['nom'],$_POST['evp'],$_POST['id_comp']);
		}
	}

	public function addEscale() {
		if (isset($_POST['id_nav']) && isset($_POST['date_entree']) && isset($_POST['date_sortie'])) {
			$this->dao->addNavire($_POST['id_nav'],$_POST['date_entree'],$_POST['date_sortie']);
		}
	}
}