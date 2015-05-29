<?php
require_once "ConnexionException.php";
require_once "TableAccesException.php";
require_once  __DIR__."/../bean/Comp.php";
require_once  __DIR__."/../bean/Navire.php";
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
						$tabComp['PAYS']
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
	public function addComp($nom, $adresse, $pays){
		try{
			$this->connexion();
		}catch (ConnexionException $e){
			print($e->afficher());
		}
		try{
			$add = $this->connexion->prepare('INSERT INTO 24H_COMP (nom, adresse, pays) 
				VALUES (?, ?, ?)');
	    	$add->execute(array($nom, $adresse, $pays));   	
		}catch (TableAccesException $e){
			print($e->afficher());
		}
		$this->deconnexion();
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
	    	if($ = $navire->fetch()){
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

}