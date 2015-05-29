<?php

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
}