<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategorieProduit;

class Produit extends Model
{
    use HasFactory;


    public function categorieProduit()
    {
        return $this->belongsTo(CategorieProduit::class);
    }

    public function uniteQuantite()
    {
        return $this->belongsTo(UniteQuantite::class);
    }

    protected $fillable = [
        'nom',
        'categorie_produit_id',
        'prix_unitaire',
        'quantite_stock',
        'unite_quantite_id',
        'quantite',
    ];

    public static function getStock($idProduit)
    {
        $stock = Stock::groupBy('produit_id')
            ->where('produit_id', '=', $idProduit)
            ->selectRaw('SUM(quantite) as quantite, produit_id, SUM(id) / COUNT(id) as id')
            ->orderBy('produit_id')
            ->get();
        if (count($stock) > 0) {
            $stock = $stock[0]->quantite;
        } else {
            $stock = 0;
        }
        return $stock;
    }
}
