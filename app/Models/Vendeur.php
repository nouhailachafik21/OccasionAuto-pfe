<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendeur extends Model
{
    use HasFactory;

    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }
}
