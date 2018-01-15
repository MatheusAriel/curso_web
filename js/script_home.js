$(document).ready(function () {

// ###########################################################################################
// ###########################################HOME############################################
// ###########################################################################################

   atualizaTweet();


   $('#btn_tweet').click(function () {

      if ($('#texto_tweet').val().length > 0)
      {

         $.ajax({
            //PARA ONDE VAI SER FEITO ESSA REQUISIÇÃO
            url: 'inclui_tweet.php',

            //MÉTODO DE ENVIO PARA O SCRIPT PHP
            method: 'post',

            // QUAIS SÃO AS INFORMAÇÕES ENVIADAS PRA O SCRIPT PHP 
            //(EM JSON POIS PODEMOS ENCAMINHAR VÁRIOS PARAMETROS)
            // data: {chave1: valor1, chave2: valor2, ....}
            //CHAVE NESSE CASO SERÁ O ID DO INPUT TWEET
            //E O VALOR SERÁ OQ FOI DIGITADO NO CAMPO DO INPUT
            // data: {texto_tweet : $('#texto_tweet').val() },
            // recomendado quando há varios dados daquela tela para passar
            //INFORMAR QUAL O FORMULÁRIO QUE QUEREMOS E EXECUTAR A FUNÇÃO SERIALIZE,
            data: $('#form_tweet').serialize(),

            //OQ DEVE ACONTECER CASO HAJA SUCESSO NESSA REQUISIÇÃO
            // O DATA RECUPERA O CONTEUDO DA URL INFORMADA ACIMA
            success: function (data) {
               
               // alert("Tweet incluido com sucesso");
               if (data == 'Erro ao inserir o tweet')
               {
                  alert("Erro ao inserir o tweet");
               }

               $('#texto_tweet').val('');
               atualizaTweet();

            }

         });

      }

   });


   // CARREGA OS TWETTES APÓS A REQUISIÇÃO GET_TWETT()
   function atualizaTweet() {
      $.ajax({
         
         url: 'get_tweet.php',
         
         success: function (data) {
            $('#div_tweet').html(data);
         }
         
      });
   }












});