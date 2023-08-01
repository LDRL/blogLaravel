<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\MiCuentaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/mi-cuenta', function () {
//     return view('welcome');
// });

Route::get('mi-cuenta',[MiCuentaController::class,'index']);

Route::view('home','home');

Route::group(['prefix' => 'admin-backend','middleware' => ['auth','superadministrador']], function(){
    Route::get('',[DashboardController::class, 'index'])->name('dashboard');    
    Route::get('menu',[MenuController::class, 'index'])->name('menu');
    Route::get('menu/crear',[MenuController::class,'create'])->name('menu.crear');
    Route::get('menu/{id}/editar',[MenuController::class,'edit'])->name('menu.editar');
    Route::POST('menu',[MenuController::class,'store'])->name('menu.guardar');
    Route::post('menu/guardar-orden',[MenuController::class,'guardarOrden'])->name('menu.orden');
    Route::put('menu/{id}',[MenuController::class, 'update'])->name('menu.actualizar');
    Route::delete('menu/{id}/eliminar',[MenuController::class,'destroy'])->name('menu.eliminar');

});