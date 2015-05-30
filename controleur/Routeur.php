<?php


set_include_path(get_include_path() . PATH_SEPARATOR . 'vue/');
	require_once "vues/affichage.php";
	require_once "controleur/controleurNavire.php";
	require_once "controleur/ControleurConnexion.php";
	require_once "controleur/ControleurAdd.php";
	require_once "modele/DAO/DAO.php";


	class Routeur {
		
		private $ctrlCreation;
		private $affichage;
		private $ctrlNavire;
		private $ctrlConnect;
		private $ctrlAdd;


		function __construct()
		{
			$this->affichage = new affichage();	
			$this->ctrlNavire = new ControleurNavire();
			$this->ctrlConnect = new ControleurConnexion();
			$this->ctrlAdd = new ControleurAdd();
		}

		public function router()
		{

			if (isset($_GET["insc"])) {

				if (isset($_GET["type"])) {

					if ($_GET["type"] == "comp") {
						$this->affichage->inscription_comp();
					}

					elseif ($_GET["type"] == "client") {
						$this->affichage->inscription_client();
					}

					elseif ($_GET["type"] == "agent") {
						$this->affichage->inscription_agent();
					}

					else {
						$this->affichage->index();
					}
				}

				else {
					$this->affichage->index();
				}					
				
			}

			elseif (isset($_POST["login"]) && isset($_POST["mdp"])) {
				
				$this->ctrlConnect->connexion($_POST["login"], $_POST["mdp"]);
				$this->affichage->index();
				
			}

			elseif (isset($_GET["navire"])) {
				$this->ctrlNavire->afficherNavire($_GET["navire"]);
			}

			elseif (isset($_GET["connect"])) {
				$this->affichage->connect();
			}

			elseif (isset($_GET["deconnect"])) {
				$this->ctrlConnect->deconnexion();
				$this->affichage->index();
			}

			elseif (isset($_POST["add_comp"])) {
				$this->ctrlAdd->addComp();
				$this->affichage->index();
			}

			elseif (isset($_POST["add_user"])) {
				$this->ctrlAdd->addUser();
				$this->affichage->index();
			}

			elseif (isset($_POST["add_navire"])) {
				$this->ctrlAdd->addNavire();
				$this->affichage->index();
			}

			elseif (isset($_POST["add_escale"])) {
				$this->ctrlAdd->addEscale();
				$this->affichage->index();
			}

			else{
				$this->affichage->index();
			}
		}
	}


?>
