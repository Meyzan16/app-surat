<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Mahasiswa\DashboardMhsController;
use App\Http\Controllers\Mahasiswa\PandaController;
use App\Http\Controllers\Mahasiswa\PengajuanSuratController;
use App\Http\Controllers\Mahasiswa\BiodataDiriController;

//surat masih kuliah
use App\Http\Controllers\Mahasiswa\SuratMasihKuliahController;
use App\Http\Controllers\CetakController;

//surat ket lulus
use App\Http\Controllers\Mahasiswa\SuratKetLulusController;

//surat rekaman pengajuan
use App\Http\Controllers\Mahasiswa\HistoryPengajuanSurat;

//surat login
use App\Http\Controllers\Login\LoginController;

//operator
use App\Http\Controllers\Admin\operator\SuratAktifKuliahOperatorController;


//kepala operator
use App\Http\Controllers\Admin\kepalaoperator\SuratAktifKuliahKepOperatorController;

// verif persetujuan
use App\Http\Controllers\Admin\verifpersetujuan\SuratAktifKuliahVerifPersetujuanController;

//prodi
use App\Http\Controllers\Admin\prodi\SuratAktifKuliahProdiController;


// error
use App\Http\Controllers\Error\ErrorController;

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
Route::post('/logout-mhs', [PandaController::class, 'logout'])->name('logout_mahasiswa');

//mahasiswa
Route::group([
    'middleware' => 'is_cekLogin',
    'prefix' => 'mahasiswa/'], function(){
    Route::get('/', [DashboardMhsController::class, 'index'])->name('dashboard-mhs');

     Route::group(['prefix'  => 'biodata-diri/'],function(){
        Route::get('/', [BiodatadiriController::class, 'index'])->name('mhs.biodata-diri.index');
        Route::POST('/simpan-data', [BiodatadiriController::class, 'store'])->name('mhs.biodata.save');
        Route::PATCH('{npm}/perbarui-data', [BiodatadiriController::class, 'update'])->name('mhs.biodata.update');
    });

    Route::group([
        'middleware' => 'is_terdaftar',
        'prefix'  => 'pengajuan-surat/'],function(){
        Route::get('/', [PengajuanSuratController::class, 'index'])->name('pengajuan-index');
        Route::POST('/proses-ajuan', [PengajuanSuratController::class, 'proses_pengajuan'])->name('proses-pengajuan');
        
        
        Route::group([
            'prefix'  => 'surat-masih-kuliah/'],function(){
            Route::get('/', [SuratMasihKuliahController::class, 'index'])->name('surat-masih-kuliah.index');
            
            Route::post('{npm}/melengkapi-data', [SuratMasihKuliahController::class, 'update'])->name('surat-masih-kuliah.update');
            Route::delete('{npm}/hapus-data', [SuratMasihKuliahController::class, 'destroy'])->name('surat-masih-kuliah.delete'); 
            
            Route::get('{npm}/cetak', [CetakController::class, 'aktif_kuliah'])->name('cetak.aktif-kuliah'); 
            

        });

        Route::group(['prefix'  => 'surat-keterangan-lulus/'],function(){
            Route::get('/', [SuratKetLulusController::class, 'index'])->name('surat-ket-lulus.index');
        });
    });
    
        Route::group(['prefix'  => 'rekaman-pengajuan/'],function(){

            Route::get('/surat-aktif-kuliah', [HistoryPengajuanSurat::class, 'index'])->name('rekaman-pengajuan.aktif-kuliah');
            Route::get('/surat-ket-lulus', [HistoryPengajuanSurat::class, 'ket_lulus'])->name('rekaman-pengajuan.ket-lulus');
            
            Route::group([
                'prefix'  => 'surat-masih-kuliah/'],function(){
                    Route::get('{id}/show-diperbaiki', [SuratMasihKuliahController::class, 'show_perbaiki'])->name('surat-masih-kuliah.diperbaiki');
                    Route::patch('{id}/update-diperbaiki', [SuratMasihKuliahController::class, 'update_diperbaiki'])->name('surat-masih-kuliah.diperbaiki-update');   
            });

          

        });
    

   


});

//operator
Route::group([
    'middleware' => 'auth',
    'prefix' => 'operator/'], function(){
    Route::get('/', [DashboardController::class, 'index'] )->name('operator.dashboard');

    Route::group([
        'middleware' => 'is_operator',
        'prefix'  => 'surat-mahasiswa/'],function(){
        Route::group([
            'prefix'  => 'surat-aktif-kuliah/'],function(){
            Route::get('/', [SuratAktifKuliahOperatorController::class, 'index'])->name('operator.surat-aktif-kuliah.index');
            Route::get('{npm}/edit', [SuratAktifKuliahOperatorController::class, 'edit'])->name('operator.surat-aktif-kuliah.edit');
            Route::patch('{npm}/data-diperbarui', [SuratAktifKuliahOperatorController::class, 'update'])->name('operator.surat-aktif-kuliah.update');
            
            Route::patch('{npm}/verif_diterima', [SuratAktifKuliahOperatorController::class, 'verifikasi'])->name('operator.surat-aktif-kuliah.verif_diterima');
            Route::patch('{npm}/verif_ditolak', [SuratAktifKuliahOperatorController::class, 'verifikasi_tolak'])->name('operator.surat-aktif-kuliah.verif_ditolak');
        });
        Route::get('aktif-kuliah/history-pengajuan', [SuratAktifKuliahOperatorController::class, 'history'])->name('surat-masih-kuliah.history');
    });

});



//kepala operator
Route::group([
    'middleware' => 'auth',
    'prefix' => 'kepala-operator/'], function(){
    Route::get('/', [DashboardController::class, 'index'] )->name('kepala-operator.dashboard');

    Route::group([
        'middleware' => 'is_kepalaoperator',
        'prefix'  => 'surat-mahasiswa/'],function(){
        Route::group([
            'prefix'  => 'surat-aktif-kuliah/'],function(){
            Route::get('{prodi}', [SuratAktifKuliahKepOperatorController::class, 'index'] )->name('kepala-operator.surat-aktif-kuliah.index');
            Route::get('{prodi}/Data-pengajuan', [SuratAktifKuliahKepOperatorController::class, 'show'] )->name('kepala-operator.surat-aktif-kuliah.show');
            Route::get('{prodi}/history-pengajuan', [SuratAktifKuliahKepOperatorController::class, 'history'])->name('kepala-operator.surat-aktif-kuliah.history');


            // operator
            //kenapa prodi , karna di filter secara prodi dan di update secara npm, npm di ambil lewat request
            Route::post('{prodi}/verif_diterima_operator', [SuratAktifKuliahKepOperatorController::class, 'verifikasi'])->name('kepala-operator.surat-aktif-kuliah.verif_diterima');
            Route::patch('{prodi}/verif_ditolak_operator', [SuratAktifKuliahKepOperatorController::class, 'verifikasi_tolak'])->name('kepala-operator.surat-aktif-kuliah.verif_ditolak');
            
            // kepala operator
            Route::post('{prodi}/verifikasi-kepala-operator', [SuratAktifKuliahKepOperatorController::class, 'verifikasi_kepala'])->name('kepala-operator.surat-aktif-kuliah.verif-kep-operator');
            Route::post('{prodi}/veri-batal-kepala-operator', [SuratAktifKuliahKepOperatorController::class, 'verif_batal_kepala'])->name('kepala-operator.surat-aktif-kuliah.verif-batal-kep-operator');
        });
    });
});


//TTD persetujuan
Route::group([
    'middleware' => 'auth',
    'prefix' => 'pemegang-tanggung-jawab/'], function(){
    Route::get('/', [DashboardController::class, 'index'] )->name('ttd-persetujuan.dashboard');

    Route::group([
        'middleware' => 'is_ttdpersetujuan',
        'prefix'  => 'surat-mahasiswa/'],function(){
        Route::group([
            
            'prefix'  => 'surat-aktif-kuliah/'],function(){
            Route::get('{prodi}', [SuratAktifKuliahVerifPersetujuanController::class, 'index'] )->name('ttd-persetujuan.surat-aktif-kuliah.index');
            Route::get('{prodi}/Data-pengajuan', [SuratAktifKuliahVerifPersetujuanController::class, 'show'] )->name('ttd-persetujuan.surat-aktif-kuliah.show');
            
            Route::post('{prodi}/verifikasi', [SuratAktifKuliahVerifPersetujuanController::class, 'verifikasi'])->name('ttd-persetujuan.surat-aktif-kuliah.verifikasi');
            

            Route::get('{prodi}/History', [SuratAktifKuliahVerifPersetujuanController::class, 'history'] )->name('ttd-persetujuan.surat-aktif-kuliah.history');

        });
    });
});


// bagian prodi
Route::group([
    'middleware' => 'auth',
    'prefix' => 'prodi/'], function(){
    Route::get('/', [DashboardController::class, 'index'] )->name('prodi.dashboard');

    Route::group([
        'middleware' => 'is_prodi',
        'prefix'  => 'surat-mahasiswa/'],function(){
        Route::group([
            
            'prefix'  => 'surat-aktif-kuliah/'],function(){
            Route::get('{prodi}', [SuratAktifKuliahProdiController::class, 'index'] )->name('prodi-pengajuan.surat-aktif-kuliah.index');
            Route::get('{prodi}/pengajuan-aktif', [SuratAktifKuliahProdiController::class, 'show'] )->name('prodi-pengajuan.surat-aktif-kuliah.show');

            Route::get('{prodi}/History', [SuratAktifKuliahProdiController::class, 'history'] )->name('prodi-pengajuan.surat-aktif-kuliah.history');

        });
    });
});



// error
Route::get('/404', [ErrorController::class, 'index'] )->name('error-404');




// login
Route::get('/login', [LoginController::class, 'index'] )->name('login');
Route::POST('/authentication', [LoginController::class, 'authentication'] )->name('authentication-admin');
Route::POST('/logout', [LoginController::class, 'logout'] )->name('logout-auth');

