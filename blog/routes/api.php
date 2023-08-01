<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Employeecontroller;
use App\Http\Controllers\Auth\Sactum\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Login

//

Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// route('login');

Route::controller(Employeecontroller::class)->group(function (){
    Route::get('/employees', 'index');
    Route::post('/employee', 'store');
    Route::get('/employee/{id}', 'show');
    Route::put('/employee/{id}', 'update');
    Route::delete('/employee/{id}', 'destroy');
});
