<?php

namespace App\Http\Controllers\panier;

use App\Http\Controllers\Controller;
use App\Models\PanierProduit;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\Cart;

class PanierAjoutController extends Controller
{
    public function ajouter()
    {
        request()->validate([
            'idProduit' => "required",
            'quantite' => "required|integer|min:1",
        ]);


        if (Auth::hasUser()) $userId = Auth::user()->id;

        $produit = Produit::find(request('idProduit'));

        PanierProduit::create([
            'produit_id' => $produit->id,
            'quantite' => request('quantite'),
            'mac_address' => session()->getId(),
        ]);


        // dd(\Cart::getContent());
        return redirect('panier');
    }
}
