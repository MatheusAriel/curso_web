<?php
	//SEMPRE QUE FOR TRABALAHR COM SESSÃO, É NECESSÁRIO USAR O SESSION_START()
	session_start();

	if( !isset($_SESSION['usuario']) )
	{
		// header('Location: index.php?erro=1');
		header('Location: inscrevase.php');
	}

	require_once("db.class.php");

	$objDb = new Db();
	$link = $objDb->conecta_mysql();

	$id_usuario = $_SESSION['id_usuario'];
	$texto_tweet = mysqli_real_escape_string($link,$_POST['texto']);

	if( $id_usuario != '' && ($texto_tweet != '' && strlen($texto_tweet<=140) ) )
	{
		$sql = " INSERT INTO tweet (id_usuario, tweet) VALUES ($id_usuario, '$texto_tweet'); ";

		if(!mysqli_query($link, $sql))
		{
			echo "Erro ao inserir o tweet";
		}
	}

	// OU 
	// if($id_usuario == '' || $texto_tweet == '')
	// {
	// 	die();
	// }
	// $sql = " INSERT INTO tweet (id_usuario, tweet) VALUES ($id_usuario, '$texto_tweet'); ";
	// mysqli_query($link, $sql);



?>