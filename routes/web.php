<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('cliente', TicketController::class);

/*Route::get('/cliente', [TicketController::class, 'index']);
Route::get('/cliente/createTicket', [TicketController::class, 'create']);
Route::get('/cliente/editTicket', [TicketController::class, 'edit']);

Route::get('/ruta-para-admin', function () {
    return "Bienvenido Admin";
})->middleware(['auth', 'rol:Jefe']);

Route::get('/ruta-para-auxiliar', function () {
    return "Bienvenido Auxiliar";
})->middleware(['auth', 'rol:Auxiliar']);

Route::get('/ruta-para-cliente', function () {
    return "Bienvenido Cliente";
})->middleware(['auth', 'rol:Cliente']);
*/
