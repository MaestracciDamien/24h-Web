<?php
class ControleurNavire{
 
  private $modele;
  private $vue;
 
	public function __construct(){
		$this->modele = new Dao();
		$this->vue = new affichage();
	}

	public function afficherNavire($id){
		$this->vue->genereVueNavire($this->modele->getNavire($id));
	}

}
?>