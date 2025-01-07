<?php

namespace App\Http\Controllers;

use App\Actions\Jetstream\UpdateTeamName;
use App\Models\Demande;
use App\Models\Marque;
use App\Models\Mission;
use App\Models\Picture;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MissionController extends Controller
{
   public  function index()
   {
    $missions = DB::table('missions')
    ->join('users','users.id', 'missions.user_id')
    ->join('demandes','demandes.id', 'missions.demande_id')
    ->join('voitures','voitures.id', 'demandes.voiture_id')
    ->join('vendeurs','vendeurs.id', 'demandes.vendeur_id')
    ->select("missions.id","missions.created_at","missions.status","vendeurs.ville","vendeurs.phone","voitures.marque","voitures.modele","vendeurs.nom","vendeurs.prenom","users.name","users.email","users.name")
    ->orderByDesc('id')
    ->get();

  return view('gestionnaire.missions.missions')->with (
   [
       'missions'=>$missions ,

   ]);

   }

   public function infoVehicule($id)
   {
    $missions = DB::table('missions')
    ->join('users','users.id', 'missions.user_id')
    ->join('demandes','demandes.id', 'missions.demande_id')
    ->join('voitures','voitures.id', 'demandes.voiture_id')
    ->join('vendeurs','vendeurs.id', 'demandes.vendeur_id')
    ->select("voitures.matricule","missions.id","missions.created_at","missions.status","voitures.marque","voitures.modele","voitures.annee","voitures.carburant","voitures.transmission","voitures.prix","vendeurs.nom","vendeurs.prenom","vendeurs.ville","users.name","users.email","users.name")
    ->where("missions.id",$id)
    ->get();
    $marques = DB::table('marques')->get();
    $modeles = DB::table('modeles')->get();
    $villes = DB::table('villes')->get();
    $carburants = DB::table('carburants')->get();
    $couleurs = DB::table('couleurs')->get();
    $types = DB::table('vehicule_types')->get();
    $transmissions = DB::table('transmissions')->get();
    $categories= DB::table('vehicule_categories')->get();
    return view('Expert.vehicules')->with (
        [
            'missions'=>$missions,
            'marques'=>$marques,
            'modeles'=>$modeles,
            'transmissions'=>$transmissions,
            'carburants'=>$carburants,
            'types'=>$types,
            'villes'=>$villes,
            'couleurs'=>$couleurs,
            "categories"=>$categories,
        ]);
   }
   public function deleteVehicule($id)
   {
    $vehicule=Vehicule::find($id);
    $vehicule->delete();
    return redirect()->back()->with('status','Le vehicule est bien Supprimé.');
   }


  public  function Addvehicule(Request $req,$id_mission)
        {
              $count_vehicules=Vehicule::where("matricule",$req->matricule)->count("matricule");
              if($count_vehicules==0){

              $vehicule = new Vehicule;
              $vehicule->marque_id = $req->marque;
              $vehicule->modele_id=$req->modele;
              $vehicule->carburant_id=$req->carburant;
              $vehicule->ville_id=$req->ville;
              $vehicule->transmission_id=$req->transmission;
              $vehicule->vehiculetype_id=$req->type;
              $vehicule->couleur_id=$req->couleur;
              $vehicule->matricule=$req->matricule;
              $vehicule->annee_mc=$req->annee;
              $vehicule->prix=$req->prix;
              $vehicule->kilometrage=$req->kilometrage;
              $vehicule->vehiculecategorie_id=$req->categorie;
              $vehicule->premiere_main=$req->premiere_main;
              $vehicule->code="#VEH00" . $vehicule->id;

              if($req->hasFile('photo'))
              {
                 $file1=$req->file('photo');
                 $extention = $file1->getClientOriginalExtension();
                 $filaname=time().'.'.$extention;
                 $file1->move('assets/img/car/',$filaname);
                 $vehicule->img=$filaname;

              }
            $vehicule->save();


            if($req->hasFile('exterieur'))
            {
               $file2=$req->file('exterieur');
               $extention2 = $file2->getClientOriginalExtension();
               $filaname_exterieur=time()."1".'.'.$extention2;
               $file2->move('assets/img/car/',$filaname_exterieur);
               $picture2=new Picture;
               $picture2->vehicule_id=$vehicule->id;
               $picture2->path=$filaname_exterieur;
               $picture2->save();
            }
            if($req->hasFile('interieur'))
            {
               $file3=$req->file('interieur');
               $extention3 = $file3->getClientOriginalExtension();
               $filaname_interieur=time()."2".'.'.$extention3;
               $file3->move('assets/img/car/',$filaname_interieur);
               $picture3=new Picture;
               $picture3->vehicule_id=$vehicule->id;
               $picture3->path=$filaname_interieur;
               $picture3->save();
            }

            $mission=Mission::find($id_mission);
            $mission->status=1;
            $mission->Update();
            return redirect()->back()->with('status','Ce vehicule est bien ajouté');
        }
        else
        {
            return redirect()->back()->with('erreur','Cee vehicule est déjà traité');
        }
    }


   public  function MissionExpert(){
    $missions = DB::table('missions')
    ->join('users','users.id', 'missions.user_id')
    ->join('demandes','demandes.id', 'missions.demande_id')
    ->join('voitures','voitures.id', 'demandes.voiture_id')
    ->join('vendeurs','vendeurs.id', 'demandes.vendeur_id')
    ->select("missions.id","missions.created_at","missions.status","vendeurs.ville","vendeurs.phone","voitures.marque","voitures.modele","vendeurs.nom","vendeurs.prenom","users.name","users.email","users.name")
    ->orderByDesc('id')
    ->get();
    //->where("user_id",Auth::user()->id)

      return view('Expert.mission')->with (
      [
       'missions'=>$missions ,

      ]);
   }
   public function EnvoyerMission(Request $req,$demande_id)
   {
     $count_mission=DB::table('missions')->where('demande_id',$demande_id)->count('demande_id');
    if($count_mission == 0){

       $mission = new Mission();
       $mission->demande_id=$demande_id;
       $mission->user_id=$req->input('expert');
       $mission->save();
       $demande=Demande::find($demande_id);
        $demande->statu="Terminé";
        $demande->update();

        return redirect()->back()->with('status','La mission est envoyée.');
     }else
     {
        return redirect()->back()->with('erreur','Cette mission a déjà envoyée.');
     }
   }
}
