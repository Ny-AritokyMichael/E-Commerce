<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    use HasFactory;

    public function produitRecettes()
    {
        return $this->hasMany(ProduitRecette::class);
    }

    protected $guarded = [];
}
