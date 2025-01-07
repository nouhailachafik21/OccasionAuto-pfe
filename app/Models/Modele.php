<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function vehicules(){
        return $this->hasMany(Vehicule::class);
    }
    public function marque(){
        return $this->belongsTo(Marque::class);
    }
}
