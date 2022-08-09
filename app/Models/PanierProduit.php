<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PanierProduit extends Model
{
    use HasFactory;


    protected $fillable = [
        'produit_id',
        'user_id',
        'mac_address',
        'quantite',
    ];

    public function valider()
    {
        DB::table('panier_valide')->create([
            'panier_id' => $this->id
        ]);
    }

    public function annuler()
    {
        DB::table('panier_annule')->create([
            'panier_id' => $this->id
        ]);
    }

    public static function getSommePanier()
    {
        $sommePanier = 0;
        $panier = PanierProduit::where('mac_address', session()->getId())->get();
        foreach ($panier as $p) {
            $produit = Produit::find($p->produit_id);
            $sommePanier += $p->quantite * $produit->prix_unitaire;
        }
        return $sommePanier;
    }

    public static function acheter($idProduit, $quantite, $prix)
    {
        Achat::create([
            'produit_id' => $idProduit,
            'user_id' => Auth::user()->id,
            'prix_unitaire' => $prix,
            'quantite' => $quantite,
        ]);
    }
}
