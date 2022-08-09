<?php

namespace App\Http\Controllers\rechargePorteFeuille;

use App\Models\User;
use App\Models\RechargePorteFeuille;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RechargePorteFeuilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $argent = User::getArgent(Auth::user()->id);
        // dd($argent);
        return view('user.recharge-porte-feuille',[
            'argent' => $argent
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listeDemandeRecharge()
    {

        $demandeRecharges = RechargePorteFeuille::where('valide', '=', false)->where('refuse', '=', false)->get();
        return view('admin.valider', [
            'demandeRecharges' => $demandeRecharges
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RechargePorteFeuille  $rechargePorteFeuille
     * @return \Illuminate\Http\Response
     */
    public function show(RechargePorteFeuille $rechargePorteFeuille)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RechargePorteFeuille  $rechargePorteFeuille
     * @return \Illuminate\Http\Response
     */
    public function edit(RechargePorteFeuille $rechargePorteFeuille)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RechargePorteFeuille  $rechargePorteFeuille
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RechargePorteFeuille $rechargePorteFeuille)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RechargePorteFeuille  $rechargePorteFeuille
     * @return \Illuminate\Http\Response
     */
    public function destroy(RechargePorteFeuille $rechargePorteFeuille)
    {
        //
    }
}
