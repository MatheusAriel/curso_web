<?php
	session_start();

	if(!isset($_SESSION['usuario']))
	{
		header('Location:index.php?erro=1');
	}

	require_once("db.class.php");

	$id_usuario = $_SESSION['id_usuario'];

			//PARA RECUPERAR O QUE FOI ENVIADO PELO AJAX POR POST, NO CASO O NOME - nome_pessoa é o id do input
	$nome_pessoa = $_POST['pessoa'];
	$email_pessoa = $_POST['pessoa'];


	$objDb = new Db();
	$link = $objDb->conecta_mysql();

			//PARA NÃO CONSEGUIR SEGUIR VC MESMO
	$sql = " SELECT  * FROM usuarios 
	WHERE (usuario LIKE '%$nome_pessoa%' OR email LIKE '%$email_pessoa%') 
	AND id <> $id_usuario;";

	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id)
	{


		while ( $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC) ) 
		{
			if(count($registro)<=0)
			{
				echo "0";
			}
			else
			{
				echo '<a href="#" class="list-group-item"> ';

					echo '<strong>'.$registro['usuario'].'</strong> 
					<small> - '.$registro['email'].' </small>';
					echo '<p class="list-group-item-text pull-right">';

						echo '<button type="button" class="btn btn-primary btn_seguir" data-id_usuario="'.$registro['id'].'">Seguir</button>';

						echo '<button type="button" class="btn btn-danger btn_deixar_seguir" data-id_usuario="'.$registro['id'].'">Deixar de Seguir</button>';
						
					echo '</p>';
					echo '<div class="clearfix"></div>';

				echo '<a/>';
			}
		}
		

	}
	else
	{
		echo "Erro na consulta de usuários no bd...";
	}

?>