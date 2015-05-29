<?php
require_once "ConnexionException.php";
require_once "TableAccesException.php";
require_once  __DIR__."/../Bean/Charge.php";


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
			$this->connexion = new PDO('mysql:host=maximebeatb1.mysql.db;dbname=maximebeatb1','maximebeatb1','Maxneo2012', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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
			$michel = $this->connexion->prepare('INSERT INTO Charge (id, id_escale, id_cont, decharge) VALUES (?, ?, ?, ?)');
			$michel->execute(array($id, $id_escale, $id_cont, $decharge));
		}catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnection;
	}	

	public function deleteCharge($id){

		try{
			$this->connexion();
		}catch (ConnexionException $e){
			print($e->afficher());
		}
		try{
			$delete = $this->connexion->prepare('DELETE FROM Charge Where id= ?');
		$delete->execute(array($id));
		}catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnexion();
	}

	public function getCharge($id){
		$res = null;
		try{
			$this->connexion();
		}catch (ConnexionException $e){
			print($e->afficher());
		}
		try{
			$charge = $this->connexion->prepare('SELECT * FROM Charge WHERE id = ?');
			$charge->execute(array($id));
			if($tabCharge = $charge->fetch()){
				$res = new Charge(
						$tabCharge['id'],
						$tabCharge['id_escale'],
						$tabCharge['id_cont'],
						$tabCharge['decharge']
				};
		}
		}catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnexion();
		return $res;

	}

	public function getAllCharge($id){
		$res = array();
		try{
			$this->connexion();
		}catch (ConnexionException $e){
			print($e->afficher());
		}
		try{
			$charge = $this->connexion->prepare('SELECT * FROM Charge WHERE id = ?');
			$charge->execute(array($id));
			while($tabCharge = $charge->fetch()){
				$objet = new Charge(
						$tabCharge['id'],
						$tabCharge['id_escale'],
						$tabCharge['id_cont'],
						$tabCharge['decharge']
				};
				array_push($res,$objet);
		}
		}catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnexion();
		return $res;
	}


	public function addClient($id, $nom){
		try{
			$this->connexion();
		}catch (ConnexionException $e){
			print($e->afficher());
		}
		try{
			$michel = $this->connexion->prepare('INSERT INTO Client (id, nom) VALUES (?, ?)');
			$michel->execute(array($id, $nom));
		}catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnection;
	}	

	public function deleteClient($id){

		try{
			$this->connexion();
		}catch (ConnexionException $e){
			print($e->afficher());
		}
		try{
			$delete = $this->connexion->prepare('DELETE FROM Client Where id= ?');
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
			$c = $this->connexion->prepare('SELECT * FROM Client WHERE id = ?');
			$c->execute(array($id));
			if($tabC = $c->fetch()){
				$res = new Client(
						$tabC['id'],
						$tabC['nom']
				};
		}
		}catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnexion();
		return $res;

	}

	public function getAllClient($id){
		$res = array();
		try{
			$this->connexion();
		}catch (ConnexionException $e){
			print($e->afficher());
		}
		try{
			$c = $this->connexion->prepare('SELECT * FROM Client WHERE id = ?');
			$c->execute(array($id));
			while($tabC = $c->fetch()){
				$objet = new Client(
						$tabCharge['id'],
						$tabCharge['nom']
				};
				array_push($res,$objet);
		}
		}catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnexion();
		return $res;
	}
}
