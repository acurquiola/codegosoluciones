@extends('layout')

@section('content')

@include('secciones.home')

<main id="main">

	@include('secciones.servicios')
	@include('secciones.contacto')


@endsection('content')

@section('script')
<script>

	$(document).ready(function() {
		$('#sendMessage-button').click(function ( e ) {
			var data = $('#formulario').serializeArray();
			var method = 'POST';
			var url = "{{ action('ContactoController@enviar') }}";

			$.ajax(
				{data:data,
					method:method,
					url:url
				}
			)
			.always(function(response, status, responseObject){
				if(status=="error"){
					if(response.status==422){
						var content       = document.createElement('div');
						content.innerHTML = processValidation(response.responseJSON.errors);
	 					grecaptcha.reset();
	 					alertify.error(content);
					}
				}else{
					try{
						var respuesta=JSON.parse(responseObject.responseText);
						if(respuesta.status==1){
	 						grecaptcha.reset();
							$('#formulario').get(0).reset();
	 						alertify.success(respuesta.text);
						}else{
	 						grecaptcha.reset();
	 						alertify.success(respuesta.text);
						}
					}catch(e){
 						grecaptcha.reset();
 						alertify.success('Error procesando la solicitud');
					}
				}

			})

			e.preventDefault();
		})
	})

	$('#emailBtn').click(function(e){
		var data   = $('#formulario-email').serializeArray();
		var method = 'POST';
		var url    = "{{ action('CorreoController@store') }}";

		$.ajax(
			{data:data,
				method:method,
				url:url
			}
		)
		.always(function(response, status, responseObject){
			if(status=="error"){
				if(response.status==422){
					var content       = document.createElement('div');
					content.innerHTML = processValidation(response.responseJSON.errors);
					
 					alertify.error(content); 
				}
			}else{
				try{
					var respuesta=JSON.parse(responseObject.responseText);
					if(respuesta.status==1){
	 					alertify.success(respuesta.text); 
	 					$('#formulario-email').get(0).reset();
					}else{
	 					alertify.error(respuesta.text); 
					}
				}catch(e){
	 				alertify.error(respuesta.text); 
				}
			}

		})

		e.preventDefault();
	});
</script>
@endsection('script')
