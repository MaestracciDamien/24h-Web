<?php


class Charge{

	private $id;
	private $id_escale;
	private $id_cont;
	private $decharge;

	public function __construct($id, $id_escale, $id_cont, $decharge){

		$this->id = $id;
		$this->id_escale = $id_escale;
		$this->id_cont = $id_cont;
		$this->decharge = $decharge;
		
	}

	public function getId(){
		return $this->id;
	}

	public function getIdEscale(){
		return $this->id_escale;
	}
	
	public function getIdCont(){
		return $this->id_cont;
	}

	public function getDecharge(){
		return $this->decharge;
	}

}
?>
