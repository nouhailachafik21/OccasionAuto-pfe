<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RechercheController extends Controller
{
    public function searchMissionExpert(Request $request)
    {

       $missions = DB::table('missions')
       ->join('users','users.id', 'missions.user_id')
       ->join('demandes','demandes.id', 'missions.demande_id')
       ->join('voitures','voitures.id', 'demandes.voiture_id')
       ->join('vendeurs','vendeurs.id', 'demandes.vendeur_id')
       ->select("missions.id","missions.created_at","missions.status","vendeurs.ville","vendeurs.phone","voitures.marque","voitures.modele","vendeurs.nom","vendeurs.prenom","users.name","users.email","users.name");
      if(!empty($request->id))
       {
           $missions=$missions->where('missions.id',$request->id);
       }
       if(!empty($request->vendeur))
       {
           $missions=$missions->where('vendeurs.nom',$request->vendeur);
       }
       if(!empty($request->marque))
       {
           $missions=$missions->where('voitures.marque',$request->marque);
       }
       if(!empty($request->modele))
       {
          $missions=$missions->where('voitures.modele',$request->modele);
       }
         $missions=$missions->get();

      return view('Expert.mission')->with(
        [
            'missions'=>$missions,
        ]);
   }

   public function searchMissionGestionnaire(Request $request)
   {
      $missions = DB::table('missions')
      ->join('users','users.id', 'missions.user_id')
      ->join('demandes','demandes.id', 'missions.demande_id')
      ->join('voitures','voitures.id', 'demandes.voiture_id')
      ->join('vendeurs','vendeurs.id', 'demandes.vendeur_id')
      ->select("missions.id","missions.created_at","missions.status","vendeurs.ville","vendeurs.phone","voitures.marque","voitures.modele","vendeurs.nom","vendeurs.prenom","users.name","users.email","users.name");
     if(!empty($request->id))
      {
          $missions=$missions->where('missions.id',$request->id);
      }
      if(!empty($request->vendeur))
      {
          $missions=$missions->where('vendeurs.nom',$request->vendeur);
      }
      if(!empty($request->marque))
      {
          $missions=$missions->where('voitures.marque',$request->marque);
      }
      if(!empty($request->modele))
      {
         $missions=$missions->where('voitures.modele',$request->modele);
      }
        $missions=$missions->get();

     return view('gestionnaire.missions.missions')->with(
       [
           'missions'=>$missions,
       ]);
   }

   public function searchVendeur(Request $request)
   {

    $vendeurs = DB::table('vendeurs');
    if(!empty($request->nom))
    {
        $vendeurs=$vendeurs->where('vendeurs.nom',$request->nom);
    }
    if(!empty($request->prenom))
    {
        $vendeurs=$vendeurs->where('vendeurs.prenom',$request->prenom);
    }
    if(!empty($request->ville))
    {
        $vendeurs=$vendeurs->where('vendeurs.ville',$request->ville);
    }
    $vendeurs=$vendeurs->get();
    $vendeurs_count=$vendeurs->count();
       if($vendeurs_count!=0)
    return view('administration.vendeurs')->with(
        [
            'vendeurs'=>$vendeurs,
        ]);
        else
        {
            return redirect()->back();

        }
   }
   public function searchMarque(Request $request)
   {
    $marques = DB::table('marques');
    if(!empty($request->marque))
    {
    $marques = $marques->where('marques.marque',$request->marque);
    }
    $marques =$marques->get();

    return view('administration.marques')->with(
        [
            'marques'=>$marques,
        ]);
   }
   public function searchCarburant(Request $request)
   {
    $carburants = DB::table('carburants');

    if(!empty($request->carburant))
    {
    $carburants = $carburants->where('carburants.carburant',$request->carburant);
    }
    $carburants =$carburants->get();

    return view('administration.carburants')->with(
        [
            'carburants'=>$carburants,
        ]);
   }
   public function searchVille(Request $request)
   {
    $villes = DB::table('villes');

    if(!empty($request->ville))
    {
    $villes = $villes->where('villes.villes',$request->ville);
    }
    $villes =$villes->get();

    return view('administration.villes')->with(
        [
            'villes'=>$villes,
        ]);
   }
   public function searchCouleur(Request $request)
   {
    $couleurs = DB::table('couleurs');

    if(!empty($request->couleur))
    {
    $couleurs = $couleurs->where('couleurs.couleur',$request->couleur);
    }
    $couleurs =$couleurs->get();

    return view('administration.couleurs')->with(
        [
            'couleurs'=>$couleurs,
        ]);
   }
   public function searchTransmission(Request $request)
   {
    $transmissions = DB::table('transmissions');

    if(!empty($request->transmission))
    {
    $transmissions = $transmissions->where('transmissions.transmisson',$request->transmission);
    }
    $transmissions =$transmissions->get();

    return view('administration.transmissions')->with(
        [
            'transmissions'=>$transmissions,
        ]);
   }
   public function searchModele(Request $request)
   {
    $modeles = DB::table('modeles')
    ->join('marques','marques.id', 'modeles.marque_id');
    if(!empty($request->marque))
    {
        $modeles=$modeles->where('marques.marque',$request->marque);
    }
    if(!empty($request->modele))
    {
        $modeles=$modeles->where('modeles.modele',$request->modele);
    }

    $modeles=$modeles->get();
   $marques=Marque::all();
    return view('administration.modeles')->with(
        [
            'modeles'=>$modeles,
            'marques'=>$marques
        ]);
   }

   public function searchVehicules(Request $request)
   {
    $vehicules = DB::table('vehicules')
    ->join('marques', 'marques.id','vehicules.marque_id')
    ->join('modeles', 'modeles.id','vehicules.modele_id')
    ->join('carburants', 'carburants.id','vehicules.carburant_id')
    ->join('villes', 'villes.id','vehicules.ville_id');

   if(!empty($request->code))
    {
        $vehicules=$vehicules->where('vehicules.code',$request->code);
    }
    if(!empty($request->marque))
    {
        $vehicules=$vehicules->where('marques.marque',$request->marque);
    }
    if(!empty($request->ville))
    {
        $vehicules=$vehicules->where('villes.ville',$request->ville);
    }
    if(!empty($request->modele))
    {
       $vehicules=$vehicules->where('vendeurs.nom',$request->modele);
    }

    $vehicules=$vehicules->select("vehicules.id","vehicules.code","vehicules.img","vehicules.statu","vehicules.annee_mc","marques.marque","modeles.modele","villes.ville")->get();
    return view('administration.vehicules')->with(
        [
            'vehicules'=>$vehicules,
        ]);

   }
}
