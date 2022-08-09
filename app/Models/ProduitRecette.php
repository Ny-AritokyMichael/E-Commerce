<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitRecette extends Model
{
    use HasFactory;

    public function recette()
    {
        return $this->belongsTo(Recette::class);
    }

    public function produit()
    {
        return $this->hasOne(Produit::class);
    }

    protected $guarded = [];
}
