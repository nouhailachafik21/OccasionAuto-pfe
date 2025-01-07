@extends('layout.app')


@section('content')
<main id="main">

    <section id="serviceVendre" class="serviceVendre">
        <div class="container">


          <div class="row">
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box">
                <div class="icon"><i class="fa-solid fa-dollar-sign"></i></div>
                <h4 class="title"><a href="">Transaction sécurisée

                </a></h4>
                <p class="description">Paiement vérifié, vente encadrée par un professionnel de l’automobile</p>
              </div>
            </div>

            <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box">
                <div class="icon"><img src="assets/img/icons-car.png" alt="" style="height:40px;"></div>
                <h4 class="title"><a href="">Meilleur prix
                </a></h4>
                <p class="description">20% de plus qu’une reprise en concession, aucun frais de services pour vous</p>
              </div>
            </div>

            <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-tachometer"></i></div>
                <h4 class="title"><a href="">Vente sans contact
                </a></h4>
                <p class="description">Paiement vérifié, vente encadrée par un professionnel de l’automobile</p>
              </div>
            </div>

            <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box">
                  <div class="icon"><i class="bx bx-tachometer"></i></div>
                  <h4 class="title"><a href="">Gestion des formalités

                  </a></h4>
                  <p class="description">Edition des documents de cession et demande de carte grise</p>
                </div>
              </div>
              <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box">
                  <div class="icon"><i class="bx bx-tachometer"></i></div>
                  <h4 class="title"><a href="">Visibilité maximale

                  </a></h4>
                  <p class="description">Diagnostic gratuit, 40 photos HD, vidéo 360°

                </p>
                </div>
              </div>
              <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box">
                  <div class="icon"><i class="bx bx-tachometer"></i></div>
                  <h4 class="title"><a href="">Vente rapide
                  </a></h4>
                  <p class="description"><a href="">90% des ventes conclues en moins de 2 semaines</a> </p>
                </div>
              </div>


          </div>

        </div>
      </section>

      <section class="contact-section">
        <div class="section-title">
            <h2>Vendez votre voiture au meilleur prix et en toute sécurité,</h2>
            <h2>  on s'occupe de tout!</h2>
           </div>
        <div class="form-v10" style="margin-top: -50px">
            <div class="page-content">
                <div class="form-v10-content">
                    <form class="form-detail" action="{{route('vendeur.store')}}" method="POST" id="myform">
                        @csrf
                        <div class="form-left">
                            <h2 style="text-align: center;color:rgb(94, 94, 94);margin-bottom: 114px">INFORMATIONS VENDEUR   </h2>

                            <div class="form-group">
                                <div class="form-row form-row-1">
                                    <input type="text" name="prenom" id="prenom" class="input-text" placeholder="Prenom *" required>
                                </div>
                                <div class="form-row form-row-2">
                                    <input type="text" name="nom" id="nom" class="input-text" placeholder="Nom *" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <input type="Email" name="email" class="company" id="email" placeholder="Email *"  required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
                            </div>
                            <div class="form-row">
                                <select name="ville" required>
                                    <option >choissez votre Ville *</option>
                                    <option >casablanca</option>
                                    <option >Rabat</option>
                                    <option >Fes</option>
                                    <option >Tanger</option>
                                    <option >Marrakach</option>
                                    <option >Agadir</option>
                                    <option >Beni mellal</option>
                                    <option >Mohamadia</option>
                                    <option >tetouan</option>
                                    <option >meknes</option>
                                </select>
                            </div>
                            <div class="form-row">
                                <input type="tel" name="tel" class="company" id="tel" pattern="[0-9]{2}[0-9]{8}"   placeholder="Telephone *" required>
                            </div>
                        </div>
                        <div class="form-right">
                            <h2 style="text-align: center;color:#fff">INFORMATIONS VEHICULE  </h2>
                            <div class="form-row">
                                <select class="form-select" name="marque" id="marque" required >
                                    <option value="" selected disabled hidden>Marque *</option>
                                    @foreach($marques as $marque)
                                   <option value="{{$marque->marque}}">{{$marque->marque}}</option>
                                    @endforeach
                                   </select>

                            </div>
                            <div class="form-row" required>
                                <select class="form-select" name="modele" id="modele"  required>
                                    <option value="" selected disabled hidden>Modele *</option>
                                   </select>

                            </div>
                            <div class="form-row" required>
                                   <input type="text" name="prix" class="zip" id="prix" placeholder="Prix *" required>
                            </div>
                            <div class="form-group">
                                <div class="form-row form-row-1">
                                    <input type="text" name="matricule" class="zip" id="matricule" placeholder="Matricule *" required>
                                </div>
                                <div class="form-row form-row-2">
                                        <input type="text" name="annee" class="zip" id="annee" placeholder="Année *" required>
                                </div>
                            </div>
                            <div class="form-row" >
                                <select class="form-select" name="transmission" id="transmissions" required>
                                    <option value="" selected disabled hidden>Transmission *</option>
                                    @foreach($transmissions as $transmission)
                                 <option value="{{$transmission->transmisson}}">{{$transmission->transmisson}}</option>
                                    @endforeach
                                   </select>

                            </div>
                            <div class="form-row">
                                <select class="form-select" name="Carburant" id="Carburant" required >
                                    <option value="" selected disabled hidden>Carburant *</option>
                                    @foreach($Carburants as $carburant)
                                 <option value="{{$carburant->carburant}}">{{$carburant->carburant}}</option>
                                    @endforeach
                                   </select>

                            </div>

                            <div class="form-row-last">
                                <input type="submit" name="Envoyer" class="Envoyer" value="Envoyer" >
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </section>
  </main>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @if (session()->has('status'))
  <script>

  Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'La demande est envoyée',
      showConfirmButton: false,
      timer: 1500
    })
    </script>
    @endif
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
     $('#marque').change(function(){
       var marque =$(this).val();
       $('#modele').html('');
       $.ajax({
         url:'/get-modele',
         type:'POST',
         data:{"_token":"{{ csrf_token() }}","marque":marque},
         dataType: "json",
         success:function(data){
           console.log(data)
           $('#modele').append('<option value="" selected disabled hidden >Modele</option>');
           $.each(data,function(key,modele){
             $('#modele').append('<option value="'+modele.modele+'">'+modele.modele+'</option>');
           });
         }
       });
     });
   });
     </script>
  @endsection
