<?php
    require_once'../dao/Conexao.php';
    date_default_timezone_set('America/Argentina/Salta');
    $time=7 * 60 * 60;
    session_set_cookie_params($time);
    session_start();
    $id=$_SESSION['id'];
    $in = $_SESSION['hora'.$id];
    $out = date("H:i:s");

    //converte para o formato do DateTime as horas in e out
    $inicio = DateTime::createFromFormat('H:i:s', $in);
    $fim = DateTime::createFromFormat('H:i:s', $out);

    //Calcula a diferença entre as duas
    $diff = $inicio->diff($fim);
    $string=$diff->h.":".$diff->i.":".$diff->s;
    switch (date("D")) {
        case 'Mon':
            $dia="Segunda";
            break;
        case 'Tue':
            $dia="Terça";
            break;
            case 'Wed':
            $dia="Quarta";
            break;
            case 'Thu':
            $dia="Quinta";
            break;
            case 'Fri':
            $dia="Sexta";
            break;
            case 'Sat':
            $dia="Sábado";
            break;
            case 'Sun':
            $dia="Domingo";
            break;
        default:
            $dia="Erro";
            break;
    }
    $pdo = Conexao::connect();
    $pdo->query("insert into chekin (hora_entrada,hora_saida,dia_semana,tempo,id_funcionario) values ('".$in."','".$out."','".$dia."','".$string."',".$id.");");
    unset($_SESSION['id']);
    unset($_SESSION['hora'.$id]);
    unset($_SESSION['permissao']);
    header("Location:../html/index.html");
	
?>	