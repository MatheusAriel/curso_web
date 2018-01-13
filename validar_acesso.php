<?php
	session_start();

	require_once("db.class.php");

	$objDb = new Db();
	$link = $objDb->conecta_mysql();

	$usuario = mysqli_real_escape_string($link, $_POST['usuario']);
	$senha = md5( mysqli_real_escape_string($link, $_POST['senha']) );


	
	// mysqli_real_escape_string($link, $senha);

	$sql = "SELECT u.id, u.usuario, u.email FROM usuarios u WHERE (u.usuario = '$usuario' OR u.email = '$usuario') AND u.senha = '$senha';";


	// //RETORNA FALSE SE A CONSULTA TIVER ERRO / RESOURCE (REFERENCIA PARA INFORMAÇÃO EXTERNA DO PHP) SE NÃO TIVER ERROS NA CONSULTA - CONTÉM OS REGISTROS DA CONSULTA 
	$resultadoId = mysqli_query($link, $sql);

	if($resultadoId)
	{
		// PARA EXPOLORAR O RETORNO DO SELECT (TRANSFORMANDO ESSE RESOURCE EM UM ARRAY)
		$dadosUsuario = mysqli_fetch_array($resultadoId);

		if( isset($dadosUsuario['usuario']) || isset($dadosUsuario['email']) )
		{
			$_SESSION['id_usuario'] = $dadosUsuario['id'];
			$_SESSION['usuario'] = $dadosUsuario['usuario'];
			$_SESSION['email'] = $dadosUsuario['email'];

			// echo "Usuário Existe";
			header('Location: home.php');
		}
		else
		{
			echo "$usuario";

			//REDERECIONAR PARA PÁGINA
			header('Location: index.php?erro=1');
		}

	}
	else
	{
		echo "<h1> :( Erro na execução da consulta. Favor entrar em contato com o admin do site. </h1>";
	}


?>