<?php
   session_start();

   // VERIFICA SE USUÁRIO EXISTE NA SESSÃO
   if (!isset($_SESSION['usuario']))
   {
      // header('Location: index.php?erro=1');
      header('Location: inscrevase.php');
   }

   $usuario = $_SESSION['id_usuario'];

   require_once("db.class.php");

   $objDb = new Db();
   $link = $objDb->conecta_mysql();

   //RECUPERA QTD TWEETES
   $sql = "SELECT COUNT(*) AS qtd_tweets FROM tweet WHERE id_usuario = $usuario";
   $resultado_id = mysqli_query($link, $sql);
   $qtd_tweetes = 0;
   if ($resultado_id)
   {
      $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
      $qtd_tweetes = $registro['qtd_tweets'];
   }
   else
   {
      echo 'erro ao executar a query';
   }

   //RECUPERA QTD SEGUIDORES
   $sql = "SELECT COUNT(*) AS qtd_seguidores FROM usuarios_seguidores WHERE seguindo_id_usuario = $usuario";
   $resultado_id = mysqli_query($link, $sql);
   $qtd_seguidores = 0;
   if ($resultado_id)
   {
      $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
      $qtd_seguidores = $registro['qtd_seguidores'];
   }
   else
   {
      echo 'erro ao executar a query';
   }
?>
<!DOCTYPE HTML>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">

      <title>Twitter clone</title>

      <!-- jquery - link cdn -->
      <!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> -->
      <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
      <script type="text/javascript" src="js/script_procurar_pessoa.js"></script>

      <!-- bootstrap - link cdn -->
      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
      <link rel="stylesheet" href="./estilos/bootstrap-3.3.6/css/bootstrap.min.css">

   </head>

   <body>

      <!-- Static navbar -->
      <nav class="navbar navbar-default navbar-static-top">
         <div class="container">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
               </button>
               <img src="./imagens/icone_twitter.png" style="margin-top: 5px">
            </div>

            <div id="navbar" class="navbar-collapse collapse">
               <ul class="nav navbar-nav navbar-right">
                  <li>
                     <a href="home.php">Home 
                        <span class="glyphicon glyphicon-home"></span>
                     </a>
                  </li>
                  <li>
                     <a href="sair.php">Sair 
                        <span class="glyphicon glyphicon-remove"></span>
                     </a>
                  </li>
               </ul>
            </div><!--/.nav-collapse -->
         </div>
      </nav>


      <div class="container">

         <div class="col-md-3">
            <div class="panel panel-primary">
               <div class="panel-heading">
                  <h4> <?= $_SESSION['usuario'] ?> </h4>
               </div>

               <div class="panel-body">

                  <div class="col-md-6">
                     Tweets<br><?php echo $qtd_tweetes; ?>

                  </div>

                  <div class="col-md-6">
                     Seguidores<br><?php echo $qtd_seguidores; ?>

                  </div>

               </div>
            </div>


         </div><!-- FIM COL MD3 -->

         <div class="col-md-6">

            <div class="panel panel-primary">
               <div class="panel-body">
                  <form id="form_procurar_pessoa" class="input-group">

                     <input type="text" id="pessoa" name="pessoa" class="form-control" placeholder="Quem você está procurando?" maxlength="140">

                     <span class="input-group-btn">
                        <button class="btn btn-primary" id="btn_procurar_pessoa" type="button">Procurar <span class="glyphicon glyphicon-search"></span></button>	
                     </span>

                  </form><!-- FIM FORM -->
               </div><!-- FIM panel-body -->
            </div><!-- FIM panel -->

            <div class="row">
               <div id="pessoas" class="list-group col-md-12" style="text-align: center;">

               </div>
            </div>

         </div><!-- FIM COL 6 -->

         <div class="col-md-3">
            <div class="panel panel-primary">
               <div class="panel-heading">
                  <h4><a href="home.php" style="color: white; text-align: center">Tweetar</a></h4>
               </div>
            </div>
         </div><!-- FIM COL MD3 -->

      </div><!-- FIM CONTAINER -->

      <script src="js/bootstrap.min.js"></script>
   </body>
</html>