<?php
namespace App\Http\Controllers;
use App\Models\Ville;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\Picture;
use App\Models\Vehicule;
use App\Models\Carburant;
use App\Models\Couleur;
use App\Models\Transmission;
use Illuminate\Http\Request;
use App\Models\Vehicule_categorie;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class VehiculeController extends Controller
{
     
    public function addToCart($id)
    {
       // $product = cart::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset( $cart[$id])) {
            $cart[$id]++;
        } else {
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function index($id=null){

        $vehicules = DB::table('vehicules')
          ->join('marques', 'marques.id', '=', 'vehicules.marque_id')
          ->join('modeles', 'modeles.id', '=', 'vehicules.modele_id')
          ->join('transmissions', 'transmissions.id', '=', 'vehicules.transmission_id')
          ->join('carburants', 'carburants.id', '=', 'vehicules.carburant_id')
          ->select("vehicules.*","marques.marque","modeles.modele","carburants.carburant","transmissions.transmisson")->limit(3)->get();
          $marques= Marque::all();
          $carburats =Carburant::all();
          $transmissions =Transmission::all();
          $villes =Ville::all();
          $vehiculeImg =Vehicule::all();
        return view('index')->with (
         [
             'vehicules'=>$vehicules ,
             'vehiculeImg'=>$vehiculeImg,
             'villes'=>$villes,
             'marques'=>$marques ,
             'Carburants'=>$carburats ,
             'transmissions'=>$transmissions ,
         ]);
   }

   public function update(Request $request, $id)
   {
      $vehicule=Vehicule::find($id);
      $vehicule->marque_id=$request->input('marque');
      $vehicule->modele_id=$request->input('modele');
      $vehicule->carburant_id=$request->input('carburant');
      $vehicule->transmission_id=$request->input('transmission');
      $vehicule->ville_id=$request->input('ville');
      $vehicule->couleur_id=$request->input('couleur');
      $vehicule->prix=$request->input('prix');
      $vehicule->kilometrage=$request->input('kilometrage');
      $vehicule->update();

      return redirect()->back()->with('status','Le vehicule est bien modifié');
  }

   public function indexAdmin()
   {
    $vehicules = DB::table('vehicules')
      ->join('marques', 'marques.id', '=', 'vehicules.marque_id')
      ->join('modeles', 'modeles.id', '=', 'vehicules.modele_id')
      ->join('transmissions', 'transmissions.id', '=', 'vehicules.transmission_id')
      ->join('carburants', 'carburants.id', '=', 'vehicules.carburant_id')
      ->join('Villes', 'Villes.id', '=', 'vehicules.ville_id')
      ->join('couleurs', 'couleurs.id', '=', 'vehicules.couleur_id')
      ->select("vehicules.id","vehicules.prix","vehicules.kilometrage","vehicules.code","couleurs.couleur","villes.ville","vehicules.statu","vehicules.img","marques.marque","modeles.modele","carburants.carburant","transmissions.transmisson","vehicules.annee_mc")
      ->get();
      $marques= Marque::all();
      $modeles= Modele::all();
      $carburants =Carburant::all();
      $transmissions =Transmission::all();
      $villes =Ville::all();
      $couleurs =Couleur::all();
    return view('administration.vehicules')->with (
     [
             'vehicules'=>$vehicules ,
             'villes'=>$villes,
             'marques'=>$marques ,
             'carburants'=>$carburants ,
             'transmissions'=>$transmissions ,
             'couleurs'=>$couleurs,
             'modeles'=>$modeles,

     ]);
}
public function indexExpert()
{
 $vehicules = DB::table('vehicules')
   ->join('marques', 'marques.id', '=', 'vehicules.marque_id')
   ->join('modeles', 'modeles.id', '=', 'vehicules.modele_id')
   ->join('transmissions', 'transmissions.id', '=', 'vehicules.transmission_id')
   ->join('carburants', 'carburants.id', '=', 'vehicules.carburant_id')
   ->join('Villes', 'Villes.id', '=', 'vehicules.ville_id')
   ->select("vehicules.id","vehicules.code","villes.ville","vehicules.statu","vehicules.img","marques.marque","modeles.modele","carburants.carburant","transmissions.transmisson","vehicules.annee_mc")
   ->get();

 return view('Expert.ListeVehicules')->with (
  [
      'vehicules'=>$vehicules ,

  ]);
}
   public function vendre(){

    $vehicules = DB::table('vehicules')
      ->join('pictures', 'pictures.vehicule_id', '=', 'vehicules.id')
      ->join('marques', 'marques.id', '=', 'vehicules.marque_id')
      ->join('modeles', 'modeles.id', '=', 'vehicules.modele_id')
      ->join('transmissions', 'transmissions.id', '=', 'vehicules.transmission_id')
      ->join('carburants', 'carburants.id', '=', 'vehicules.carburant_id')->orderBy('vehicules.id','desc')
      ->get();
      $marques= Marque::all();
      $carburats =Carburant::all();
      $transmissions =Transmission::all();
      $villes =Ville::all();

    return view('vendre')->with (
     [
         'vehicules'=>$vehicules ,
         'villes'=>$villes,
         'marques'=>$marques ,
         'Carburants'=>$carburats ,
         'transmissions'=>$transmissions ,
     ]);

}
   public function showDetails($id=null)
   {
    $vehicules = DB::table('vehicules')
    ->join('pictures','pictures.vehicule_id','=','vehicules.id')
    ->where('pictures.vehicule_id',$id)
    ->get();
    $vehicules_info = DB::table('vehicules')
    ->join('marques','marques.id', 'vehicules.marque_id')
    ->join('modeles','modeles.id', 'vehicules.modele_id')
    ->join('transmissions', 'transmissions.id', 'vehicules.transmission_id')
    ->join('villes','ville_id','villes.id')
    ->join('carburants', 'carburants.id', 'vehicules.carburant_id')->orderBy('vehicules.id','desc')
    ->where('vehicules.id',$id)
    ->get();
     $vehiculeImg=DB::table('vehicules')->where("vehicules.id",$id)->get()->first();

       return view('detail')->with (
        [
            'vehiculeImg'=>$vehiculeImg,
            'vehicules'=>$vehicules,
            'vehicules_info'=>$vehicules_info
        ]);
   }
   /*public function showDetailsg($id=null){
    //dd($vehicule);
    $vehicule = DB::table('vehicules')
    ->where('id',$id)
    ->get();
    $Key = 'vehicule_' . $vehicule->id;

    if (!Session::has($Key)) {
        $vehicule->increment('view_count', 1);
        Session::put($Key, 1);
    }
    $picture=Picture::where('vehicule_id',$vehicule->id)->get();
    return view('achat.details',['vehicule' => $vehicule,'picture'=>$picture]);
     }*/
 public function search(Request $request)
 {
    $vehicules = DB::table('vehicules')
    ->join('marques', 'marques.id','vehicules.marque_id')
    ->join('modeles','modeles.id','vehicules.modele_id')
    ->join('transmissions', 'transmissions.id','vehicules.transmission_id')
    ->join('carburants', 'carburants.id','vehicules.carburant_id')
    ->join('villes', 'villes.id','vehicules.ville_id');

   if(!empty($request->marque))
    {
        $vehicules=$vehicules->where('marques.id',$request->marque);
    }
    if(!empty($request->modele))
    {
        $vehicules=$vehicules->where('modeles.id',$request->modele);
    }
    if(!empty($request->ville))
    {
        $vehicules=$vehicules->where('villes.id',$request->ville);
    }
    if(!empty($request->transmissions))
    {
       $vehicules=$vehicules->where('transmissions.id',$request->transmissions);
    }
    if(!empty($request->Carburant))
    {
        $vehicules=$vehicules ->where('carburants.id',$request->Carburant);
    }
    if($request-> prix != 0)
    {
        $vehicules=$vehicules->whereBetween('vehicules.prix', [0,$request->prix]);
    }

      $marques= Marque::all();
      $modeles = Modele::all();
      $Carburants =Carburant::all();
      $categories =Vehicule_categorie::all();
      $transmissions =Transmission::all();
      $villes =Ville::all();
      $vehicules=$vehicules->select("vehicules.*","marques.marque","modeles.modele","carburants.carburant","transmissions.transmisson")->get();
      $vehicules_count=$vehicules->count("vehicules.id");
   return view('achet')->with(
     [
         'vehicules'=>$vehicules,
         'villes'=>$villes,
         'marques'=>$marques ,
         'modeles'=>$modeles ,
         'Carburants'=>$Carburants ,
         'transmissions'=>$transmissions ,
         'categories'=>$categories ,
         'vehicules_count'=>$vehicules_count,
     ]);
}
public function getModeleIndex(Request $req){
    $modele =DB::table('modeles')
    ->where('marque_id',$req->marque_id)->get();
    return response()->json($modele);
  }

public function getModele(Request $req){
    $modele =DB::table('modeles')
    ->join('marques', 'marques.id','modeles.marque_id')
    ->where('marque',$req->marque)->get();
    return response()->json($modele);
  }

  public function deconnexion()
  {
      auth()->logout();

      return view('auth/login');
  }

}
