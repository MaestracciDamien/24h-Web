<?php
require_once "ConnexionException.php";
require_once "TableAccesException.php";
require_once  __DIR__."/../bean/Comp.php";

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

}