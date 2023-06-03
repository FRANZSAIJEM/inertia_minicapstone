<?php

use Illuminate\Support\Facades\Route;
use App\Models\Item;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ChatController;






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

Route::get('/', [SiteController::class, 'home']);



Route::get('/login', [SiteController::class, 'loginForm'])->name('login');
Route::post('/login',[SiteController::class, 'login']);



Route::get('/users/create',[UserController::class,'create']);
Route::post('/users',[UserController::class, 'store']);
Route::get('/users', [UserController::class,'index']);





Route::group(['middleware'=>'auth'], function(){

Route::post('/logout', [SiteController::class, 'logout']);


Route::get('/items', [ItemController::class,'index']);










Route::get('/users/user', [UserController::class, 'user']);



Route::get('/chats', [ChatController::class, 'index'])->name('chats.index');
Route::post('/chats/create', [ChatController::class, 'store'])->name('chats.store');
Route::get('/chats/create/{user_id}', [ChatController::class, 'create'])->name('chats.create');
Route::get('/contents', [ContentController::class, 'index'])->middleware('web');







Route::get('/contents/create',[ContentController::class,'create']);
Route::post('/contents', [ContentController::class, 'store'])->name('contents.store');
Route::get('/contents', [ContentController::class, 'index'])->middleware('web');



Route::get('/contents/edit/{content}', [ContentController::class, 'edit']);
Route::put('/contents/{content}', [ContentController::class, 'update']);
Route::delete('/contents/{content}', [ContentController::class, 'destroy']);












    Route::get('/offices/create', [OfficeController::class,'create']);
    Route::get('/offices', [OfficeController::class,'index']);
});


