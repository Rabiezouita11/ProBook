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

Route::get('/home', [App\Http\Controllers\ClientController::class, 'index'])->name('home')->middleware('role:utilisateur');

/* button  pour uploid image en cas missing image  */

Route::post('/upload-image', [App\Http\Controllers\ClientController::class, 'upload'])->name('upload.image')->middleware(['auth', 'role:utilisateur']);


/* Show profile frontoffice  */

Route::get('/Profile_User', [App\Http\Controllers\ClientController::class, 'showProfileUser'])->name('Profile_User')->middleware(['auth', 'role:utilisateur']);

/* button modifier  profile frontoffice  */

Route::post('/update/profile', [App\Http\Controllers\ClientController::class, 'updateProfile'])->name('update.profile')->middleware(['auth', 'role:utilisateur']);

/* button ajouter coverr photo  profile  frontoffice  */

Route::post('/upload-cover-photo', [App\Http\Controllers\ClientController::class, 'uploadCoverPhoto'])->name('upload.cover.photo')->middleware(['auth', 'role:utilisateur']);

/* button update password  frontoffice  */

Route::post('/change-password', [App\Http\Controllers\ClientController::class, 'changePassword'])->name('change.password')->middleware(['auth', 'role:utilisateur']);


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


