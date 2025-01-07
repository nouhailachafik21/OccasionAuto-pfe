@extends('layouts.app')


@section('css')
    <link href="{{ asset('assets\libs\datatables\dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css">

    <style>
        .sticky-header {
            background: rgb(20 20 19 / 45%);
        }
        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #ffa500!important;
            border-color: #ffa500!important;
        }

        .pagination > li > a, .pagination > li > span {
            margin: 0 2px 5px;
            height: 40px;
            width: 63px;
            font-size: 13px;
            line-height: 40px;
            text-align: center;
            border: none;
            padding: 0;
            border-radius: 3px;
            background: #fff;
            box-shadow: 1px 1px 1px 1px rgb(0 0 0 / 10%);
        }
    </style>
@endsection


@section('content')



    <div style="margin: 10vw 10vw 10vw;" >
        <h2 class="h1-responsive font-weight-bold mb-5 text-center">Demandes Expertises</h2>
        <div class="row ">
            <div class="col-12 mb-5">
                <div class="card" style="background-color: #e8e7e7;border-color: #e8e7e7;">
                    <div class="card-body">
                        <br>
                        <div class="table-responsive">
                            <table class="table table-borderless table-hover table-centered m-0 datatable-buttons" width="100%">
                            <thead>
                            <tr>
                                <th>Clints
                                </th>
                                <th>Telephone
                                </th>
                                <th>Ville
                                </th>
                                <th>Date demande
                                </th>
                                <th class=" text-center">Options <i class="fa fa-wrench"></i></th>
                                <th class="text-center">Statut
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(isset($demandes) && !empty($demandes))
                                @foreach($demandes as $value)
                                    <tr>
                                        <td>{{$value->nom}} {{$value->prenom}}</td>
                                        <td>{{$value->telephone}}</td>

                                        <td>{{$value->ville}}</td>
                                        <td>{{$value->created_at}}</td>
                                        @if($value->statut == "0")
                                        <td class="options text-center">
                                            <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#con-close-modal" onclick="demande_id({{$value->id}})">Mission</button>
                                            <button type="button" class="btn btn-outline-warning bomd" data-toggle="modal" data-target="#delete" onclick="classer(this)"
                                                    data-id="{{$value->id}}">Classer</button>
                                           </td>

                                            <td  style="color: red;text-align: center;font-weight: bold;">Non traité</td>
                                        @elseif($value->statut == "1")
                                            <td></td>
                                            <td style="color: green;text-align: center;font-weight: bold;">En attente</td>
                                        @else
                                            <td></td>
                                            <td style="color: #1b84e7;text-align: center;font-weight: bold;">Terminé</td>
                                        @endif
                                    </tr>

                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>
    </div>

    <div class="modal fade" id="con-close-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Coordonnées du propriétaire</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{ route('coordonnees_proprietaires.store') }}" enctype="multipart/form-data"  method="post">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Nom</label>
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Prénom</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Ville</label>
                                    <select name="ville" id="ville" class="form-control" required>
                                        <option value="0" selected> Choisissez votre ville</option>
                                        @foreach($experts as $expert)
                                            <option value="{{ $expert->ville }}">{{ $expert->ville }}</option>
                                        @endforeach
                                        <option value="Mohemmadia" > Mohemmadia</option>
                                        <option value="Rabat" > Rabat</option>
                                        <option value="Fes" > Fés</option>
                                        <option value="Marrakech" > Marrakech</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Téléphone</label>
                                    <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Téléphone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Marque</label>
                                    <select class="form-control" onchange="listModeleMarque()"  id="marque-id" name="marque">
                                            <option value="">Marque</option>
                                            @foreach($marques as $value)
                                                <option value="{{$value->id}}" {{request('marque') == $value->id ?'selected':''}} >{{$value->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Modèle</label>
                                    <select class="form-control" name="modele" id="modele-id">
                                        <option value="">Modèle</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Matricule</label>
                                    <input type="text" class="form-control" id="matricule" placeholder="Matricule">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Cabinet expertise</label>
                                    <select name="expert" id="expert" class="form-control" required>
                                        <option value="" selected> Choisissez votre ville</option>
                                        @foreach($expertsAll as $value)
                                            <option value="{{ $value->id }}">{{ $value->cabinet }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Valider</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Contact 2 end -->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Voulez-vous vraiment classer la demande?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-footer">
                    <form id="formclasserdemande" action="" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id_demande" id="id_demande">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-warning">Classer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script !src="">
        
        function demande_id(id) {
            $("#con-close-modal").modal('show');
            var champ = $('<input>');
            champ.attr('type', 'hidden');
            champ.attr('name', 'demande-id');
            champ.attr('value', id);
            champ.appendTo('form');


        }
        
        
        function classer(e) {
            let id = $(e).attr('data-id');

            let url = "{{route('demandes-experts.update',['demandes_expert'=>':id'])}}";
            url = url.replace(':id', id);
            $('#formclasserdemande').attr('action', url);
            $('#id_demande').val(id);

        }

        function listModeleMarque()
        {
            let name= $('#marque-id').val();

            axios.post("{{ route('list.marque.with.id') }}", {
                marque: name
            })
                .then(function (res) {
                    // console.log(res);
                    let html = '<option value="">Modèle</option>';
                    $("#modele-id").empty();
                    for (let i = 0;i<res.data.length;i++) {
                        html+="<option value="+res.data[i]['id']+">"+res.data[i]['name']+"</option>";
                    }

                    $("#modele-id").append(html)  ;
                })
                .catch(function (error) {

                });
        }

    </script>

@section('js')

    <script src="{{ asset('assets\libs\datatables\jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets\libs\datatables\dataTables.bootstrap4.js')}}"></script>
    <script>
        $(document).ready(function () {

            $('.datatable-buttons').dataTable();
        });

    </script>



@endsection


@endsection
