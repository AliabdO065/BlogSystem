<?php

use App\Http\Controllers\Dashboard\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\UserController;

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
    return view('welcome');
});
Route::group(['prefix'=>'dashboard','as'=>'dashboard.', 'middleware'=>['auth','checkuser'] ], function () {
    Route::get('/', [SettingController::class,'index'])->name('index'); 
    Route::get('/setting', [SettingController::class,'home'])->name('setting');
    Route::post('/setting/update/{setting}',[SettingController::class,'update'])->name('setting.update');

    Route::get('/users/all', [UserController::class,'getUsersDatatable'])->name('users.all');
    Route::post('/users/delete',[UserController::class,'delete'])->name('users.delete');

    Route::get('/categories/all', [CategoryController::class,'getCategoriesDatatable'])->name('categories.all');
    Route::post('/categories/delete',[CategoryController::class,'delete'])->name('categories.delete');

    Route::resources([
        'users' => UserController::class ,
        'categories' =>CategoryController::class ,
    ]);
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');