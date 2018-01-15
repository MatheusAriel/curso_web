$(document).ready(function () {

   //ERRO AS VEZES FUNCIONA NO CHROME OUTRAS NÃO, NO OPERA FUNCIONA

// ###########################################################################################
// ###########################################INDEX###########################################
// ###########################################################################################

   //VER SE CAMPO USUÁRIO E SENHA DO LOGIN FORAM PREENCHIDOS
   $('#btn_login').click(function () {

      var campoVazio = false;
      if ($("#campo_usuario").val() == '')
      {
         $("#campo_usuario").css({'border-color': '#A94442', 'background-color': '#dedee5'});
         $("#texto_erro_login").text('Informe o usuário');
         $("#campo_usuario").focus();
         campoVazio = true;
      }
      else
      {
         $("#campo_usuario").css({'border-color': '#CCC', 'background-color': '#FFF'});
      }


      if ($("#campo_senha").val() == '')
      {
         //alert("Campo Senha esta vazio");
         $("#campo_senha").css({'border-color': '#A94442', 'background-color': '#dedee5'});
         $("#texto_erro_login").text('Informe a senha');

         if ($("#campo_usuario").val() != '')
         {
            $("#campo_senha").focus();
         }
         campoVazio = true;
      }
      else
      {
         $("#campo_senha").css({'border-color': '#CCC', 'background-color': '#FFF'});
      }

      if ($("#campo_usuario").val() == '' && $("#campo_senha").val() == '')
      {
         $("#texto_erro_login").text('Informe o usuário e senha');
         campoVazio = true;
      }

      // IMPEDE QUE O FORMULÁRIO SEJA ENVIADO, PARA QUE AS APLICAÇÕES CSS AQUI SEJAM EFETIVADAS
      if (campoVazio)
      {
         return false;
      }

   });












// ###########################################################################################
// ########################################INSCREVASE#########################################
// ###########################################################################################

   //VER SE CAMPO SENHA E CONFIRMASENHA SÃO IGUAIS
   $('#btn_inscrevasse').click(function () {

      var campoSenha = false;
      var senha = $('#senha').val();
      var confirmaSenha = $('#confirmaSenha').val();
      if (senha != confirmaSenha)
      {
         //alert("Senhas não conferem");
         $("#senha").css({'border-color': '#A94442', 'background-color': '#dedee5'});
         $("#confirmaSenha").css({'border-color': '#A94442', 'background-color': '#dedee5'});
         $("#senha").focus();
         $("#senha").val('');
         $("#confirmaSenha").val('');
         campoSenha = true;
      }

      // IMPEDE QUE O FORMULÁRIO SEJA ENVIADO, PARA QUE AS APLICAÇÕES CSS AQUI SEJAM EFETIVADAS
      if (campoSenha)
      {
         return false;
      }
   });









// ###########################################################################################
// ###########################################HOME############################################
// ###########################################################################################

   // $('#btn_tweet').click(function(){

   // 	if($('#texto_tweet').val().length >0)
   // 	{

   // 		$.ajax({
   // 			//PARA ONDE VAI SER FEITO ESSA REQUISIÇÃO
   // 			url:'inclui_tweet.php',

   // 			//MÉTODO DE ENVIO PARA O SCRIPT PHP
   // 			method: 'post',

   // 			// QUAIS SÃO AS INFORMAÇÕES ENVIADAS PRA O SCRIPT PHP 
   // 			//(EM JSON POIS PODEMOS ENCAMINHAR VÁRIOS PARAMETROS)
   // 			// data: {chave1: valor1, chave2: valor2, ....}
   // 			//CHAVE NESSE CASO SERÁ O ID DO INPUT TWEET
   // 			//E O VALOR SERÁ O QU FOI DIGITADO NO CAMPO DO INPUT
   // 			// data: {texto_tweet : $('#texto_tweet').val() },
   // 			//INFORMAR QUAL O FORMULÁRIO QUE QUEREMOS E EXECUTAR A FUNÇÃO SERIALIZE,
   // 			data : $('#form_tweet').serialize(),


   // 			//OQ DEVE ACONTECER CASO HAJA SUCESSO NESSA REQUISIÇÃO
   // 			// O DATA RECUPERA O CONTEUDO DA URL INFORMADA ACIMA
   // 			success: function(data)
   // 			{
   // 				alert("Tweet incluido com sucesso");
   // 				$('#texto_tweet').val('');
   // 			}

   // 		});

   // 	}

   // });

   // // CARREGA OS TWETTES APÓS A REQUISIÇÃO GET_TWETT()
   // function atualizaTweet()
   // {
   // 	$.ajax({
   // 		url: 'get_tweet.php',
   // 		success function(data)
   // 		{
   // 			alert(data);
   // 		}

   // 	});

   // }








});