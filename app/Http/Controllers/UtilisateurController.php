<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class UtilisateurController extends Controller
{
    public function index(Request $request)
    {
        $utilisateurs = DB::table('users')
        ->get();

      return view('administration.utilisateurs')->with (
       [
           'utilisateurs'=>$utilisateurs ,
       ]);
    }
    public function destroy(Request $request,$id)
    {

        $modele=User::find($id);
        $modele->delete();
        return redirect()->back()->with('status',"l'utilisateur' est bien Supprimé .");


    }
    public function update(Request $request, $id)
 {
    $user=User::find($id);
    $user->name=$request->input('name');
    $user->type=$request->input('email');
    $user->password=Hash::make($request->input('password'));
    $user->update();
    return redirect()->back()->with('status',"l'utilisateur est bien modifié");

}
}
