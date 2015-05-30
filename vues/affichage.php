<?php
require_once 'includes/nav.php';

	class affichage
	{
		private $nav;

		function __construct()
		{		
			$this->nav = new Nav();
		}

		function index()
		{
			if(isset($_SESSION["pseudo"])) {
					
				if($_SESSION["type"] == 1) {
					$this->index_comp();
				}
				elseif($_SESSION["type"] == 2) {
					$this->index_client();
				}
				elseif($_SESSION["type"] == 3) {
					$this->index_agent();
				}	
			}				

			else {

				include 'includes/head.php';
				$this->nav->navbar();
				?>
				<div class="main clearfix">
					<h1>Outil de gestion portuaire du Havre</h1>
					<h2>Epreuve 2 - 24h IUT Nantes</h2>
					<p>Bienvenue sur l'outil de gestion portuaire du Havre. Vous y trouverez votre accès client vous permettant de gérer vos navires et conteneurs.</p>
					<h2>Première venue sur notre outil ? Connectez-vous !</h2>
					<h3>Je suis :</h3>
					<div class="row">
						<div class="col-md-4 text-center">
							<a href="?connect"><i class="fa fa-ship fa-4x"></i>
							<h3>Compagnie</h3></a>
						</div>
						<div class="col-md-4 text-center">
							<a href="?connect"><i class="fa fa-users fa-4x"></i>
							<h3>Clients</h3></a>
						</div>
						<div class="col-md-4 text-center">
							<a href="?connect"><i class="fa fa-shield fa-4x"></i>
							<h3>Agent portuaire</h3></a>
							</div>
						</div>
					</div>
					<?php
					include 'includes/footer.php';
					include 'includes/script.php';
					include 'includes/foot.php';
			}
		}


		function inscription_comp() {

			include 'includes/head.php';
			$this->nav->navbar();
			?>
			<div class="main clearfix">
				<h1><i class="fa fa-ship"></i> Inscription d'une compagnie</h1>
				<div class="row">
						<div class="col-md-4 text-center"></div>
						<div class="col-md-4 text-center">
							<form method="post" action="index.php">
								<div class="form-group">
								<input type="hidden" name="inscription" value="1">
								</div>
							  	<div class="form-group">
							    <label for="exampleInputEmail1">Nom compagnie</label>
							    <input type="text" class="form-control" placeholder="Nom" name="compagnie" required>
							  </div>
							  <div class="form-group">
							    <label for="exampleInputPassword1">Adresse</label>
							    <input type="text" class="form-control" name="adresse" placeholder="Adresse" required>
							  </div>
							   <div class="form-group">
							    <label for="">Code Pays</label>
							    <input type="text" class="form-control" name="pays" placeholder="Code Pays" required>						
							  </div>							  
							  <button type="submit" class="btn btn-default">Envoyer</button>
							</form>
						</div>
					<div class="col-md-4 text-center"></div>
				</div>
			</div>
			<?php
			include 'includes/footer.php';
			include 'includes/script.php';
			include 'includes/foot.php';
		}

		function inscription_client() {

			include 'includes/head.php';
			$this->nav->navbar();
			?>
			<div class="main clearfix">
				<h1><i class="fa fa-users"></i> Inscription d'un client</h1>
				<div class="row">
						<div class="col-md-4 text-center"></div>
						<div class="col-md-4 text-center">
							<form method="post" action="index.php">
								<div class="form-group">
								<input type="hidden" name="inscription" value="2">
								</div>
							  	<div class="form-group">
							    <label for="exampleInputEmail1">Nom client</label>
							    <input type="text" class="form-control" placeholder="Nom" name="nom" required>
							  </div>					  
							  <button type="submit" class="btn btn-default">Envoyer</button>
							</form>
						</div>
					<div class="col-md-4 text-center"></div>
				</div>
			</div>
			<?php
			include 'includes/footer.php';
			include 'includes/script.php';
			include 'includes/foot.php';
		}

		function inscription_agent() {

			include 'includes/head.php';
			$this->nav->navbar();
			?>
			<div class="main clearfix">
				<h1><i class="fa fa-shield"></i>  Inscription d'un agent</h1>
				<div class="row">
						<div class="col-md-4 text-center"></div>
						<div class="col-md-4 text-center">
							<form method="post" action="index.php">
								<div class="form-group">
								<input type="hidden" name="inscription" value="3">
								</div>
							  	<div class="form-group">
							    <label for="exampleInputEmail1">Nom agent</label>
							    <input type="text" class="form-control" placeholder="Nom" name="nom" required>
							  </div>					  
							  <button type="submit" class="btn btn-default">Envoyer</button>
							</form>
						</div>
					<div class="col-md-4 text-center"></div>
				</div>
			</div>
			<?php
			include 'includes/footer.php';
			include 'includes/script.php';
			include 'includes/foot.php';
		}


		function connect() {

			include 'includes/head.php';
			$this->nav->navbar();
			?>
			<div class="main clearfix">
				<div class="row">
						<div class="col-md-4 text-center"></div>
						<div class="col-md-4 text-center">
							<form class="connect" method="post" action="index.php">
								<h1>Connexion</h1>
								<div class="form-group">
									<input type="hidden" name="connect" value="1">
								</div>
							  	<div class="form-group">
							    	<label for="exampleInputEmail1">Login</label>
							    	<input type="text" class="form-control" placeholder="Login" name="login" required>
							  	</div>
							  	<div class="form-group">
							    	<label for="exampleInputEmail1">Mot de passe</label>
							    	<input type="password" class="form-control" placeholder="Mot de passe" name="mdp" required>
							  	</div>						  
							  <button type="submit" class="btn btn-default">Envoyer</button>
							</form>
						</div>
					<div class="col-md-4 text-center"></div>
				</div>
			</div>
			<?php
			include 'includes/footer.php';
			include 'includes/script.php';
			include 'includes/foot.php';
		}

		function genereVueNavire($navire,$escales) {
			$this->DAO = new DAO();
			include 'includes/head.php';
			$this->nav->navbar();
			?>
			<div class="main clearfix">
				<div class="row">
					
						<div class="panel panel-primary">
							<div class="panel-heading"><h4>Nom navire : </h4> <it> <?php echo ($navire->getNom()); ?></it></div>
	  						<div class="panel-body">
	  							<ul>
		    						<li>Compagnie : <?php echo ($navire->getIdComp()); ?></li>
									<li>EVP Navire : <?php echo ($navire->getEVP()); ?></li>
							</ul>
  </div></div>
					</div>
					<ul class="list-group">
					<?php
						foreach ($escales as $escale) {
							$EVP = $this->DAO->getTotalChargesByEscale($escale->getId());
							echo "<li class='list-group-item'>L'escale numéro:".$escale->getID()." a commencé le ".$escale->getDateEntree()." et fini le ".$escale->getDateSortie()." / EVP Chargés : ".$EVP[0]." EVP Déchargés : ".$EVP[1]."</li>";
						}
					?>
					</ul>
					
				
			</div>
			<?php
			include 'includes/footer.php';
			include 'includes/script.php';
			include 'includes/foot.php';
		}

		function index_comp()
		{
			include 'includes/head.php';
			$this->nav->navbar();
			?>
			<div class="main clearfix">
				<h1>Votre interface de gestion Compagnie</h1> 
				<?php
				$this->DAO = new DAO();
				$compagnie = $this->DAO->getCompByUserId($_SESSION["id"]);
				$navires = $this->DAO->getListeNaviresCompagnie($compagnie->getId());
				echo '<h3>Votre compagnie : '.$compagnie->getNom().'</h3>';
				echo '<h4>Vos navires :</h4>';
				echo '<table class="table table-striped table-bordered">';
				echo '<tr><th>ID</th><th>Nom</th><th>EVP</th></tr>';
				foreach ($navires as $navire) {
					echo '<tr><td>'.$navire->getId().'</td><td><a href="?navire='.$navire->getId().'">'.$navire->getNom().'</a></td><td>'.$navire->getEVP().'</td></tr>';
				}
				echo '</table>';
				?>
				
			</div>
			<?php
			include 'includes/footer.php';
			include 'includes/script.php';
			include 'includes/foot.php';
		}

		function index_client()
		{
			include 'includes/head.php';
			$this->nav->navbar();
			?>
			<div class="main clearfix">
				<h1>Votre interface de gestion Client</h1>
				<?php
				$this->DAO = new DAO();
				$client = $this->DAO->getClientByUserId($_SESSION["id"]);
				echo '<h3>Vous êtes :  : '.$client->getNom().'</h3>';
				echo '<h4>Vos conteneurs :</h4>';
				
				?>
				
			</div>
			<?php
			include 'includes/footer.php';
			include 'includes/script.php';
			include 'includes/foot.php';
		}

		function index_agent()
		{
			include 'includes/head.php';
			$this->nav->navbar();
			?>
			<div class="main clearfix">
				<h1>Votre interface de gestion Agent</h1>
				
			</div>
			<?php
			include 'includes/footer.php';
			include 'includes/script.php';
			include 'includes/foot.php';
		}
		
	}
?>






