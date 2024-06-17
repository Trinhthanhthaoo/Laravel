<?php
use App\Http\Controllers\API\MentorController;
use App\Http\Controllers\API\LienHeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'lien-he'], function () {
    Route::get('/', [LienHeController::class, 'index']);
    Route::get('/{id}', [LienHeController::class, 'show']);
    Route::post('/', [LienHeController::class, 'store']);
    Route::put('/{id}', [LienHeController::class, 'update']);
    Route::delete('/{id}', [LienHeController::class, 'destroy']);
});
Route::group(['prefix' => 'mentor'], function () {
    Route::get('/', [MentorController::class, 'index']);
    Route::get('/{id}', [MentorController::class, 'show']);
    Route::post('/', [MentorController::class, 'store']);
    Route::put('/{id}', [MentorController::class, 'update']);
    Route::delete('/{id}', [MentorController::class, 'destroy']);
});
