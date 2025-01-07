
@if (auth()->user()->type=="Gestionnaire")
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
@section('content')

<div class="table">
    <h2 style="font-family: Gill Sans, sans-serif;text-align: center;font-weight: bold;color:#0298cf">Les demandes</h2>
<br>

</div>
<div class="s01">
    <form>

      <div class="inner-form">

        <div class="input-field second-wrap">
          <input id="location" type="text" placeholder="Ville" />
        </div>
        <div class="input-field second-wrap">
            <input id="location" type="text" placeholder="Vendeur" />
          </div>
          <div class="input-field second-wrap">
            <input id="location" type="text" placeholder="Marque" />
          </div>
          <div class="input-field second-wrap">
            <input id="location" type="text" placeholder="Modele" />
          </div>
         <div class="input-field third-wrap">
          <button class="btn-search" type="button">Recherche</button>
         </div>
      </div>
    </form>
  </div>
    <div class="table_section">
        <table>
            <thead>
                <tr >
                    <th rowspan="2" class="align-middle"  style="border-right:  1px solid rgb(207, 207, 207);">Nom complet</th>
                    <th colspan="3" style="border-right:  1px solid rgb(207, 207, 207);">Informations vendeur</th>
                    <th colspan="6">Informations voiture</th>
                </tr>

                <tr>
                    <th>ville</th>
                    <th>email</th>
                    <th  style="border-right:  1px solid rgb(207, 207, 207);">Telephone</th>
                    <th>Marque</th>
                    <th>modele</th>
                    <th>annee</th>
                    <th>Date Envoi</th>
                    <th>Statu</th>
                    <th>Action</th>
                </tr>

                </thead>
            <tbody>
               @foreach ($demandes as $demande)
              <tr >

                   <td > {{$demande->nom}} {{$demande->prenom}} </td>
                    <td>{{ $demande->ville}}</td>
                    <td>{{ $demande->email}}</td>
                    <td  style="border-right:  1px solid rgb(207, 207, 207);">{{ $demande->phone}}</td>
                    <td> {{$demande->marque}} </td>
                    <td> {{ $demande->modele}} </td>
                    <td> {{ $demande->annee}} </td>
                    <td>{{$demande->created_at}} </td>
                    @if($demande->statu=="Non traité")
                        <td style="color: rgb(255, 28, 73);font-weight: bold">{{$demande->statu}} </td>
                    @else
                    <td style="color: rgba(52, 190, 10, 0.76);font-weight: bold">{{$demande->statu}} </td>

                    @endif
                    <td><a href="{{url('detail-demande/'.$demande->id)}}"><i class="fa-solid fa-eye"></i></a></td>
                </a>
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
@endif
