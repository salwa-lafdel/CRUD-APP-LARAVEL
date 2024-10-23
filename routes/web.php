<?php

use App\Http\Controllers\etudiantController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

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

 Route::resource('etudiants',etudiantController::class);
 Route::resource('formations', FormationController::class);
 Route::get('rechercher',[SearchController::class,'afficher'])->name('Search.search');
 Route::get('rechercher',[SearchController::class,'Rechercher'])->name('Search.rechercher');

 Route::get('search',[SearchController::class,'search'])->name('search');
 Route::get('search/{id}',[SearchController::class,'chercher'])->name('Search.search');

