<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\authController;
use App\Http\Controllers\spkController;
use Illuminate\Routing\Events\Routing;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

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

//========== USER ==============// 
Route::get('/', function () {
    return view('landingpage.lp');
});

//========== Login ==============// 
Route::post('/login', [authController::class, 'login'])->name('login');
Route::get('/login', [authController::class, 'index'])->name('form_login');
Route::get('/logout', [authController::class, 'logout'])->name('logout');


//========== AI ==============// 
Route::get('/spk', [spkController::class, 'index'])->name('form_user');
Route::post('/proses', [spkController::class, 'proses'])->name('proses');
Route::get('/show/{id}', [spkController::class, 'show'])->name('detail');
Route::get('/submenu/{id}', [spkController::class, 'proses'])->name('submenu');
Route::get('/show/{paket}', [spkController::class, 'show']);

Route::middleware(['customAuth'])->group(function () {
    //========== Admin ==============// 
    Route::post('/prosesadmin', [AdminController::class, 'store'])->name('prosesadmin');
    Route::get('created', [AdminController::class, 'create']);
    Route::get('/submenu/{id}', [AdminController::class, 'proses'])->name('submenu');

    //============ CRUD ===============//
    Route::get('datamakananadmin', [AdminController::class, 'datamakanan']);
    Route::get('/datamakanan/{paket}', [AdminController::class, 'datamakanan']);
    Route::get('/showadmin/{paket}', [AdminController::class, 'showadmin'])->name('showadmin');
    Route::get('/editDataMakanan/{paket}', [AdminController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [AdminController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('hapus');
});


//=========== PERHITUNGAN =========//
Route::get('/data-makanan', [spkController::class, 'subMenu']);
