<!-- /*
    * Template Name: Strategy
    * Template Author: Untree.co
    * Tempalte URI: https://untree.co/
    * License: https://creativecommons.org/licenses/by/3.0/
    */ -->
    <!doctype html>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="author" content="Untree.co">
      <link rel="shortcut icon" href="favicon.png">
    
      <meta name="description" content="" />
      <meta name="keywords" content="" />
    
      <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('asset_public/fonts/icomoon/style.css') }}">
    
      <link rel="stylesheet" href="{{ asset('asset_public/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('asset_public/css/jquery-ui.css') }}">
      <link rel="stylesheet" href="{{ asset('asset_public/css/owl.carousel.min.css') }}">
      <link rel="stylesheet" href="{{ asset('asset_public/css/owl.theme.default.min.css') }}">
      <link rel="stylesheet" href="{{ asset('asset_public/css/owl.theme.default.min.css') }}">
    
      <link rel="stylesheet" href="{{ asset('asset_public/css/jquery.fancybox.min.css') }}">
    
      <link rel="stylesheet" href="{{ asset('asset_public/css/bootstrap-datepicker.css') }}">
    
      <link rel="stylesheet" href="{{ asset('asset_public/fonts/flaticon/font/flaticon.css') }}">
    
      <link rel="stylesheet" href="{{ asset('asset_public/css/aos.css') }}">
    
      <link rel="stylesheet" href="{{ asset('asset_public/css/style.css') }}">
      <title>@yield('titre1')</title>
    </head>
    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    
      <div class="site-wrap">
    
        <div class="site-mobile-menu site-navbar-target">
          <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
              <span class="icon-close2 js-menu-toggle"></span>
            </div>
          </div>
          <div class="site-mobile-menu-body"></div>
        </div>
    
        <div class="top-bar py-2" id="home-section">
          <div class="container">
            <div class="row">
              <div class="col-md-6 text-center text-lg-right order-lg-2">
                <ul class="social-media m-0 p-0">
                  <li><a href="#" class="p-2"><span class="icon-facebook"></span></a></li>
                  <li><a href="#" class="p-2"><span class="icon-twitter"></span></a></li>
                  <li><a href="#" class="p-2"><span class="icon-instagram"></span></a></li>
                  <li><a href="#" class="p-2"><span class="icon-linkedin"></span></a></li>
                </ul>
              </div>
              <div class="col-md-6 text-center text-lg-left order-lg-1">
                <p class="mb-0 d-inline-flex">
                  <span class="mr-3"><a href="tel://#" class="d-flex align-items-center"><span class="icon-phone mr-2"></span><span>+1 234 5678 9101</span></a></span>
                  <span><a href="tel://#" class="d-flex align-items-center"><span class="icon-envelope mr-2"></span><span>info@domain.com</span></a></span>
                </p>
              </div>
    
            </div>
          </div> 
        </div>
    
     @include('public.layouts.partials.header2')
    
    
        <!-- <div class="particlehead"></div> -->
        <!-- <div class="container"> -->
         @yield('contenu1') 
          <!-- </div> -->
    
        
          <footer class=" " style="margin-top: 8vh;">
            <div class="container">
              <div class="row">
                <div class="col-md-9">
                  <div class="row">
                    <div class="col-md-5">
                      <h2 class="footer-heading mb-4" style="font-size: 20px;">A propos</h2>
                      <p>Une application interactive conçue pour aider les apprenants à maîtriser la transcription du pluriel des mots en Mooré, offrant une variété d'exercices ludiques pour renforcer les compétences linguistiques</p>
                    </div>
                    <div class="col-md-3 ml-auto">
                      <h2 class="footer-heading mb-4" style="font-size: 20px;">Options</h2>
                      <ul class="list-unstyled">
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#">Inscription</a></li>
                        <li><a href="#">Connexion</a></li>
                        
                      </ul>
                    </div>
                    <div class="col-md-3">
                      <h2 class="footer-heading mb-4" style="font-size: 20px;">Suivez nous</h2>
                      <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                      <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                      <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                      <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <h2 class="footer-heading mb-4" style="font-size: 20px;">Subscribe Newsletter</h2>
                  <form action="#" method="post" class="subcription-form">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-primary text-white" type="button" id="button-addon2">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              
            </div>
          </footer>
    
        </div> <!-- .site-wrap -->
    
        <script src="{{ asset('asset_public/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('asset_public/js/jquery-migrate-3.0.1.min.js') }}"></script>
        <script src="{{ asset('asset_public/js/jquery-ui.js') }}"></script>
        <script src="{{ asset('asset_public/js/popper.min.js') }}"></script>
        <script src="{{ asset('asset_public/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('asset_public/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('asset_public/js/jquery.stellar.min.js') }}"></script>
        <script src="{{ asset('asset_public/js/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('asset_public/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('asset_public/js/jquery.easing.1.3.js') }}"></script>
        <script src="{{ asset('asset_public/js/aos.js') }}"></script>
        <script src="{{ asset('asset_public/js/jquery.fancybox.min.js') }}"></script>
        <script src="{{ asset('asset_public/js/jarallax.min.js') }}"></script>
        <script src="{{ asset('asset_public/js/jarallax-element.min.js') }}"></script>
        <script src="{{ asset('asset_public/js/lozad.min.js') }}"></script>
        <script src="{{ asset('asset_public/js/modernizr.min.js') }}"></script>
        <script src="{{ asset('asset_public/js/three.min.js') }}"></script>
        <script src="{{ asset('asset_public/js/TweenMax.min.js') }}"></script>
        <script src="{{ asset('asset_public/js/OBJLoader.js') }}"></script>
        <script src="{{ asset('asset_public/js/ParticleHead.js') }}"></script>
    
        <script src="{{ asset('asset_public/js/jquery.sticky.js') }}"></script>
    
        <script src="{{ asset('asset_public/js/typed.js') }}"></script>
        <script>
          var typed = new Typed('.typed-words', {
            strings: ["Des Exercices","La pratique"," Des leçons"],
            typeSpeed: 80,
            backSpeed: 80,
            backDelay: 4000,
            startDelay: 1000,
            loop: true,
            showCursor: true
          });
        </script>
    
        <script src="{{ asset('asset_public/js/main.js') }}"></script>
    
        
    
      </body>
      </html>
    