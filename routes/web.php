<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\castController;
use App\Http\Controllers\controllerFilm;
use App\Http\Controllers\HomesController;
use App\Http\Controllers\controllerGenre;


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

Route::get('/', [HomesController::class, 'home']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/welcome', [AuthController::class, 'welcome']);


Route::get('/data-table', function () {
    return view('halaman.data-table');
});

Route::get('/table', function () {
    return view('halaman.table');
});

//CRUD Cast

//route unutk menambahkan cast
Route::get('/cast/create', [castController::class, 'create']);

//route untuk menyimpan data inputan ke db
Route::post('/cast', [castController::class, 'store']);

//read
Route::get('/cast', [castController::class, 'index']);

//detail
Route::get('/cast/{cast_id}', [castController::class, 'show']);

//edit
Route::get('/cast/{cast_id}/edit', [castController::class, 'edit']);

//untuk update data edit berdasarkan id di db
Route::put('/cast/{cast_id}', [castController::class, 'update']);

//delete
Route::delete('/cast/{cast_id}', [castController::class, 'destroy']);

//route film 
Route::resource('film', controllerFilm::class);

//route genre 
Route::resource('genre', controllerGenre::class);

Auth::routes();


