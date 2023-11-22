<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pengaduanController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [PengaduanController::class, 'index',]);
Route::get('/masyarakat', [MasyarakatController::class, 'index',]);
Route::get('/petugas', [PetugasController::class, 'index',]);
Route::get('/isi-pengaduan', [PengaduanController::class, 'tampil_pengaduan',]);
Route::post('/isi-pengaduan', [PengaduanController::class, 'proses_tambah_pengaduan',]);
Route::get('/isi-masyarakat', [MasyarakatController::class, 'tampil_masyarakat',]);
Route::post('/isi-masyarakat', [MasyarakatController::class, 'proses_tambah_masyarakat',]);
Route::get('/isi-petugas', [PetugasController::class, 'tampil_petugas',]);
Route::post('/isi-petugas', [PetugasController::class, 'proses_tambah_petugas',]);
Route::get('/hapus-pengaduan/{id}', [PengaduanController::class, 'hapus',]);
Route::get('/hapus-petugas/{id}', [PetugasController::class, 'hapus_petugas',]);
Route::get('/detail-pengaduan/{id}', [PengaduanController::class, 'detail_pengaduan',]);
Route::post('/update-pengaduan/{id}', [PengaduanController::class, 'proses_update_pengaduan',]);
Route::post('/update-petugas/{id}', [PetugasController::class, 'proses_update_petugas',]);
Route::get('/update-pengaduan/{id}', [PengaduanController::class, 'update_pengaduan',]);
Route::get('/hapus-masyarakat/{nik}', [MasyarakatController::class, 'hapus',]);
Route::get('/detail-masyarakat/{nik}', [MasyarakatController::class, 'detail_Masyarakat',]);
Route::post('/update-masyarakat/{nik}', [MasyarakatController::class, 'proses_update_masyarakat',]);
Route::get('/update-masyarakat/{nik}', [MasyarakatController::class, 'update_masyarakat',]);
Route::get('/hapus-masyarakat/{nik}', [MasyarakatController::class, 'hapus',]);
Route::get('/detail-masyarakat/{nik}', [MasyarakatController::class, 'detail_Masyarakat',]);
Route::post('/update-masyarakat/{nik}', [MasyarakatController::class, 'proses_update_masyarakat',]);
Route::get('/update-masyarakat/{nik}', [MasyarakatController::class, 'update_masyarakat',]);
Route::post('/register', [AuthController::class, 'register',]);
Route::get('/register', [AuthController::class, 'tampil_register',]);
Route::get('/a', function(){
    return "petugas";
});
Route::post('/petugas_register', [PetugasController::class, 'petugas_register',]);
Route::get('/petugas_register', [PetugasController::class, 'tampil_register_petugas',]);
Route::get('/login', [AuthController::class, 'tampil_login']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/petugas_login', [PetugasController::class, 'petugas_login']);
Route::post('/petugas_login', [PetugasController::class, 'login_petugas']);
Route::get('/petugas_home', [PetugasController::class, 'petugas_home']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('petugas_logout', [PetugasController::class, 'petugas_logout']);
Route::get('/detail_tanggapan/{id}', [PetugasController::class, 'detail_petugas_tanggapan']);
Route::post('/detail_tanggapan/{id}', [PetugasController::class, 'proses_berikan_tanggapan',]);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [PengaduanController::class, 'index',])->name('home');
});

Route::middleware(['CekPetugas'])->group(function () {
    Route::get('petugas_home', [PetugasController::class, 'petugas_home',]);
});