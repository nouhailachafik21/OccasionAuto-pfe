<?php

namespace App\Http\Controllers;

use App\Models\Express;
use Illuminate\Http\Request;

class ExpressController extends Controller
{
    public function Envoyer(Request $req){
        $validated = $req->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'ville' => 'required',
            'tel' => 'required',
        ]);
        $express = new Express();
        $express->nom=$req->input('nom');
        $express->prenom=$req->input('prenom');
        $express->ville=$req->input('ville');
        $express->telephone=$req->input('tel');
        $express->save();
         return redirect()->back()->with('status','la demande est envoyée');
    }
}
