<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TontineController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\TirageController;
use App\Http\Controllers\TontineUserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();

# desabled login page
// Auth::routes(['login' =>false]);

Route::get('/dashboard',[TontineUserController::class, 'showUserTontines'])
->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/dashboard', function () {
//     return view('dashboard.dashboard' );
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/user', UserController::class);

    Route::resource('/paiements', PaiementController::class);
    Route::get('/payments-current-user', [PaiementController::class, 'currentUserPayment'])->name('paiement.current-user');

    Route::resource('/tontine', TontineController::class);
    Route::delete('/delete-tontine/{id}', [TontineController::class, 'destroy'])->name('tontine.destroy');

    Route::resource('/tirage', TirageController::class);
    Route::post('/lancer-tirage', [TirageController::class, 'lancerTirage'])->name('lancer-tirage');

    Route::get('/my-tontine-user', [TontineUserController::class, 'index'])->name('current-user.tontine');
    Route::resource('/become-member', TontineUserController::class);
    Route::post('/my-current-tontine/{id}',[ TontineUserController::class, 'tontiner'] )->name('my-current-tontine.tontiner');
    Route::delete('/my-tontine/{id}', [TontineUserController::class, 'destroy'])->name('my-tontine.delete');
});


Auth::routes(['verify' => true]);
require __DIR__.'/auth.php';

// Route::get('/compterTontine', [TontineUserController::class, 'showUserTontines'])->name('showUserTontines.compter');

