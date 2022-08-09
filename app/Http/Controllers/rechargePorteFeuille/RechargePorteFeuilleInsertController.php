<?php

namespace App\Http\Controllers\rechargePorteFeuille;

use App\Http\Controllers\Controller;
use App\Models\RechargePorteFeuille;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RechargePorteFeuilleInsertController extends Controller
{

    public function insert()
    {
        request()->validate([
            'montant' => 'required|integer|min:1',
        ]);

        RechargePorteFeuille::create([
            'user_id' => Auth::user()->id,
            'montant' => request('montant'),
            'date_recharge' => DB::raw('CURRENT_TIMESTAMP'),
            'valide' => false,
            'refuse' => false,
        ]);

        return redirect('porte-feuille/recharger');
    }
}
