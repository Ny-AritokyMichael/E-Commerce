<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produit;

class PayementsController extends Controller
{
    public function payement(){
        $payement = DB::table('view_payements')->get();
        return view('admin.payement',[
            'payement' => $payement
        ]);
    }


    public function topProduit()
    {
        $top = DB::table('stat_produits')
        ->orderby('total' , 'desc')
        ->get();
            // dd($data);
        return view('admin.top', [
            'top' => $top
        ]);
    }



}
