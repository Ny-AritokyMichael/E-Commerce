<?php

namespace App\Http\Controllers\statistique;

use App\Http\Controllers\Controller;
use App\Models\AchatRecette;
use Illuminate\Http\Request;

class StatistiqueVenteRecetteController extends Controller
{
    public function index()
    {
        $data = AchatRecette::groupBy(['recette_id', 'recettes.nom'])
            ->join('recettes', 'recettes.id', '=', 'achat_recettes.recette_id')
            ->selectRaw('COUNT(achat_recettes.id), recette_id, recettes.nom')
            ->get();
        return view('admin.statistique.stat-vente-recette', compact('data'));
    }
}
