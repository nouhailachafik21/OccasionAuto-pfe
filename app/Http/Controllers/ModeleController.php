<?php

namespace App\Http\Controllers;

use App\Models\Modele;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JeroenNoten\LaravelAdminLte\View\Components\Tool\Modal;

class ModeleController extends Controller
{

    public function index(Request $request)
    {
        $modeles = DB::table('modeles')
        ->join('marques', 'marques.id','modeles.marque_id')
        ->get();
        $marques = DB::table('marques')
        ->get();


      return view('administration.modeles')->with (
       [
           'modeles'=>$modeles ,
           'marques'=>$marques

       ]);
    }
    public function store(Request $req)
    {
      $count_modele=DB::table('modeles')->where('modele',$req->modele)->count('modele');
      if($count_modele == 0){
        $modele = new Modele();
        $modele->modele=$req->input('modele');
        $modele->marque_id=$req->input('marque');
        $modele->save();
         return redirect()->back()->with('status','Le modele est bien ajoutée');
      }else
      {
          return redirect()->back()->with('erreur','ce modele a déjà existé.');
      }
    }


    public function destroy(Request $request,$id)
    {
     //   $count_modele=DB::table('vehicules')->where('modele_id',$request->modeletd)->count('modele_id');
      //  if($count_modele == 0){
        $modele=Modele::find($id);
        $modele->delete();
        return redirect()->back()->with('status','Le modele est bien Supprimé .');
      //  }

    }
    public function update(Request $request, $id)
 {
    $count_modele=DB::table('vehicules')->where('modele_id',$request->modeletd)->count('modele_id');
    if($count_modele == 0){
    $modele=Modele::find($id);
    $modele->modele=$request->input('modele');
    $modele->marque_id=$request->input('marque');
    $modele->update();
    return redirect()->back()->with('status','Le modele est bien modifie');
    }
}
}
