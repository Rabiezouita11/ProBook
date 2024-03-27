<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/* authentification*/
Auth::routes();

/* frontoffice*/

Route::get('/home', [App\Http\Controllers\ClientController::class, 'index'])->name('home')->middleware('role:utilisateur');


/* backoffice*/

/* shwo page dashboard admin*/
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

/* shwo page utilisateurs admin*/
Route::get('/utilisateurs', [App\Http\Controllers\AdminController::class, 'showPageUtilisateurs'])->name('showPageUtilisateurs');
/* button bloquer debloquer utilisateurs admin*/

Route::post('/users/{id}/toggle-block', [App\Http\Controllers\AdminController::class, 'toggleBlock'])->name('users.toggleBlock');
