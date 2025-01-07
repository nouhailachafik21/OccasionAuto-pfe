<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemandeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $demandes = DB::table('demandes')
          ->join('vendeurs', 'vendeurs.id','demandes.vendeur_id')
          ->join('voitures', 'voitures.id', '=', 'demandes.voiture_id')
          ->select("demandes.id","demandes.statu","voitures.marque","voitures.modele","voitures.carburant","voitures.transmission","voitures.prix","vendeurs.nom","vendeurs.prenom","vendeurs.ville","vendeurs.email","vendeurs.phone","voitures.annee","demandes.created_at")
          ->orderByDesc('demandes.id')
          ->get();
        return view('gestionnaire.demandes.demandes')->with(
         [
             'demandes'=>$demandes ,
         ]);

    }
    public function Detaildemande($id)
    {
        $demandes = DB::table('demandes')
        ->join('vendeurs', 'vendeurs.id','demandes.vendeur_id')
        ->join('voitures', 'voitures.id', '=', 'demandes.voiture_id')
        ->where("demandes.id",$id)
        ->select("demandes.id","demandes.statu","voitures.marque","voitures.modele","voitures.carburant","voitures.transmission","voitures.prix","vendeurs.nom","vendeurs.prenom","vendeurs.ville","vendeurs.email","vendeurs.phone","voitures.annee")
        ->get();
        $experts= DB::table('users')->where("type","Expert")->get();
        $demande_id=Demande::find($id);
      return view('gestionnaire.demandes.details-demande')->with(
       [
           'demandes'=>$demandes ,
           "demandesID"=>$demande_id,
           "experts"=>$experts

       ]);
    }
}
