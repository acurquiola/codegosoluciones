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
          <h3>Comunícate con nosotros</h3>
        </div>

        <div class="row wow fadeInUp">


  
          
          <div class="col-lg-12">
            <div class="row justify-content-lg-center">
              <div class="form">
              <div class="social-links justify-content-md-center">
                <a href="https://wa.me/+5491122547749" target="_blank" ><i class="fab fa-whatsapp"></i></a>
                <a href="https://www.facebook.com/codegosoluciones" class="facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/codegosoluciones" class="instagram"><i class="fab fa-instagram"></i></a>
              </div>
                <div id="sendmessage">¡Tu mensaje ha sido enviado!</div>
                <div id="errormessage"></div>
                <form action="" method="post" role="form" class="contactForm">
                  <div class="form-row">
                    <div class="form-group col-lg-6">
                      <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                      <div class="validation"></div>
                    </div>
                    <div class="form-group col-lg-6">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                    <div class="validation"></div>
                  </div>
                  <div class="text-center"><button type="submit" title="Send Message">ENVIAR</button></div>
                </form>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->

  </main>

@endsection('content')