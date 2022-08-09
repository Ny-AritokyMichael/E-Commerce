<?php

namespace App\Http\Controllers\panier;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PanierProduitDeleteController extends Controller
{
    public function delete()
    {
        DB::table('panier_produits')
            ->where('id', request('idPanier'))
            ->delete();


        return redirect('panier');
    }
}
