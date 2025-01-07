@extends('layouts.app')

@section('css')
    <link href="{{ asset('assets\libs\sweetalert2\sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')

    <div class="service-section-2">
        <div style="width: 95%; margin: auto; padding-top: 35px">
            <div class="row m-0">
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="service-info" style="height: 90%;!important;">
                        <div class="icon">
                            <img src="{{ asset('img/rapport_complet.png') }}" alt="">
                        </div>
                        <div class="detail ">
                            <h3>Rapport complet au meilleur prix </h3>
                            <p>Plus de 150 points d’inspections.&nbsp;
                            Check par PC, Intérieur, Extérieur, Mécanique Électronique.&nbsp;
                            Inspection d’accident avec outil spécialisé.&nbsp;
                            <p><span style="font-size: 19px;color: #FFB700"> 350 DH </span>seulement.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="service-info" style="height: 90%;!important;">
                        <div class="icon">
                            <i class="flaticon-shield"></i>
                        </div>
                        <div class="detail">
                            <h3>Qualité</h3>
                            <p>Inspection internationale par numéro de châssis.&nbsp;
                            Rapport digital complet joint de photos.&nbsp;
                            Inspection effectuée par un mécanicien professionnel.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="service-info" style="height: 90%;!important;">
                        <div class="icon">
                            <i class="flaticon-support-2"></i>
                        </div>
                        <div class="detail">
                            <h3>Disponibilité et mobilité</h3>
                            <p>Nous nous déplaçons où que vous soyez.&nbsp;
                            Prise de RDV online, par WhatsApp ou par téléphone.&nbsp;
                            Inspection réalisée sous 24h.&nbsp;
                            Disponible 7/7 soirs, Weekend et jours fériés.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-section" style="min-height: 40vw !important;">
        <div class="container">

            <div class="row login-box">
                <div class="col-lg-6 align-self-center pad-0">
                    <div class="form-section clearfix">
                        <h3>Informations client</h3>

                        <div class="clearfix"></div>
                        <form action="{{ route('demandes-experts.store') }}" enctype="multipart/form-data" method="post">
                            @csrf
                                <div class="form-group form-box">
                                    <input type="text" name="prenom" class="input-text" placeholder="Prénom" id="prenom" required>
                                </div>
                                <div class="form-group form-box">
                                    <input type="text" name="nom" class="input-text" placeholder="Nom" id="nom" required>
                                </div>
                            <div class="form-group form-box">
                                <input type="number" name="telephone" class="input-text" placeholder="Téléphone" required>
                            </div>
                            <div class="form-group form-box">
                                <select name="ville" id="ville" class="selectpicker search-fields" required>
                                    <option value="0" selected> Choisissez votre ville</option>
                                    @foreach($experts as $expert)
                                        <option value="{{ $expert->ville }}">{{ $expert->ville }}</option>
                                    @endforeach
                                    <option value="Mohemmadia" > Casablanca</option>
                                    <option value="Rabat" > Rabat</option>
                                    <option value="Fes" > Fés</option>
                                    <option value="Marrakech" > Marrakech</option>
                                    <option value="Marrakech" > Agadir</option>
                                    <option value="Marrakech" > Wajda</option>
                                    <option value="Marrakech" > Beni mellal</option>
                                    <option value="Marrakech" > Tanger</option>
                                </select>
                            </div>
                            <div class="form-group clearfix mb-0">
                                <button type="submit" class="btn-md btn-theme float-left">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
