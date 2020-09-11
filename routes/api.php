<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Action\PingAction;
use App\Http\Action\Character\GetRarityListAction;
use App\Http\Action\Character\GetJobListAction;
use App\Http\Action\Character\GetCharacterListAction;

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
Route::get('/rarity', GetRarityListAction::class);
Route::get('/job', GetJobListAction::class);
// Route::get('/develop', GetDevelopListAction::class);
Route::get('/character', GetCharacterListAction::class);
// Route::post('/character/search', FindCharacterListAction::class);
// Route::get('/material', GetMaterialListAction::class);
// Route::get('/stage', GetStageListAction::class);
// Route::post('/material/stage', GetMaterialStageListAction::class);

Route::fallback(function () {
    return response()->json([
        'message' => 'Not Found.'
    ], 404);
});
