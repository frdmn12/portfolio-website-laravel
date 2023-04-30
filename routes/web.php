<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\educationController;
use App\Http\Controllers\halamanController;
use App\Http\Controllers\landingController;
use App\Http\Controllers\projectController;
use App\Http\Controllers\Skill;
use App\Models\project;
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
//? Template
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [landingController::class, "index"]);


Route::redirect('home','dashboard');

// Controller Auth
Route::get('/auth', [authController::class, "index"])->name('login');
Route::get('/auth/redirect', [authController::class, "redirect"])->middleware('guest');
Route::get('/auth/callback', [authController::class, "callback"])->middleware('guest');
Route::get('/auth/logout', [authController::class, "logout"]);

;
// Controller dashboard group
Route::prefix('dashboard')->middleware('auth')->group(
    function (){
        Route::get('/', function (){
            return view('dashboard.layout');
        });
        Route::get('/', [halamanController::class, "index"]);
        Route::resource('halaman', halamanController::class);
        Route::resource('education', educationController::class);
        Route::resource('project', projectController::class);
    }
);



// Route::get('/nama', function () {
//     return "<h1>Nama Saya Bayu Ferdiman</h1>";
// });

// Route::get('/nama/umur/{umur}', function ($umur) {
//     return "<h1>Nama Saya Bayu Ferdiman</h1> <h2>Umur saya adalah $umur</h2>";
// })->where('umur', '[0-70]+');

// Route::get('/nama={nama}/umur={umur}', function ($nama, $umur) {
//     return "<h1>Nama Saya $nama</h1> <h2>Umur saya adalah $umur</h2>";
// })->where(['umur' => '[0-70]+', 'nama' => '[A-Za-z]+']);


// Controller
Route::get('skill', [Skill::class, 'index']);
Route::get('skill/{skills}', [Skill::class, 'detail']);
