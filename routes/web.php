<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\GestionPointController;
use App\Http\Controllers\SystemController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
   

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource("users",UserController::class);
        Route::get("contrat_type_partenaire/{id}",[UserController::class,"contrat_type_partenaire"]);
        Route::get("contrat_type_partenaire2/{id}",[UserController::class,"contrat_type_partenaire2"]);
        Route::get("user_delete/{id}",[UserController::class,"destroy"])->name("users.delete");

        Route::resource("categories",CategorieController::class);
        Route::get("categorie_delete/{id}",[CategorieController::class,"destroy"])->name("categories.delete");

        Route::resource("contrats",ContratController::class);
        Route::get("contrat_type/{id}",[ContratController::class,"contrat_type"]);
        Route::get("contrat_delete/{id}",[ContratController::class,"destroy"])->name("contrats.delete");

        
        Route::resource("produits",ProduitController::class);
        Route::get("produit_delete/{id}",[ProduitController::class,"destroy"])->name("produits.delete");
        Route::get("categorie_partenaire/{id}",[ProduitController::class,"categorie_partenaire"]);
        Route::get("type_contrat_partenaire/{id}",[ProduitController::class,"type_contrat_partenaire"]);

        Route::resource("points",GestionPointController::class);
        Route::get("point_delete/{id}",[GestionPointController::class,"destroy"])->name("points.delete");

        
        Route::resource("systems",SystemController::class);
        Route::get("system_delete/{id}",[SystemController::class,"destroy"])->name("systems.delete");
    });

    Route::prefix('responsable')->name('responsable.')->group(function () {
        Route::resource("users",UserController::class);
        Route::get("contrat_type_partenaire/{id}",[UserController::class,"contrat_type_partenaire"]);
        Route::get("contrat_type_partenaire2/{id}",[UserController::class,"contrat_type_partenaire2"]);
        Route::get("user_delete/{id}",[UserController::class,"destroy"])->name("users.delete");

        Route::resource("categories",CategorieController::class);
        Route::get("categorie_delete/{id}",[CategorieController::class,"destroy"])->name("categories.delete");

        Route::resource("contrats",ContratController::class);
        Route::get("contrat_type/{id}",[ContratController::class,"contrat_type"]);
        Route::get("contrat_delete/{id}",[ContratController::class,"destroy"])->name("contrats.delete");

        
        Route::resource("produits",ProduitController::class);
        Route::get("produit_delete/{id}",[ProduitController::class,"destroy"])->name("produits.delete");
        Route::get("categorie_partenaire/{id}",[ProduitController::class,"categorie_partenaire"]);
        Route::get("type_contrat_partenaire/{id}",[ProduitController::class,"type_contrat_partenaire"]);

        Route::resource("points",GestionPointController::class);
        Route::get("point_delete/{id}",[GestionPointController::class,"destroy"])->name("points.delete");

        
        Route::resource("systems",SystemController::class);
        Route::get("system_delete/{id}",[SystemController::class,"destroy"])->name("systems.delete");
    });

});

require __DIR__.'/auth.php';
