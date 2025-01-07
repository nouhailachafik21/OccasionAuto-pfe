<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'marque',

    ];
    public function modeles(){
        return $this->hasMany(Model::class);
    }

}
