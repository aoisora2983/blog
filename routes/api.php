<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Action\PingAction;
use App\Http\Action\Character\GetCharacterListAction;
use App\Http\Action\Character\GetCharacterAction;
use App\Http\Action\Material\GetMaterialListAction;
use App\Http\Action\Stage\GetStageListAction;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ping', PingAction::class);

// character
Route::get('/character', GetCharacterListAction::class);
Route::post('/character', GetCharacterAction::class);
Route::post('/material', GetMaterialListAction::class);
Route::post('/stage', GetStageListAction::class);

Route::fallback(function () {
    return response()->json([
        'message' => 'Not Found.'
    ], 404);
});
