<?php


set_include_path(get_include_path() . PATH_SEPARATOR . 'vue/');
	require_once "vues/affichage.php";


	class Routeur {
		
		private $ctrlCreation;
		/*private $ctrlAffichage;*/
		private $affichage;


		function __construct()
		{
			/*$this->ctrlAffichage = new ControleurAffichage();*/			
			$this->affichage = new affichage();	

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

			elseif (isset($_GET["connect"])) {
					$this->affichage->connect();
			}

			else{
				$this->affichage->index();
			}
		}
	}


?>
