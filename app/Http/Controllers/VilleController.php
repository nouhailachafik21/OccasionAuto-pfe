<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VilleController extends Controller
{
    public function index(Request $request)
    {
        $villes = DB::table('villes')
        ->get();



      return view('administration.villes')->with (
       [
           'villes'=>$villes ,


       ]);
    }
    public function store(Request $req)
    {
      $count_ville=DB::table('villes')->where('ville',$req->ville)->count('ville');
      if($count_ville == 0){
        $ville = new Ville();
        $ville->ville=$req->input('ville');
        $ville->save();
         return redirect()->back()->with('status','La ville est bien ajoutée');
      }else
      {
          return redirect()->back()->with('erreur','cette ville a déjà existée.');
      }
    }


    public function destroy(Request $request,$id)
    {

        $modele=Ville::find($id);
        $modele->delete();
        return redirect()->back()->with('status','La ville est bien Supprimée .');


    }
    public function update(Request $request, $id)
 {
    $ville=Ville::find($id);
    $ville->ville=$request->input('ville');
    $ville->update();
    return redirect()->back()->with('status','La ville est bien modifiée');

}
}

