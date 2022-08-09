<?php

namespace App\Http\Controllers\achat;

use App\Http\Controllers\Controller;
use App\Models\PanierProduit;
use App\Models\Payement;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Stock;
use App\Models\StockSortant;
use App\Models\User;
use Faker\Provider\ar_EG\Payment;

class AchatInsertController extends Controller
{
    public function acheter()
    {
        $montantAchat = PanierProduit::getSommePanier();
        // echo User::getArgent(Auth::user()->id);
        // controle de montant
        if ($montantAchat > User::getArgent(Auth::user()->id)) {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'argent' => ['validation.montantInsuffisant'],
            ]);
            throw $error;
        }

        // dd($montantAchat);
        // controle de stock
        $panierProduit = PanierProduit::where('mac_address', '=', session()->getId())->get();
        foreach ($panierProduit as $pr) {
            $stock = Stock::groupBy('produit_id')
                ->where('produit_id', '=', $pr->produit_id)
                ->selectRaw('SUM(quantite) as quantite, produit_id, SUM(id) / COUNT(id) as id')
                ->orderBy('produit_id')
                ->get();
            if (count($stock) > 0) {
                $stock = $stock[0]->quantite;
            } else {
                $stock = 0;
            }
            if ($pr->quantite > $stock) {
                $error = \Illuminate\Validation\ValidationException::withMessages([
                    'stock' => ['validation.stockInsuffisant'],
                ]);
                throw $error;
            }

            // dd($stock);
        }

        DB::transaction(function () {
            // insertion d'achat et de stock sortant
            $panierProduit = PanierProduit::where('mac_address', '=', session()->getId())->get();
            // dd($panierProduit);
            foreach ($panierProduit as $p) {
                // dd($p->produit_id);
                $prix = Produit::find($p->produit_id)->prix_unitaire;
                StockSortant::create([
                    'produit_id' => $p->id,
                    'quantite' => $p->quantite,
                ]);
                Payement::create([
                    'user_id' => Auth::user()->id,
                    'montant' => ($p->quantite * $prix),
                ]);
                DB::table('panier_produits')
                    ->where('id', $p->id)
                    ->delete();
            }
        });


        return redirect("panier")->with(["success" => true]);
    }
}
