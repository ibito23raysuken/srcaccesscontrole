<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\EtudiantsController;
use App\Http\Controllers\EnseignantController;

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

Route::get('/',[MainController::class,'home'])->name('home');
Route::get('/schedule',[MainController::class,'schedule'])->name('schedule');
Route::get('/presence',[MainController::class,'presence'])->name('presence');
Route::resource('etudiants', EtudiantsController::class);
Route::resource('enseignants', EnseignantController::class);
Route::resource('matieres', MatiereController::class);

