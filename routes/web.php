<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommandeTemporaireController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenteController;
use App\Models\CommandeTemporaire;
use App\Models\Produit;
use App\Models\Vente;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\Command\Command;

Route::get('/login', function () {
    return redirect()->route('auth.login');
})->name('login');


Route::prefix("/auth")->name("auth.")->group(function (){
    Route::get("/login", [AuthController::class,"login"])->name("login");
    Route::post("/login", [AuthController::class,"doLogin"])->name("doLogin");
    Route::delete("/logout", [AuthController::class,"logout"])->name("logout");
});

Route::prefix("/user")->name("user.")->middleware('auth')->group(function (){
    Route::get("/list", [UserController::class,"index"])->name("list");
    Route::get("/create", [UserController::class,"create"])->name("create");
    Route::post("/create", [UserController::class,"store"])->name("store");
    Route::delete('/delete/{user}', [Usercontroller::class, 'delete'])->name('delete');
});

Route::prefix("/produit")->name("produit.")->middleware("auth")->group(function (){
    Route::get("/list", [ProduitController::class, 'index'])->name("list");
    Route::get("/create",[ProduitController::class, "create"])->name("create");
    Route::post("/create",[ProduitController::class, "store"])->name("store");
    Route::get("/edit/{produit}", [ProduitController::class, "edit"])->name("edit");
    Route::patch("/edit/{produit}", [ProduitController::class, "update"])->name("update");
    Route::get("/show/{produit}", [ProduitController::class, "show"])->name("show");
    Route::delete("/delete/{produit}", [ProduitController::class, "delete"])->name("delete");
});

Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('admin.dashboard');

Route::prefix('/commande')->middleware('auth')->name('commande.')->group(function (){
    Route::post('/{produit}', [CommandeTemporaireController::class,'store']);
    Route::delete('/{produit}', [CommandeTemporaireController::class,'delete'])->name('delete');
});

Route::prefix('/achat')->middleware('auth')->name('achat.')->group(function (){
    Route::post('/', [VenteController::class, 'store'])->name('store');
});

Route::get('/vente', [VenteController::class, 'index'])->middleware('auth')->name('vente.show');