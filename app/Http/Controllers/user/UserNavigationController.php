<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserNavigationController extends Controller
{
    public function accueil()
    {
        // dd(bcrypt('$2y$10$u4FmQqjqogMcDam6lreAfefjQ78AOqmeajTJl/Ry2u7.xNhoRzKGq'));

        $recherche = request('recherche');

        $categorie = request('categorie');
        if ($categorie == 0 ||  $categorie == null) {
            if ($recherche != null || $recherche != '')
                $produits = Produit::with('categorieProduit')
                    // ->where('LOWER(`nom`)', 'LIKE', 'LOWER(\'%' . $recherche . '%\')')
                    ->whereRaw('LOWER(nom) LIKE \'%' . strtolower($recherche) . '%\'')
                    ->paginate(env('PRODUIT_PAR_PAGE'));
            else
                $produits = Produit::with('categorieProduit')
                    ->paginate(env('PRODUIT_PAR_PAGE'));
        } else {
            if ($recherche != null || $recherche != '')
                $produits = Produit::with('categorieProduit')
                    ->where('categorie_produit_id', "=", $categorie)
                    ->whereRaw('LOWER(nom) LIKE \'%' . strtolower($recherche) . '%\'')
                    ->paginate(env('PRODUIT_PAR_PAGE'));
            else
                $produits = Produit::with('categorieProduit')
                    ->where('categorie_produit_id', "=", $categorie)
                    ->paginate(env('PRODUIT_PAR_PAGE'));
            //$produits = Produit::where('categorie', '=', $categorie)->with('categorieProduit')->paginate(env('PRODUIT_PAR_PAGE'));
        }
        $produits->appends(['categorie' => $categorie, "recherche" => $recherche]);
        $argent = 0;
        // $argent = User::getArgent(Auth::user()->id);
        return view('user.accueil', compact(['produits', 'argent']));
    }
}
