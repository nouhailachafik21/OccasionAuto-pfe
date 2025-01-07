<?php

namespace App\Http\Controllers;

use App\Models\Transmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransmissionController extends Controller
{

    public function index(Request $request)
    {
        $transmissions = DB::table('transmissions')
        ->get();



      return view('administration.transmissions')->with (
       [
           'transmissions'=>$transmissions ,


       ]);
    }
    public function store(Request $req)
    {
      $count_transmission=DB::table('transmissions')->where('transmisson',$req->transmission)->count('transmisson');
      if($count_transmission == 0){
        $transmission = new Transmission();
        $transmission->transmisson=$req->input('transmission');
        $transmission->save();
         return redirect()->back()->with('status','La transmission est bien ajoutée');
      }else
      {
          return redirect()->back()->with('erreur','cette transmission a déjà existée.');
      }
    }


    public function destroy(Request $request,$id)
    {

        $modele=Transmission::find($id);
        $modele->delete();
        return redirect()->back()->with('status','La transmission est bien Supprimée .');


    }
    public function update(Request $request, $id)
 {
    $transmission=Transmission::find($id);
    $transmission->transmisson=$request->input('transmission');
    $transmission->update();
    return redirect()->back()->with('status','La transmission est bien modifiée');

}
}
