<?php

use App\Http\Controllers\achat\AchatInsertController;
use App\Http\Controllers\achat\AchatRecetteInsertController;
use App\Http\Controllers\AchatController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\panier\PanierAjoutController;
use App\Http\Controllers\Admin\AdminNavigationController;
use App\Http\Controllers\Utilisateur\UtilisateurNavigationController;
use App\Http\Controllers\produit\ProduitDetailController;
use App\Http\Controllers\user\UserNavigationController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PayementsController;
use App\Http\Controllers\panier\PanierNavigationController;
use App\Http\Controllers\panier\PanierProduitDeleteController;
use App\Http\Controllers\panier\PanierProduitUpdateController;
use App\Http\Controllers\panier\RecettePanierAjoutController;
use App\Http\Controllers\recette\RecetteDeleteController;
use App\Http\Controllers\recette\RecetteNavigationController;
use App\Http\Controllers\rechargePorteFeuille\RechargePorteFeuilleInsertController;
use App\Http\Controllers\rechargePorteFeuille\RechargePorteFeuilleController;
use App\Models\RechargePorteFeuille;
use App\Http\Controllers\rechargePorteFeuille\RechargePorteFeuilleUpdateController;
use App\Http\Controllers\stock\StockController;
use App\Http\Controllers\recette\RecetteInsertController;
use App\Http\Controllers\statistique\StatistiqueVenteProduitController;
use App\Http\Controllers\statistique\StatistiqueVenteRecetteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::get('/homeClient', function () {
    return redirect()->route('accueil');
});

/* Route::get('/accueil', function(){
    if(Auth::user()->est_admin){
        return redirect()->route('ajouter-vehicule');
    } else if( ! Auth::user()->est_admin){
        return redirect()->route('ajouter-trajet');
    }
})->name('accueil');
 */

//Route::get('/deleteCategorie', [CategorieProduitController::class, 'delete'])->name('delete');

Route::get('/accueil', [UserNavigationController::class, 'accueil'])->name('accueil');

Route::get('/produit/detail/{idProduit}', [ProduitDetailController::class, 'detail'])->name('produit/detail');

// panier
Route::post('/panier', [PanierAjoutController::class, 'ajouter'])->name('panier');
Route::get('/panier', [PanierNavigationController::class, 'index'])->name('panier');

Route::post('valider', [RecettePanierAjoutController::class, 'ajouter'])->name('validerReste');
Route::post('/ajouter-recette-panier', [RecettePanierAjoutController::class, 'ajouter'])->name('ajouter-recette-panier');
Route::post('/oui/{id}/{valider}', [RecettePanierAjoutController::class, 'valider'])->name('oui');
Route::post('/non/{id}/{valider}', [RecettePanierAjoutController::class, 'valider'])->name('non');

Route::get('/update-panier-produit', [PanierProduitUpdateController::class, 'update'])->name('update-panier-produit');
Route::get('/delete-panier-produit', [PanierProduitDeleteController::class, 'delete'])->name('delete-panier-produit');

Route::middleware('auth')->group(function () {

    /*Route::get('/accueil', function () {
        if (Auth::user()->est_admin) {
            return redirect()->route('ajouter-vehicule');
        } else if (!Auth::user()->est_admin) {
            return redirect()->route('ajouter-trajet');
        }
    })->name('accueil');*/

    // acheter
    Route::get('acheter', [AchatInsertController::class, 'acheter'])->name('acheter');
    Route::get('acheter-recette', [AchatRecetteInsertController::class, 'acheter'])->name('acheter-recette');

    Route::get('/porte-feuille/recharger', [RechargePorteFeuilleController::class, 'index'])->name('porte-feuille/recharger');
    Route::post('/porte-feuille/demander-recharge', [RechargePorteFeuilleInsertController::class, 'insert'])->name('porte-feuille/demander-recharge');

    Route::get('/validation-recharge', [RechargePorteFeuilleController::class, 'listeDemandeRecharge'])->name('validation-recharge');
    Route::get('/valider-demande-recharge', [RechargePorteFeuilleUpdateController::class, 'valider'])->name('valider-demande-recharge');
    Route::get('/refuser-demande-recharge', [RechargePorteFeuilleUpdateController::class, 'refuser'])->name('refuser-demande-recharge');

    Route::get('/stock', [StockController::class, 'index'])->name('stock');

    // recette
    Route::get('/inserer-recette', [RecetteNavigationController::class, 'inserer'])->name('inserer-recette');
    Route::post('/ajouter-produit-recette', [RecetteInsertController::class, 'ajouterProduitRecette'])->name('ajouter-produit-recette');
    Route::post('/retirer-produit-recette', [RecetteDeleteController::class, 'retirerProduitRecette'])->name('retirer-produit-recette');
    Route::post('/recette', [RecetteInsertController::class, 'insert'])->name('recette');
    Route::get('/recette', [RecetteNavigationController::class, 'listeRecette'])->name('recette');

    // statistique
    Route::get('/stat-vente-produit', [StatistiqueVenteProduitController::class, 'index'])->name('stat-vente-produit');
    Route::get('/stat-vente-recette', [StatistiqueVenteRecetteController::class, 'index'])->name('stat-vente-recette');
});


//top 5
Route::get('/topProduit', [PayementsController::class, 'topProduit'])->name('admin.topPorduit');





require __DIR__ . '/auth.php';




Route::post('/admin', [AdminController::class, 'login'])->name('logAdmin');

// -- import insert produit
Route::get('/insert', [ProduitController::class, 'insert'])->name('insert');
Route::post('/validerInsertion', [ProduitController::class, 'valider'])->name('valider');
Route::post('/importProduit', [ProduitController::class, 'importProduit'])->name('importProduit');
Route::get('/top', [ProduitController::class, 'top'])->name('top');
Route::get('/delete/{id}', [ProduitController::class, 'delete'])->name('delete');
Route::get('/excelccc', [ProduitController::class, 'exportCsv'])->name('exporter');


Route::get('/list', [AdminController::class, 'list'])->name('list');
Route::get('/payementlk', [PayementsController::class, 'payement'])->name('admin.payement');

Route::get('stat',[PayementsController::class, 'stat'])->name('stat');
Route::get('/chart',[PayementsController::class, 'chart'])->name('chart');

// Route::get('/stat-vente-produit', [StatistiqueVenteProduitController::class, 'chart'])->name('chart');
// Route::get('/stat', [StatistiqueVenteProduitController::class, 'page'])->name('stat');
// Route::get('/stat-vente-recette', [StatistiqueVenteRecetteController::class, 'index'])->name('stat-vente-recette');
// -- end admin





