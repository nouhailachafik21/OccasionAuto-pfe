@if (auth()->user()->type=="Expert")

@extends('layout.app')

@section('styles')
    <link href="{{ asset('assets\libs\datatables\dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css">

    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');


.table {
    width: 100%;
    margin-top:150px;
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

.addcar{
    width: 60px;
    background-color: #ffffff
}
input {
    padding: 10px 20px;
    margin: 0 10px;
    outline: none;
    border: 1px solid #0298cf;
    border-radius: 6px;
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
    font-size: 16px;
}

th,
td {
    border-bottom: 1px solid #dddddd;
    padding: 10px 20px;
    word-break: break-all;
    text-align: center;
    font-size: 15px;

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

legend {
  margin: 0;
  padding: 0;
  display: block;
  -webkit-padding-start: 0;
  -webkit-padding-end: 0;
}



.s01 {

  display: -ms-flexbox;
  display: flex;
  -ms-flex-pack: center;
      justify-content: center;
  -ms-flex-align: center;
      align-items: center;
  font-family: 'Poppins', sans-serif;

  background-size: cover;
  background-position: center center;

}


.s01 form legend {
  font-size: 72px;
  line-height: 1;
  color: #fff;
  margin-bottom: 60px;
}

.s01 form .inner-form {
  background: rgba(0, 0, 0, 0.35);
  padding: 10px 10px ;
  display: -ms-flexbox;
  display: flex;
  width: 100%;
  -ms-flex-pack: justify;
      justify-content: space-between;
  -ms-flex-align: center;
      align-items: center;
}

.s01 form .inner-form .input-field {
  margin-right: 6px;
  height: 40px;
}

.s01 form .inner-form .input-field input {
  height: 80%;
  background: #fff;
  border-radius: .5px;
  border: 0;
  display: block;
  width: 100%;
  padding: 10px 32px;
  font-size: 20px;
}

.s01 form .inner-form .input-field.third-wrap .btn-search {
  height: 80%;
  width: 100%;
  background: #4272d7;
  white-space: nowrap;
  border-radius: .5px;
  font-size: 20px;
  color: #fff;
  transition: all .2s ease-out, color .2s ease-out;
  border: 0;
  cursor: pointer;
}

    </style>

@endsection
@section("content")

<div class="table">
    <h2 style="font-family: Gill Sans, sans-serif;text-align: center;font-weight: bold;color:#0298cf">Les Missions</h2>
<br>
<div class="s01">
    <form action="{{route("missions.search")}}" method="GET">
        @csrf
      <div class="inner-form">
        <div class="input-field second-wrap">
          <input name="id" id="id" type="text" placeholder="ID" />
        </div>
        <div class="input-field second-wrap">
            <input name="vendeur" id="vendeur" type="text" placeholder="Vendeur" />
          </div>
          <div class="input-field second-wrap">
            <input name="marque" id="marque" type="text" placeholder="Marque" />
          </div>
          <div class="input-field second-wrap">
            <input name="modele" id="modele" type="text" placeholder="Modele" />
          </div>
         <div class="input-field third-wrap">
          <button class="btn-search" type="submit">Recherche</button>
         </div>
      </div>
    </form>
  </div>
    <div class="table_section">
        <table>
            <thead>
                <tr >
                    <th colspan="5" >Informations demande</th>
                    <th colspan="2" >Informations expert</th>
                    <th colspan="3">Informations mission</th>
                </tr>

                <tr>
                    <th>Id</th>
                    <th>Marque/Modele</th>
                    <th>Ville</th>
                    <th>Tel</th>
                    <th style="border-right:  1px solid rgb(207, 207, 207);">Vendeur</th>
                    <th>Expert</th>
                    <th style="border-right:  1px solid rgb(207, 207, 207);" >Email</th>
                    <th>Date envoi</th>
                    <th>statu mission</th>
                    <th>Action</th>
                </tr>

                </thead>
            <tbody>
                @foreach($missions as $mission)
              <tr>
                    <td>{{$mission->id}}   </td>
                    <td> {{$mission->marque}} &nbsp; &nbsp;{{$mission->modele}} </td>
                    <td> {{$mission->ville}}   </td>
                    <td> {{$mission->phone}}   </td>
                    <td> {{$mission->nom}} {{$mission->prenom}}</td>
                    <td>{{$mission->name}}   </td>
                    <td>{{$mission->email}}   </td>
                    <td>{{$mission->created_at}}  </td>
                    <td>
                        @if($mission->status==0)
                          <p style="background-color: rgb(240, 0, 0);height: 20px;color:white;font-size: 10px;">En cours de traitement</p>
                        @else
                        <p style="background-color: rgb(12, 180, 35);font-size: 12px;color:white">Traité</p>
                        @endif

                         </td>
                    <form method="GET" action={{route("VehiculeExpert",$mission->id)}}>
                    <td ><button type="submit" class="addcar" ><img src="assets/img/addcar.png" alt="" style="height:20px;"></button> </td>
                    </form>

                </tr>
            @endforeach
            </tbody>
        </table>
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

@endsection

@else
<img style="margin-top: 150px;margin-left:600px" width="200px" height="200px" src="assets/img/vide.webp" alt="">

@endif



