@extends('layouts.app')


@section('content')


    <!-- Sub Banner end -->


    <div class="sell content-area-5 mt-5">
        <h2 class="h1-responsive font-weight-bold mb-5  text-center">Modifier la demande</h2>
        <div class="container">
            <div class="card" style="background-color: #e8e7e7;border-color: #e8e7e7;padding: 30px;">

                    <div>
                        <form action="{{ route('demandes.update',['demande' =>$demande->id]) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row" style="">
                                <div class="col-lg-6 col-m-12">
                                    <div class="heading-4">
                                        <h4>Informations vendeur</h4>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="{{$demande->vendeur->prenom}}" name="prenom" placeholder="Prenom">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="{{$demande->vendeur->nom}}" name="nom" placeholder="Nom">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{$demande->vendeur->email}}" name="email" placeholder="Email ">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{$demande->vendeur->addresse}}" name="addresse" placeholder="Addresse   (Optionnel)">
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="{{$demande->vendeur->ville}}" name="ville" placeholder="Ville (Optionnel)">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="{{$demande->vendeur->phone}}" name="phone" placeholder="Phone">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6 col-m-12">
                                    <div class="heading-4">
                                        <h4>Informations voiture</h4>
                                    </div>


                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{$demande->voiture->marque}}" name="marque" placeholder="Marque ">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{$demande->voiture->modele}}" name="modele" placeholder="Modele   (Optionnel)">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{$demande->voiture->annee}}" name="annee" placeholder="Annee   (Optionnel)">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <select class="selectpicker search-fields" value="{{$demande->voiture->transmission}}" name="transmission" placeholder="transmission">
                                                <option>Manuelle</option>
                                                <option>Automatique</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <select class="selectpicker search-fields" value="{{$demande->voiture->carburant}}" name="carburant" placeholder="Carburant" >
                                                <option>Diesel</option>
                                                <option>Essence</option>
                                                <option>Hybrid</option>
                                                <option>Électrique</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div style="display: flex;justify-content: center;align-items: center;"class="form-group ">
                                <button type="submit" class="btn-md btn-theme float-left mt-3" >Modifier</button>
                            </div>
                        </form>

                    </div>

            </div>



        </div>
    </div>

@endsection
