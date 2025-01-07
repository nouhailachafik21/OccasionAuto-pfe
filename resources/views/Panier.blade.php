@extends('layout.app')
@section('content')


<div class="container " style="margin-top: 150px; margin-bottom: 200px">
    <div class="text-panier" style="display: flex;justify-content: space-between;">

        <h2>Panier</h2>
       <!-- <h6>   Rechercher: <input type="text" style="outline: none"></h6>-->
    </div>
    @if(Session::has('success'))
    <h6 class="alert alert-success">
        {{Session::get('success')}}
    </h6>
@endif
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Vehicule</th>
          <th>Description</th>
          <th>Prix</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($cartItems as $item)
        <tr id="{{$item->rowId}}">
          <td><a href="{{ route("vehicule.detail",$item->id )}}"><img src="{{asset('/assets/img/car/'.$item->path)}}" style="width: 200px;height: 150px;" alt=""></td></a>
          <td>{{$item->modele}}&nbsp;{{$item->marque}}</td>
          <td>{{$item->prix}}&nbsp;MAD</td>
          <td class="hidden text-right md:table-cell">
            <form action="{{route('cart.remove')}}" method="POST">
            @csrf
            <button type="hidden" style="background-color: #fff;color:rgb(59, 59, 59)" value="{{$item->id}}" name="id">  <i class="bi bi-trash"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>


@endsection
