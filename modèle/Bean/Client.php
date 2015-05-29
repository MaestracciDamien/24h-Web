<?php

class Client{

	private $id;
	private $nom;

	// Constructeur de la classe
	public function __construct($i, $n){
		$this->id = $i;
		$this->nom = $n;
	}

	public function getId(){ return $this->id; }
	public function getNom(){ return $this->nom; }
	
}