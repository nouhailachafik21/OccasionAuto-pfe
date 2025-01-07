

<div class="list-group">

    <a   href="{{route('vehicule.vehicules')}}"     class="list-group-item list-group-item-action {{url()->current() == route('vehicule.vehicules')   ? 'active' : ''}}">Vehicules</a>
    <a   href="{{route('vehicule.vendeurs')}}"      class="list-group-item list-group-item-action {{url()->current() == route('vehicule.vendeurs')  ? 'active' : ''}}">Vendeurs</a>
    <a   href="{{route('vehicule.marques')}}"       class="list-group-item list-group-item-action {{url()->current() == route('vehicule.marques')    ? 'active' : ''}}">Marques</a>
    <a   href="{{route('vehicule.modeles')}}"       class="list-group-item list-group-item-action {{url()->current() == route('vehicule.modeles')    ? 'active' : ''}}">Modeles</a>
    <a   href="{{route('vehicule.villes')}}"        class="list-group-item list-group-item-action {{url()->current() == route('vehicule.villes')   ? 'active' : ''}}">Villes</a>
    <a   href="{{route('vehicule.carburants')}}"    class="list-group-item list-group-item-action {{url()->current() == route('vehicule.carburants')   ? 'active' : ''}}">Carburants</a>
    <a   href="{{route('vehicule.transmissions')}}" class="list-group-item list-group-item-action {{url()->current() == route('vehicule.transmissions')   ? 'active' : ''}}">Transmissions</a>
    <a   href="{{route('vehicule.categories')}}"    class="list-group-item list-group-item-action {{url()->current() == route('vehicule.categories')   ? 'active' : ''}}">Categorie de voiture </a>
    <a   href="{{route('vehicule.couleurs')}}"      class="list-group-item list-group-item-action {{url()->current() == route('vehicule.couleurs')   ? 'active' : ''}}">Couleurs</a>
    <a   href="{{route('utilisateur.index')}}"      class="list-group-item list-group-item-action {{url()->current() == route('utilisateur.index')   ? 'active' : ''}}">Utilisateurs</a>
    <a   href="{{route('experts.index')}}"          class="list-group-item list-group-item-action {{url()->current() == route('experts.index')   ? 'active' : ''}}">experts</a>
 <!--   <a   href="{{route('experts.index')}}"          class="list-group-item list-group-item-action {{url()->current() == route('experts.index')   ? 'active' : ''}}">experts</a>-->

</div>
