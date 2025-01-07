<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Vendeur;
use App\Models\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendeurController extends Controller
{

    public function index(Request $request)
    {
        $vendeurs = DB::table('vendeurs')
        ->get();


     return view('administration.vendeurs')->with (
       [
           'vendeurs'=>$vendeurs ,
       ]);
    }

    public function store(Request $request)
    {

      $vendeur = new Vendeur();

      $vendeur->prenom = $request->prenom;
      $vendeur->nom = $request->nom;
      $vendeur->email = $request->email;
      $vendeur->phone = $request->tel;
      $vendeur->ville = $request->ville;
      $vendeur->save();

      $voiture = new Voiture();

      $voiture->marque = $request->marque;
      $voiture->modele = $request->modele;
      $voiture->matricule = $request->matricule;
      $voiture->prix = $request->prix;
      $voiture->annee = $request->annee;
      $voiture->transmission = $request->transmission;
      $voiture->carburant = $request->Carburant;
      $voiture->save();

      $demandes=new Demande();

      $demandes->vendeur_id = $vendeur->id;
      $demandes->voiture_id = $voiture->id;


      $demandes->save();

        return redirect()->back()->with('status', 'Envoyé avec succès ');;
    }

}
