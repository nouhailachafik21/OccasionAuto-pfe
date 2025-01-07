
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
width: 200px;
}

input {
    padding: 10px 20px;
    margin: 0 10px;
    outline: none;
    border: 1px solid #0298cf;
    border-radius: 6px;
    color: #0298cf;
}
#marque{
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

                        <h2>Categories de voiture</h2>
                      <div class="wrap">
                            <div class="search">
                         <input type="text" class="searchTerm" placeholder="Categorie">

                            <button type="submit" class="searchButton">
                             <i class="fa fa-search"></i>
                           </button>
                       </div>
                    </div>
                        <div> <button class="add_new" data-bs-toggle="offcanvas" data-bs-target="#demoAjouter">+ Ajouter </button> </div>
                    </div>

                    <div class="table_section">
                        <table>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th >categorie</th>
                                    <th >Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                    @foreach ($categories as $categorie)

                                  <tr>
                                    <div class="offcanvas offcanvas-end" id="demoModifer">
                                        <div class="offcanvas-header">
                                          <h3 class="offcanvas-title" style="color: #0298cf">Modifer une categorie</h3>
                                          <button type="button"  class="btn-close" data-bs-dismiss="offcanvas"></button>
                                        </div>
                                        <div class="offcanvas-body">

                                            <form method="POST" action="{{url('categorieEdit/'.$categorie->id)}}">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="row justify-content-center row-ajouter">
                                                        <div class="col-13 align-self-center mb-5" style="display: inherit;">

                                                            <input style="width:350px ;height: 40px;" type="text" class="form-control" value="{{$categorie->categorie}}"  name="categorie" placeholder="categorie">
                                                        </div>

                                                    </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit"   style="width: 350px;font-weight: bold" class="btn btn-primary">Modifer</button>
                                                </div>
                                            </form>
                                        </div>
                                      </div>
                               <td>{{$categorie->id}}</td>
                               <td>{{$categorie->categorie}}</td>
                               <form action="{{url('categorieDelete/'.$categorie->id)}}" method="GET">
                               <td>
                                   <button href="{{url('categorieDelete/'.$categorie->id)}}" type="button" data-id="{{$categorie->categorie}}"  data-bs-toggle="offcanvas" data-bs-target="#demoModifer"><i class="fa-solid fa-pen-to-square"></i></button> <button type="submit" href="{{url('categorie.supprimer/'.$categorie->id)}}" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette categorie ?');"><i class="fa-solid fa-trash"></i></button>

                                </td>
                               </form>

                                </tr>
                              @endforeach


                            </tbody>
                        </table>
                    </div>



                </div>



            </div>

        </div>
    </div>

<

  <!-- The Modal -->

    <div class="offcanvas offcanvas-top" id="demoSupprimer">
        <div class="offcanvas-header">
          <button type="button"  class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <form method="POST" action="#">

                @csrf
                <div class="modal-body">

                    <div class="row justify-content-center row-ajouter">
                        <div class="col-13 align-self-center mb-5" style="display: inherit;">

                          <h4 style="color: #0298cf">êtes-vous sûr de vouloir supprimer ?
                        </h4>

                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary" >Suprimer</button>

                </div>
            </form>
        </div>
      </div>


      <!-- The Modal -->

      <div class="offcanvas offcanvas-end" id="demoAjouter">
        <div class="offcanvas-header">
          <h3 class="offcanvas-title" style="color: #0298cf">Ajouter une categorie</h3>
          <button type="button"  class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <form method="POST" action="{{route('categorie.ajouter')}}">
                @csrf
                <div class="modal-body">

                    <div class="row justify-content-center row-ajouter">
                        <div class="col-13 align-self-center mb-5" style="display: inherit;">

                            <input style="width:350px ;height: 40px;" type="text" class="form-control" name="categorie" placeholder="categorie">
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button style="width: 350px;font-weight: bold" type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
      </div>

@endsection



@else
<img style="margin-top: 150px;margin-left:600px" width="200px" height="200px" src="assets/img/vide.webp" alt="">

@endif


