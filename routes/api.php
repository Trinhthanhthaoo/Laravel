<?php
use App\Http\Controllers\API\MentorController;
use App\Http\Controllers\API\DanhSachMentorMenteeController;
use App\Http\Controllers\API\LienHeController;
use App\Http\Controllers\API\TaiLieuCongDongController;
use App\Http\Controllers\API\NguoiDungController;
use App\Http\Controllers\API\MenteeController;

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

Route::group(['prefix' => 'DanhSachMentorMentee'], function () {
    Route::get('/', [DanhSachMentorMenteeController::class, 'index']);
    Route::get('/{id}', [DanhSachMentorMenteeController::class, 'show']);
    Route::post('/', [DanhSachMentorMenteeController::class, 'store']);
    Route::put('/{id}', [DanhSachMentorMenteeController::class, 'update']);
    Route::delete('/{id}', [DanhSachMentorMenteeController::class, 'destroy']);
});


Route::group(['prefix' => 'tailieucongdong'], function () {
    Route::get('/', [TaiLieuCongDongController::class, 'index']);
    Route::post('/', [TaiLieuCongDongController::class, 'store']);
    Route::get('/{id}', [TaiLieuCongDongController::class, 'show']);
    Route::put('/{id}', [TaiLieuCongDongController::class, 'update']);
    Route::delete('/{id}', [TaiLieuCongDongController::class, 'destroy']);
});

use App\Http\Controllers\API\CuocThiController;

Route::group(['prefix' => 'cuoc-thi'], function () {
    Route::get('/', [CuocThiController::class, 'index']);
    Route::post('/', [CuocThiController::class, 'store']);
    Route::get('/{id}', [CuocThiController::class, 'show']);
    Route::put('/{id}', [CuocThiController::class, 'update']);
    Route::delete('/{id}', [CuocThiController::class, 'destroy']);
});

Route::group(['prefix' => 'NguoiDung'], function () {
    Route::get('/', [NguoiDungController::class, 'index']);
    Route::post('/', [NguoiDungController::class, 'store']);
    Route::get('/{id}', [NguoiDungController::class, 'show']);
    Route::put('/{id}', [NguoiDungController::class, 'update']);
    Route::delete('/{id}', [NguoiDungController::class, 'destroy']);
    Route::post('/login', [NguoiDungController::class, 'login']);
    Route::post('/register', [NguoiDungController::class, 'register']);

});

Route::prefix('mentee')->group(function () {
    Route::get('/', [MenteeController::class, 'index']); // GET api/mentee (lấy danh sách mentee)
    Route::post('/', [MenteeController::class, 'store']); // POST api/mentee (tạo mới mentee)
    Route::get('/{id}', [MenteeController::class, 'show']); // GET api/mentee/{id} (lấy thông tin mentee theo id)
    Route::put('/{id}', [MenteeController::class, 'update']); // PUT api/mentee/{id} (cập nhật thông tin mentee)
    Route::delete('/{id}', [MenteeController::class, 'destroy']); // DELETE api/mentee/{id} (xóa mentee)
});
