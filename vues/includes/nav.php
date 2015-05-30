<?php
class Nav{

  public function navbar(){
?>
  <nav class="navbar navbar-default navbartop">
			<div class="container">

  			<div class="navbar-header">
  			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
		      </button>
    			<a class="navbar-brand" href="index.php">Gestion portuaire - 24h IUT Nantes</a>
 				</div>

    <!-- Collapse Nav Bar -->

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      


      <!-- Nav Bar Menu Droite -->


      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
<?php
          if(!isset($_SESSION['pseudo'])){

?>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Connexion<span class="caret"></span></a>
          <form action="index.php" method="post" class="dropdown-menu" role="menu">
            <li>Login :</li>
            <li> <input type="text" name="login" required></li>
            <li>Mot de passe :</li>
            <li> <input type="password" name="mdp" required></li>
            <li> <input type="submit" text="Envoyer"></li>
            <li role="presentation" class="divider"></li>
            <li><a href="?about">A propos</a>
          </form>
<?php
      }else{
?>
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= $_SESSION['pseudo'] ?><span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
        <li><a href="?deconnect">Se déconnecter</a></li>
        <li role="presentation" class="divider"></li>
        <li><a href="?about">A propos</a></li>
        </ul>
<?php
      }
?>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php
  }
}