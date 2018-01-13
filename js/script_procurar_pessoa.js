$(document).ready(function(){

// ###########################################################################################
// ##################################PROCURAR PESSOAS#########################################
// ###########################################################################################
	
	

	$('#btn_procurar_pessoa').click(function()
	{

		if($('#pessoa').val().length >0)
		{
			$.ajax(
			{
				// ENVIAREMOS NOSSA requisição para a página get_pessoas.php
				url:'get_pessoas.php',

				// ATRAVÉS DO MÉTODO POST
				method: 'post',

				// INFORMAÇÕES ESSAS VINDO DO form_procurar_pessoa 
				//(OQ NÓS MANDAREMOS PARA A URL DE INFORMAÇÃO)
				data : $('#form_procurar_pessoa').serialize(),

				success: function(data)
				{
					$('#pessoas').html(data);

					// $('#pessoa').val('');

					$('.btn_seguir').click(function(){
						var id_usuario = $(this).data('id_usuario');
						$.ajax(
						{
							url:'seguir.php',
							method:'post',

							data:{ seguir_id_usuario: id_usuario },

							success:function(data)
							{
								alert("Registro feito com sucesso");
							}

						});

					});

					$('.btn_deixar_seguir').click(function(){
						var id_usuario = $(this).data('id_usuario');
						$.ajax(
						{
							url:'deixar_seguir.php',
							method:'post',

							data:{ deixar_seguir_id_usuario: id_usuario },

							success:function(data)
							{
								alert("Registro removido com sucesso");
							}

						});

						// alert("Deixar de seguir o id: "+id_usuario);
					});
	
				}
			});
		}

	});


});