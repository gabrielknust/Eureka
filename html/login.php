<?php
	require_once '../dao/Conexao.php';
	date_default_timezone_set("America/Argentina/Salta");
	$time=7 * 60 * 60;
	session_set_cookie_params($time);
	session_start();
	if($_SERVER['REQUEST_METHOD']=="POST"){
		extract($_REQUEST);
		$pdo = Conexao::connect();
		$consulta = $pdo->query('SELECT f.id_funcionario, f.email,f.senha,c.permissao from funcionario f inner join cargo c on f.id_cargo=c.id_cargo ');
		$pwd=hash('sha256', $pwd);
		while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
			if($linha["email"] == $email && $linha["senha"] == $pwd){
				$c = "true";
				$id_funcionario=$linha["id_funcionario"];
				$permissao=$linha['permissao'];
				break;
			}
		}
		if($c == "true"){
			if(!isset($_SESSION['hora'.$id_funcionario])){
				$_SESSION['hora'.$id_funcionario] = date("H:i:s");
				$_SESSION['id'] = $id_funcionario;
				$_SESSION['permissao']=$permissao;
				header ("Location: ../html/home.php");
			}
			else{
				$_SESSION['id'] = $id_funcionario;
				$_SESSION['permissao']=$permissao;
				header ("Location: ../html/home.php");
			}
				
		}
		else{
			header ("Location: ../index.php?erro=erro");
		}
		}
?>