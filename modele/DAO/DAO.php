<?php
require_once "ConnexionException.php";
require_once "TableAccesException.php";
require_once  __DIR__."/../Bean/Comp.php";
require_once  __DIR__."/../Bean/Escale.php";
require_once  __DIR__."/../Bean/Navire.php";
require_once  __DIR__."/../Bean/Charge.php";
require_once  __DIR__."/../Bean/Users.php";
require_once  __DIR__."/../Bean/Client.php";
require_once  __DIR__."/../Bean/Cont.php";

class Dao
{  
  
  	private $connexion;

	//constructeur
	public function __construct(){
	  	$this->connexion();
	}

	// méthode qui permet de se connecter à la base
	// une exception ConnectionException est levée s'il y a un problème de connexion à la base
	public function connexion(){ 
	  	try{

			$this->connexion = new PDO('mysql:host=localhost;dbname=24H','root','toor', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			$this->connexion->exec("SET CHARACTER SET utf8");
		}catch (ConnexionException $e){
			print($e->afficher());
		}
	}

	// méthode qui permet de se déconnecter de la base
	public function deconnexion(){
	  	$this->connexion = null;
	}

	public function addCharge($id, $id_escale, $id_cont, $decharge){
		try{
			$this->connexion();
		}catch (ConnexionException $e){
			print($e->afficher());
		}
		try{
			$michel = $this->connexion->prepare('INSERT INTO 24H_CHARGE (id, id_escale, id_cont, decharge) VALUES (?, ?, ?, ?)');
			$michel->execute(array($id, $id_escale, $id_cont, $decharge));
		}catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnection;
	}	

	public function getCharge($id){
		$res = null;
		try{
			$this->connexion();
		}catch (ConnexionException $e){
			print($e->afficher());
		}
		try{
			$charge = $this->connexion->prepare('SELECT * FROM 24H_CHARGE WHERE id = ?');
			$charge->execute(array($id));
			if($tabCharge = $charge->fetch()){
				$res = new Charge(
						$tabCharge['id'],
						$tabCharge['id_escale'],
						$tabCharge['id_cont'],
						$tabCharge['decharge']);
				}
		
		}

		catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnexion();
		return $res;
	}


	public function addNavire($id,$nom,$evp,$id_comp){
		try{
			$this->connexion();
		}catch (ConnexionException $e){
			print($e->afficher());
		}
		try{
			$add = $this->connexion->prepare('INSERT INTO 24H_NAVIRE (ID, EVP, NOM, ID_COMP) VALUES (?, ?, ?, ?)');
	    	$add->execute(array($id,$evp,$nom,$id_comp));   	
		}catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnexion();
	}

	public function getEscales($idNavire){ 
		$res = array(); 
		try{ 
			$this->connexion(); 
		}catch (ConnexionException $e)
		{ 
			print($e->afficher()); 
		} 
		try{ 
			$escales = $this->connexion->prepare('SELECT * FROM 24H_ESCALE where ID_NAV = ?'); 
			$escales->execute(array($idNavire)); 
			while ($donnees = $escales->fetch()) 
			{ 
				array_push($res, new Escale( $donnees['ID'], $donnees['ID_NAV'], $donnees['DATE_ENTREE'], $donnees['DATE_SORTIE'] )); 
			} 
		}catch (TableAccesException $e){ 
			print($e->afficher()); 
		} 
		$this->deconnexion();
		return $res; 
	}


	public function getComp($id){
		$res = array();
		try{
			$this->connexion();
		}catch (ConnexionException $e){
			print($e->afficher());
		}
		try{
		  	$comp = $this->connexion->prepare('SELECT * FROM 24H_COMP WHERE id = ?');
	    	$comp->execute(array($id));	    	
	    	if($tabComp = $comp->fetch()){
	    		array_push($res, new Comp(
	    				$tabComp['ID'], 
						$tabComp['NOM'], 
						$tabComp['ADRESSE'], 
						$tabComp['PAYS'],
						$tabComp['ID_USER']
					));
	    	}			
		}catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnexion();
		return $res;
	}

	public function deleteComp($id){
			try{
				$this->connexion();
			}catch (ConnexionException $e){
				print($e->afficher());
			}
			try{
				$delete = $this->connexion->prepare('DELETE FROM 24H_COMP WHERE id = ?');
		    	$delete->execute(array($id));   	
			}catch (TableAccesException $e){
				print($e->afficher());
			}
			$this->deconnexion();
		}
	


	public function addComp($nom, $adresse, $pays, $idUser){
		try{
			$this->connexion();
		}catch (ConnexionException $e){
			print($e->afficher());
		}
		try{
			$add = $this->connexion->prepare('INSERT INTO 24H_COMP (NOM, ADRESSE, PAYS, ID_USER) 
				VALUES (?, ?, ?,?)');
	    	$add->execute(array($nom, $adresse, $pays, $idUser));   	
		}catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnexion();
		return $res;
	}


	
	public function getListeComp() {
		$res = array();
		try{
			$this->connexion();
		} catch(ConnexionException $e) {
			print($e->afficher());
		}
		try {
			$comps = $this->connexion->query('SELECT * FROM 24H_COMP');
			while($donnees = $comps->fetch()) {
				$res[] = new Comp(
	    				$donnees['ID'], 
						$donnees['NOM'], 
						$donnees['ADRESSE'], 
						$donnees['PAYS'],
						$donnees['ID_USER']
					);
			}
		} catch (TableAccesException $e) {
			print($e->afficher());
		}
		$this->deconnexion();
		return $res;
	}

	public function getListeNavires(){
		$res = array();
		try{
			$this->connexion();
		}catch (ConnexionException $e){
			print($e->afficher());
		}
		try{
		  	$navires = $this->connexion->query('SELECT * FROM 24H_NAVIRE');
			while ($donnees = $navires->fetch())
			{
				array_push($res, new Navire(
						$donnees['ID'], 
						$donnees['NOM'], 
						$donnees['EVP'], 
						$donnees['ID_COMP'] 
					));
			}
		}catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnexion();
		return $res;
	}

	public function getNavire($id){
		$res = null;
		try{
			$this->connexion();
		}catch (ConnexionException $e){
			print($e->afficher());
		}
		try{
		  	$navire = $this->connexion->prepare('SELECT * FROM 24H_NAVIRE WHERE ID = ?');
	    	$navire->execute(array($id));	    	
	    	if($donnees = $navire->fetch()){
	    		$res = new Navire(
						$donnees['ID'], 
						$donnees['NOM'], 
						$donnees['EVP'], 
						$donnees['ID_COMP'] 
					);
	    	}
		}catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnexion();
		return $res;
	}

	public function getListeNaviresCompagnie($id_comp){
		$res = array();
		try{
			$this->connexion();
		}catch (ConnexionException $e){
			print($e->afficher());
		}
		try{
		  	$navires = $this->connexion->prepare('SELECT * FROM 24H_NAVIRE where ID_COMP = ?');
		  	$navires->execute(array($id_comp));
			while ($donnees = $navires->fetch())
			{
				array_push($res, new Navire(
						$donnees['ID'], 
						$donnees['NOM'], 
						$donnees['EVP'], 
						$donnees['ID_COMP'] 
					));
			}
		}catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnexion();
		return $res;
	}

	
	public function addClient($id,$nom){
		try{
			$this->connexion();
		}catch (ConnexionException $e){
			print($e->afficher());
		}
		try{
			$add = $this->connexion->prepare('INSERT INTO 24H_CLIENT (ID, NOM) VALUES (?, ?)');
	    	$add->execute(array($id,$nom));   	
		}catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnexion();
	}

	public function addUser($l, $m, $t){
		try{
			$this->connexion();
		}catch (ConnexionException $e){
			print($e->afficher());
		}
		try{
			$add = $this->connexion->prepare('INSERT INTO 24H_USERS (LOGIN, MDP, TYPE) VALUES (?, ?, ?)');
	    	$add->execute(array($l,$m,$t));   	
		}catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnexion();
	}

	
	public function deleteClient($id, $nom){
			try{
				$this->connexion();
			}catch (ConnexionException $e){
				print($e->afficher());
			}
			try{
				$delete = $this->connexion->prepare('DELETE FROM 24H_CLIENT WHERE id = ?');
		    	$delete->execute(array($id));   	
			}catch (TableAccesException $e){
				print($e->afficher());
			}
			$this->deconnexion();
		}
	

	public function deleteUser($id){
			try{
				$this->connexion();
			}catch (ConnexionException $e){
				print($e->afficher());
			}
			try{
				$delete = $this->connexion->prepare('DELETE FROM 24H_USERS WHERE id = ?');
		    	$delete->execute(array($id));   	
			}catch (TableAccesException $e){
				print($e->afficher());
			}
			$this->deconnexion();
		}
	

	public function getClient($id){
		$res = null;
		try{
			$this->connexion();
		}catch (ConnexionException $e){
			print($e->afficher());
		}
		try{
		  	$navire = $this->connexion->prepare('SELECT * FROM 24H_CLIENT WHERE ID = ?');
	    	$navire->execute(array($id));	    	
	    	if($donnees = $navire->fetch()){
	    		$res = new Client(
						$donnees['ID'], 
						$donnees['NOM']
					);
	    	}
		}catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnexion();
		return $res;
	}

	public function getUser($id){
		$res = null;
		try{
			$this->connexion();
		}catch (ConnexionException $e){
			print($e->afficher());
		}
		try{
		  	$navire = $this->connexion->prepare('SELECT * FROM 24H_USERS WHERE ID = ?');
	    	$navire->execute(array($id));	    	
	    	if($donnees = $navire->fetch()){
	    		$res = new User(
						$donnees['ID'], 
						$donnees['LOGIN'], 
						$donnees['MDP'], 
						$donnees['TYPE'] 
					);
	    	}
		}catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnexion();
		return $res;
	}

	public function getUserByPseudo($pseudo){
		$res = null;
		try{
			$this->connexion();
		} catch (ConnexionException $e) {
			print($e->afficher());
		}
		try {
			$user = $this->connexion->prepare('SELECT * FROM 24H_USERS WHERE LOGIN = :pseudo');
			$user->execute(array('pseudo' => $pseudo));
			if ($donnees = $user->fetch()) {
				$res = new Users(
						$donnees['ID'], 
						$donnees['LOGIN'], 
						$donnees['MDP'], 
						$donnees['TYPE'] 
					);
			}
		} catch (TableAccesException $e) {
			print($e->afficher());
		}
		$this->deconnexion();
		return $res;
	}


	public function getListeClient($id){
		$res = array();
		try{
			$this->connexion();
		}catch (ConnexionException $e){
			print($e->afficher());
		}
		try{
		  	$navires = $this->connexion->prepare('SELECT * FROM 24H_CLIENT where ID = ?');
		  	$navires->execute(array($id));
			while ($donnees = $navires->fetch())
			{
				array_push($res, new Client(
						$donnees['ID'], 
						$donnees['NOM']
					));
			}
		}catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnexion();
		return $res;
	}

	public function getListeUser($id){
		$res = array();
		try{
			$this->connexion();
		}catch (ConnexionException $e){
			print($e->afficher());
		}
		try{
		  	$navires = $this->connexion->prepare('SELECT * FROM 24H_USER where ID = ?');
		  	$navires->execute(array($id));
			while ($donnees = $navires->fetch())
			{
				array_push($res, new Navire(
						$donnees['ID'], 
						$donnees['LOGIN'], 
						$donnees['MDP'], 
						$donnees['TYPE'] 
					));
			}
		}catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnexion();
		return $res;
	}

	public function getListeUsers() {
		$res = [];
		try {
			$this->connexion();
		} catch(ConnexionException $e) {
			print($e->afficher());
		}

		try {
			$users = $this->connexion->query('SELECT * FROM 24H_USERS');
			while($donnees = $users->fetch()) {
				$res[] = new Users(
					$donnees['ID'],
					$donnees['LOGIN'],
					$donnees['MDP'],
					$donnees['TYPE']);
			}
		}catch(TableAccesException $e) {
			print($e->afficher());
		}
		$this->deconnexion();
		return $res;
	}


	public function getCompByUserId($id){
		$res = null;
		try{
			$this->connexion();
		}catch (ConnexionException $e){
			print($e->afficher());
		}
		try {
		  	$comp = $this->connexion->prepare('SELECT * FROM 24H_COMP WHERE ID_USER = ?');
	    	$comp->execute(array($id));	    	
	    	if($tabComp = $comp->fetch()){
	    		$res = new Comp(
	    				$tabComp['ID'], 
						$tabComp['NOM'], 
						$tabComp['ADRESSE'], 
						$tabComp['PAYS'],
						$tabComp['ID_USER']
					);
	    	}			
		}catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnexion();
		return $res;
	}

	public function getClientByUserId($id){
		$res = null;
		try{
			$this->connexion();
		}catch (ConnexionException $e){
			print($e->afficher());
		}
		try {
		  	$navire = $this->connexion->prepare('SELECT * FROM 24H_CLIENT WHERE ID_USER = ?');
	    	$navire->execute(array($id));	    	
	    	if($donnees = $navire->fetch()){
	    		$res = new Client(
						$donnees['ID'], 
						$donnees['NOM']
					);
	    	}	
		}catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnexion();
		return $res;
	}

	public function getContByClient($id) {
		$res = array();
		try{
			$this->connexion();
		}catch (ConnexionException $e){
			print($e->afficher());
		}
		try {
		  	$navire = $this->connexion->prepare('SELECT * FROM 24H_CONT WHERE ID_CLIENT = ?');
	    	$navire->execute(array($id));	    	
	    	while ($donnees = $navire->fetch()){
	    		$res[] = new Cont(
						$donnees['ID'], 
						$donnees['EVP'],
						$donnees['ID_CLIENT']
					);
	    	}	
		}catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnexion();
		return $res;
	}


	function getTotalChargesByEscale($escaleId) {
		$res = [0,0];
		try {
			$this->connexion();
		}catch(ConnexionException $e) {
			print($e->afficher());
		}
		try {
			$req = $this->connexion->prepare('SELECT SUM(c.EVP) as s FROM 24H_CHARGE a, 24H_CONT c WHERE a.DECHARGE = 0 AND a.ID_ESCALE = :id_escale AND a.ID_CONT = c.ID');
			$req->execute(array('id_escale' => $escaleId));

			if($data = $req->fetch()) {
				$res[0] = $data['s'];
			}

			$req = $this->connexion->prepare('SELECT SUM(c.EVP) as s FROM 24H_CHARGE a, 24H_CONT c WHERE a.DECHARGE = 1 AND a.ID_ESCALE = :id_escale AND a.ID_CONT = c.ID');
			$req->execute(array('id_escale' => $escaleId));

			if($data = $req->fetch()) {
				$res[1] = $data['s'];
			}
		} catch(TableAccesException $e) {
			print($e->afficher());
		}
		$this->deconnexion();
		return $res;
	}
}
