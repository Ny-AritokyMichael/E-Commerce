<?php

namespace App\Http\Controllers\panier;

use App\Http\Controllers\Controller;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Models\PanierProduit;
use App\Models\PanierRecette;
use App\Models\Produit;

class PanierNavigationController extends Controller
{
    public function index()
    {
        // panier produit
        $panierProduits = PanierProduit::where('mac_address', '=', session()->getId())
            ->join('produits', 'produits.id', '=', 'panier_produits.produit_id')
            ->select(['produits.*', 'panier_produits.id', 'panier_produits.mac_address', 'panier_produits.quantite as quantite_recette', 'panier_produits.id as id_panier'])
            ->get();


        $prixTotal = 0;
        foreach ($panierProduits as $panierProduit) {
            $prixTotal += $panierProduit->prix_unitaire * $panierProduit->quantite_recette;
        }

        // panier recette

        $produitRecette = PanierRecette::where('mac_address', '=', session()->getId())
            ->join('recettes', 'recettes.id', '=', 'panier_recettes.recette_id')
            ->join('produit_recettes', 'produit_recettes.recette_id', '=', 'recettes.id')
            ->join('produits', 'produits.id', '=', 'produit_recettes.produit_id')
            ->groupBy('produits.id')
            ->selectRaw('SUM(produit_recettes.quantite) as quantite_utilise ,produits.id , produits.quantite as quantite_unitaire')
            ->get();

        $panierProduitRecette = [];
        $prixTotalRecette = 0;
        foreach ($produitRecette as $pr) {
            $quantNecessaire = floor($pr->quantite_utilise / $pr->quantite_unitaire);
            if ($pr->quantite_utilise % $pr->quantite_unitaire > 0) {
                $quantNecessaire++;
            }
            $p = Produit::find($pr->id);
            $panProdRec['nom'] = $p->nom;
            $panProdRec['quantite'] = $quantNecessaire;
            $panProdRec['prix_unitaire'] = $p->prix_unitaire;
            $panierProduitRecette[] = $panProdRec;
            $prixTotalRecette += $quantNecessaire * $p->prix_unitaire;
        }

        return view(
            'user.panier-list',
            [
                'panierProduit' => $panierProduits,
                'panierProduitRecette' => $panierProduitRecette,
                'prixTotal' => $prixTotal,
                'prixTotalRecette' => $prixTotalRecette
            ]
        );
    }
}
