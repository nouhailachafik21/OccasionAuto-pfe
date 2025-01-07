<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    public $timestamps = false;
    public function vehicules()
    {
        return $this->hasMany(Vehicule::class);
    }
}
