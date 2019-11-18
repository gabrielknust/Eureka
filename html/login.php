<?php
	require_once '../dao/Conexao.php';
	date_default_timezone_set("America/Fort_Nelson");
	$time=7 * 60 * 60;
	session_set_cookie_params($time);
	session_start();
	if($_SERVER['REQUEST_METHOD']=="POST"){
		extract($_REQUEST);echo $email."</br>";
		echo $pwd."</br>";;

		$pdo = Conexao::connect();
		$consulta = $pdo->query('SELECT id_funcionario, email,senha from funcionario');
		//$pwd=hash('sha256', $pwd);
		while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
			echo $linha["email"]."</br>";;
			echo $linha['senha']."</br>";;
			echo $linha['id_funcionario'];
			if($linha["email"] == $email && $linha["senha"] == $pwd){
				$c = "true";
				$id_funcionario=$linha["id_funcionario"];
				break;
			}
		}
		if($c == "true"){
				$_SESSION['hora'.$id_funcionario] = date("H:i:s");
				$_SESSION['id'] = $id_funcionario;
				header ("Location: ../html/home.php");
		}
		else{
			header ("Location: ../index.php?erro=erro");
		}
	}
?>