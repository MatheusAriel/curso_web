<?php

   session_start();

   if (!isset($_SESSION['usuario']))
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

   $sql = "SELECT  u.*, us.* 
              FROM usuarios u
              LEFT JOIN usuarios_seguidores us ON (us.id_usuario = $id_usuario AND u.id = us.seguindo_id_usuario)
              WHERE u.id <> $id_usuario"; //PARA NÃO BUSCAR O USUÁRIO LOGADO

   if ($nome_pessoa != '' || $email_pessoa != '')
   {
      $sql = $sql . " AND (u.usuario LIKE '%$nome_pessoa%' OR u.email LIKE '%$email_pessoa%')";
   }


   $resultado_id = mysqli_query($link, $sql);

   if ($resultado_id)
   {
      $i = 0;
      while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC))
      {
         $seguindo_sn = isset($registro['id_usuario_seguidor']) && !empty($registro['id_usuario_seguidor']) ? 'S' : 'N';
         $btn_seguir_display = 'block';
         $btn_deixar_seguir_display = 'block';

         if ($seguindo_sn == 'N')
         {
            $btn_deixar_seguir_display = 'none';
         }
         else
         {
            $btn_seguir_display = 'none';
         }


         echo '<a href="#" class="list-group-item"> ';
            echo '<strong>' . $registro['usuario'] . '</strong> <small> - ' . $registro['email'] . ' </small>';
            echo '<p class="list-group-item-text pull-right">';
            
               echo '<button type="button" id="btn_seguir_' . $registro['id'] . '" style="display:' . $btn_seguir_display . '" '
                       . 'class="btn btn-primary btn_seguir" data-id_usuario="' . $registro['id'] . '">Seguir</button> ';
               
               echo '<button type="button" id="btn_deixar_seguir_' . $registro['id'] . '" style="display:' . $btn_deixar_seguir_display . ';" '
                       . 'class="btn btn-danger btn_deixar_seguir" data-id_usuario="' . $registro['id'] . '">Deixar de Seguir</button>';
               
            echo '</p>';
            echo '<div class="clearfix"></div>';
         echo '<a/><br>';
         $i++;
      }
      if ($i <= 0)
      {
         echo '<a href="#" class="list-group-item"> ';
            echo'<strong>Nenhum usuário encontrado</strong>';
         echo '<a/>';
      }
   }
   else
   {
      echo "Erro na consulta de usuários no bd...";
   }
?>