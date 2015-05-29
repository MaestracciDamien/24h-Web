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

					if ($_GET["type"] == 1) {
						$this->affichage->inscription_comp();
					}

					elseif ($_GET["type"] == 2) {
						$this->affichage->inscription_client();
					}

					elseif ($_GET["type"] == 3) {
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

			else{
				$this->affichage->index();
			}

		}
	}


?>
