@extends('layout.app')
@section('content')
  <style>
      .car-detail-page{
     margin-top: 100px;
    padding: 40px 0;
}
.mySlides {display:none}
.w3-left, .w3-right, .w3-badge {cursor:pointer}
.w3-badge {height:13px;width:13px;padding:0}
.car-detail-page .prod-top{
    display: flex;
    justify-content: space-between;
}

.car-detail-page .prod-top .refrence{
    background-color: rgba(10, 106, 190, 0.9);
    color: #fff;
     padding: 6px 13px;
     font-size: 15px;
}

.car-detail-page .prod-top .cart-panier .btn-top{
    border: none;
    background-color: rgba(10, 106, 190, 0.9);
    font-size: 18px;
    color: #A9A9A9;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    padding: 6px 13px;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    margin-left: 12px;
    -webkit-transition-duration: 0.3s;
    transition-duration: 0.3s;
    cursor: pointer;
}

.car-detail-page .prod-top .cart-panier .btn-top a{
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    color: #fff;
}

.car-detail-page .car-content .car-content-top{
    background-color: #f6f6f6f6;
    overflow: hidden;
    padding: 15px;
    position: relative;
}

.car-detail-page .car-content .car-content-top h1{
    font-size: 25px;
    font-weight: 600;
    color: #323232;
    text-align: left;
}

.car-detail-page .car-content .car-content-top .prix-info{
    font-size: 20px;
    text-align: left;
}

.car-detail-page .car-content .car-options{
    padding: 20px 0 30px;
}

.car-detail-page .fiche{
    font-size: 14px;
    display: flex;
    font-weight: bold;
    align-items: center;
    margin-right: 15px;
}

.car-detail-page .fiche i{
    font-size: 25px;
    margin-right: 4px;
}

.hr-bleu{
    background-color:rgba(10, 106, 190, 0.9) ;
    text-align: center;
    padding: 5px 15px;
}

.hr-bleu .title{
    color: #fff;
    font-size: 18px;
    font-weight: 600;
}

.form-detail .form-group{
    display: block;

}
.form-detail .from-control{
    display: block;
    width: 100%;
    padding: 8px 16px;
    line-height: 1.6;
    color: #0195cf;
    height: 39px;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d8dde6;
    border-radius: 3px;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    color: #6d7e9c;
    outline: none;
    margin-top: 5px;
}
.form-detail .btn-from{
    text-align: right;
}
.form-detail .btn-from button{
    background-color: #f6b024;
    padding: 6px 13px;
    color: #fff;
    border: none;
    margin-top: 3px;
}
.extra-feature h2{
    color: rgba(10, 106, 190, 0.9);
    position: relative;
}
.accordion {
    border:  1px solid rgba(10, 106, 190, 0.9);
    margin-bottom:3px;
    color: rgba(10, 106, 190, 0.9);
    cursor: pointer;
    padding: 6px 13px;
    width: 100%;
    font-size:18px;
    text-align: left;
    outline: none;
    transition: 0.4s;
    background-color: #fff;
  }

  .active, .accordion:hover {
    color: rgba(10, 106, 190, 0.9);
  }

  .accordion:after {
    content: '\002B';
    color: rgba(10, 106, 190, 0.9);
    font-weight: bold;
    float: left;
    margin-right: 5px;
  }

  .active:after {
    content: "\2212";
  }

  .panel {
    padding: 0 25px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
    border: 1px solid #e3e3e3;
  }
  .panel ul {
      list-style: none;
  }
  .panel ul li{
      font-size:18px ;
  }
  .panel ul li i{
      font-size: 18px;
      color: rgba(10, 106, 190, 0.9);
      margin-right: 5px;
  }

.slider_detail{
  overflow: hidden;
}

.slides_detail{
  width: 500%;
  height: 500px;
  display: flex;
}

.slides_detail input{
  display: none;
}
.slide_detail{
  width: 20%;
  transition: 2s;
}
.slide_detail img{
  width: 100%;
}
/*css for manual slide navigation*/
.navigation-manual{
  position: absolute;
  width: 800px;
  margin-top: -40px;
  display: flex;
  justify-content: center;
}
.manual-btn
{
  border: 2px solid #f6b024;
  padding: 5px;
  border-radius: 10px;
  cursor: pointer;
  transition: 1s;
}
.manual-btn:not(:last-child)
{
  margin-right: 40px;
}
.manual-btn:hover
{
  background: #f6b024;
}
#radio1:checked ~ .first
{
  margin-left: 0;
}
#radio2:checked ~ .first
{
  margin-left: -20%;
}
#radio3:checked ~ .first
{
  margin-left: -40%;
}
#radio4:checked ~ .first
{
  margin-left: -60%;
}
/*css for automatic navigation*/
.navigation-auto{
  position: absolute;
  display: flex;
  width: 800px;
  justify-content: center;
  margin-top: 460px;
}

.navigation-auto div{
  border: 2px solid #f6b024;
  padding: 5px;
  border-radius: 10px;
  transition: 1s;
}

.navigation-auto div:not(:last-child){
  margin-right: 40px;
}

#radio1:checked ~ .navigation-auto .auto-btn1{
  background: #f6b024;
}

#radio2:checked ~ .navigation-auto .auto-btn2{
  background: #f6b024;
}

#radio3:checked ~ .navigation-auto .auto-btn3{
  background: #f6b024;
}

#radio4:checked ~ .navigation-auto .auto-btn4{
  background: #f6b024;
}
</style>
<main id="main">
    @foreach ($vehicules as $vehicule)
    @endforeach
<section class="car-detail-page" style="margin-top: 100px">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8 col-xs-12">
                <div class="prod-top">
                    <div class="refrence">{{$vehicule->code}}</div>
                   <div class="cart-panier">
                        <span class="btn-top"><a href="">Ajoutes dans panier</a></span>
                   </div>
                </div>

                <div class="w3-content w3-display-container" style="max-width:100%">
                    @foreach($vehicules as $vehicule)
                    <img class="mySlides" src="{{$vehicule->path}}" style="width:100%">

                    <img class="mySlides" src="{{$vehicule->path}}" style="width:100%">
                    @endforeach

                    <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
                      <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
                      <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
                      <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
                      <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
                      <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
                    </div>
                    <div class="w3-row-padding w3-section">

                    </div>
                  </div>
            </div>

            <div class="col-md-12 col-lg-4">
                  <div class="car-content">
                      <div class="car-content-top">
                          <h1>{{$vehicule->marque}}&nbsp;{{$vehicule->modele}}</h1>
                          <p class="prix-info">
                              {{$vehicule->prix}}&nbsp;MAD
                          </p>
                      </div>
                      <div class="row m-0 car-options">
                         <div class="col-6 mb-3">
                           <span class="fiche">
                             <i class="fa-solid fa-road"></i>
                             {{$vehicule->kilometrage}}
                           </span>
                         </div>
                         <div class="col-6 mb-3">
                           <span class="fiche">
                             <i class="fa-solid fa-calendar-days"></i>
                             {{$vehicule->annee_mc}}
                           </span>
                         </div>
                         <div class="col-6 mb-3">
                           <span class="fiche">
                             <i class="fa-solid fa-gear"></i>
                             {{$vehicule->transmisson}}
                           </span>
                         </div>
                         <div class="col-6 mb-3">
                           <span class="fiche">
                             <i class="fa-solid fa-gas-pump"></i>
                             {{$vehicule->carburant}}
                           </span>
                         </div>
                         <div class="col-6 mb-3">
                           <span class="fiche">
                             <i class="fa-solid fa-location-dot"></i>
                             {{$vehicule->ville}}
                           </span>
                         </div>
                  </div>
                  <div style="box-shadow:rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;padding:20px">
                  <div class="hr-bleu">
                    <span class="title">
                      Faire une Offre
                    </span>
                  </div>
                  <form action="" class="form-detail">
                    <div class="form-group">
                      <input type="text" class="from-control" placeholder="Nom complet">
                    </div>
                    <div class="form-group">
                     <input type="email" class="from-control" placeholder="Entrer l'email">
                   </div>
                   <div class="form-group">
                     <input type="text" class="from-control" placeholder="Entrer telephone">
                   </div>
                   <div class="form-group">
                     <input type="text" class="from-control" placeholder="Proposer un prix">
                   </div>
                   <div class="from-group">
                     <textarea class="form-control" name="" placeholder="Des Questions?" rows="2" required></textarea>
                   </div>
                   <div class="btn-from">
                    <button>
                      ENVOYER
                    </button>
                  </div>
                  </form>
                 </div>
            </div>
        </div>
    </div>
    <div class="container">
      <div class="row">
         <div class="col-md-12 col-lg-8">
           <div class="extra-feature">
             <h2>Informations Générales</h2>
             <button class="accordion">Caractéristiques</button>
             <div class="panel">
              <div calss="row">
               <div class="col-lg-4">
                 <ul>
                   <li><i class="fa-solid fa-check"></i>Suspension sport</li>
                   <li><i class="fa-solid fa-check"></i>Phares bi-xénon</li>
                   <li><i class="fa-solid fa-check"></i>Phares Xénon</li>
                   <li><i class="fa-solid fa-check"></i>Phares LED</li>
                   <li><i class="fa-solid fa-check"></i>MP3</li>
                </ul>
               </div>
              <div class="col-lg-4">
                 <ul>
                   <li><i class="fa-solid fa-check"></i>Bluetooth</li>
                   <li><i class="fa-solid fa-check"></i>Vitres surteintées</li>
                   <li><i class="fa-solid fa-check"></i>Radar de recul</li>
                   <li><i class="fa-solid fa-check"></i>Start & Stop</li>
                   <li><i class="fa-solid fa-check"></i>Aide parking</li>
                 </ul>
             </div>
             </div>
             </div>
             <button class="accordion">Spécifications</button>
             <div class="panel">
              <div calss="row">
              <div class="col-lg-4">
               <ul>
                 <li><i class="fa-solid fa-check"></i>Vitesse de pointe: 270</li>
                 <li><i class="fa-solid fa-check"></i>Type carburant: Diesel</li>
                 <li><i class="fa-solid fa-check"></i>Kilometrage: 35,200 KM</li>
                 <li><i class="fa-solid fa-check"></i>Moteur: 2901</li>
                 <li><i class="fa-solid fa-check"></i>Gear: 4</li>
               </ul>
             </div>
             <div class="col-lg-4">
               <ul>
                 <li><i class="fa-solid fa-check"></i>Drive Train: Front Wheel</li>
                 <li><i class="fa-solid fa-check"></i>Body Style: Sedan</li>
                 <li><i class="fa-solid fa-check"></i>Phares Xénon</li>
                 <li><i class="fa-solid fa-check"></i>Phares LED</li>
                 <li><i class="fa-solid fa-check"></i>MP3</li>
               </ul>
             </div>
             <div class="col-lg-4">
               <ul>
                 <li><i class="fa-solid fa-check"></i>Doors: 4</li>
                 <li><i class="fa-solid fa-check"></i>Horse Power: 310</li>
                 <li><i class="fa-solid fa-check"></i>Location: Florisa, USA</li>
                 <li><i class="fa-solid fa-check"></i>Interior Color: Black</li>
                 <li><i class="fa-solid fa-check"></i>Security</li>
               </ul>
             </div>
             </div>
             </div>
           </div>
         </div>
      </div>
    </div>
  </div>
  </section>
</main>

<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function currentDiv(n) {
      showDivs(slideIndex = n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      if (n > x.length) {slideIndex = 1}
      if (n < 1) {slideIndex = x.length}
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }

      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" w3-white", "");
      }
      x[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " w3-white";
    }
    </script>

@endsection


