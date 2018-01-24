<?php

   session_start();
   
   if (!isset($_SESSION['usuario']))
   {
      header('Location: inscrevase.php');
   }
   
   require_once("db.class.php");

   $objDb = new Db();
   $link = $objDb->conecta_mysql();

   $id_usuario = $_SESSION['id_usuario'];
   $seguir_id_usuario = $_POST['seguir_id_usuario'];

   if ($id_usuario != '' || $seguir_id_usuario != '')
   {
      $sql = " INSERT INTO usuarios_seguidores (id_usuario, seguindo_id_usuario) VALUES ($id_usuario, $seguir_id_usuario); ";
 
      if (!mysqli_query($link, $sql))
      {
         echo "Erro ao inserir o seguidor";
      }
      
   }
?>