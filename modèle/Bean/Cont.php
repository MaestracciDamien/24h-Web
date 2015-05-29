<?php

class Cont{

	private $id;
	private $evp;
	private $idClient;


	// Constructeur de la classe
	public function __construct($i, $e, $idC){
		$this->id = $i;
		$this->evp = $n;
		$this->idClient = $idC;
	}

	public function getId(){ return $this->id; }
	public function getEvp(){ return $this->evp; }
	public function getIdClient(){ return $this->idClient; }
	
}