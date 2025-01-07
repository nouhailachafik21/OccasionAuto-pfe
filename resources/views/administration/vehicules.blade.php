
@if (auth()->user()->type=="Gestionnaire")

@extends('layout.app')
@section('styles')
    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');




.list-group  a {
font-family: 'Poppins', sans-serif;
overflow: hidden;
height: 50px;
text-align: initial;
}

.table {
    width: 115%;
}

.table_header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    padding: 20px;
    background-color: rgb(240, 240, 240);
}

.table_header p {
    color: #000000;
}

button {
    outline: none;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    padding: 10px;
    color: #ffffff;
}

td button:nth-child(1) {
    background-color: #6898ff;
    width: 40px;
}


td button:nth-child(2) {
    background-color: #ff3838;
    width: 40px;
}

.add_new {
    padding: 10px 20px;
    color: #424242;

    font-weight: bold;
}
.add_new :hover{

    color: #0298cf;
}


.table_section {
    height: 500px;
    overflow: auto;
}

table {
    width: 100%;
    table-layout: fixed;
    min-width: 900px;
    border-collapse: collapse;
}

thead th {
    position: sticky;
    top: 0;
    background-color: #f6f9fc;
    color: #8493a5;
    font-size: 15px;
}

th,
td {
    border-bottom: 1px solid #dddddd;
    padding: 10px 20px;
    word-break: break-all;
    text-align: center;
}

td img {
    height: 60px;
    width: 60px;
    object-fit: cover;
    border-radius: 15px;
    border: 5px solid #ced0d2;
}

tr:hover td {
    color: #0298cf;
    cursor: pointer;
    background-color: #f6f9fc;
}

.pagination {
    display: flex;
    justify-content: flex-end;
    width: 100%;
    padding: 10px 20px;
}

.pagination div {
    padding: 10px;
    border: 2px solid #d5d0d0;
    height: 40px;
    width: 40px;
    border-radius: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #0298cf;
    color: #ffffff;
    box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.75);
    margin: 0 5px;
    cursor: pointer;
}

::placeholder {
    color: #0298cf;
}

::-webkit-scrollbar {
    height: 5px;
    width: 5px;
}

::-webkit-scrollbar-track {
    box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}

::-webkit-scrollbar-thumb {
    box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}
.administration{

    margin-top:150px;
margin-bottom:200px;
width:90%

}

table.experts{

margin-top: 2vw;
}


.icon{

font-size: 25px;
}

.trash{
width: 5px;
color: rgb(253, 99, 99);
}
.edit{

color: #97b9ff;
}

.options{

display: flex;
justify-content: space-around;
align-items: center;
}
.administration-heading{

display: flex;
justify-content: space-between;
align-items: center;
}
.administration-heading button{

border-radius: 5px;
}
.first-modal{

width: 40%;
}
.searchButton{
    background-color: #0298cf
}
.searchTerm{
width: 120px;
}

input {
    padding: 10px 20px;
    margin: 0 10px;
    outline: none;
    border: 1px solid #0298cf;
    border-radius: 6px;
    color: #0298cf;
}
.select{
    padding: 10px 20px;
    margin: 10px;
    outline: none;
    border: 1px solid #ced0d2;
    border-radius: 6px;
    color: #636363;

    width: 300px;
}

    </style>

@endsection


@section('content')




    <div class="administration">

        <div class="row">

            <div class="col-md-3">

                @include('includes.tables')

            </div>

            <div class="col-md-9">

                <div class="col-md-20">
                    @if (session()->has('status'))
                    <div class="alert alert-success" style="font-weight: bold"  role="alert">
                        {{session()->get('status')}}
                      </div>
                    @endif
                    @if (session()->has('erreur'))
                    <div class="alert alert-danger" style="font-weight: bold" role="alert">
                        {{session()->get('erreur')}}
                      </div>
                    @endif
                </div>
                <div class="table">
                    <div class="table_header">
                        <h2>Véhicules</h2>


                      <div class="wrap">
                            <div class="search">
                                <form method="GET" action="{{route("vehicules.recherche")}}" >

                         <input type="text" class="searchTerm" placeholder="Code" name="code">
                         <input type="text" class="searchTerm" placeholder="Ville" name="ville">
                         <input type="text" class="searchTerm" placeholder="Marque" name="marque">
                         <input type="text" class="searchTerm" placeholder="Vendeur" name="modele">
                            <button type="submit" class="searchButton">
                             <i class="fa fa-search"></i>
                           </button>
                        </form>
                       </div>
                    </div>

                    </div>
                    <div class="table_section">
                        <table>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Code</th>
                                    <th>Marque</th>
                                    <th>Modele</th>
                                    <th>Ville</th>
                                    <th>Annee</th>
                                    <th>Statu</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehicules as $vehicule)

                                <tr>
                               <td>{{$vehicule->id}}</td>
                               <td>{{$vehicule->code}}</td>
                               <td><a href="{{asset('/assets/img/car/'.$vehicule->img)}}" data-fancybox="images" data-caption="" data-width="1500" data-height="1000"><img src="{{asset('/assets/img/car/'.$vehicule->img)}}" alt=""></a></td>
                               <td>{{$vehicule->marque}}</td>
                               <td>{{$vehicule->modele}}</td>
                               <td>{{$vehicule->ville}}</td>
                               <td>{{$vehicule->annee_mc}}</td>
                               <td>{{$vehicule->statu}}</td>



                               <td> <button  type="button" data-id="{{$vehicule->id}}"  data-bs-toggle="offcanvas" data-bs-target="#demoModifer"><i class="fa-solid fa-pen-to-square"></i></button>
                                <button type="submit" href="{{url('deleteVehicule/'.$vehicule->id)}}" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce vehicule ?');"><i class="fa-solid fa-trash"></i></button>
                            </td>

                                </tr>

                              @endforeach


                            </tbody>
                        </table>
                    </div>
                    <div class="offcanvas offcanvas-end" id="demoModifer">
                        <div class="offcanvas-header">
                          <h3 class="offcanvas-title" style="color: #0298cf">Modifer un vehicule</h3>
                          <button type="button"  class="btn-close" data-bs-dismiss="offcanvas"></button>
                        </div>
                        <div class="offcanvas-body">

                            <form method="POST" action="{{url('VehiculeEdit/'.$vehicule->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">

                                    <div class="row justify-content-center row-ajouter">
                                        <div class="col-13 align-self-center mb-5" style="display: inherit;">
                                        <ul style=" list-style-type: none;">
                                             <li>
                                                  <select  name="marque" id="marque" class="select">
                                                  <option value="" disabled selected hidden>{{$vehicule->marque}}</option>
                                                  @foreach($marques as $marque)
                                                  <option value="{{$marque->id}}">{{$marque->marque}}</option>
                                                  @endforeach
                                                  </select>
                                            </li>
                                             <li >
                                                 <select  name="modele" id="modele" class="select">
                                                 <option value="" disabled selected hidden>{{$vehicule->modele}}</option>

                                                 </select>
                                             </li>
                                             <li>
                                                 <select  name="ville" id="marque" class="select">
                                                 <option value="" disabled selected hidden>{{$vehicule->ville}}</option>
                                                 @foreach($villes as $ville)
                                                 <option value="{{$ville->id}}">{{$ville->ville}}</option>
                                                @endforeach
                                                 </select>
                                             </li>
                                             <li>
                                                <select  name="carburant" id="marque" class="select">
                                                <option value="" disabled selected hidden>{{$vehicule->carburant}}</option>
                                                @foreach($carburants as $carburant)
                                                <option value="{{$carburant->id}}">{{$carburant->carburant}}</option>
                                                @endforeach
                                                </select>
                                             </li>
                                              <li>
                                                <select  name="transmission" id="marque" class="select">
                                                <option value="" disabled selected hidden>{{$vehicule->transmisson}}</option>
                                                @foreach($transmissions as $transmission)
                                                <option value="{{$transmission->id}}">{{$transmission->transmisson}}</option>
                                                @endforeach
                                                </select>
                                              </li>
                                              <li>
                                                  <input style="width:300px ;height: 40px;margin-bottom: 10px" type="text" value={{$vehicule->prix}} class="form-control" name="prix" placeholder="Prix">

                                                <li> <input style="width:300px ;height: 40px;" type="text" value={{$vehicule->kilometrage}} class="form-control" name="prix" placeholder="Prix">

                                              <li>
                                                <select  name="couleur" id="marque" class="select">
                                                <option value="" disabled selected hidden>{{$vehicule->couleur}}</option>
                                                @foreach($couleurs as $couleur)
                                                <option value="{{$couleur->id}}">{{$couleur->couleur}}</option>
                                                @endforeach
                                                </select>
                                              </li>
                                        </ul>

                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit"   style="width: 350px;font-weight: bold" class="btn btn-primary">Modifer</button>
                                </div>
                            </form>
                        </div>
                      </div>
                    <div class="pagination">
                        <div><i class="fa-solid fa-angles-left"></i></div>
                        <div><i class="fa-solid fa-chevron-left"></i></div>
                        <div>1</div>
                        <div>2</div>
                        <div><i class="fa-solid fa-chevron-right"></i></div>
                        <div><i class="fa-solid fa-angles-right"></i></div>
                    </div>

                </div>



            </div>

        </div>
    </div>

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
@endsection


@else
<img style="margin-top: 150px;margin-left:600px" width="200px" height="200px" src="assets/img/vide.webp" alt="">

@endif



