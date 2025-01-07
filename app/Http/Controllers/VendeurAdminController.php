<?php

namespace App\Http\Controllers;

use App\Models\Vendeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendeurAdminController extends Controller
{
    public function index(Request $request)
    {
        $Vendeurs = DB::table('vendeurs')
        ->get();
         
      return view('administration.vendeurs')->with (
       [
           'vendeurs'=>$Vendeurs ,


       ]);
    }
    public function destroy(Request $request,$id)
    {

        $modele=Vendeur::find($id);
        $modele->delete();
        return redirect()->back()->with('status','Le vendeur est bien Supprimé .');


    }
    public function update(Request $request, $id)
 {
    $Vendeur=Vendeur::find($id);
    $Vendeur->prenom=$request->input('prenom');
    $Vendeur->nom=$request->input('nom');
    $Vendeur->email=$request->input('email');
    $Vendeur->phone=$request->input('phone');
    $Vendeur->ville=$request->input('ville');
    $Vendeur->update();
    return redirect()->back()->with('status','Le vendeur est bien modifié');

}
}
