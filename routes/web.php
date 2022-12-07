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

//surat rekaman pengajuan
use App\Http\Controllers\Mahasiswa\HistoryPengajuanSurat;

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
    Route::get('/', [DashboardController::class, 'index'] )->name('dashboard-admin');
});

Route::group([
    'middleware' => 'is_cekLogin',
    'prefix' => 'mahasiswa/'], function(){
    Route::get('/', [DashboardMhsController::class, 'index'])->name('dashboard-mhs');

    Route::group([
        'middleware' => 'is_terdaftar',
        'prefix'  => 'pengajuan-surat/'],function(){
        Route::get('/', [PengajuanSuratController::class, 'index'])->name('pengajuan-index');
        Route::POST('/proses-ajuan', [PengajuanSuratController::class, 'proses_pengajuan'])->name('proses-pengajuan');
        
        
        Route::group([
            'prefix'  => 'surat-masih-kuliah/'],function(){
            Route::get('/', [SuratMasihKuliahController::class, 'index'])->name('surat-masih-kuliah.index');
            Route::POST('{npm}/melengkapi-data', [SuratMasihKuliahController::class, 'update'])->name('surat-masih-kuliah.update');
            Route::delete('{npm}/hapus-data', [SuratMasihKuliahController::class, 'destroy'])->name('surat-masih-kuliah.delete');
        });

        Route::group(['prefix'  => 'surat-keterangan-lulus/'],function(){
            Route::get('/', [SuratKetLulusController::class, 'index'])->name('surat-ket-lulus.index');
        });
    });
    
    Route::group(['prefix'  => 'rekaman-pengajuan/'],function(){
        Route::get('/', [HistoryPengajuanSurat::class, 'index'])->name('rekaman-pengajuan.index');
    });
    

    Route::group(['prefix'  => 'biodata-diri/'],function(){
        Route::get('/', [BiodatadiriController::class, 'index'])->name('mhs.biodata-diri.index');
        Route::POST('/simpan-data', [BiodatadiriController::class, 'store'])->name('mhs.biodata.save');
        Route::PATCH('{npm}/perbarui-data', [BiodatadiriController::class, 'update'])->name('mhs.biodata.update');
    });


});
