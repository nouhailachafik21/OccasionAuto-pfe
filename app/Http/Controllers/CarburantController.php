<?php

namespace App\Http\Controllers;

use App\Models\Carburant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarburantController extends Controller
{

    public function index(Request $request)
    {
        $carburants = DB::table('carburants')
        ->get();

      return view('administration.carburants')->with (
       [
           'carburants'=>$carburants ,


       ]);
    }
    public function store(Request $req)
    {
      $count_carburant=DB::table('carburants')->where('carburant',$req->carburant)->count('carburant');
      if($count_carburant == 0){
        $carburant = new Carburant();
        $carburant->carburant=$req->input('carburant');
        $carburant->save();
         return redirect()->back()->with('status','Le carburant est bien ajoutée');
      }else
      {
          return redirect()->back()->with('erreur','ce carburant a déjà existé.');
      }
    }


    public function destroy(Request $request,$id)
    {

        $modele=Carburant::find($id);
        $modele->delete();
        return redirect()->back()->with('status','Le carburant est bien Supprimé .');


    }
    public function update(Request $request, $id)
 {
    $modele=Carburant::find($id);
    $modele->modele=$request->input('modele');
    $modele->update();
    return redirect()->back()->with('status','Le carburant est bien modifie');

}
}
