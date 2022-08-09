<?php

namespace App\Http\Controllers\recette;

use App\Http\Controllers\Controller;
use App\Models\Produit;

class RecetteDeleteController extends Controller
{
    public function retirerProduitRecette()
    {
        request()->validate([
            'idProduit' => 'required',
        ]);
        $produit = Produit::find(request('idProduit'));
        \Cart::session(2);
        \Cart::session(2)->remove(request('idProduit'));

        // dd(\Cart::getContent(2));
        return redirect('inserer-recette');
    }
}
