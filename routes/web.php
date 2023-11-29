<?php

use App\Http\Controllers\HalamanController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\introduceController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdukController;
use Illuminate\Constract\Session\Session;
use Illuminate\Routing\Router;
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

// 127.0.0.1:8000/ ==> view welcome
// Route::get('/', function () {
//     return view('welcome');
// });

// // 127.0.0.1:8000/mahasiswa ==> <h1>Hi! Saya Mahasiswa</h1>
// Route::get('/mahasiswa', function () {
//     return "<h1>Hi! Saya Mahasiswa</h1>";
// });

// // 127.0.0.1:8000/mahasiswa/22 ==> <h1>Hi! Saya Mahasiswa dengan ID 22</h1>
// Route::get('/mahasiswa/{id}', function ($id) {
//     return "<h1>Hi! Saya Mahasiswa dengan ID $id</h1>";
// })->where('id','[0-9]+');

// // 127.0.0.1:8000/mahasiswa/22/windi ==> <h1>Hi! Saya Mahasiswa dengan ID 22 dan Nama Saya Windi</h1>
// Route::get('/mahasiswa/{id}/{nama}', function ($id, $nama) {
//     return "<h1>Hi! Saya Mahasiswa dengan ID $id dan Nama Saya $nama</h1>";
// })->where(['id'=>'[0-9]+', 'nama'=>'[A-Za-z]+']);

// Route::get('/mahasiswa', [App\Http\Controllers\introduceController::class, 'index']);
// Route::get('/mahasiswa/{id}', [App\Http\Controllers\introduceController::class, 'detail'])->where('id','[0-9]+');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', [App\Http\Controllers\HalamanController::class, 'index']);
Route::get('/kontak', [App\Http\Controllers\HalamanController::class, 'kontak']);
Route::get('/tentang', [App\Http\Controllers\HalamanController::class, 'tentang']);

Route::get('/sesi', [App\Http\Controllers\SessionController::class, 'index']);
Route::post('/sesi/login', [App\Http\Controllers\SessionController::class, 'login']);
Route::get('/sesi/logout', [App\Http\Controllers\SessionController::class, 'logout']);
Route::get('/sesi/register', [App\Http\Controllers\SessionController::class, 'register']);
Route::post('/sesi/create', [App\Http\Controllers\SessionController::class, 'create']);

Route::resource('mahasiswa', MahasiswaController::class);


Route::get('/produk', function () {
    $nama_produk = "Khimar WindiCS";
    return view('produk', compact('nama_produk'));
});

Route::resource('produk', ProdukController::class);