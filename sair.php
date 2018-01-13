<?php
	session_start();

	// UNSET ELIMINA O ÍNDICE DO ARRAY SESSION
	unset( $_SESSION['usuario'] );
	unset( $_SESSION['email'] );

	header('Location: index.php');
?>