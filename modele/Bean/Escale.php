<?php

class Escale{

	private $id;
	private $idNav;
	private $dateEntree;
	private $dateSortie;


	// Constructeur de la classe
	public function __construct($i, $n, $dateE, $dateS){
		$this->id = $i;
		$this->idNav = $n;
		$this->dateEntree = $dateE;
		$this->dateSortie = $dateS;
	}

	public function getId(){ return $this->id; }
	public function getIdNav(){ return $this->idNav; }
	public function getDateEntree(){ return $this->dateEntree; }
	public function getDateSortie(){ return $this->dateSortie; }
	
}