<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategorieProduit;

class UniteQuantite extends Model
{
    use HasFactory;


    public function produits()
    {
        return $this->hasMany(Produit::class);
    }

    public function categorieProduit()
    {
        return $this->belongsTo(CategorieProduit::class);
    }

    protected $fillable = [
        'unite',
    ];
}
