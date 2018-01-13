<?php
	

	require_once("db.class.php");

	$objDb = new Db();
	$link = $objDb->conecta_mysql();

	
	$sql = "SELECT * FROM usuarios;";


	
	$resultadoId = mysqli_query($link, $sql);

	if($resultadoId)
	{
		// mysqli_fetch_array RETORNA APENAS O PRIMEIRO ÍNDICE DA TABELA POR PADRÃO ELA RETORNA TANTO POR NÚMERO COMO POR NOME DA COLUNA
		// MYSQLI_NUM PARA PEGAR OS ÍNDICES EM NÚMEROS
		// MYSQLI_ASSOC PEGA O NOME DA COLUNA DA TABELA
		$dadosUsuario = array();

		while($linha = mysqli_fetch_array($resultadoId, MYSQLI_ASSOC) )
		{
			$dadosUsuario[] = $linha;
		}

		foreach ($dadosUsuario as $usuario) 
		{
			// echo 'Email: '.$usuario['email'];
			// echo "<br>";
			// echo "Usuário: ".$usuario['usuario'];
			// echo "<br><br><br>";

			// OU IMPRIMIR ASSIM PARA PEGAR TODOS OS REGISTROS
			echo "<pre>";
			echo var_dump($usuario);
			echo "</pre>";
		}

	}
	else
	{
		echo "<h1> :( Erro na execução da consulta. Favor entrar em contato com o admin do site. </h1>";
	}

?>