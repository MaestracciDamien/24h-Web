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
		//	$this->nav->navbar();
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
							  <a href="index.php">Retour</a>
							</form>
						</div>
					<div class="col-md-4 text-center"></div>
				</div>
			</div>
			<?php
		//	include 'includes/footer.php';
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
				$conteneurs = $this->DAO->getContByClient($client->getId());
				echo '<table class="table table-striped table-bordered">';
				echo '<tr><th>ID</th><th>EVP</th></tr>';
				foreach ($conteneurs as $conteneur) {
					echo '<tr><td>'.$conteneur->getId().'</td><td>'.$conteneur->getEVP().'</td></tr>';
				}
				
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
			<div class="container" role="main">
				<h1>Votre interface de gestion Agent</h1>
				<div class="panel-group" id="accordion">
 					<div class="panel panel-default">
    					<div class="panel-heading">
     						<h4 class="panel-title">
       						<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Les utilisateurs</a>
      						</h4>
   						</div>
    					<div id="collapse1" class="panel-collapse collapse">
      					<div class="panel-body">
      						<div class="row">
					<div class="col-md-8">
						<h2>Les utilisateurs : </h2>
						<?php 
						$this->DAO = new DAO();
						$users= $this->DAO->getListeUsers();
						echo '<table class="table table-striped table-bordered">';
						echo '<tr><th>ID</th><th>Login</th><th>Mot de passe</th><th>Type</th></tr>';
						foreach ($users as $user) {
							echo '<tr><td>'.$user->getId().'</td><td>'.$user->getLogin().'</td><td>'.$user->getMdp().'</td><td>'.$user->getType().'</td></tr>';
						}


						?>
						</table>
					</div>
					<div class="col-md-4">						
						<form class="add" method="post" action="index.php">
							<h2>Ajouter un utilisateur</h2>
								<div class="form-group">
									<input type="hidden" name="add_user">
								</div>
							  	<div class="form-group">
							    	<label for="exampleInputEmail1">Login</label>
							    	<input type="text" class="form-control" placeholder="Login" name="pseudo" required>
							  	</div>
							  	<div class="form-group">
							    	<label for="exampleInputEmail1">Mot de passe</label>
							    	<input type="password" class="form-control" placeholder="Mot de passe" name="mdp" required>
							  	</div>
							  	<div class="form-group">
							    	<label for="exampleInputEmail1">Type</label>
							    	<select class="form-control" placeholder="Type" name="type" required>
							    	<option value="1">Compagnie</option>
							    	<option value="2">Client</option>
							    	<option value="3">Agent</option>
							    	</select>
							  	</div>							  
							  <button type="submit" class="btn btn-default">Envoyer</button>
							</form>
					</div>
				</div>
      					</div>
					    </div>
					  </div>
					  <div class="panel panel-default">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
					        Les compagnies</a>
					      </h4>
					    </div>
					    <div id="collapse2" class="panel-collapse collapse">
					      <div class="panel-body">
					      	<div class="row">
					<div class="col-md-8">
					<h2>Les comagnies : </h2>
						<?php 
						$this->DAO = new DAO();
						$compagnies= $this->DAO->getListeComp();
						echo '<table class="table table-striped table-bordered">';
						echo '<tr><th>ID</th><th>NOM</th><th>Adresse</th><th>Pays</th><th>Id User</th></tr>';
						foreach ($compagnies as $compagnie) {
							echo '<tr><td>'.$compagnie->getId().'</td><td>'.$compagnie->getNom().'</td><td>'.$compagnie->getAdresse().'</td><td>'.$compagnie->getPays().'</td><td>'.$compagnie->getIdUser().'</tr>';
						}


						?>
						</table>
					</div>
					<div class="col-md-4">						
						<form class="add" method="post" action="index.php">
							<h2>Ajouter une compagnie</h2>
								<div class="form-group">
									<input type="hidden" name="add_comp">
								</div>
							  	<div class="form-group">
							    	<label for="exampleInputEmail1">Nom</label>
							    	<input type="text" class="form-control" placeholder="Nom" name="nom" required>
							  	</div>
							  	<div class="form-group">
							    	<label for="exampleInputEmail1">Adresse</label>
							    	<input type="text" class="form-control" placeholder="Adresse" name="adresse" required>
							  	</div>
							  	<div class="form-group">
							    	<label for="exampleInputEmail1">Pays</label>
							    	<input type="text" class="form-control" placeholder="Pays" name="pays" required>
							  	</div>
							  	<div class="form-group">
							    	<label for="exampleInputEmail1">ID User</label>
							    	<input type="text" class="form-control" placeholder="ID User" name="id_user" required>
							  	</div>							  						  
							  <button type="submit" class="btn btn-default">Envoyer</button>
							</form>
					</div>
				</div>
				</div>
				</div>
				</div>
				<div class="panel panel-default">
				    <div class="panel-heading">
				    	<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Les navires</a></h4>
					</div>
					<div id="collapse3" class="panel-collapse collapse">
						<div class="panel-body">
					    	<div class="row">
								<div class="col-md-8">
								<h2>Les navires : </h2>
								<?php 
								$this->DAO = new DAO();
								$navires= $this->DAO->getListeNavires();
								echo '<table class="table table-striped table-bordered">';
								echo '<tr><th>ID</th><th>NOM</th><th>EVP</th><th>Id Compagnie</th></tr>';
								foreach ($navires as $navire) {
									echo '<tr><td>'.$navire->getId().'</td><td>'.$navire->getNom().'</td><td>'.$navire->getEVP().'</td><td>'.$navire->getIdComp().'</td></tr>';
								}
								?>
								</table>
							</div>
							<div class="col-md-4">						
								<form class="add" method="post" action="index.php">
									<h2>Ajouter un navire</h2>
									<div class="form-group">
										<input type="hidden" name="add_navire">
									</div>
								  	<div class="form-group">
								    	<label for="exampleInputEmail1">Nom</label>
								    	<input type="text" class="form-control" placeholder="Nom" name="nom" required>
								  	</div>
								  	<div class="form-group">
								    	<label for="exampleInputEmail1">EVP</label>
								    	<input type="text" class="form-control" placeholder="EVP" name="evp" required>
								  	</div>
								  	<div class="form-group">
								    	<label for="exampleInputEmail1">ID Compagnie</label>
								    	<input type="text" class="form-control" placeholder="ID Compagnie" name="id_comp" required>
								  	</div>						  
							  		<button type="submit" class="btn btn-default">Envoyer</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				</div>
				<div class="panel panel-default">
    				<div class="panel-heading">
      					<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Les conteneurs</a></h4>
    				</div>
    				<div id="collapse4" class="panel-collapse collapse">
				    	<div class="panel-body">
				    	<div class="row">
					<div class="col-md-8">
					<h2>Les conteneurs : </h2>
						<?php 
						$this->DAO = new DAO();
						$conteneurs= $this->DAO->getListeCont();
						echo '<table class="table table-striped table-bordered">';
						echo '<tr><th>ID</th><th>EVP</th><th>ID Client</th></tr>';
						foreach ($conteneurs as $cont) {
							echo '<tr><td>'.$cont->getId().'</td><td>'.$cont->getEvp().'</td><td>'.$cont->getIdClient().'</td></tr>';
						}


						?>
						</table>
					</div>
					<div class="col-md-4">						
						<form class="add" method="post" action="index.php">
							<h2>Ajouter un conteneur</h2>
								<div class="form-group">
									<input type="hidden" name="add_cont">
								</div>
							  	<div class="form-group">
							    	<label for="exampleInputEmail1">EVP</label>
							    	<input type="text" class="form-control" placeholder="EVP" name="evp" required>
							  	</div>
							  	<div class="form-group">
							    	<label for="exampleInputEmail1">ID Client</label>
							    	<input type="text" class="form-control" placeholder="ID_Client" name="id_client" required>
							  	</div>					  
							  <button type="submit" class="btn btn-default">Envoyer</button>
							</form>
					</div>
				</div>
				      	</div>
				    </div>
				</div>
				<div class="panel panel-default">
    				<div class="panel-heading">
      					<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Les escales</a></h4>
    				</div>
    				<div id="collapse5" class="panel-collapse collapse">
				    	<div class="panel-body"><div class="row">
					<div class="col-md-8">
					<h2>Les escales : </h2>
						<?php 
						$this->DAO = new DAO();
						$escales= $this->DAO->getListeEscales();
						echo '<table class="table table-striped table-bordered">';
						echo '<tr><th>ID</th><th>Date entrée</th><th>Date Sortie</th><th>Id Navire</th></tr>';
						foreach ($escales as $escale) {
							echo '<tr><td>'.$escale->getId().'</td><td>'.$escale->getDateEntree().'</td><td>'.$escale->getDateSortie().'</td><td>'.$escale->getIdNav().'</td></tr>';
						}


						?>
						</table>
					</div>
					<div class="col-md-4">						
						<form class="add" method="post" action="index.php">
							<h2>Ajouter une escale</h2>
								<div class="form-group">
									<input type="hidden" name="add_escale">
								</div>
							  	<div class="form-group">
							    	<label for="exampleInputEmail1">ID Nav</label>
							    	<input type="text" class="form-control" placeholder="id nav" name="id_nav" required>
							  	</div>
							  	<div class="form-group">
							    	<label for="exampleInputEmail1">Date entrée</label>
							    	<input type="text" class="form-control datepicker" placeholder="Date entrée" name="date_entree" required>
							  	</div>
							  	<div class="form-group">
							    	<label for="exampleInputEmail1">Date Sortie</label>
							    	<input type="text" class="form-control datepicker" placeholder="Date sortie" name="date_sortie" required>
							  	</div>						  
							  <button type="submit" class="btn btn-default">Envoyer</button>
							</form>
					</div>
				</div>
				      	</div>
				    </div>
				</div>
			
		</div>

			</div>	
			<?php
			include 'includes/footer.php';
			include 'includes/script.php';
			include 'includes/foot.php';
		}


		function about()
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
					<h1>A propos</h1>
					<p>Cette application a été créer par l'équipe #WeLeakedGOT (Iut Nantes) dans le cadre des 24h des IUT Informatique du Havre 2015</p>
					<h2>Choix technologiques</h2>
					<p>Nous avons utiliser un modèle MVC, mais nous n'avons pas utiliser de framework (chaque membre de l'équipe maitrisait un framework différent, il y aurait pu avoir rapidement des conflits). Nous avons utlisé bootstrap pour la simplicité de mise en place d'un design sobre élégant et responsiv. Mais nous n'avons pas utilisé de thème déjà existant en téléchagement. Nous avons un index php qui reçoit toutes les requêtes get / post qui les renvoit vers notre routeur qui appelle les constructeurs selon les requêtes qu'il reçoit.</p>
					<p>Nous n'utilions pas (ou presque) de Javascript (sauf pour le choix des dates pour l'uniformisation du format), malgré que nous aurions souhaité l'intégrer, mais le manque de temps nous la empêché.</p>
					<p>Nous avons utilisé un dépot GitHub tout au long de cette épreuve afin de versionné et créé des branches selon la répartition des tâches au sein de l'équipe</p>
					</div>
					<?php
					include 'includes/footer.php';
					include 'includes/script.php';
					include 'includes/foot.php';
			}
		}

		
	}
?>






