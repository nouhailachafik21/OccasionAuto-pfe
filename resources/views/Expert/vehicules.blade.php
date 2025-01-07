
@if (auth()->user()->type=="Expert")

@extends('layout.app')

@section('styles')
<style>
.rows{
    margin-top:150px;
    width: 800px;
    margin-left: 250px;
    margin-bottom: 50px
}
.select{

    padding: 10px 20px;
    margin: 0px 10px 0px -5px;
    outline: none;
    border: 1px solid #ced0d2;
    border-radius: 6px;
    color: #636363;
    width: 100%;
}
</style>
@endsection
@section('content')
<div class="container">
    <div class="rows">
        <div class="col-md-12">
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

            <div class="card" >
                <div class="card-header">
                  <h3 class="card-title">Ajouter voiture:
                  <a class="btn btn-danger float-end" >Arrière</a>
                </h3>
                </div>
                @foreach($missions as $mission)
                <div class="card-body">
                    <form action="{{url('Ajouter/'.$mission->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf


                        <div class="mb-3" style="font-weight: bold" required>
                          <label>Marque</label>
                          <select class="select"  name="marque" id="marque" required>
                         @foreach($marques as $marque)
                         @if ($marque->marque==$mission->marque)
                         <option  selected hidden value="{{$marque->id}}">{{$mission->marque}}</option>
                         @endif
                           <option value="{{$marque->id}}">{{$marque->marque}}</option>
                         @endforeach
                        </select>
                        </div>
                        <div class="mb-3"  style="font-weight: bold" required>
                            <label>Modele</label>
                            <select class="select"  name="modele" id="modele" required>
                                @foreach($modeles as $modele)
                                @if ($modele->modele==$mission->modele)
                                <option  selected  hidden value="{{$modele->id}}">{{$mission->modele}}</option>
                                @endif
                               <option value="{{$modele->id}}">{{$modele->modele}}</option>
                                @endforeach
                            </select>
                        </div>
                          <div class="mb-3"  style="font-weight: bold" required>
                            <label>Carburant</label>
                            <select class="select"  name="carburant" id="carburant" required>
                                @foreach($carburants as $carburant)
                                @if ($carburant->carburant==$mission->carburant)
                                <option  selected hidden value="{{$carburant->id}}">{{$mission->carburant}}</option>
                                @endif
                               <option value="{{$carburant->id}}">{{$carburant->carburant}}</option>
                                @endforeach
                            </select>
                         </div>
                          <div class="mb-3"  style="font-weight: bold"  required>
                            <label>Transmission</label>
                            <select class="select"  name="transmission" id="transmission" required>
                                @foreach($transmissions as $transmission)
                                @if ($transmission->transmisson==$mission->transmission)
                                <option  selected hidden value="{{$transmission->id}}">{{$mission->transmission}}</option>
                                @endif
                               <option value="{{$transmission->id}}">{{$transmission->transmisson}}</option>
                                @endforeach
                            </select>
                           </div>
                          <div class="mb-3"  style="font-weight: bold" required>
                            <label>ville </label>
                            <select class="select"  name="ville" id="ville" required>
                                @foreach($villes as $ville)
                                @if ($ville->ville==$mission->ville)
                                <option  selected hidden value="{{$ville->id}}">{{$mission->ville}}</option>
                                @endif
                               <option value="{{$ville->id}}">{{$ville->ville}}</option>
                                @endforeach
                            </select>                          </div>
                            <div class="mb-3"  style="font-weight: bold"  required>
                                <label>Couleur </label>
                                <select class="select"  name="couleur" id="couleur" required >
                                    <option  disabled selected hidden value="">couleur</option>
                                    @foreach($couleurs as $couleur)
                                   <option value="{{$couleur->id}}">{{$couleur->couleur}}</option>
                                    @endforeach
                                </select>                          </div>
                                <div class="mb-3"  style="font-weight: bold"  required>
                                    <label>Catégories de vehicule </label>
                                    <select class="select"  name="categorie" id="categorie" required >
                                        <option  disabled selected hidden value="">Catégories de vehicule</option>
                                        @foreach($categories as $categorie)
                                       <option value="{{$categorie->id}}">{{$categorie->categorie}}</option>
                                        @endforeach
                                    </select>                          </div>
                                <div class="mb-3"  style="font-weight: bold" required>
                                    <label>Type vehicules </label>
                                    <select class="select"  name="type" id="type" required>
                                        <option  disabled selected hidden value="Voiture">Voiture</option>
                                        @foreach($types as $type)
                                       <option value="{{$type->id}}">{{$type->type_vehicule}}</option>
                                        @endforeach
                                    </select>                          </div>
                                    <div class="mb-3"  style="font-weight: bold" required>
                                        <label>Matricule</label>
                                        <input type="text" style="font-weight: bold;color:#636363" value={{$mission->matricule}} class="form-control" name="matricule" required>
                                      </div>
                          <div class="mb-3"  style="font-weight: bold" required>
                            <label>Prix</label>
                            <input  type="text" style="font-weight: bold;color:#636363" class="form-control" name="prix" value="{{$mission->prix}}" required>
                          </div>
                          <div class="mb-3"  style="font-weight: bold" required>
                            <label>Année </label>
                            <input required style="font-weight: bold;color:#636363" type="text" class="form-control" name="annee" value="{{$mission->annee}}">
                          </div>
                          <div class="mb-3"  style="font-weight: bold" required>
                            <label>kilométrage  </label>
                            <input required style="font-weight: bold;color:#636363" type="text" class="form-control" name="kilometrage" >
                          </div>
                          <div class="mb-3"  style="font-weight: bold" required>
                            <label>Première main </label>
                            <select class="select"  name="premiere_main" id="premiere_main" required>
                               <option value="0" disabled selected hidden >Oui</option>
                               <option value="0">Oui</option>
                               <option value="1">Non</option>
                            </select>                          </div>
                          <div class="mb-3"  style="font-weight: bold" required>
                            <label>Photo </label>
                            <input required type="file" class="form-control" name="photo" >
                          </div>

                          <div class="mb-3" style="font-weight: bold" required>
                            <label>Photo intérieur </label>
                            <input required type="file" class="form-control" name="interieur">
                          </div>
                          <div class="mb-3"style="font-weight: bold" required>
                            <label>Photo  extérieur</label>
                            <input required type="file" class="form-control" name="exterieur">
                          </div>

                        <button type="submit" class="btn btn-primary">Ajouter</button>

                      </form>
                </div>
                @endforeach
              </div>
        </div>
    </div>
</div>

@endsection

@else
<img style="margin-top: 150px;margin-left:600px" width="200px" height="200px" src="assets/img/vide.webp" alt="">

@endif


