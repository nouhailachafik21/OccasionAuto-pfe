<?php

namespace App\Http\Controllers;

use App\Models\Couleur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouleurController extends Controller
{

    public function index(Request $request)
    {
        $couleurs = DB::table('couleurs')
        ->get();


      return view('administration.couleurs')->with (
       [
           'couleurs'=>$couleurs ,

       ]);
    }
    public function store(Request $req)
    {
      $count_couleur=DB::table('couleurs')->where('couleur',$req->couleur)->count('couleur');
      if($count_couleur == 0){
        $couleur = new Couleur;
        $couleur->couleur=$req->input('couleur');

        $couleur->save();
         return redirect()->back()->with('status','La couleur est bien ajoutée');
      }else
      {
          return redirect()->back()->with('erreur','cette couleur a déjà existé.');
      }
    }


    public function destroy(Request $request,$id)
    {
        $couleur=Couleur::find($id);
        $couleur->delete();
        return redirect()->back()->with('status','La couleur est bien Supprimée .');

    }
    public function update(Request $request, $id)
 {

    $couleur=Couleur::find($id);
    $couleur->couleur=$request->input('couleur');

    $couleur->update();
    return redirect()->back()->with('status','La couleur est bien modifiee');
}
}
