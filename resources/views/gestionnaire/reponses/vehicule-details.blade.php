@extends('layouts.app')

@section('css')
    <style>

        .vehicule-1{
            margin: 5vw auto 0;
            padding: 3vw;
            border: black solid 1px;
        }

        .big-container{

            margin: 3vw auto 0;
            max-width: 90%;
            height: 40vw;
            border: black solid 1px;
            margin-bottom: 5vw;
        }


        .vehicule-2{


            height: 15vw;
        }

        .header-buttons{

            max-width: 50vw;
            margin: 10vw auto 0;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .table-sinistre{

            margin: 5vw 10vw;

        }

        td.label{

            color: black;
            font-size: large;
        }


    </style>
@endsection

@section('content')



    <div class="container">

        <div class=" col-md-7 header-buttons">
{{--            <a href="{{url('/demandes',$vehicule->mission->demande->id) }}"><button type="button" class="btn btn-secondary">Informations Demande</button></a>--}}
            @if($vehicule->status != 2 or $vehicule->status != 3)
                <form   method="POST" action="{{route('approuve',['data' =>$data->demande_id])}}"> @csrf <button type="submit" class="btn btn-Warning">Approuver </button></form>
            @endif
{{--            <a href="{{route('experts.show',['expert'=>$vehicule->mission->expert->id])}}"><button type="button" class="btn btn-secondary">Informations Expert</button></a>--}}
        </div>

        <div class="row first-row">


            <div class="col-md-7  col-md-offset-3 vehicule-1">
                <div class="vehicule-head">
                    <h2> IDENTIFICATION DU VEHICULE</h2>
                </div>

                <table class="table vehicule">
                    <tbody>
                    <tr>
                        <td>Marque</td>
                         <td>{{$vehicule->modele->marque->name}}</td>
                    </tr>
                    <tr>
                        <td>Modèle</td>
                         <td>{{$vehicule->modele->name}}</td>
                    </tr>
                    <tr>
                        <td>Date de mise en circulation</td>
                         <td>{{$vehicule->annee->annee}}</td>
                    </tr>
                    <tr>
                        <td>Numéro de série / Vin</td>
                        <td>{{$vehicule->vin}}</td>
                    </tr>
                    <tr>
                        <td>Carburant</td>
                        <td>{{$vehicule->carburant->name}}</td>
                    </tr>
                    <tr>
                        <td>Puissance Fiscale</td>
                        <td>{{$vehicule->puissance_fiscale}}</td>
                    </tr>
                    <tr>
                        <td>Puissance Réelle</td>
                        <td>{{$vehicule->puissance_reel}}</td>
                    </tr>
                    <tr>
                        <td>Kilométrage</td>
                        <td>{{$vehicule->kilometrage}}</td>
                    </tr>
                    <tr>
                        <td>Couleur</td>
                         <td>{{$vehicule->couleur->couleur}}</td>
                    </tr>
                    <tr>
                        <td>Type de peinture</td>
                        <td>{{$vehicule->peinture->type}}</td>
                    </tr>
                    <tr>
                        <td>Premiere main</td>
                         <td>{{$vehicule->premiere_main}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="big-container">
        <div class="row">
            <div class="col-md-12 vehicule-2 ">
                <div class="vehicule-head" style="margin-bottom: 2vw">
                    <h2 style="text-align: center;margin-top: 2vw"> Caractéristiques de la voiture</h2>
                </div>
                <div class="row">
                    <div class="col-md-6" style="height: 15vw">
                        <div style="height: 20vw">
                            <h5 style="text-align: center">Aspect Extérieur</h5>
                            <div>

                                <div class="carac-item">
                                    <i class="fa fa-check-square"></i>
                                    <label class="form-check-label" for="suspension">
                                        Suspension sport
                                    </label>
                                </div>

                                <div class="carac-item">
                                    <i class="fa fa-check-square"></i>
                                    <label class="form-check-label" for="bi-xenon">
                                        Phares bi-xénon
                                    </label>
                                </div>
                                <div class="carac-item">
                                    <i class="fa fa-check-square"></i>
                                    <label class="form-check-label" for="xenon">
                                        Phares Xénon
                                    </label>
                                </div>
                                <div class="carac-item">
                                    <i class="fa fa-check-square"></i>
                                    <label class="form-check-label" for="led">
                                        Phares LED
                                    </label>
                                </div>
                                <div class="carac-item">
                                    <i class="fa fa-check-square"></i>
                                    <label class="form-check-label" for="toit-ouvrant">
                                        Toit Ouvrant
                                    </label>
                                </div>
                                <div class="carac-item">
                                    <i class="fa fa-check-square"></i>
                                    <label class="form-check-label" for="panoramique">
                                        Toit Panoramique
                                    </label>
                                </div>
                                <div class="carac-item">
                                    <i class="fa fa-check-square"></i>
                                    <label class="form-check-label" for="aluminium">
                                        Jantes Aluminium
                                    </label>
                                </div>
                                <div class="carac-item">
                                    <i class="fa fa-check-square"></i>
                                    <label class="form-check-label" for="metalise">
                                        Peinture métallisé
                                    </label>
                                </div>


                            </div>
                        </div>
                        <div style="text-align: center">
                            <h5>Aide Conduite</h5>
                        </div>
                    </div>
                    <div class="col-md-6" style="height: 15vw">
                        <div style="text-align: center;height: 20vw">
                            <h5>Confort intérieur</h5>
                        </div>
                        <div style="text-align: center">
                            <h5>Option-sécurité</h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="big-container">
        <div class="row">
            <div class="col-md-12 vehicule-2 ">
                <div class="vehicule-head">
                    <h2 style="text-align: center;margin-top: 2vw"> Expertise Mécanique et Moteur du Véhicule</h2>
                </div>

            </div>

        </div>
    </div>
    <div class="big-container">
        <div class="row">
            <div class="col-md-9  vehicule-2 ">
                <div class="vehicule-head">
                    <h2 style="text-align: center;margin-top: 2vw"> Historique Des Sinistres</h2>
                </div>

                @foreach($vehicule->sinistres() as $sinistre)
                    <table class=" table-sinistre table table-bordered">

                        <tbody>
                        <tr>
                            <td class="label">Date du sinistre</td>
                            <td>{{$sinistre ? $sinistre->date : ''}}</td>

                        </tr>
                        <tr>
                            <td class="label">Kilométrage (Km)</td>
                            <td >{{$sinistre ? $sinistre->kilometrage : ''}}</td>

                        </tr>
                        <tr>
                            <td class="label">Intensité</td >
                            <td >{{$sinistre ? $sinistre->intensite: ''}}</td>

                        </tr>
                        <tr>
                            <td class="label">Evènement</td>
                            <td>{{$sinistre ? $sinistre->evenement : ''}}</td>

                        </tr>
                        <tr>
                            <td class="label">Montant</td>
                            <td>{{$sinistre ? $sinistre->montant : ''}}</td>

                        </tr>
                        <tr>
                            <td class="label">Détail du sinistre</td>
                            <td>{{$sinistre ? $sinistre->detail : ''}}</td>

                        </tr>

                        </tbody>
                    </table>
                @endforeach

            </div>

        </div>
    </div>

    <div class="big-container">
        <div class="row">
            <div class="col-md-12 vehicule-2 ">
                <div class="vehicule-head">
                    <h2 style="text-align: center;margin-top: 2vw"> Conformité Des Documents</h2>
                </div>

            </div>

        </div>
    </div>



@endsection
<script>
    import Button from "../../../js/Jetstream/Button";
    export default {
        components: {Button}
    }
</script>
