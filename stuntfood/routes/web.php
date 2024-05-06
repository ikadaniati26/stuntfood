<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\spkController;
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
// Route::view('index', 'website.user.datamakanan')->name('dashboarduser');
// Route::view('/datamakanan', '/user/datamakanan');
Route::view('/spk', 'website.user.spk')->name('form_user');
Route::post('/proses', [spkController::class,'proses'])->name('proses');

// Route::view('/login','/admin/loginAdmin');
// Route::view('/form','admin.formInput')->name('form');


// //========== Admin ==============// 
Route::post('/prosesadmin', [AdminController::class,'store'])->name('prosesadmin');
Route::get('created',[AdminController::class,'create']);
Route::get('datamakananadmin',[AdminController::class,'datamakanan']);

// Route untuk menampilkan form edit
//Route::get('editDatamakanan/{id}', [AdminController::class, 'edit'])->name('data.edit');
//Route::put('{idDataMakanan}', [AdminController::class, 'update'])->name('data.update');

// New route for editing data
Route::get('/editDataMakanan/{id}', [AdminController::class, 'edit'])->name('editadmin');
Route::post('/update/{id}', [AdminController::class, 'update'])->name('updateadmin');
