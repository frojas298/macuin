<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\diarioController;
use App\Http\Controllers\ControllerCRUDD;


//RUTAS ControllerCRUDD

Route::get('/recuerdo/create',[ControllerCRUDD::class,'create'] )->name('recuerdo.create');
Route::post('/recuerdo',[ControllerCRUDD::class,'store'] )->name('recuerdo.store'); 
Route::get('/recuerdo',[ControllerCRUDD::class,'index'] )->name('recuerdo.index');
Route::post('/recuerdo/{id}/confirm',[ControllerCRUDD::class,'update'] )->name('recuerdo.update'); 
Route::delete('/recuerdo/{id}/delete', [ControllerCRUDD::class, 'destroy'])->name('recuerdo.delete');

//Rutas inidividuales para controlador

 Route::get('/',[diarioController::class,'metodoInicio'] )->name('apodoInicio'); 

