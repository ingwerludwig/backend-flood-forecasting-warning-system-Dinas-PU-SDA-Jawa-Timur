<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\NotifikasiKontakController;
use App\Http\Controllers\StasiunHujanPosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\StasiunAirPosController;
use App\Http\Controllers\UsersRoleController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->group(function() {
    Route::patch('/updateBatasAirStasiun',[StasiunAirPosController::class,'changeBatas']);
    Route::patch('/updateBatasHujanStasiun',[StasiunHujanPosController::class,'changeBatas']);
    Route::post('/createRoles', [UsersRoleController::class, 'createUsersRole']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/import-excel', [ExcelImportController::class, 'importExcel']);
    Route::get('/getAllKontak', [NotifikasiKontakController::class, 'getAllKontak']);
    Route::patch('/updateKontakInfo',[NotifikasiKontakController::class,'changeKontakInfo']);
    Route::post('/addKontak', [NotifikasiKontakController::class, 'createKontak']);
});

Route::withoutMiddleware('auth:api')->group(function() {
    Route::get('/getStasiunAirInfo', [StasiunAirPosController::class, 'getStasiunInformation']);
    Route::get('/getStasiunHujanInfo', [StasiunHujanPosController::class, 'getStasiunInformation']);
    Route::get('/getAllRole', [UsersRoleController::class, 'getAllUsersRole']);
    Route::get('/getHistory',[HistoryController::class, 'getHistory']);
    Route::get('/getHistoryPrediction',[HistoryController::class, 'getHistoryPrediction']);
    Route::get('/getChartData',[HistoryController::class, 'getChartData']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/notification/polling', [NotifikasiController::class, 'handleStartCommand']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});
