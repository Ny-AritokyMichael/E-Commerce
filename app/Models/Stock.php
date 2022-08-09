<?php

namespace App\Models;

use GuzzleHttp\Handler\Proxy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    protected $fillable = [
        'produit_id',
        'quantite',
        'prix_unitaire',
        'date_stock',
    ];

    public static function getStockGrouped()
    {
        $stocks = array();
        $stocks = Stock::groupBy('produit_id')
            ->selectRaw('AVG(prix_unitaire) as valeur_moyenne, SUM(quantite) as quantite, produit_id, SUM(id) / COUNT(id) as id')
            ->orderBy('produit_id')
            ->get();

        $stocksSortant = StockSortant::groupBy('produit_id')
            ->selectRaw('SUM(quantite) as quantite, produit_id, SUM(id) / COUNT(id) as id')
            ->orderBy('produit_id')
            ->get();
        foreach ($stocks as $stock) {
            $produit = Produit::where('id', $stock->produit_id)->get()[0];
            $stock->produit = $produit;
            foreach ($stocksSortant as $ss) {
                if ($ss->produit_id == $stock->produit_id) {
                    $stock->quantite -= $ss->quantite;
                }
            }
        }
        return $stocks;
    }


    public function insert($produit, $qtt)
    {
        DB::table('stock_entrants')->create([
            'produit_id' => $produit,
            'quantite' => $qtt,
        ]);
    }
}
