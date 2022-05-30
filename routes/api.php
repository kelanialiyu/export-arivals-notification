<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportsController;
use App\Http\Controllers\IsoTypeController;
use App\Http\Controllers\OperatorController;
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
Route::resource('exports', ExportsController::class);
Route::get('unextracted/exports', [ExportsController::class,'getUnextractedExport']);
Route::post('extract/exports', [ExportsController::class,'markAsExtracted']);
Route::get('isotypes', [IsoTypeController::class,'index']);
Route::get('operators', [OperatorController::class,'index']);
