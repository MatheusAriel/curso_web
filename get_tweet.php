<?php

   require_once("db.class.php");
   session_start();

   if (!isset($_SESSION['usuario']))
   {
      header('Location:index.php?erro=1');
   }
   $id_usuario = $_SESSION['id_usuario'];

   $objDb = new Db();
   $link = $objDb->conecta_mysql();

   $sql = " SELECT  DATE_FORMAT(t.data_inclusao, '%d %b %Y - %H:%i') AS data_inclusao_formatada, t.tweet, u.usuario 
		FROM tweet t JOIN usuarios u ON (t.id_usuario = u.id) 
		WHERE t.id_usuario = $id_usuario
                OR t.id_usuario IN( SELECT seguindo_id_usuario FROM usuarios_seguidores WHERE id_usuario = $id_usuario )   
		ORDER BY data_inclusao DESC; ";

   $resultado_id = mysqli_query($link, $sql);

   if ($resultado_id)
   {
      while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC))
      {
         // echo "<pre>";
         //var_dump(mysqli_fetch_array($resultado_id, MYSQLI_ASSOC));

         echo '<div class="list-group">';
            echo '<a href="#" class="list-group-item list-group-item-action flex-column align-items-start"> ';
               echo '<div class="d-flex w-100 justify-content-between">'
                     . '<h4 class="mb-1"> <strong>' . $registro['usuario']
                        . '</strong><small class="text-muted"> - ' . $registro['data_inclusao_formatada'] . '</small>'
                     . '</h4>'
               .   '</div>';
               echo '<p class="mb-1">' . $registro['tweet'] . '</p>';
            echo '<a/>';
         echo '</div>';
      }
   }
   else
   {
      echo "Erro na consulta de tweets no bd...";
   }
?>