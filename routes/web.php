<?php

//use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('clientes', [ClienteController::class, 'index']);
Route::post('clientes', [ClienteController::class, 'store']);
Route::get('buscar-clientes', [ClienteController::class, 'buscarcliente']);
Route::get('edit-cliente/{id}', [ClienteController::class, 'edit']);
Route::put('update-cliente/{id}', [ClienteController::class, 'update']);
Route::delete('delete-cliente/{id}', [ClienteController::class, 'destroy']);    

