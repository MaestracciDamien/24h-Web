<?php

class ControleurCompagnie{
 
  private $vue;
 
	public function __construct(){
		$this->vue = new Affichage();
	}

	public function afficherCompagnies(){
		$dao = new Dao();
		$compagnies = $dao->getCompagnies();
		//$this->vue->??????($compagnies);
	}
}