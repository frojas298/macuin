<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JefeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\CambiarContrasenaController;
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
    return view('auth/login');
});

Auth::routes();
/*
Route::resource('jefe', TicketController::class);
Route::resource('cliente', TicketController::class); */


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'checkrole:Jefe'])->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('jefe', JefeController::class);
    Route::resource('ticketJefe', TicketController::class);
    Route::resource('perfilJefe', ProfileController::class);
    Route::get('/changePasswordJ', [CambiarContrasenaController::class, 'index'])->name('vistaCambioContraJefe');
    Route::post('/changePasswordJ', [CambiarContrasenaController::class, 'store'])->name('cambiarContraJefe');
});

Route::middleware(['auth', 'checkrole:Cliente'])->group(function () {
    Route::resource('cliente', TicketController::class);
    Route::resource('perfilCliente', ProfileController::class);
    Route::get('/changePassword', [CambiarContrasenaController::class, 'index'])->name('vistaCambioContra');
    Route::post('/changePassword', [CambiarContrasenaController::class, 'store'])->name('cambiarContra');

});

