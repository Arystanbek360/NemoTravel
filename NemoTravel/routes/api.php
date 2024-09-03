<?php

use App\Http\Controllers\AirportsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['middleware' => 'api', 'prefix' => 'v1'], function () {
//    Можно было через resource пустить просто решил для красоты оставить так
    Route::controller(AirportsController::class)->prefix('airports')->group(function () {
        Route::get('/', 'getPaginated');
        Route::post('/create', 'create');
        Route::post('/{airport}/update', 'update');
        Route::delete('/{airport}/delete', 'delete');
    });
});

