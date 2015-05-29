<?php

	class affichage
	{
		function index()
		{
			include 'includes/head.php';
			include 'includes/nav.php';
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


		function inscription_comp() {

			include 'includes/head.php';
			include 'includes/nav.php';
			?>
			<div class="main clearfix">
				<h1><i class="fa fa-ship"></i> Inscription d'une compagnie</h1>
				<div class="row">
						<div class="col-md-4 text-center"></div>
						<div class="col-md-4 text-center">
							<form method="post" action="">
								<div class="form-group">
								<input type="hidden" name="inscription" value="1">
								</div>
							  	<div class="form-group">
							    <label for="exampleInputEmail1">Nom compagnie</label>
							    <input type="text" class="form-control" placeholder="Nom" name="compagnie">
							  </div>
							  <div class="form-group">
							    <label for="exampleInputPassword1">Adresse</label>
							    <input type="text" class="form-control" name="adresse" placeholder="Adresse">
							  </div>
							   <div class="form-group">
							    <label for="">Code Pays</label>
							    <input type="text" class="form-control" name="pays" placeholder="Code Pays">						
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
			include 'includes/nav.php';
			?>
			<div class="main clearfix">
				<h1><i class="fa fa-users"></i> Inscription d'un client</h1>
				<div class="row">
						<div class="col-md-4 text-center"></div>
						<div class="col-md-4 text-center">
							<form method="post" action="">
								<div class="form-group">
								<input type="hidden" name="inscription" value="2">
								</div>
							  	<div class="form-group">
							    <label for="exampleInputEmail1">Nom client</label>
							    <input type="text" class="form-control" placeholder="Nom" name="nom">
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
			include 'includes/nav.php';
			?>
			<div class="main clearfix">
				<h1><i class="fa fa-shield"></i>  Inscription d'un agent</h1>
				<div class="row">
						<div class="col-md-4 text-center"></div>
						<div class="col-md-4 text-center">
							<form method="post" action="">
								<div class="form-group">
								<input type="hidden" name="inscription" value="3">
								</div>
							  	<div class="form-group">
							    <label for="exampleInputEmail1">Nom agent</label>
							    <input type="text" class="form-control" placeholder="Nom" name="nom">
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
			include 'includes/nav.php';
			?>
			<div class="main clearfix">
				<div class="row">
						<div class="col-md-4 text-center"></div>
						<div class="col-md-4 text-center">
							<form class="connect" method="post" action="">
								<h1>Connexion</h1>
								<div class="form-group">
									<input type="hidden" name="connect" value="1">
								</div>
							  	<div class="form-group">
							    	<label for="exampleInputEmail1">Login</label>
							    	<input type="text" class="form-control" placeholder="Login" name="login">
							  	</div>
							  	<div class="form-group">
							    	<label for="exampleInputEmail1">Mot de passe</label>
							    	<input type="text" class="form-control" placeholder="Mot de passe" name="mdp">
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

		function genereVueNavire($navire) {

			include 'includes/head.php';
			include 'includes/nav.php';
			?>
			<div class="main clearfix">
				<div class="row">
					<div class="col-md-4 text-center"></div>
					<div class="col-md-4 text-center">
						<ul>
							<li>Compagnie : <?php echo ($navire->getIdComp()); ?></li>
							<li>Nom navire : <?php echo ($navire->getNom()); ?></li>
							<li>EVP Navire : <?php echo ($navire->getEVP()); ?></li>							
						</ul>
						

					</div>
					<div class="col-md-4 text-center"></div>
				</div>
			</div>
			<?php
			include 'includes/footer.php';
			include 'includes/script.php';
			include 'includes/foot.php';
		}
		
	}
?>






