<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400" rel="stylesheet" />
  <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">


  <link rel="icon"  href="{{asset('assets/img/madmouna_l.png')}}">

  <!-- Favicons -->

  <style>

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      min-width: 200px;
      background: rgba(0, 0, 0, 0.5);
      transition: all 0.5s;
      z-index: 997;

    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      margin: 20px;
    }

    .dropdown-content a:hover { text-decoration: underline 2px #f6b024;}

    .dropdown:hover .dropdown-content {display: block;
    }
    </style>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Madmouna</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets/css/fontawesome-free-6.0.0-web/css/all.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/achet.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/vendre.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/express.css')}}">
  <link href="{{asset('assets/css/voiture_neuf.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/jquery.fancybox.min.css')}}">
  <link rel="shortcut icon" href="../favicon.ico">


@yield('styles')

  <!-- =======================================================
  * Template Name: Anyar - v4.7.0
  * Template URL: https://bootstrapmade.com/anyar-free-multipurpose-one-page-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

<body>

 <!-- ======= Top Bar ======= -->
 <div id="topbar" class="fixed-top d-flex align-items-center ">
    <div class="container contact-left d-flex align-items-center">
      <i class="bi bi-envelope-fill"></i><a href="mailto:cdmaassistance@gmail.com">cdmaassistance@gmail.com</a>
      <i class="bi bi-phone-fill phone-icon"></i><a href="tel:+212 522-300-758 ">0522-300-758 / 0522-300-759</a>
    </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center ">
  <div class="container d-flex align-items-center justify-content-between">

    <h1 class="logo"><a href="index.html"><img src="{{asset('assets/img/madmouna_logo.png')}}" alt=""></a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href=index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar">
        <ul id="nav_li">
         <!-- <li><a class="nav-link scrollto"   href="/voiture_neuf"  >Voiture Neuf</a></li>-->
          <li><a class="nav-link scrollto "   href="{{ route("vehicule.index") }}"  >Acceuil</a></li>
          <li><a class="nav-link scrollto" href="{{ route("vehicule.achet") }}">Acheter</a></li>
          <li><a class="nav-link scrollto " href="{{ route("vehicule.vendre") }}"  >Vendre</a></li>
          <li><a class="nav-link scrollto"  href="{{ route("Express") }}">M.Express</a></li>
          <li><a class="nav-link scrollto"  href="{{ route("cart.list") }}" >Panier {{ Cart::Total()}}</a></li>

          @if (Auth::check())
          @if (auth()->user()->type=="Expert")
          <li >
              <div class="dropdown">
                <a class="nav-link scrollto" >Expert ({{  (\App\Models\Mission::count())}})</a>

          <div class="dropdown-content">
            <a class="nav-link scrollto" href="{{route("Expert.vehicules")}}">Vehicules</a>
            <a href="{{route("mission.Expert")}}">Missions ({{\App\Models\Mission::count()}}) </a>
          </div>

        </div>

          </li>
          <li><a class="nav-link scrollto" ><i class="fa-solid fa-user"> </i> &nbsp;{{auth()->user()->name}}</a></li>

          <li><a class="nav-link scrollto" href="/Connexion">Déconnexion</a></li>

        @endif
        @if (auth()->user()->type=="Gestionnaire")
            <li >
                <div class="dropdown">
            <a class="nav-link scrollto">Gestionnaire({{  (\App\Models\Demande::count()  + \App\Models\Mission::count())}})

               </a>
            <div class="dropdown-content">
              <a href="{{ route("vehicule.demande")}}">Demanades ({{\App\Models\Demande::count() }})</a>
              <a href="{{route("mission.index")}}">Missions ({{\App\Models\Mission::count()}}) </a>

            </div>

          </div>
            </li>
            <li><a class="nav-link scrollto" href="{{route("vehicule.vehicules")}}">Administration</a></li>
            <li><a class="nav-link scrollto" ><i class="fa-solid fa-user"> </i> &nbsp;{{auth()->user()->name}}</a></li>
            <li><a class="nav-link scrollto" href="/Connexion">Déconnexion</a></li>

          @endif

          @endif
        </ul>
       <i class="bi bi-list mobile-nav-toggle"></i>


      </nav>
<!-- .navbar -->

  </div>
</header><!-- End Header -->

  @yield('content')


  <footer id="footer">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-xl-10">
            <div class="row">
              <div class="col-lg-3 col-md-6 footer-links">
                <h4> LIENS UTILES</h4>
                <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="/Voiture_neuf">Voiture Neuf</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="/index">Acceuil</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="/achet">Acheter</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="/vendre">Vendre</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="/Express">M.Express</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{route('cart.list')}}"> Panier {{ Cart::Total()}}</a></li>
                </ul>
              </div>
              <div class="col-lg-3 col-md-6 footer-contact">
                <h4>Contacter-Nous</h4>
                <p>
                  Espace Paquet, 5 Angle Rue Mohamed Smiha et Rue Pierre Parent,<br>
                   3ème Etage Bureau 311, Casablanca <br><br>
                  <strong>WathsApp:</strong> +212 (0) 522 300 758<br>
                  <strong>Telephone:</strong> +212 (0) 522 300 758/759<br>
                  <strong>Email:</strong> <a href="#" class="_cf_email_" style="color: #fff;">cdmaassistance@gmail.com</a><br>
                </p>

              </div>

              <div class="col-lg-3 col-md-6 footer-info">
                <h3>QUI SOMMES-NOUS ?</h3>
                <p> <span style="color: #ffb400;font-weight: 600;">Madmouna</span>  est un site de vente et d'achat des automobiles d'occasions, travaille en partenariat avec des réseaux d'experts automobiles professionnels du secteur automobile. Ils sont qualifiés et formés pour répondre à toutes les problématiques en matière d'automobile.</p>
              </div>
              <div class="col-lg-3 col-md-6 footer-info">
                <h3>Réseaux Sociaux</h3>
                <div class="social-links mt-3">
                  <a href="https://api.whatsapp.com/send/?phone=212777389119&text&app_absent=0" class="wathsapp"><i class="fa-brands fa-whatsapp"></i></a>
                  <a href="https://www.facebook.com/Madmounama-102415355059151" class="facebook"><i class="bx bxl-facebook"></i></a>
                  <a href="https://www.instagram.com/madmouna.ma/?hl=fr" class="instagram"><i class="bx bxl-instagram"></i></a>
                  <a href="#" class="google-plus"><i class="fa-brands fa-google-plus-g"></i></a>
                  <a href="https://www.linkedin.com/company/madmouna-ma/" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


  </footer><!-- End Footer -->





<!-- GetButton.io widget -->
@if(auth::check())
<script type="text/javascript">
  (function () {
      var options = {
          whatsapp: "+212777389119", // WhatsApp number
          email: "cdmaassistance@gmail.com", // Email
          call_to_action: "Contactez-nous", // Call to action
          button_color: "#FFB400", // Color of button
          position: "right", // Position may be 'right' or 'left'
          order: "whatsapp,email", // Order of buttons
      };
      var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
      var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
      s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
      var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
  })();
</script>
@endif
<!-- /GetButton.io widget -->


  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>



  <!-- Template Main JS File -->
  @yield('scripts')
  <script src="{{asset('assets/jquery.fancybox.min.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>

 <!-- @if(session()->has('success'))
  <div class="alert alert-success">
      {{ session()->get('success') }}
  </div>
@endif-->

 <script>
   $('[data-fancybox="images"]').fancybox({
  buttons : [
    'slideShow',
    'share',
    'zoom',
    'download',
    'fullScreen',
    'close'
  ],
  thumbs : {
    autoStart : true
  }

});
 </script>

<script>
    var acc = document.getElementsByClassName("accordion");
     var i;
     for (i = 0; i < acc.length; i++) {
     acc[i].addEventListener("click", function() {
     this.classList.toggle("active");
     var panel = this.nextElementSibling;
     if (panel.style.maxHeight) {
     panel.style.maxHeight = null;
     } else {
     panel.style.maxHeight = panel.scrollHeight + "px";
     }
     });
     }
     </script>
     <script type="text/javascript">
     var counter = 1;
     setInterval(function(){
         document.getElementById('radio' + counter).checked = true;
         counter++;
         if(counter > 4){
         counter = 1;
         }
     }, 10000);
 </script>
</body>

</html>
