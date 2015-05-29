<?php

class Navire{

	private $id;
	private $evp;
	private $nom;
	private $idComp;


	// Constructeur de la classe
	public function __construct($i, $e, $n, $idC){
		$this->id = $i;
		$this->evp = $e;
		$this->nom = $n;
		$this->idComp = $idC;
	}

	public function getId(){ return $this->id; }
	public function getEvp(){ return $this->evp; }
	public function getNom(){ return $this->nom; }
	public function getIdComp(){ return $this->idComp; }
	
}