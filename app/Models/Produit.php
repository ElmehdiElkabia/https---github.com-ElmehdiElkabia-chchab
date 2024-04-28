<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = 'produits';

    protected $fillable = [
        'nom', 'description', 'prix','path', 'entreprise_id',
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }


    public function jaimes()
    {
        return $this->hasMany(Jaime::class);
    }

    public function signalements()
    {
        return $this->hasMany(Signalement::class);
    }
}
