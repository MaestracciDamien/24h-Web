<?php

class ControleurAdd{
 
  private $vue;
 
	public function __construct(){
		$this->vue = new Affichage();
	}

	public function addComp() {
		if (isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['pays']) && isset($_POST['id_user'])) {

		}
	}
}