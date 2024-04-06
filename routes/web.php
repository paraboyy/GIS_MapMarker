<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('loginaksi', [LoginController::class, 'loginaksi'])->name('loginaksi');
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('logoutaksi', [LoginController::class, 'logoutaksi'])->name('logoutaksi')->middleware('auth');

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/datamarker', [HomeController::class, 'marker'])->name('marker');
Route::get('/editmarker/{id}', [HomeController::class, 'edit'])->name('edit');
Route::post('/marker/add', [HomeController::class, 'addMarker'])->name('marker.add');
Route::put('/marker/edit{id}', [HomeController::class, 'editMarker'])->name('marker.edit');
Route::post('/marker/dlete', [HomeController::class, 'deleteMarker'])->name('marker.delete');
Route::get('/markers/search', [HomeController::class, 'searchMarker'])->name('markers.search');
