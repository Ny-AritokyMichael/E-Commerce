<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\TypeVehicule;
use App\Models\Vehicule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminNavigationController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function listerVehicule()
    {
        Gate::authorize('admin');
        // $vehicules = Vehicule::join('type_vehicules', 'vehicules.type_vehicule_id', 'type_vehicules.id')
        //     ->select('vehicules.*', 'type_vehicules.libele as type_vehicule')
        //     ->get();
        $v = new Vehicule;
        $vehicules = $v->getVehiculesWithEtatEcheance();
        return view('admin/liste_vehicule', compact('vehicules'));
    }

    public function ajouterVehicule()
    {
        Gate::authorize('admin');
        $typeVehicules = TypeVehicule::all();
        return view('admin/ajout_vehicule', compact('typeVehicules'));
    }

    public function update($id)
    {
        Gate::authorize('admin');
        $post = Post::where('id', $id)->get();
        $post = $post[0];
        Log::info(json_encode($post));

        
        $meta_description = "Modification de post";
        $title = "Modification de post - " . $post->titre;

        return view('admin/modifier_post', compact('post', 'meta_description', 'title'));
    }


}
