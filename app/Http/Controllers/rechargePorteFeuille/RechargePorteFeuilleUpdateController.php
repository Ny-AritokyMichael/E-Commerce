<?php

namespace App\Http\Controllers\rechargePorteFeuille;

use App\Http\Controllers\Controller;
use App\Models\RechargePorteFeuille;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RechargePorteFeuilleUpdateController extends Controller
{

    public function valider()
    {
        request()->validate([
            'idRecharge' => 'required',
        ]);

        DB::table('recharge_porte_feuilles')
            ->where('id', request('idRecharge'))
            ->update([
                'valide' => true,
                'refuse' => false,
            ]);

        return redirect('validation-recharge');
    }

    public function refuser()
    {
        request()->validate([
            'idRecharge' => 'required',
        ]);

        DB::table('recharge_porte_feuilles')
            ->where('id', request('idRecharge'))
            ->update([
                'valide' => false,
                'refuse' => true,
            ]);

        return redirect('validation-recharge');
    }
}
