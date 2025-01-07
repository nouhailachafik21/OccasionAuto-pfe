@extends('layout.app')


@section('content')

<main id="main">
<div class="s002">
       <form action="{{url('/achet')}}" method="GET">
        <fieldset>
        <legend  style="font-size: 40px"> ACHETER ET VENDRE TA VOITURE D'OCCASION EN TOUTE TRANQUILLITÉ</legend>
        </fieldset>

        <div class="inner-form">
              <div class="input-field fouth-wrap">
                <select  data-trigger=""  name="marque" id="marque">
                    @foreach($marques as $marque)
                   <option value="{{$marque->id}}">{{$marque->marque}}</option>
                    @endforeach
                       <option value="" disabled selected hidden>Marque</option>
                </select>
              </div>
            <div class="input-field fouth-wrap">
                <select  class="modele"  name="modele" id="modele"  >
                    <option value="" disabled selected hidden >Modele</option>
                </select>
              </div>
              <div class="input-field fouth-wrap">

                <select data-trigger=""  name="ville" id="ville" >
                    @foreach($villes as $ville)
                 <option value="{{$ville->id}}">{{$ville->ville}}</option>
                    @endforeach
                    <option value="" disabled selected hidden>Ville</option>
                   </select>
              </div>
              <div class="input-field fouth-wrap">
                <select data-trigger=""  name="Carburant" id="Carburant" >
                    @foreach($Carburants as $carburant)
                 <option value="{{$carburant->id}}">{{$carburant->carburant}}</option>
                    @endforeach
                    <option value="" selected disabled hidden>Carburant</option>

                   </select>

              </div>
          <div class="input-field fouth-wrap">

            <select data-trigger=""  name="transmissions" id="transmissions" >
                @foreach($transmissions as $transmission)
             <option value="{{$transmission->id}}">{{$transmission->transmisson}}</option>
                @endforeach
                <option value="" selected disabled hidden>Transmission </option>

               </select>
          </div>

          <div class="input-field fifth-wrap">
            <button class="btn-search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </div>
        </div>
      </form>
    </div>
  <!--End section search-->
  <!-- ======= Featurd Car======= -->

<section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>  Nos dernières voitures d’occasions
        </h2>
      </div>


      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
        @foreach ($vehicules as $vehicule)
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <a href="{{ route("vehicule.detail",$vehicule->id )}}"><img src="{{asset('/assets/img/car/'.$vehicule->img)}}" style=" width : 100% ; height :270px ;"   alt=""></a>

            <div class="portfolio-info">
              <h4>{{$vehicule->prix}} MAD</h4>
              <div class="portfolio-links">

                <a  href="{{ route("vehicule.detail",$vehicule->id )}}" title="Detail"><i class="bi bi-eye"></i></a>
                <a  title="More Details" href="{{asset('/assets/img/car/'.$vehicule->img)}}" data-fancybox="images" data-caption="" data-width="1500" data-height="1000"><i class="fa-solid fa-expand" ></i></a>
            </div>
            </div>
          </div>
          <div class="car-details" style="display: flex;flex-direction: column;">

            <div class="name" style="display: flex;justify-content: space-between">
                <h4 style="font-weight: bold">{{$vehicule->marque}}</h4>
                <form action="{{route('cart.store')}}" method="POST" >
                    @csrf
                    <input type="hidden" value="{{ $vehicule->id }}" name="id">
                    <input type="hidden" value="{{ $vehicule->modele }}" name="modele">
                    <input type="hidden" value="{{ $vehicule->marque }}" name="marque">
                    <input type="hidden" value="{{ $vehicule->img }}" name="path">
                    <input type="hidden" value="{{ $vehicule->prix }}" name="prix">
                    <button title="Ajouter au panier" class="btn btn-primary btn-circle btn-circle-sm m-1"><i class="fa-solid fa-cart-plus"></i></button>
                </form>

            </div>
            <div class="details-list">
                <li><i class="fa-solid fa-gas-pump"></i> {{$vehicule->carburant}}</li>
                <li><i class="fa-solid fa-road"></i> {{$vehicule->kilometrage}}</li>
                <li><i class="fa-solid fa-gears"></i> {{$vehicule->transmisson}}</li>
                <li><i class="fa-solid fa-calendar"></i> {{$vehicule->annee_mc}}</li>
            </div>
        </div>
        </div>


 @endforeach

      </div>

    </div>
  </section>
<!-- End Featurdb Car -->

  <!--=======section Question-->
   <!--satrt question-->
   <section id="faq" class="faq section-bg">
    <div class="container">

      <div class="section-title">
        <h2>LES ÉTAPES DE VENTE</h2>
      </div>

      <ul class="faq-list">

        <li>
          <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Bénéficiez d’une inspection automobile gratuite en toute sécurité <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
          <div id="faq1" class="collapse" data-bs-parent=".faq-list">
            <p>
              Un professionnel réalise un diagnostic et un reportage photos d’une qualité professionnelle. Exigez une sécurité sans faille ! Nos professionnels de l’automobile portent des gants, un masque et respectent les gestes barrières. Une fois le véhicule inspecté, il le désinfecte. Continuez de rouler en toute sécurité le temps de vous trouver un acheteur !
            </p>
          </div>
        </li>

        <li>
          <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Nous fixons le prix de vente ensemble, c'est vous qui décide, nous sommes là pour vous conseiller !<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
          <div id="faq2" class="collapse" data-bs-parent=".faq-list">
            <p>
              Une fois le rapport d'inspection délivré, nous fixons le prix de vente définitif ensemble et mettons en ligne votre annonce.
            </p>
          </div>
        </li>

        <li>
          <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Nous trouvons un acheteur en 3 semaines<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
          <div id="faq3" class="collapse" data-bs-parent=".faq-list">
            <p>
              Nous mettons en avant votre annonce sur tous les réseaux sociaux et en assurons la promotion, afin de la rendre la plus visible possible et de trouver un acheteur rapidement.
            </p>
          </div>
        </li>

        <li>
          <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Nous vérifions le moyen de paiement de l'acheteur <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
          <div id="faq4" class="collapse" data-bs-parent=".faq-list">
            <p>
              Nous vérifions la solvabilité de l'acheteur et son moyen de paiement(chèque de banque ou virement). Aucun ne risque d'arnaque,tout est sécurisé.
            </p>
          </div>
        </li>
        <li>
          <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Nous encadrons la transaction et nous occupons de toutes les formalités<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
          <div id="faq6" class="collapse" data-bs-parent=".faq-list">
            <p>
              Nous organisons le rendez-vous de vente encadré par un expert automobiles de votre ville. Nos professionnels de l’automobile portent un masque et respectent les gestes barrières. Une fois la vente conclue, nous désinfectons impeccablement le véhicule. L’acheteur prend le volant de sa nouvelle voiture en toute sécurité.
            </p>
          </div>
        </li>
      </ul>
      <div class="carousel-container">
        <a href="#" class="btn-get-started animate__animated animate__fadeInUp scrollto">Vendre votre voiture</a>
      </div>

    </div>
  </section><!-- End Frequently Asked Questions Section -->

 <!--madmouna express-->

 <section class="services">
  <div class="container">
    <div class="section-title">
      <h2>MADMOUNA Express</h2>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="service-item" >
          <div class="icon-item">
            <i class="fa-solid fa-check"></i>
          </div>
          <div class="down-content">
            <h4 style="font-size: 20px;font-family: 600;">Qualité</h4>
            <p>Inspection internationale par <br>numéro de châssis  <br>
              Rapport digital complet joint avec photos  <br> Inspection effectuée par un expert assermenté</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="service-item-import " style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
          <div class="icon-item">
            <i class="fa-solid fa-file"></i>
          </div>
          <div class="down-content">
            <h4 style="font-size: 20px;font-weight: 600;">Rapport complet au meilleur prix</h4>
             <p>Plus de 150 points d’inspections <br> Check par PC, Intérieur, Extérieur, Mécanique Électronique
              <br> Inspection d’accident avec outil spécialisé <br> <span style="font-size: 19px;color:  rgba(5, 87, 158, 0.9);font-weight: 700"> 350 DH </span> seulement </p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="service-item">
          <div class="icon-item">
            <i class="fa-solid fa-phone"></i>
          </div>
          <div class="down-content">
            <h4 style="font-size: 20px;font-weight: 600;">Disponibilité et mobilité</h4>
            <p>Nous nous déplaçons où que vous soyez<br>  Prise de RDV online, par  br ou par téléphone
              <br> Inspection réalisée sous 24h <br>  Disponible 7/7 soirs, Weekend et <br> jours fériés</p>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-container">
      <a href="#" class="btn-get-started animate__animated animate__fadeInUp scrollto">Madmouna Express</a>
    </div>
  </div>
 </section>

 <!--=============About===============-->
 <br> <br>
 <section class="best-features about-features">
  <div class="container">
    <div class="section-title">
      <h2>Qui sont nos experts automobiles ?</h2>
    </div>
    <br> <br> <br> <br>
    <div class="row">
      <div class="col-md-6">
        <div class="right-image" style="margin-right: 30px;height: 500px;width: 80%;">
          <img src="assets/img/Nphoto.jpg" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="left-content">
          <p style="color:  #787878"> <span style="font-size: 22px;color: #ffb400"> Madmouna.ma </span>   travaille en partenariat avec des réseaux d'experts automobile professionnels du secteur automobile. Ils sont qualifiés et formés pour répondre à toutes  les problématiques en matière d'automobile.
             Nos professionnels de l’automobile portent un masque, respectent les gestes barrières et nettoient les véhicules.
            <br>
            La plateforme qui vous garantit la vente et l’achat  d’une voiture inspectées
            <br>
            Toutes nos voitures sont vendues avec un certificat de nos experts.</p>
        </div>
      </div>

    </div>
  </div>
 </section>
    <!--End About-->
    <!----section Team-->
    <!----section Team
    <section id="team" class="team">
      <div class="container">

        <div class="section-title" >
          <h2>NOS EXPERTS</h2>
        </div>

        <div class="member">
            <div class="itembox">
              <img src="assets/img/directeur/chafiki.png" alt="" class="img-member">
              <a href="#"> <h4 style="font-weight: 500;">CHAFIKI Abdelmajud </h4> </a>
              <hr>
              <p style="font-weight: 600;color:  #787878">Expert automobile Cabinet Poly Expertive</p>
              <span style="font-weight: 600;color:  #787878">05 28 22 27 26</span>
            </div>
            <div  class="itembox">
              <img src="assets/img/directeur/abdboutayeb.jfif" alt="" class="img-member">
               <a href=""><h4 style="font-weight: 500;">BOUTAYEB Abdelmoutalib </h4> </a>
              <hr>
              <p style="font-weight: 600;color:  #787878">Expert automobile CEBA</p>
              <span style="font-weight: 600;color:  #787878">06 61 93 97 45</span>
            </div>
            <div  class="itembox">
              <img src="assets/img/directeur/khamlichi.jpg" alt="" class="img-member">
              <a href=""><h4 style="font-weight: 500;">KHAMLICHI M'hamed </h4></a>
              <hr>
              <p style="font-weight: 600;color:  #787878">Expert automobile Cabek</p>
              <span style="font-weight: 600;color:  #787878">06 61 98 24 32</span>
            </div>
        </div>

      </div>
    </section>-->
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contactez-nous</h2>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-right">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Espace Paquet, 5 Angle Rue Mohamed Smiha et Rue Pierre Parent, 3ème Etage Bureau 311, Casablanca</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>cdmaassistance@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4> Telephone:</h4>
                <p>+212 (0) 522 300 758/759</p>
              </div>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.426907973347!2d-7.611109484425543!3d33.59422614917363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7cdb820a0260b%3A0x93fb276469a79a0b!2sCDMA%20Solutions!5e0!3m2!1sen!2sbg!4v1645718216481!5m2!1sen!2sbg" width="100%" height="384px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-left">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form" >
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Nom</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <label for="name">Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <label for="name">Sujet</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group mt-3">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Chargement</div>
                <div class="error-message"></div>
                <div class="sent-message">Votre message a été envoyé. Merci!</div>
              </div>
              <div class="text-center"><button type="submit">Envoyer Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
</div>
  </main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function(){
     $('#marque').change(function(){
       var marque =$(this).val();
       $('#modele').html('');
       $.ajax({
         url:'/get-modeleIndex',
         type:'POST',
         data:{"_token":"{{ csrf_token() }}","marque_id":marque},
         dataType: "json",
         success:function(data){
           console.log(data)
           $('#modele').append('<option value="" selected disabled hidden >Modele</option>');
           $.each(data,function(key,modele){
             $('#modele').append('<option value="'+modele.id+'">'+modele.modele+'</option>');
           });
         }
       });
     });
   });
     </script>
<script>
    let slideIndex = 1;
    showSlide(slideIndex);

    function openLightbox() {
      document.getElementById('Lightbox').style.display = 'block';
    };

    function closeLightbox() {
      document.getElementById('Lightbox').style.display = 'none';
    };

    function changeSlide(n) {
      showSlide(slideIndex += n);
    };

    function toSlide(n) {
      showSlide(slideIndex = n);
    };

    function showSlide(n) {
      const slides = document.getElementsByClassName('slide');
      let modalPreviews = document.getElementsByClassName('modal-preview');

      if (n > slides.length) {
        slideIndex = 1;
      };

      if (n < 1) {
        slideIndex = slides.length;
      };
      for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      };

      for (let i = 0; i < modalPreviews.length; i++) {
        modalPreviews[i].className = modalPreviews[i].className.replace(' active', '');
      };

      slides[slideIndex - 1].style.display = 'block';
      modalPreviews[slideIndex - 1].className += ' active';
    }
</script>
<script src="js/extention/choices.js"></script>
<script>
  const choices = new Choices('[data-trigger]',
  {
    searchEnabled: false,
    itemSelectText: '',

  });

</script>
@endsection
