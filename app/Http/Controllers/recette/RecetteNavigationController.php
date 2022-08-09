<?php

namespace App\Http\Controllers\recette;

use App\Http\Controllers\Controller;
use App\Models\CategorieProduit;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Recette;
use App\Models\UniteQuantite;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\DB;

class RecetteNavigationController extends Controller
{
    public function listeRecette()
    {
        $recettes = Recette::with('produitRecettes')->get();
        foreach ($recettes as $recette) {
            for ($i = 0; $i < count($recette->produitRecettes); $i++) {
                $quantite = $recette->produitRecettes[$i]->quantite;
                $recette->produitRecettes[$i] = Produit::with('categorieProduit')
                    ->where('id', $recette->produitRecettes[$i]->produit_id)
                    ->get()[0];
                $recette->produitRecettes[$i]->quantite_recette = $quantite;
                // unite
                $unite = UniteQuantite::where('id', $recette->produitRecettes[$i]->unite_quantite_id)->get()[0];
                $recette->produitRecettes[$i]->unite_quantite = $unite;
            }
        }
        return view('user.recette-list', compact('recettes'));
    }

    public function inserer()
    {
        $produits = Produit::orderBy('nom', 'asc')->get();
        \Cart::session(2);
        $produitRecetteSession = \Cart::getContent(2);
        $produitRecette = [];
        foreach ($produitRecetteSession as $p) {
            $prodTemp = Produit::find($p->id);
            $uniteQuantiteProd = UniteQuantite::find($prodTemp->unite_quantite_id);
            $prodTemp->unite_quantite = $uniteQuantiteProd;
            $prodTemp->quantiteRecette = $p->quantity;
            $produitRecette[] = $prodTemp;
        }
        // dd(\Cart::getContent(2));
        return view('admin.insert', ['produits' => $produits, 'produitRecette' => $produitRecette]);
    }
}
