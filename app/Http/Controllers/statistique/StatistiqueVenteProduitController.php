<?php

namespace App\Http\Controllers\statistique;

use App\Http\Controllers\Controller;
use App\Models\Achat;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StatistiqueVenteProduitController extends Controller
{
    public function index()
    {
        $data = DB::table('stat_produits')
        ->orderby('total' , 'asc')
        ->get();
            // dd($data);
        return view('admin.statistique.stat-vente-produit', compact('data'));
    }


    public function page()
    {
        return view('admin.stat');
    }


    public function chart()
    {
        $result = DB::table('stock_sortants')
            ->orderBy('quantite', 'desc')
            // ->take(3)
            ->get()
        ;
        return response()->json($result);
    }
}
