<?php
require_once __DIR__."/../vues/affichage.php";

class ControleurCompagnie{
 
  private $vue;
 
	public function __construct(){
		$this->vue = new Affichage();
	}

	public function infoAjout($quantite, $isbn){
		$this->vue->genereVueAjout($quantite, $isbn);
		$dao=new Dao();
		$livre=$dao->getLivre($isbn);
		$_SESSION['panier']->ajouterArticle($livre, $quantite);
	}

	public function afficherPanier(){
		$this->vue->genereVuePanier();
	}
}