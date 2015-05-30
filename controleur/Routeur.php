<?php


set_include_path(get_include_path() . PATH_SEPARATOR . 'vue/');
	require_once "vues/affichage.php";
	require_once "controleur/controleurNavire.php";
	require_once "controleur/ControleurConnexion.php";
	require_once "modele/DAO/DAO.php";


	class Routeur {
		
		private $ctrlCreation;
		private $affichage;
		private $ctrlNavire;
		private $ctrlConnect;


		function __construct()
		{		
			$this->affichage = new affichage();	
			$this->ctrlNavire = new ControleurNavire();
			$this->ctrlConnect = new ControleurConnexion();
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
			}

			elseif (isset($_GET["navire"])) {
				$this->ctrlNavire->afficherNavire($_GET["navire"]);
			}

			elseif (isset($_GET["connect"])) {
				$this->affichage->connect();
			}

			else{
				$this->affichage->index();
			}
		}
	}


?>
