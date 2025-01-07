<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpertController extends Controller
{
    public function index()
    {
        $experts = DB::table('users')
        ->where("type","Expert")
        ->get();
      return view('administration.experts')->with (
       [
           'experts'=>$experts ,
       ]);
    }
}
