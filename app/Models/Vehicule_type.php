<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule_type extends Model
{
    use HasFactory;
      
    public function vehicules(){

        return $this->hasMany(Vehicule::class);

    }
}

