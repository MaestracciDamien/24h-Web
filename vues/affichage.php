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
				<h2>Première venue sur notre outil ? Inscrivez-vous !</h2>
				<h3>Je suis :</h3>
				<div class="row">
					<div class="col-md-4 text-center">
						<a href="?type=inscription"><i class="fa fa-ship fa-4x"></i>
						<h3>Compagnie</h3></a>
					</div>
					<div class="col-md-4 text-center">
						<a href="?type=inscription"><i class="fa fa-users fa-4x"></i>
						<h3>Clients</h3></a>
					</div>
					<div class="col-md-4 text-center">
						<a href="?type=inscription"><i class="fa fa-shield fa-4x"></i>
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
?>






