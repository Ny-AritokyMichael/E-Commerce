<?php

namespace App\Http\Controllers\recette;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use App\Models\ProduitRecette;
use App\Models\Recette;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\DB;

class RecetteInsertController extends Controller
{

    public function insert()
    {
        request()->validate([
            'nomRecette' => 'required',
        ]);

        \Cart::session(2);

        DB::transaction(function () {
            $recette = Recette::create([
                'nom' => request('nomRecette')
            ]);

            $produitRecette = \Cart::getContent();
            foreach ($produitRecette  as $pr) {
                ProduitRecette::create([
                    'recette_id' => $recette->id,
                    'produit_id' => $pr->id,
                    'quantite' => $pr->quantity,
                ]);
            }

            \Cart::clear();
        });

        return redirect('inserer-recette');
    }

    public function ajouterProduitRecette()
    {
        request()->validate([
            'idProduit' => 'required',
            'quantite' => 'required',
        ]);
        $produit = Produit::find(request('idProduit'));
        \Cart::session(2);
        \Cart::session(2)->add([
            'id' => request('idProduit'),
            'name' => $produit->nom,
            'price' => $produit->prix_unitaire,
            'quantity' => request('quantite'),
            'associatedModel' => $produit,
        ]);

        // dd(\Cart::getContent(2));
        return redirect('inserer-recette');
    }
}
