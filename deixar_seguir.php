<?php
	session_start();
	if( !isset($_SESSION['usuario']) )
	{
		header('Location: inscrevase.php');
	}

	require_once("db.class.php");

	$objDb = new Db();
	$link = $objDb->conecta_mysql();

	$id_usuario = $_SESSION['id_usuario'];
	$deixar_seguir_id_usuario = $_POST['deixar_seguir_id_usuario'];

	if( $id_usuario != '' && $deixar_seguir_id_usuario != '')
	{
		$sql = " DELETE FROM usuarios_seguidores WHERE id_usuario = $id_usuario AND seguindo_id_usuario = $deixar_seguir_id_usuario";

		if(!mysqli_query($link, $sql))
		{
			echo "Erro ao deixar de seguir o usuário";
		}
	}

?>