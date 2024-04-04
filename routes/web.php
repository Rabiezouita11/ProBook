<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/* Page blocked */

Route::get('/blocked', [App\Http\Controllers\BlokedController::class, 'index']);



/* authentification*/
Auth::routes();

/* page affiche pour valider email*/

Route::get('/enter_verification_code', [App\Http\Controllers\ClientController::class, 'enter_verification_code'])->name('enter_verification_code');

/* button   envoyer code pour valider email*/

Route::post('/verify/code', [App\Http\Controllers\ClientController::class, 'verify'])->name('verify.code');

/* button  pour renvoyer code  email*/

Route::post('/resend/code', [App\Http\Controllers\ClientController::class, 'resend'])->name('resend.code');

/* frontoffice*/

Route::get('/home', [App\Http\Controllers\ClientController::class, 'index'])->name('home');


/* backoffice*/

/* show page dashboard admin*/
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

/* show page utilisateurs admin*/
Route::get('/utilisateurs', [App\Http\Controllers\AdminController::class, 'showPageUtilisateurs'])->name('showPageUtilisateurs');
/* button bloquer debloquer utilisateurs admin*/
Route::post('/users/{id}/toggle-block', [App\Http\Controllers\AdminController::class, 'toggleBlock'])->name('users.toggleBlock');

/* show page profile admin*/

Route::get('/showProfile', [App\Http\Controllers\AdminController::class, 'showProfile'])->name('showProfile');


/* button update  compte admin*/
Route::put('/update-email-name', [App\Http\Controllers\AdminController::class, 'updateEmailName'])->name('update.email.name');

/* button update  mot de passe  admin*/

Route::put('/update-password', [App\Http\Controllers\AdminController::class, 'updatePassword'])->name('update.password');


