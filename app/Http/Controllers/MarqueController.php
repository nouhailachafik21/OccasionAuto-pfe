<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Models\Modele;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarqueController extends Controller
{

    public function index(Request $request)
    {
        $marques = DB::table('marques')
        ->get();


      return view('administration.marques')->with (
       [
           'marques'=>$marques ,

       ]);
    }
    public function store(Request $req)
    {
      $count_marque=DB::table('marques')->where('marque',$req->marque)->count('marque');
      if($count_marque == 0){
        $marque = new Marque;
        $marque->marque=$req->input('marque');

        $marque->save();
         return redirect()->back()->with('status','La marque est bien ajoutée');
      }else
      {
          return redirect()->back()->with('erreur','cette marque a déjà existé.');
      }
    }
    public function destroy(Request $request,$id)
    {
        $marque=Marque::find($id);
        $marque->delete();
        return redirect()->back()->with('status','La marque est bien Supprimée .');

    }
    public function update(Request $request, $id)
 {

    $marque=Marque::find($id);
    $marque->marque=$request->input('marque');

    $marque->update();
    return redirect()->back()->with('status','La marque est bien modifiee');
}
}
