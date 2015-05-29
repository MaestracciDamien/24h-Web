<?php

class Navire{

	private $id;
	private $evp;
	private $nom;
	private $idComp;


	// Constructeur de la classe
	public function __construct($i, $n, $e, $idC){
		$this->id = $i;
		$this->nom = $n;
		$this->evp = $e;
		$this->idComp = $idC;
	}

	public function getId(){ return $this->id; }
	public function getEvp(){ return $this->evp; }
	public function getNom(){ return $this->nom; }
	public function getIdComp(){ return $this->idComp; }
	
}