<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Produit;
use App\Models\Payement;


class AdminController extends Controller
{
    public function login(Request $request){
        $admin = Admin::all();
        // dd($request->email);
        $produit = Produit::all();

        foreach($admin as $admins){
            if($request->email == $admins->email && $request->mdp == $admins->mdp){
                return view('admin.accueil',[
                    'produit' => $produit
                ]);
            }elseif($request->email == $admins->email && $request->mdp != $admins->mdp){
                return redirect('/')->with('error','verifier votre mot de passe');
            }elseif($request->email != $admins->email && $request->mdp == $admins->mdp){
                return redirect('/')->with('error','verifier votre email');
            }
        }
    }

    public function list()
    {
        $produit = Produit::all();

        return view('admin.accueil',[
            'produit' => $produit
        ]);

    }


}
