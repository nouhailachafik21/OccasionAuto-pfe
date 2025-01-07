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
            background-color: #ffa500 !important;
            border-color: #ffa500 !important;
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
                        <div class="table-responsive">
                            <table class="table table-borderless table-hover table-centered m-0 datatable-buttons"
                                   width="100%">
                            <thead >
                            <tr>
                                <th class="th-sm">Vehicule
                                </th>
                                <th class="th-sm">Ville
                                </th>
                                <th class="th-sm">Vendeur
                                </th>
                                <th class="th-sm">Expert
                                </th>
                                <th class="th-sm">Date Envoi Demande
                                </th>
                                <th class="th-sm">Date Envoi Mission
                                </th>
{{--                                <th class="th-sm">Date Envoi Reponse</th>--}}

                                <th class="th-sm">Status Réponse
                                </th>

                                <th class="th-sm">Action
                                </th>

                            </tr>

                            </thead>
                            <tbody>

                            @foreach($responses as $response)
                                <tr>

{{--                                    {{dd($response->demande)}}--}}
                                    <td> <a href="{{route('vehicule.reponse.expert',['id' => $response->id])}}">{{ $response->demande->voiture->marque ??''}}</a>     </td>
                                    <td> {{ $response->demande->vendeur->ville}}</td>
                                    <td><a href="{{url('/demandes',$response->demande->id) }}">{{$response->demande->vendeur->nom ?? ''}}</a></td>
                                    <td> {{$response->demande->mission->expert->cabinet ?? ''}}</td>
                                    <td>{{$response->demande->created_at ?? ''}}</td>
{{--                                    <td>{{$response->demande->mission ?? ''}}</td>--}}

                                    <td>{{$response->created_at}}</td>


                                    <td>{!! $response->status !!}</td>
                                    @if($response->getValue() == 0)
                                        <form method="GET" action="{{route('vehicule.reponse.expert',['id' => $response->id])}}">
                                            @csrf
                                            <td><button type="submit" class="btn btn-info btn-xs">Evaluer</button></td>
                                        </form>
                                         @endif
                                    @if($response->getValue()== 1)
                                        <form action="{{route('vehicule.reponse.expert',['id' => $response->id])}}" method="GET">
                                            @csrf
                                            <td><button type="submit" class="btn btn-info btn-xs">Details</button></td>
                                        </form>
                                    @endif
                                    @if($response->getValue() == 2)
                                        <form action="{{ route('achat.details',['vehicule'=>$response->demande->mission->vehicule->id])}}" method="GET">
                                            @csrf
                                            <td><button type="submit" class="btn btn-success btn-xs">Consulter Vehicule</button></td>
                                        </form>
                                    @endif

                                </tr>
                            @endforeach
                            </tbody>

                            <tfoot>

                            <tr>
                                <th class="th-sm">Vehicule
                                </th>
                                <th class="th-sm">Ville
                                </th>
                                <th class="th-sm">Vendeur
                                </th>
                                <th class="th-sm">Expert
                                </th>
                                <th class="th-sm">Date Envoi Demande
                                </th>
                                <th class="th-sm">Date Envoi Mission
                                </th>
                                <th class="th-sm">Date Envoi Réponse
                                </th>
                                <th class="th-sm">Status Réponse
                                </th>
                                <th class="th-sm">Action
                                </th>

                            </tr>

                            </tfoot>

                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        </div>
    </div>

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
