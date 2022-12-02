<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Mahasiswa\DashboardMhsController;
use App\Http\Controllers\Mahasiswa\PandaController;
use App\Http\Controllers\Mahasiswa\PengajuanSuratController;


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

// Route::get('/', function () {
//     return view('Admin.main.dashboard');
// });


Route::get('/', function () {
    return view('Mhs.main.login');
})->name('login_mahasiswa');


Route::post('/pandalogin',[PandaController::class, 'pandaLogin'])->name('login_mahasiswa_post');
Route::post('/logout', [PandaController::class, 'logout'])->name('logout_mahasiswa');

//Admin
Route::group([
    'prefix' => 'admin/'], function(){
    Route::get('/', [DashboardController::Class, 'index'] )->name('dashboard-admin');
});

Route::group([
    'prefix' => 'mahasiswa/'], function(){
    Route::get('/', [DashboardMhsController::Class, 'index'])->name('dashboard-mhs');
    Route::get('/pengajuan-surat', [PengajuanSuratController::Class, 'index'])->name('pengajuan-index')->middleware('is_terdaftar');
    Route::POST('/pengajuan-surat/proses-ajuan', [PengajuanSuratController::Class, 'proses_pengajuan'])->name('proses-pengajuan');
});
