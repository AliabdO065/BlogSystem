<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\SettingController;

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
    return view('dashboard.index');
});

Route::group(['prefix'=>'dashboard','as'=>'dashboard.' ], function () {
    Route::get('/', [SettingController::class,'index']);
    Route::get('/setting', [SettingController::class,'home'])->name('setting');
    Route::post('/setting/update/{setting}',[SettingController::class,'update'])->name('setting.update');

    // Route::get('/users/all',[UserController::class,'getUsersDatatable'])->name('users.all');
    // Route::get('/users/delete',[UserController::class,'destroy'])->name('users.delete');
    // Route::resources([
    //     'user' => UserController::class ,
    // ]);
});