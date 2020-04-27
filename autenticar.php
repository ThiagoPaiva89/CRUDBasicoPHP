<?php 

session_start();

require_once "inc/config.inc.php";

$obj = new Login;

$login = filter_input(INPUT_POST, "usuario");
$senha = filter_input(INPUT_POST, "senha");

$obj->setLogin($login);
$obj->setSenha($senha);

if($obj->logar()){
	header("location:principal.php?link=1");
}else{
	echo "<script>alert('Erro ao Logar'); location='index.php'</script>";
}