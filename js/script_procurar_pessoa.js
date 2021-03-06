$(document).ready(function () {
   
   //PARA CARREGAR A PÁGINA COM TODOS OS USUÁRIOS LISTADOS
   
   $.ajax({
         // ENVIAREMOS NOSSA requisição para a página get_pessoas.php
         url: 'get_pessoas.php',

         // ATRAVÉS DO MÉTODO POST
         method: 'post',

         // INFORMAÇÕES ESSAS VINDO DO form_procurar_pessoa 
         //(OQ NÓS MANDAREMOS PARA A URL DE INFORMAÇÃO)
         data: {pessoa: '' },

         success: function (data) {
            $('#pessoas').html(data);
            $('#pessoa').val('');

            $('.btn_seguir').click(function () {

               var id_usuario = $(this).data('id_usuario');
               
               //OCULTAR E EXIBIR O BOTÃO SEGUIR/ DEIXAR_SEGUIR
               $('#btn_seguir_' + id_usuario).hide();
               $('#btn_deixar_seguir_' + id_usuario).show();

               $.ajax({
                  url: 'seguir.php',

                  method: 'post',

                  //PASSA PARA O SCRIP seguir.php O ID DO USUÁRIO A SER SEGUIDO
                  data: {seguir_id_usuario: id_usuario},

                  success: function (data) {
                     alert("Registro feito com sucesso");
                  }
               });

            });

            $('.btn_deixar_seguir').click(function () {

               var id_usuario = $(this).data('id_usuario');

               $('#btn_seguir_' + id_usuario).show();
               $('#btn_deixar_seguir_' + id_usuario).hide();

               $.ajax({

                  url: 'deixar_seguir.php',

                  method: 'post',

                  data: {deixar_seguir_id_usuario: id_usuario},

                  success: function (data) {
                     alert("Registro removido com sucesso");
                  }
               });


            });

         }

      });
   

// ###########################################################################################
// ##################################PROCURAR PESSOAS#########################################
// ###########################################################################################
 
   $('#btn_procurar_pessoa').click(function () {

      $.ajax({
         // ENVIAREMOS NOSSA requisição para a página get_pessoas.php
         url: 'get_pessoas.php',

         // ATRAVÉS DO MÉTODO POST
         method: 'post',

         // INFORMAÇÕES ESSAS VINDO DO form_procurar_pessoa 
         //(OQ NÓS MANDAREMOS PARA A URL DE INFORMAÇÃO)
         data: $('#form_procurar_pessoa').serialize(),

         success: function (data) {
            $('#pessoas').html(data);
            $('#pessoa').val('');

            $('.btn_seguir').click(function () {

               var id_usuario = $(this).data('id_usuario');
               
               //OCULTAR E EXIBIR O BOTÃO SEGUIR/ DEIXAR_SEGUIR
               $('#btn_seguir_' + id_usuario).hide();
               $('#btn_deixar_seguir_' + id_usuario).show();

               $.ajax({
                  url: 'seguir.php',

                  method: 'post',

                  //PASSA PARA O SCRIP seguir.php O ID DO USUÁRIO A SER SEGUIDO
                  data: {seguir_id_usuario: id_usuario},

                  success: function (data) {
                     alert("Registro feito com sucesso");
                  }
               });

            });

            $('.btn_deixar_seguir').click(function () {

               var id_usuario = $(this).data('id_usuario');

               $('#btn_seguir_' + id_usuario).show();
               $('#btn_deixar_seguir_' + id_usuario).hide();

               $.ajax({

                  url: 'deixar_seguir.php',

                  method: 'post',

                  data: {deixar_seguir_id_usuario: id_usuario},

                  success: function (data) {
                     alert("Registro removido com sucesso");
                  }
               });


            });

         }

      });

   });


});