<?php

namespace App\Http\Controllers\categorieProduit;

use App\Http\Controllers\Controller;
use App\Models\CategorieProduit;
use Illuminate\Http\Request;

class CategorieProduitInsertController extends Controller
{
    public function create()
    {
        request()->validate([
            'categorie' => 'required',
        ]);

        CategorieProduit::create([
            'categorie' => request('categorie'),
        ]);
    }
}
