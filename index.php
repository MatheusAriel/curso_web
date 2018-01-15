<?php
// SE O ÍNDICE ERRO DA VARIÁVEL GET EXISTA, a variável erro recebe $_GET['erro'] 
//(VALOR DESSE ÍNDICE) caso n reecebe 0
   $erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
?>



<!DOCTYPE HTML>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">

      <title>Twitter clone</title>

      <!-- jquery - link cdn -->
      <!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> -->
      <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
      <script type="text/javascript" src="js/script.js"></script>

      <!-- bootstrap - link cdn -->
      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
      <link rel="stylesheet" href="./estilos/bootstrap-3.3.6/css/bootstrap.min.css">

      <script>
         // código javascript ESTA NO ARQUIVO SCRIPT.JS						
      </script>
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
               <img src="imagens/icone_twitter.png" style="margin: 5px auto">
            </div>
            <!--PARA QUANDO O ERRO DO GET FOR 1 DEIXAR O FORM DE LOGIN JÁ ABERTO;-->
            <div id="navbar" class="navbar-collapse collapse <?= $erro == 1 ? 'in' : '' ?>" 
                 aria=expanded="<?= $erro == 1 ? 'true' : 'false' ?>">

               <ul class="nav navbar-nav navbar-right">

                  <li><a href="inscrevase.php">Inscrever-se <span class="glyphicon glyphicon-pencil"></span></a></li>

                  <li class="<?= $erro == 1 ? 'open' : '' ?>">

                     <a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrar <span class="glyphicon glyphicon-user"></span></a>

                     <ul class="dropdown-menu" aria-labelledby="entrar" style="width: 200px">

                        <div class="col-md-12">
                           <h3>Você possui uma conta?</h3>
                           <br>

                           <form method="post" action="validar_acesso.php" id="formLogin">

                              <div class="form-group">
                                 <input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="*Usuário ou E-mail" required="requiored" />
                              </div>

                              <div class="form-group">
                                 <input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="*Senha" required="requiored" />
                              </div>

                              <button type="submit" class="btn btn-primary btn-block" id="btn_login">Entrar</button>

                           </form>

                           <div class="col-md-12">
                              <font color="#FF0000" id="texto_erro_login"> <?php $mensagem =  $erro == 1 ? 'Usuário e/ou senha inválido(s)' : ''; echo $mensagem ?> </font>
                              <p id="teste"></p>
                           </div>

                        </div>

                     </ul>

                  </li>
               </ul>
            </div><!--/.nav-collapse -->
         </div>
      </nav>


      <div class="container">

         <!-- Main component for a primary marketing message or call to action -->
         <div class="jumbotron">
            <h1>Bem vindo ao twitter clone</h1>
            <p>Veja o que está acontecendo agora...</p>
         </div>

         <div class="clearfix"></div>
      </div>


   </div>

   <script src="js/bootstrap.min.js"></script>

</body>
</html>