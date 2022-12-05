<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Mahasiswa\DashboardMhsController;
use App\Http\Controllers\Mahasiswa\PandaController;
use App\Http\Controllers\Mahasiswa\PengajuanSuratController;
use App\Http\Controllers\Mahasiswa\BiodataDiriController;

//surat masih kuliah
use App\Http\Controllers\Mahasiswa\SuratMasihKuliahController;
//surat ket lulus
use App\Http\Controllers\Mahasiswa\SuratKetLulusController;

//surat 
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
    'middleware' => 'is_cekLogin',
    'prefix' => 'mahasiswa/'], function(){
    Route::get('/', [DashboardMhsController::Class, 'index'])->name('dashboard-mhs');

    Route::group([
        'middleware' => 'is_terdaftar',
        'prefix'  => 'pengajuan-surat/'],function(){
        Route::get('/', [PengajuanSuratController::Class, 'index'])->name('pengajuan-index');
        Route::POST('/proses-ajuan', [PengajuanSuratController::Class, 'proses_pengajuan'])->name('proses-pengajuan');
        
        
        Route::group(['prefix'  => 'surat-masih-kuliah/'],function(){
            Route::get('/', [SuratMasihKuliahController::Class, 'index'])->name('surat-masih-kuliah.index');
            Route::POST('/melengkapi-data', [SuratMasihKuliahController::Class, 'update'])->name('surat-masih-kuliah.update');
        });

        Route::group(['prefix'  => 'surat-keterangan-lulus/'],function(){
            Route::get('/', [SuratKetLulusController::Class, 'index'])->name('surat-ket-lulus.index');
        });
        
    });


    Route::group(['prefix'  => 'biodata-diri/'],function(){
        Route::get('/', [BiodatadiriController::Class, 'index'])->name('mhs.biodata-diri.index');
        Route::POST('/simpan-data', [BiodatadiriController::Class, 'store'])->name('mhs.biodata.save');
        Route::PATCH('{npm}/perbarui-data', [BiodatadiriController::Class, 'update'])->name('mhs.biodata.update');
    });


});
