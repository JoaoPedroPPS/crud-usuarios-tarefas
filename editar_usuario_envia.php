<?php
require_once("valida_session.php");
require_once ("bd/bd_usuario.php");
	     
session_start();
$cod = $_POST["cod"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha =  $_POST["senha"];
$perfil = 1;
$status = $_POST["status"];
$data=date("y/m/d");

$dados = alteraUsuario($cod, $nome, $email, $senha, $perfil, $status);
if($dados == 1){
	$_SESSION['texto_sucesso'] = 'Dados atualizados com sucesso.';
	unset($_SESSION['texto_erro']);
	unset ($_SESSION['nome']);
	unset ($_SESSION['email']);
	unset ($_SESSION['senha']);
	header ("Location:usuario.php");
}else{
	$_SESSION['texto_erro'] = 'O dados não foram atualizados no sistema!';
	$_SESSION['nome_usu'] = $nome;
	$_SESSION['email'] = $email;
	$_SESSION['senha'] = $senha;
	header ("Location:editar_usuario.php");
}


?>