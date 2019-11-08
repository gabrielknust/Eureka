<?php
	private class Cargo
	{
		private $idCargo;
	    private $nome;
	    public function __construct($idCargo,$nome)
	    {
	    	public function getIdCargo()
	    	{
	    		return $this->idCargo;
	    	}
	    	public function setIdCargo($idCargo)
	    	{
	    		$this->idCargo = $idCargo;
	    	}
	    	public function getNome()
	    	{
	    		return $this->nome;
	    	}
	    	public function setNome($nome)
	    	{
	    		$this->nome = $nome;
	    	}
	    }
    }
    
?>  