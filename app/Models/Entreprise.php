<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    protected $table = 'entreprises';

    protected $fillable = [
        'nom', 'adresse','oath'
    ];

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
