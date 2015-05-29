<?php

class Users{

	private $id;
	private $login;
	private $mdp;
	private $type;


	// Constructeur de la classe
	public function __construct($i, $l, $m, $t){
		$this->id = $i;
		$this->login = $l;
		$this->mdp = $m;
		$this->type = $t;
	}

	public function getId(){ return $this->id; }
	public function getLogin(){ return $this->login; }
	public function getMdp(){ return $this->mdp; }
	public function getType(){ return $this->type; }
	
}