<?php
   session_start();

   // VERIFICA SE USUÁRIO EXISTE NA SESSÃO
   if (!isset($_SESSION['usuario']))
   {
      // header('Location: index.php?erro=1');
      header('Location: inscrevase.php');
   }




   // // ++++++++++++++++++CONTROLAR SESSÃO POR TEMPO========================
   // // se não tiver pego tempo que logou
   // if(!isset($_SESSION['start_login'])) 
   // { 
   // 	//pega tempo que logou
   //     $_SESSION['start_login'] = time(); 
   //     // adiciona 30 segundos ao tempo e grava em outra variável de sessão
   //     $_SESSION['logout_time'] = $_SESSION['start_login'] + 30; 
   // }
   // // se o tempo atual for maior que o tempo de logout
   // if(time() >= $_SESSION['logout_time']) 
   // { 
   // 	 //vai para index
   //     header("location:index.php");
   //     session_destroy();
   // } 
   // else 
   // {
   // 	// tempo que falta
   //     $red = $_SESSION['logout_time'] - time(); 
   //     echo "Início de sessão: ".$_SESSION['start_login']."<br>";
   //     echo "Redirecionando em ".$red." segundos.<br>";
   // }
?>
<!DOCTYPE HTML>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">

      <title>Twitter clone</title>

      <!-- jquery - link cdn -->
      <!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> -->
      <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
      <script type="text/javascript" src="js/script_home.js"></script>

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
                  <li><a href="sair.php">Sair <span class="glyphicon glyphicon-remove"></span></a></li>
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
                     Tweets<br>1

                  </div>

                  <div class="col-md-6">
                     Seguidores<br>1

                  </div>

               </div>
            </div>


         </div><!-- FIM COL MD3 -->

         <div class="col-md-6">

            <div class="panel panel-primary">
               <div class="panel-body">
                  <form id="form_tweet" class="input-group">

                     <input type="text" id="texto_tweet" name="texto" class="form-control" placeholder="O que esta acontecendo agora?" maxlength="140">

                     <span class="input-group-btn">
                        <button class="btn btn-primary" id="btn_tweet" type="button">Tweetar</button>	
                     </span>

                  </form><!-- FIM FORM -->
               </div><!-- FIM panel-body -->
            </div><!-- FIM panel -->

            <div class="row">
               <div id="div_tweet" class="list-group col-md-12">

               </div>
            </div>

         </div><!-- FIM COL 6 -->

         <div class="col-md-3">
            <div class="panel panel-primary">
               <div class="panel-body">
                  <h4><a href="procurar_pessoas.php">Procurar por pessoas</a></h4>

               </div>
            </div>
         </div><!-- FIM COL MD3 -->
      </div><!-- FIM CONTAINER -->

      <script src="js/bootstrap.min.js"></script>
   </body>
</html>