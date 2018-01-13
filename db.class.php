<?php

	/**
	* 
	*/
	class Db 
	{
		// HOST (ENDEREÇO QUE O MYSQL ESTA INSTALADO)
		private $host = 'localhost';

		// USUÁRIO
		private $usuario = 'root';

		// SENHA
		private $senha = '';

		// QUAL BANCO DE DADOS
		private $dataBase = 'twitter_clone';


		public function conecta_mysql()
		{
			$conexao = mysqli_connect($this->host, $this->usuario, $this->senha, $this->dataBase);

			// AJUSTAR P CHARSET DE COMUNICAÇÃO ENTRRE A APLICAÇÃO E O BD
			mysqli_set_charset($conexao,'utf8');

			// VERIFICA SE HOUVE ERRO DE CONEXÃO
			if(mysqli_connect_errno())
			{
				echo "Houve um erro ao tentar se conectar com o BD MySql: ( ".mysqli_connect_error()." )";
			}

			return $conexao;

		}


	}

?>