<?php

namespace App\Http\Controllers;

use App\Models\Vehicule_categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategorieController extends Controller
{

    public function index(Request $request)
    {
        $categories = DB::table('vehicule_categories')
        ->get();



      return view('administration.categories')->with (
       [
           'categories'=>$categories ,


       ]);
    }
    public function store(Request $req)
    {
      $count_ville=DB::table('vehicule_categories')->where('categorie',$req->categorie)->count('categorie');
      if($count_ville == 0){
        $categorie = new Vehicule_categorie();
        $categorie->categorie=$req->input('categorie');
        $categorie->save();
         return redirect()->back()->with('status','Le categorie est bien ajouté');
      }else
      {
          return redirect()->back()->with('erreur','ce categorie a déjà existé.');
      }
    }


    public function destroy(Request $request,$id)
    {

        $categorie=Vehicule_categorie::find($id);
        $categorie->delete();
        return redirect()->back()->with('status','Le categorie est bien Supprimé .');


    }
    public function update(Request $request, $id)
 {
    $categorie=Vehicule_categorie::find($id);
    $categorie->categorie=$request->input('categorie');
    $categorie->update();
    return redirect()->back()->with('status','Le categorie est bien modifié');

}
}
