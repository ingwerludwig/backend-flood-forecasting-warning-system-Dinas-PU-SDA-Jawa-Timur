<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\StasiunAirPosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersRoleController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->group(function() {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/createRoles', [UsersRoleController::class, 'createUsersRole']);
    Route::get('/getAllRole', [UsersRoleController::class, 'getAllUsersRole']);
    Route::post('/import-excel', [ExcelImportController::class, 'importExcel']);
    Route::get('/getHistory',[HistoryController::class, 'getHistory']);
    Route::get('/getHistoryPrediction',[HistoryController::class, 'getHistoryPrediction']);
    Route::get('/getChartData',[HistoryController::class, 'getChartData']);
    Route::patch('/updateBatasAirStasiun',[StasiunAirPosController::class,'changeBatas']);
    Route::get('/getAllStasiunAir',[StasiunAirPosController::class,'getAllStasiun']);
});

Route::withoutMiddleware('auth:api')->group(function() {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});
