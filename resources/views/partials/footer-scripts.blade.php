
<!-- JavaScript Libraries -->
<script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('lib/jquery/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/mobile-nav/mobile-nav.js') }}s"></script>
<script src="{{ asset('lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
<!-- Contact Form JavaScript File -->
<script src="{{ asset('contactform/contactform.js') }}"></script>

<script src="{{ asset('lib/alertifyjs/alertify.min.js') }}"></script>

<!-- Template Main Javascript File -->
<script src="{{ asset('js/main.js') }}"></script>

<script type="text/javascript">
	
  //Procesar el texto de la validación de los campos en el request
  function processValidation(json){
  	var mensaje="";
  	for(var o in json){
  		$.each(json[o], function(index,value){
  			mensaje+=value+"<br>";
  		})
  	}
  	return mensaje;
  }


</script>