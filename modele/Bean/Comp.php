<?php

class Comp{

	private $id;
	private $nom;
	private $adresse;
	private $pays;

	// Constructeur de la classe
	public function __construct($i, $n, $a, $p){
		$this->id = $i;
		$this->nom = $n;
		$this->adresse = $a;
		$this->pays = $p;
	}

	public function getId(){ return $this->id; }
	public function getNom(){ return $this->nom; }
	public function getAdresse(){ return $this->adresse; }
	public function getPays(){ return $this->pays; }
	
}