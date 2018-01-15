<?php

   require_once("db.class.php");

   $objDb = new Db();

   // VARIÁVEL LINK SERVE PARA PEGAR O RETORNO DA FUNÇÃO conecta_mysql
   $link = $objDb->conecta_mysql();

   $usuario_existe = false;
   $email_existe = false;


   // PEGA DO NAME
   $usuario = mysqli_real_escape_string($link, $_POST['usuario']);
   $usuario = mb_convert_case($usuario, MB_CASE_TITLE, "UTF-8");

   $email = mysqli_real_escape_string($link, $_POST['email']);
   $email = strtolower($email);

   $sexo = mysqli_real_escape_string($link, $_POST['sexo']);

   $data = $_POST['data'];

   $senha = md5(mysqli_real_escape_string($link, $_POST['senha']));
   $confirmaSenha = md5($_POST['confirmaSenha']);

   // VERIFICAR SE EMAIL JÁ EXISTE
   $sql = " SELECT * FROM usuarios u WHERE u.usuario = '$usuario' OR u.email = '$email' ; ";

   if ($resultado_id = mysqli_query($link, $sql))
   {
      $dados_usuario = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

      // VERIFICA SE O ÍNDICE USUARIO DA CONSULTA EXISTE OU NÃO E SE ELE É IGUAL AO INFORMADO PELO USUÁRIO
      if (isset($dados_usuario['usuario']) && $dados_usuario['usuario'] == $usuario)
      {
         $usuario_existe = true;
      }

      if (isset($dados_usuario['email']) && $dados_usuario['email'] == $email)
      {
         $email_existe = true;
      }
   }
   else
   {
      echo "Erro ao tentar localizar o registo desse usuário";
   }


   if ($usuario_existe || $email_existe)
   {
      $retorno_get = '';

      if ($usuario_existe)
      {
         $retorno_get = $retorno_get . 'erro_usuario=1&';
      }
      if ($email_existe)
      {
         $retorno_get = $retorno_get . 'erro_email=1&';
      }

      header('Location: inscrevase.php?' . $retorno_get);
      // ELE INTERROMPE O SCRIPT A PARTIR DEBAIXO DO DIE()
      die();
   }
   else if ($confirmaSenha == $senha)
   {
      // MONTAR QUERY
      $sql = "INSERT INTO usuarios (usuario, email, sexo, senha, data) VALUES ('$usuario', '$email', '$sexo', '$senha', '$data');";

      // EXECUTAR QUERY (CONEXÃO, QUERY)
      if (mysqli_query($link, $sql))
      {
         echo "Usuário Registrado com sucesso";
         echo "<br>";
      }
      else
      {
         echo "Erro ao Registrar o usuário";
      }
   }
   else
   {
      header('Location: inscrevase.php?erro=2');
   }
?>