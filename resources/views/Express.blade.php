@extends('layout.app')

@section("styles")

<style>
.main {
    background-color: #FFFFFF;
    width: 500px;
    height: 450px;
    margin: 4em auto;
    margin-top: 5px;
    border-radius: 1.5em;
    box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);

}

.sign {
    padding-top: 40px;
    color: #5e688a;
    font-family: 'Ubuntu', sans-serif;
    font-weight: bold;
    font-size: 23px;
}

.un {
width: 76%;
color: rgb(38, 50, 56);
font-weight: 700;
font-size: 14px;
letter-spacing: 1px;
background: rgba(136, 126, 126, 0.04);
padding: 10px 20px;
border: none;
border-radius: 20px;
outline: none;
box-sizing: border-box;
border: 2px solid rgba(0, 0, 0, 0.02);
margin-bottom: 50px;
margin-left: 46px;
text-align: center;
margin-bottom: 27px;
font-family: 'Ubuntu', sans-serif;
}

form.form1 {
    padding-top: 40px;

}

.input {
        width: 76%;
color: rgb(38, 50, 56);
font-weight: 700;
font-size: 14px;
letter-spacing: 1px;
background: rgba(136, 126, 126, 0.04);
padding: 10px 20px;
border: none;
border-radius: 20px;
outline: none;
box-sizing: border-box;
border: 2px solid rgba(0, 0, 0, 0.02);
margin-bottom: 50px;
margin-left: 46px;
text-align: center;
margin-bottom: 27px;
font-family: 'Ubuntu', sans-serif;
}


.un:focus, .input:focus {
    border: 2px solid rgba(0, 0, 0, 0.18) !important;

}

.submit {
    font-weight: bold;
  cursor: pointer;
    border-radius: 5em;
    color: #fff;
    background: linear-gradient(to right, #2aacf8, #6bb1f3);
    border: 0;
    padding-left: 60px;
    padding-right: 60px;
    padding-bottom: 10px;
    padding-top: 10px;
    font-family: 'Ubuntu', sans-serif;
    margin-left: 30%;
    font-size: 13px;
    box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
}

.forgot {
    text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
    color: #E1BEE7;
    padding-top: 15px;
}
.section-title{
    margin-top: 5px
}

</style>
@endsection

@section('content')
<main id="main">


    <section id="Services" class="Services">
        <div class="container">


          <div class="row">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box">
                <div class="icon">    <img src="assets/img/rapport_complet.png" width="47px" alt=""></div>
                <h4 class="title"><a href="">Rapport complet au meilleur prix</a>
                </h4>
                <p class="description">Plus de 150 points d’inspections.&nbsp;
                    Check par PC, Intérieur, Extérieur, Mécanique Électronique.&nbsp;
                    Inspection d’accident avec outil spécialisé.&nbsp;</p>
              </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box">
                <div class="icon"><i class="fa-solid fa-check"></i></div>
                <h4 class="title"><a href="">Qualité</a></h4>
                <p class="description"> Inspection internationale par numéro de châssis.  Rapport digital complet joint de photos. </p>
                <p> Inspection effectuée par un mécanicien professionnel.</p>
              </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box">
                <div class="icon">  <i class="fa-solid fa-headset"></i></div>
                <h4 class="title"><a href="">Disponibilité et mobilité
                </a></h4>
                <p class="description"> Nous nous déplaçons où que vous soyez.  Prise de RDV online, par WhatsApp ou par téléphone.
                </p>
                <p>Inspection réalisée sous 24h.  Disponible 7/7 soirs, Weekend et jours fériés.</p></p>
              </div>
            </div>
          </div>

        </div>
      </section>

    <section class="contact-client">
        <div style="margin-top: 50px" class="section-title" data-aos="fade-up">
            <h2 > Vous souhaitez acheter une voiture qui n'est pas sur notre site ?
                Faites vous accompagner par un expert MADMOUNA pour acheter une voiture en toute tranquillité
            </h2>
          </div>

            <div class="main">
                <p class="sign" align="center">Ajoutez vos informations
                </p>

              <form class="form1" method="POST" action="{{route("express.envoyer")}}">
                @csrf
                <input class="input" type="text"  name="nom" align="center" placeholder="Nom">
                <input class="input" type="text" name="prenom" align="center" placeholder="Prenom">
                <input class="input" type="text" name="ville" align="center" placeholder="ville">
                <input class="input" type="text" name="tel" align="center" placeholder="Téléphone">
                <button style="width: 35%" class="submit" align="center" >Envoyer</button>


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
  @endsection
