<?php
ob_start();
session_start();
	if(isset($_SESSION['id_usuario']) )
	{
		header("Location: ../../home-painel.php");exit;
	}	

	
	require ('conexao.php');

	$login = $_POST['login'];
	$senha = $_POST['senha'];

	$usuarios = db_select('usuarios', "WHERE login = '{$login}' AND senha = {$senha} AND nivel_acesso != 'usuario' AND status = 1", 'id_usuario, login, senha, nome, nivel_acesso ');
	

	if($usuarios)
	{
		echo "Logado com sucesso";
		header("Refresh: 3, ../../home-painel.php?home");
		foreach($usuarios as $user)
		{
			$_SESSION['id_usuario'] = $user['id_usuario'];
			$_SESSION['login'] = $user['login'];
			$_SESSION['senha'] = $user['senha'];
			$_SESSION['nivel_acesso'] = $user['nivel_acesso'];
			$_SESSION['nome'] = $user['nome'];
		}
		
	}
	else
	{
		echo "Usuário e/ou senha incorretos";
		header("Refresh: 3, ../../../login-painel-de-controle.php");
	}

?>