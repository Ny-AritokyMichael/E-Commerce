<?php

namespace App\Http\Controllers\panier;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PanierProduitUpdateController extends Controller
{
    public function update()
    {
        DB::table('panier_produits')
            ->where('id', request('idPanier'))
            ->update([
                'quantite' => request('quantite'),
            ]);

        return redirect('panier');
    }
}
