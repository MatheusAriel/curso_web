<?php
   // verifica se o índice 'erro_usuario' existe CASO EXISTA A VARIÁVEL ERRO USUARIO RECEBE $_GET['erro_usuario']
   $erro_usuario = isset($_GET['erro_usuario']) ? $_GET['erro_usuario'] : 0;
   $erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;
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
                  <li><a href="index.php">Voltar para Home <span class="glyphicon glyphicon-home"></span></a></li>
               </ul>
            </div><!--/.nav-collapse -->
         </div>
      </nav>


      <div class="container">

         <br /><br />

         <div class="col-md-3"></div>

         <div class="col-md-6 bg-info">

            <div class="row">
               <div class="col-md-12">
                  <h3 style="text-align: center">Inscreva-se já.</h3>
               </div>
            </div>

            <!-- ACTION  - PARA ONDE vão os dados preenchidos no form -->
            <form method="post" action="registra_usuario.php" id="form_cadastrarse">

               <div class="row">
                  <div class="col-md-12">

                     <div class="form-group">
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="*Usuário" required>
                        <?php
                           //SE FOR 1 ELE ENTENDE QUE É TRUE SE 0 FALSE
                           if ($erro_usuario)
                           {
                              // echo "<p style='color:red;'>"."Usuário já existe"."</p>";
                              echo "<small style='color:red;'>" . "Usuário já existe" . "</small>";
                           }
                        ?>
                     </div>

                  </div>
               </div>

               <div class="row">
                  <div class="col-md-12">

                     <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="*Email" required>
                        <?php
                           if ($erro_email == 1)
                           {
                              // echo "<p style='color:red;'>"."E-mail já existe"."</p>";
                              echo "<small style='color:red;'>" . "E-mail já existe" . "</small>";
                           }
                        ?>
                     </div>

                  </div>
               </div>

               <div class="row">
                  <div class="col-md-12">

                     <div class="form-group">
                        <label>Sexo:</label>
                        <div class="btn-group" data-toggle="buttons">

                           <label class="btn btn-default">
                              <input type="radio" name="sexo" id="inputSexo" value="M" required>
                              Masculino 
                           </label>

                           <label class="btn btn-default">
                              <input type="radio" name="sexo" id="inputSexo" value="F" required>
                              Feminino 
                           </label>
                        </div>

                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="col-md-6">

                     <div class="form-group ">
                        <div class="input-group">
                           <div class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                           </div>
                           <input class="form-control" name="data" placeholder="DD/MM/AAAA" type="date"/>
                        </div>
                     </div>

                  </div>
               </div>

               <div class="row">
                  <div class="col-md-12">

                     <div class="form-group">
                        <input type="password" class="form-control"  name="senha" placeholder="*Senha" required id="senha">
                     </div>

                  </div>
               </div>

               <div class="row">
                  <div class="col-md-12">

                     <div class="form-group">
                        <input type="password" class="form-control"  name="confirmaSenha" placeholder="*Confirma Senha" required id="confirmaSenha">
                     </div>

                  </div>
               </div>

               <div class="row">
                  <div class="col-md-12">

                     <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" id="btn_inscrevasse">Inscreva-se</button>
                     </div>

                  </div>
               </div>


            </form>
         </div><!-- FIM COL 6 -->

         <div class="col-md-3"></div>

         <!-- <div class="clearfix"></div>
         <br />
         <div class="col-md-4"></div>
         <div class="col-md-4"></div>
         <div class="col-md-4"></div> -->

      </div><!-- FIM CONTAINER -->
      <script src="js/bootstrap.min.js"></script>
   </body>
</html>