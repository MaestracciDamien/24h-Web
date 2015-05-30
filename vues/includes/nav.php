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
      <ul class="nav navbar-nav">
        <li><a href="index.php">-</a></li>
      </ul>


      <!-- Nav Bar Menu Droite -->


      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
<?php
          if(issset($_SESSION['pseudo'])){

?>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Connexion<span class="caret"></span></a>
          <form action="test.php" method="post" class="dropdown-menu" role="menu">
            <li>Login :</li>
            <li> <input type="text" name="login"></li>
            <li>Mot de passe :</li>
            <li> <input type="text" name="mdp"></li>
            <li> <input type="submit" text="Envoyer"></li>
          </form>
        <?php
      }else{
?>
        <p><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?= $_SESSION['pseudo'] ?></p>
<?php
      }
?>
        </li>
      </ul>
    </div>
  </div>
</nav>
?>
  }
}