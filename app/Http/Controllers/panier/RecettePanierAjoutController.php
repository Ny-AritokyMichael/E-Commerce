<?php

namespace App\Http\Controllers\panier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use App\Models\Recette;
use App\Models\Panier;
use App\Models\ValiderReste;

use App\Models\PanierRecette;
use App\Models\Produit;
use App\Models\ResteProduitPanierRecette;
use Illuminate\Support\Facades\DB;

class RecettePanierAjoutController extends Controller
{
    public function ajouter()
    {
        //insertion du panier
        PanierRecette::create([
            'recette_id' => request('idRecette'),
            'quantite' => 1,
            'mac_address' => session()->getId(),
        ]);

        $recette = Recette::join('produit_recettes', 'produit_recettes.recette_id', '=', 'recettes.id')
            ->join('produits', 'produit_recettes.produit_id', '=', 'produits.id')
            ->where('recettes.id', '=', request('idRecette'))
            ->select(['recettes.*', 'produit_recettes.quantite as quantite_recette', 'produits.id as produit_id', 'produits.quantite as quantite_unitaire'])
            ->get();




        foreach ($recette as $r) {
            $reste = $r->quantite_unitaire - ($r->quantite_recette % $r->quantite_unitaire);
            // var_dump($reste);
            ResteProduitPanierRecette::create([
                'produit_id' => $r->produit_id,
                'mac_address' => session()->getId(),
                'quantite' => $reste,
            ]);
        // dd($produit_id);
        }



         // $panier_produit_recette;
        //  DB::transaction(function () {
        //     $recette = Recette::join('produit_recettes', 'produit_recettes.recette_id', '=', 'recettes.id')
        //     ->join('produits', 'produit_recettes.produit_id', '=', 'produits.id')
        //     ->where('recettes.id', '=', request('idRecette'))
        //     ->select(['recettes.*', 'produit_recettes.quantite as quantite_recette', 'produits.id as produit_id', 'produits.quantite as quantite_unitaire'])
        //     ->get();


        //     foreach ($recette as $r) {
        //         // dd($recette);
        //         insertPanierRecetteProduit::create([
        //             'produit_id' => $r->produit_id,
        //             'mac_address' => session()->getId(),
        //             'quantite' => 1,
        //         ]);
        //     // dd($produit_id);
        //     }
        //  });



        foreach ($recette as $r) {
            // dd($r->produit_id);
            $reste = $r->quantite_unitaire - ($r->quantite_recette % $r->quantite_unitaire);
            // var_dump($reste);
            ResteProduitPanierRecette::create([
                'produit_id' => $r->produit_id,
                'mac_address' => session()->getId(),
                'quantite' => $reste,
            ]);
        // dd($produit_id);
        }


        return redirect('recette');
    }


    public function valider(Request $request,$id,$valider)
    {

        if($valider == 'oui'){
            ValiderReste::create([
                'produit_id' => $id,
                'recette_id' => request('idRecette'),
                'type' => 'oui',
                'mac_address' => session()->getId(),
                'reste' => request('reste'),
                'quantite' => request('quantite'),

            ]);
        }else{
            ValiderReste::create([
                'produit_id' => $id,
                'recette_id' => request('idRecette'),
                'type' => 'non',
                'mac_address' => session()->getId(),
                'reste' => request('reste'),
                'quantite' => request('quantite'),
            ]);
        }
        // dd(session()->getId());
        // if($valider == 'oui'){

        // }
        //insertion du panier





        $recette = Recette::join('produit_recettes', 'produit_recettes.recette_id', '=', 'recettes.id')
        ->join('produits', 'produit_recettes.produit_id', '=', 'produits.id')
        ->where('recettes.id', '=', request('idRecette'))
        ->select(['recettes.*', 'produit_recettes.quantite as quantite_recette', 'produits.id as produit_id', 'produits.quantite as quantite_unitaire'])
        ->get();

        ValiderReste::all();

        dd($recette);






    return view('user.validerReste',[
        'id' => $id,
        'recette' => $recette,
    ]);
    }


    public function page($id){
        // PanierRecette::create([
        //     'recette_id' => request('idRecette'),
        //     'quantite' => 1,
        //     'mac_address' => session()->getId(),
        // ]);

        $recette = Recette::join('produit_recettes', 'produit_recettes.recette_id', '=', 'recettes.id')
            ->join('produits', 'produit_recettes.produit_id', '=', 'produits.id')
            ->where('recettes.id', '=', $id)
            ->select(['recettes.*', 'produit_recettes.quantite as quantite_recette', 'produits.id as produit_id', 'produits.quantite as quantite_unitaire'])
            ->get();



            // dd($recette);
        // $panier = ValiderReste::all();

        foreach($recette as $set){
            // dd($set->produit_id);
            $panier = DB::table('reste_produit_panier_recettes')
            ->where('produit_id' , $set->produit_id);
        }


        // dd($panier);


        return view('user.validerReste',[
            'id' => $id,
            'panier' => $panier,
            'recette' => $recette,
        ]);
    }
}
