<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;
    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }
    public function carburant()
    {
        return $this->belongsTo(Carburant::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function transmission()
    {
        return $this->belongsTo(Transmission::class);
    }

    public function modele()
    {
        return $this->belongsTo(Model::class);
    }
    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }
    public function vehicule_categories()
    {
        return $this->belongsTo(Vehicule_categorie::class);
    }
    public function vehicule_types()
    {
        return $this->belongsTo(Vehicule_type::class);
    }
    public function mission()
    {
        return $this->belongsTo(Mission::class);
    }
    public function statuses()
    {
        return $this->belongsTo(statu::class)->withPivot('from', 'to');
    }
}
