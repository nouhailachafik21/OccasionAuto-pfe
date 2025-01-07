<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    public function voiture(){

        return $this->belongsTo(Voiture::class);
    }


    public function vendeur(){

        return $this->belongsTo(Vendeur::class);
    }


    public function mission()
    {
        return $this->hasOne(Mission::class);
    }

}

