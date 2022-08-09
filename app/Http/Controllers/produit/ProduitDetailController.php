<?php

namespace App\Http\Controllers\produit;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use App\Models\Stock;
use Illuminate\Http\Request;

class ProduitDetailController extends Controller
{
    public function detail()
    {
        $produit = Produit::where('produits.id', request("idProduit"))
            ->join('categorie_produits', 'produits.categorie_produit_id', '=', 'categorie_produits.id')
            ->select(['produits.*', 'categorie_produits.categorie'])
            ->get()[0];
        $stock = Stock::groupBy('produit_id')
            ->where('produit_id', '=', request('idProduit'))
            ->selectRaw('SUM(quantite) as quantite, produit_id, SUM(id) / COUNT(id) as id')
            ->orderBy('produit_id')
            ->get();
        if (count($stock) > 0) {
            $stock = $stock[0]->quantite;
        } else {
            $stock = 0;
        }
        return view('components.produit.produit-detail', compact(['produit', 'stock']));
    }
}
