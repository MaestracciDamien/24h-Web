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
			if (isset($_GET["ajout"])) {
		
			}

			elseif (isset($_POST["create"])) {				

			}
			elseif(isset($_POST['affichage'])) {
				
			}

			elseif (isset($_GET["recherche"])) {
				
			}
			elseif (isset($_GET["equipe"])) {
				
			}
			elseif (isset($_GET["projet"])) {
				
			}
			elseif (isset($_GET["contact"])) {
				
			}

			else{
				$this->affichage->index();
			}

		}
	}


?>
