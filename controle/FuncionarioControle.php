<?php 
	require_once '../classes/Funcionario.php';
	require_once '../dao/FuncionarioDAO.php';
	require_once '../classes/Cargo.php';
	function nascimento($nascimento)
	   {
	       $nascimento=explode("/", $nascimento);
	        return $string=$nascimento[2].'/'.$nascimento[1].'/'.$nascimento[0];
	    }
	extract($_REQUEST);
	class FuncionarioControle
	{
		
		public function incluir()
		{
		extract($_REQUEST);
		$funcionario=new Funcionario();
		$funcionario->setNome($nome);
		$funcionario->setMatricula($matricula);
		$funcionario->setCpf($cpf);
		$funcionario->setDataNasc(nascimento($data));
		$funcionario->setEmail($email);
		$funcionario->setSenha(hash('sha256', $cpf));
		$funcionario->setIdCargo($cargo);
			$funcionarioDAO= new FuncionarioDAO();
			try {
			$funcionarioDAO->incluir($funcionario);
			header("Location:../html/usuario.php");			
			} catch (PDOException $e) {
				
			}
		}
	}
?>