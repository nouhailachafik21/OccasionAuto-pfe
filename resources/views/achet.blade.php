@extends('layout.app')


@section('content')
<main id="main">
    <section id="Services" class="Services">
        <div class="container">


          <div class="row">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box">
                <div class="icon"><i class="fa-solid fa-dollar-sign"></i></div>
                <h4 class="title"><a href="">Meilleur prix</a>
                </h4>
                <p class="description">Bénéficiez des prix de particuliers à particuliers avec la sécurité en plus, avec une garantie mécanique de 3 mois offerte</p>
              </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box">
                <div class="icon"><img src="assets/img/icons-car.png" alt="" style="height:40px;"></div>
                <h4 class="title"><a href="">Voitures inspectées</a></h4>
                <p class="description">Nos experts automobiles effectuent un contrôle, un essai routier et l'historique est vérifié sur chacun de nos véhicules.</p>
              </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-tachometer"></i></div>
                <h4 class="title"><a href="">Prise en charge complète
                </a></h4>
                <p class="description">Nous nous occupons de l'organisation de la vente, des formalités et assurons un paiement 100% sécurisé.</p>
              </div>
            </div>



          </div>

        </div>

      </section>
      <div style="margin-top: 50px" class="section-title" data-aos="fade-up">
        <h2 > ACHETER VOTRE VOITURE
        </h2>
      </div>
           <!-- End Featured Services Section -->

      <section class="featurd-vehicule content-area">

        <div class="container">
          <div class="row">
        @if($vehicules_count!=0)
            <div class="col-lg-8 col-md-12">
               <div class="row">

                <section id="portfolio" class="portfolio">
                    <div class="container">
                      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($vehicules as $vehicule)
                        <div class="col-lg-6 col-md-6 portfolio-item filter-app">
                          <div class="portfolio-wrap">
                            <a href={{url('detail/'.$vehicule->id)}}><img src="{{asset('/assets/img/car/'.$vehicule->img)}}" style=" width : 100% ; height :270px ;"   alt=""></a>

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
               </div>
            </div>
            @else
            <img src="assets/img/aucunR.jpg" style="width:60%;height: 40%;;margin-top:-10%" alt="">
         @endif

            <div class="col-lg-4 col-md-12">
                <div class="sidebar">
                 <h3 class="title-sidebar">
                   Chercher une voiture
                  </h3>
                  <div class="part-search">
                    <form action="{{url('/achet')}}" >
                       <div class="form-group">

                         <select name="marque" id="marque" class="form-control">
                           <option value="" selected disabled hidden>Marque</option>


                           @foreach($marques as $marque)
                           <option  value="{{$marque->id}}">{{$marque->marque}}</option>
                              @endforeach
                         </select>
                       </div>
                       <div class="form-group">
                         <select name="modele" id="modele" class="form-control">
                           <option value="" selected disabled hidden>Modele</option>

                         </select>
                       </div>
                       <div class="form-group">
                         <select name="ville" id="" class="form-control">
                           <option value="" selected disabled hidden>Ville</option>
                           @foreach($villes as $ville)
                           <option value="{{$ville->id}}">{{$ville->ville}}</option>
                              @endforeach
                         </select>
                       </div>
                       <div class="form-group">

                       </div>
                       <div class="form-group">
                         <select name="annee" id="" class="form-control">
                           <option value="" selected disabled hidden>Annee</option>
                           <option value="">2022</option>
                           <option value="">2021</option>
                           <option value="">2020</option>
                           <option value="">2019</option>
                           <option value="">2018</option>
                           <option value="">2017</option>
                           <option value="">2016</option>
                           <option value="">2015</option>
                           <option value="">2014</option>
                           <option value="">2013</option>
                           <option value="">2012</option>
                         </select>
                       </div>
                       <div class="form-group">
                           <select name="categorie" id="" class="form-control">
                               <option value="" selected disabled hidden>  Categorie</option>

                             @foreach($categories as $categorie)
                             <option value="{{$categorie->id}}">{{$categorie->categorie}}</option>
                                @endforeach
                             </select>
                         </div>
                       <div class="form-group">
                         <select name="transmissions" id="" class="form-control">
                           <option value="" selected disabled hidden>Transmission</option>

                           @foreach($transmissions as $transmission)
                           <option value="{{$transmission->id}}">{{$transmission->transmisson}}</option>
                              @endforeach
                           </select>
                       </div>
                       <div class="form-group">
                           <select name="Carburant" id="Carburant" class="form-control">
                               <option value="" selected disabled hidden>Carburant</option>

                             @foreach($Carburants as $Carburant)
                             <option value="{{$Carburant->id}}">{{$Carburant->carburant}}</option>
                                @endforeach
                             </select>
                         </div>
                       <h6 style="color: #0880e8;font-weight: 600;">Prix:</h6>
                       <div class="range-prix">
                         <input name="prix" type="range" id="my-slider" min="0" max="400000" value="0" oninput="slider()" >
                         <div id="slider-value">0</div><span style="color: rgb(70, 70, 70);  font-size: 14.5px;">MAD</span>
                       </div>
                       <button type="submit" class="btn btn-block" style="background: #2291f1; color: #fff; width: 95%; border-radius: 30px;">
                         Chercher
                     </button>
                    </form>
                  </div>
                  <div class="contact-info" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px; margin-top:6px">
                   <h3 class="title-sidebar">
                     Vous avez une question?
                    </h3>
                    <ul>
                      <li><i class="fa-solid fa-location-pin"></i>Espace Paquet, 5 Angle Rue Mohamed Smiha et Rue Pierre Parent, 3ème Etage Bureau 311, Casablanca</li>
                      <li><i class="fa-solid fa-envelope"></i>cdma@gmail.com</li>
                      <li><i class="fa-solid fa-mobile"></i>0522-300-758 / 0522-300-759</li>
                    </ul>
                    <div class="social">
                      <ul>
                        <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                        <a href=""><i class="fa-brands fa-google-plus-g"></i></a>
                        <a href=""><i class="fa-brands fa-instagram"></i></a>
                        <a href=""><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href=""><i class="fa-brands fa-whatsapp"></i></a>
                      </ul>
                    </div>

                 </div>
                </div>

              </div>





          </div>
        </div>
      </section>



</main>

<!--=====End section acheter===========-->
@section('scripts')
<script>

    const mySlider = document.getElementById("my-slider");
    const sliderValue = document.getElementById("slider-value");

    function slider(){

        document.getElementById("my-slider").disabled = false;
        valPercent = (mySlider.value / mySlider.max)*100;
        mySlider.style.background = `linear-gradient(to right, #f6b024 ${valPercent}%, #d5d5d5 ${valPercent}%)`;
        sliderValue.textContent = mySlider.value;
    }
    slider();
  </script>
@endsection
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

@endsection
