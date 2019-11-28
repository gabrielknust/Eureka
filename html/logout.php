<?php
	session_start();
	unset($_SESSION['id']);
    unset($_SESSION['permissao']);
    header("Location:../html/index.html");
?>