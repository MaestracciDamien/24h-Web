<?php

class ControleurConnexion{
 
  private $vue;
 
	public function __construct(){
		$this->vue = new Affichage();
	}

	public function connexion($pseudo, $mdp){
		$dao = new Dao();
		$user = $dao->getUserByPseudo($pseudo);
		if ($user->getMdp() == $mdp) {
			$_SESSION['pseudo'] = $pseudo;
			$_SESSION['id'] = $user->getId();
			$_SESSION['type'] = $user->getType();
		}
	}
}