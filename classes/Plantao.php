<?php
	private class Plantao
	{
		private $idPlantao;
	    private $horario;
	    private $dia;
	    public function __construct($idPlantao,$horario)
	    {
	    	public function getIdPlantao()
	    	{
	    		return $this->idPlantao;
	    	}
	    	public function setIdPlantao($idPlantao)
	    	{
	    		$this->idPlantao = $idPlantao;
	    	}
	    	public function getHorario()
	    	{
	    		return $this->horario;
	    	}
	    	public function setHorario($horario)
	    	{
	    		$this->horario = $horario;
	    	}
	    	public function getDia()
	    	{
	    		return $this->dia;
	    	}
	    	public function setIdPlantao($dia)
	    	{
	    		$this->dia = $dia;
	    	}
	    }
    }
    
?>  