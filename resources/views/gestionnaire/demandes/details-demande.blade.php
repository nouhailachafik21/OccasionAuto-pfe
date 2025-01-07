@extends('layout.app')

@section('styles')
<style>
    input {
    padding: 10px 20px;
    margin: 0px 10px 30px -5px;
    outline: none;
    color: #0298cf;
}
#statu{
    padding: 10px 20px;
    margin: 0px 10px 30px -5px;
    outline: none;
    border: 1px solid #ced0d2;
    border-radius: 6px;
    color: #636363;

    width: 300px;
}
#expert{

    padding: 10px 25px;
    margin: 0px 10px 0px 10px;
    outline: none;
    border: 1px solid #ced0d2;
    border-radius: 6px;
    color: #636363;

    width: 300px;

}
</style>
@endsection



@section('content')


    <div class="servic content-area mt-5">
        <h2 class="h1-responsive font-weight-bold mb-5 text-center">Détails de la demande</h2>
        <div class="container">
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
            <div class="row" >
                <div class="col-lg-6 col-md-6 col-sm-12" >
                    <div class="service-info">
                        <div class="icon">
                          <span class="lnr lnr-user" style="color: #ffc107"></span>
                        </div>
                        <div class="detail" >
                            <h3>Informations demande</h3>
                            <div>
                                @foreach ($demandes as $demande)


                                <div class="offcanvas offcanvas-end" id="demoModifer">
                                    <div class="offcanvas-header">
                                      <h3 class="offcanvas-title" style="color: #0298cf">Modifer une demande</h3>
                                      <button type="button"  class="btn-close" data-bs-dismiss="offcanvas"></button>
                                    </div>
                                    <div class="offcanvas-body">

                                        <form method="POST" >
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">

                                                <div class="row justify-content-center row-ajouter">
                                                    <div class="col-13 align-self-center mb-5" style="display: inherit;">
                                                        <ul style=" list-style-type: none;">
                                                            <li>   <select  name="statu" id="statu">
                                                                <option value="{{$demande->statu}}" disabled selected hidden>{{$demande->statu}}</option>
                                                                 <option value="Non traité">Non traité</option>
                                                                 <option value="Non traité">Validé</option>
                                                                  </select>  </li>
                                                            <li>  <input style="width:300px ;height: 40px;" type="text" class="form-control" value="{{$demande->prenom}}" name="prenom" placeholder="Prenom">  </li>
                                                            <li>  <input style="width:300px ;height: 40px;" type="text" class="form-control" value="{{$demande->nom}}" name="nom" placeholder="Nom">  </li>
                                                            <li>  <input style="width:300px ;height: 40px;" type="text" class="form-control" value="{{$demande->email}}" name="email" placeholder="Email">  </li>
                                                            <li>  <input style="width:300px ;height: 40px;" type="text" class="form-control" value="{{$demande->phone}}" name="phone" placeholder="Telephone">  </li>
                                                            <li>  <input style="width:300px ;height: 40px;" type="text" class="form-control" value="{{$demande->ville}}" name="ville" placeholder="Ville">  </li>
                                                            <li>  <input style="width:300px ;height: 40px;" type="text" class="form-control" value="{{$demande->marque}}" name="nom" placeholder="Marque">  </li>
                                                            <li>  <input style="width:300px ;height: 40px;" type="text" class="form-control" value="{{$demande->modele}}" name="email" placeholder="Modele">  </li>
                                                            <li>  <input style="width:300px ;height: 40px;" type="text" class="form-control" value="{{$demande->transmission}}" name="phone" placeholder="Transmission">  </li>
                                                            <li>  <input style="width:300px ;height: 40px;" type="text" class="form-control" value="{{$demande->carburant}}" name="carburant" placeholder="Carburant">  </li>

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
                                <div class="d-flex justify-content-between "  style="    margin: 10px 10px 10px 0px;">
                                    <span >Nom  :</span><span> {{$demande->nom}}</span>
                                </div>
                                <div class="d-flex justify-content-between "  style="    margin: 10px 10px 10px 0px;">
                                    <span >Prenom  :</span><span> {{$demande->prenom}} </span>
                                </div>
                                <div class="d-flex justify-content-between "  style="    margin: 10px 10px 10px 0px;">
                                    <span >Email :</span><span>{{$demande->email}}</span>
                                </div>
                                <div class="d-flex justify-content-between "  style="    margin: 10px 10px 10px 0px;">
                                    <span >ville :</span><span>{{$demande->ville}}</span>
                                </div>

                                <div class="d-flex justify-content-between" style="margin: 10px 10px 10px 0px;" >
                                    <span >Téléphone :</span><span>{{$demande->phone}}</span>
                                </div>
                                  @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="service-info">
                        <div class="icon">
                           <span class="lnr lnr-car" style="color: #ffc107"></span>
                        </div>
                        <div class="detail">
                            <h3>Informations voiture </h3>
                            <div>
                            @foreach ($demandes as $demande)
                            <div class="offcanvas offcanvas-end" id="demoAjouter">
                                <div class="offcanvas-header">
                                  <h3 class="offcanvas-title" style="color: #0298cf">Envoyer cette mission</h3>
                                  <button type="button"  class="btn-close" data-bs-dismiss="offcanvas"></button>
                                </div>
                                <div class="offcanvas-body">
                                <form method="POST" action="{{route('mission.envoyer',$demande->id)}}">
                                        @csrf
                                        <div class="modal-body">

                                            <div class="row justify-content-center row-ajouter">
                                                <div class="col-13 align-self-center mb-5" style="display: inherit;">
                                                    <select  name="expert" id="expert">
                                                        <option value="" disabled selected hidden>Expert</option>
                                                        @foreach($experts as $expert)
                                                        <option value="{{$expert->id}}">{{$expert->name}}
                                                        </option>
                                                        @endforeach
                                                          </select>
                                                            </div>

                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button style="width: 350px;font-weight: bold" type="submit" class="btn btn-primary">Envoyer</button>
                                        </div>
                                    </form>
                                </div>
                              </div>


                                <div class="d-flex justify-content-between " style="    margin: 10px 10px 10px 0px;">
                                    <span>Marque :</span><span > {{$demande->marque}} </span>
                                </div>
                                <div class="d-flex justify-content-between"  style="    margin: 10px 10px 10px 0px;">
                                    <span>Modèle :</span><span >{{$demande->modele}}</span>
                                </div>
                                <div class="d-flex justify-content-between"  style="    margin: 10px 10px 10px 0px;">
                                    <span>Année :</span><span >{{$demande->annee}}</span>
                                </div>
                                <div class="d-flex justify-content-between"  style="    margin: 10px 10px 10px 0px;">
                                    <span>Transmission :</span><span >{{$demande->transmission}}</span>
                                </div>
                                <div class="d-flex justify-content-between"  style="    margin: 10px 10px 10px 0px;">
                                    <span>Carburant :</span><span >{{$demande->carburant}}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            <div class="row">

                <div class="col-lg-12 col-md-15 col-sm-18">
                    <div class="service-info">

                                <div class="d-flex bd-highlight justify-content-center">
                                    <div class="p-2 flex-fill bd-highlight">
                                        <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#delete" style="margin-top: 100px;width: 250px;height: 50px;font-weight: bold;" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce modele ?');" >Supprimer demande</button>
                                    </div>
                                    <div class="p-2 flex-fill bd-highlight">
                                        <a ><button type="button" class="btn btn-warning btn-md " style="margin-top: 100px;width: 250px;height: 50px;font-weight: bold;color:#fff"  data-bs-toggle="offcanvas" data-bs-target="#demoModifer">Modifier demande</button></a>
                                    </div>


                                    <div class="p-2 flex-fill bd-highlight">
                                        <button  class="btn btn-info btn-md "  style="margin-top: 100px;width: 250px;height: 50px;font-weight: bold;color:#fff" type="button" data-bs-toggle="offcanvas" data-bs-target="#demoAjouter"  >Envoyer mission</button>
                                    </div>


                       </div>

                        </div>
                    </div>
            </div>

        </div>
    </div>


      </div>


@endsection
