@extends('layout')

@section('content')

@include('secciones.home')

<main id="main">

	@include('secciones.servicios')



	<!--==========================
	  Contact Section
	  ============================-->
	  <section id="contact">
	  	<div class="container-fluid">

	  		<div class="section-header">
	  			<h3>Comunícate con Nosotros</h3>
	  		</div>

	  		<div class="row wow fadeInUp">

	  			<div class="col-lg-4">
	  				<div class="social-links d-flex justify-content-center">
	  					<a href="https://wa.me/+5491122547749" target="_blank" ><i class="fab fa-whatsapp"></i></a>
	  					<a href="https://www.facebook.com/codegosoluciones" class="facebook"><i class="fab fa-facebook-f"></i></a>
	  					<a href="https://www.instagram.com/codegosoluciones" class="instagram"><i class="fab fa-instagram"></i></a>
	  				</div>
	  				<div class="text-contact">
	  					<h5>Cuéntanos tu idea, nosotros te ayudaremos a conseguir la solución que vaya con tu proyecto</h5>
	  				</div>
	  			</div>
	  			<div class="col-lg-8">
	  				<div class="form">
	  					<div id="sendmessage">¡Tu mensaje ha sido enviado!</div>
	  					<div id="errormessage">Ocurrió un error, inténtalo nuevamente.</div>
	  					<form method="POST" action="{{ action('ContactoController@enviar') }}" role="form" class="contactForm" id="formulario">
	  						@csrf
	  						<div class="form-row">
	  							<div class="form-group col-lg-6">
	  								<input type="text" name="name" class="form-control" id="name" placeholder="Nombre" data-rule="minlen:2" data-msg="Ingresa tu nombre "/>
	  								<div class="validation"></div>
	  							</div>
	  							<div class="form-group col-lg-6">
	  								<input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Ingresa un email válido" />
	  								<div class="validation"></div>
	  							</div>
	  						</div>
	  						<div class="form-group">
	  							<input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" data-rule="minlen:2" data-msg="Ingresa un asunto para el mensaje" />
	  							<div class="validation"></div>
	  						</div>
	  						<div class="form-group">
	  							<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Por favor, escribe el mensaje" placeholder="Por favor, escribe el mensaje"></textarea>
	  							<div class="validation"></div>
	  						</div>

	  						<div class="form-row">
	  							<div class="form-group col-lg-6">                            
	  								<div class="g-recaptcha" id="feedback-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY')  }}"></div>
	  							</div>
	  							<div class="form-group col-lg-6">  
	  								<div class="text-center align-middle"><button  type="submit" title="Send Message" id="sendMessage-button">ENVIAR</button></div>
	  							</div>
	  						</div>
	  					</form>
	  				</div>
	  			</div>


	  		</div>

	  	</div>

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

						$('#sendmessage').hide('slow');
						$('#errormessage').html(content).show('slow');
					}
				}else{
					try{
						var respuesta=JSON.parse(responseObject.responseText);
						if(respuesta.status==1){
							$('#sendmessage').html(respuesta.text).show('slow');
							$('#errormessage').hide('slow');
							$('#formulario').get(0).reset();
						}else{
							$('#sendmessage').hide('slow');
							$('#errormessage').html(respuesta.text).show('slow');

						}
					}catch(e){
						$('#errormessage').html('Error procesando la solicitud');
						$('#errormessage').show('slow');
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
