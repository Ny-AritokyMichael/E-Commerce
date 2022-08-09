<?php

namespace App\Http\Controllers\achat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PanierRecette;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;
use App\Models\Achat;
use App\Models\AchatRecette;
use App\Models\PanierProduit;
use App\Models\Payement;
use App\Models\StockSortant;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AchatRecetteInsertController extends Controller
{
    public function acheter()
    {
        DB::transaction(function () {
            $produitRecette = PanierRecette::where('panier_recettes.mac_address', '=', session()->getId())
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
                // dd($quantNecessaire);
                if ($pr->quantite_utilise % $pr->quantite_unitaire > 0) {
                    $quantNecessaire++;
                }

                // controlle de quantite
                $stock = Produit::getStock($pr->id);
                // dd($stock);
                if ($quantNecessaire > $stock) {
                    $error = \Illuminate\Validation\ValidationException::withMessages([
                        'stock' => ['validation.stockInsuffisant'],
                    ]);
                    throw $error;
                }

                $p = Produit::find($pr->id);
                $panProdRec['nom'] = $p->nom;
                $panProdRec['quantite'] = $quantNecessaire;
                $panProdRec['prix_unitaire'] = $p->prix_unitaire;
                $panierProduitRecette[] = $panProdRec;
                $prixTotalRecette += $quantNecessaire * $p->prix_unitaire;

                // dd(User::getArgent(Auth::user()->id));

                // controle prix
                // if ($prixTotalRecette > User::getArgent(Auth::user()->id)) {
                //     $error = \Illuminate\Validation\ValidationException::withMessages([
                //         'argent' => ['validation.montantInsuffisant'],
                //     ]);
                //     throw $error;
                // }

                // dd($prixTotalRecette);

                Achat::create([
                    'produit_id' => $pr->id,
                    'user_id' => Auth::user()->id,
                    'prix_unitaire' => $p->prix_unitaire,
                    'quantite' => $quantNecessaire,
                ]);
                StockSortant::create([
                    'produit_id' => $p->id,
                    'quantite' => $quantNecessaire
                ]);
                Payement::create([
                    'user_id' => Auth::user()->id,
                    'montant' => ($quantNecessaire * $p->prix_unitaire),
                ]);
            }

            $recettes = PanierRecette::join('recettes', 'recettes.id', '=', 'panier_recettes.recette_id')
                ->select(['recettes.id', 'panier_recettes.quantite'])
                ->get();

                // dd($recettes);

            foreach ($recettes as $recette) {
                AchatRecette::create([
                    'recette_id' => $recette->id,
                    'quantite' => $recette->quantite,
                    'montant' => 0,
                ]);
            }


            DB::table('panier_recettes')
                ->where('mac_address', session()->getId())
                ->delete();
        });

        // verification d'argent

        return redirect('panier');
    }
}
