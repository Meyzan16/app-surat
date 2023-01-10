<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Mahasiswa\DashboardMhsController;
use App\Http\Controllers\Mahasiswa\PandaController;
use App\Http\Controllers\Mahasiswa\PengajuanSuratController;
use App\Http\Controllers\Mahasiswa\BiodataDiriController;

//surat masih kuliah
use App\Http\Controllers\Mahasiswa\SuratMasihKuliahController;
use App\Http\Controllers\Mahasiswa\SuratUmumMahasiswaController;
use App\Http\Controllers\CetakController;

//surat ket lulus
use App\Http\Controllers\Mahasiswa\SuratKetLulusController;

//surat rekaman pengajuan
use App\Http\Controllers\Mahasiswa\HistoryPengajuanSurat;

//surat login
use App\Http\Controllers\Login\LoginController;

//operator
use App\Http\Controllers\Admin\operator\SuratAktifKuliahOperatorController;
use App\Http\Controllers\Admin\operator\suratumum\SuratProdiOperatorController;
use App\Http\Controllers\Admin\operator\suratumum\SuratUmumMhsController;



//kepala operator
use App\Http\Controllers\Admin\kepalaoperator\SuratAktifKuliahKepOperatorController;
use App\Http\Controllers\Admin\kepalaoperator\suratumum\SuratUmumKepOperatorController;
use App\Http\Controllers\Admin\kepalaoperator\akun\AkunOperatorController;
use App\Http\Controllers\Admin\kepalaoperator\akun\AkunProdiController;
use App\Http\Controllers\Admin\kepalaoperator\akun\AkunPersetujuanController;
use App\Http\Controllers\Admin\kepalaoperator\akun\AkunKepOperatorController;

// verif persetujuan
use App\Http\Controllers\Admin\verifpersetujuan\SuratAktifKuliahVerifPersetujuanController;
use App\Http\Controllers\Admin\verifpersetujuan\suratumum\SuratUmumVerifPersetujuanController;
use App\Http\Controllers\Admin\verifpersetujuan\ProfilePersetujuanController;

//prodi
use App\Http\Controllers\Admin\prodi\SuratAktifKuliahProdiController;

// error
use App\Http\Controllers\Error\ErrorController;

//pengaturan
use App\Http\Controllers\Admin\kepalaoperator\pengaturansurat\LampiranSuratController;
use App\Http\Controllers\Admin\kepalaoperator\pengaturansurat\PerihalSuratController;
use App\Http\Controllers\Admin\kepalaoperator\pengaturansurat\TujuanSuratController;
use App\Http\Controllers\Admin\kepalaoperator\pengaturansurat\JudulSuratController;


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
            Route::delete('{id}/hapus-data', [SuratMasihKuliahController::class, 'destroy'])->name('surat-masih-kuliah.delete'); 
            Route::get('{id}/cetak', [CetakController::class, 'aktif_kuliah'])->name('cetak.aktif-kuliah'); 
        });

        Route::group(['prefix'  => 'surat-keterangan-lulus/'],function(){
            Route::get('/', [SuratKetLulusController::class, 'index'])->name('surat-ket-lulus.index');
        });

        Route::group([
            'prefix'  => 'surat-umum/'],function(){
            Route::get('{id}/edit', [SuratUmumMahasiswaController::class, 'index'])->name('surat-umum.index');
            Route::PATCH('{id}/update', [SuratUmumMahasiswaController::class, 'update'])->name('surat-umum.update');    
        });


    });
    
        Route::group(['prefix'  => 'rekaman-pengajuan/'],function(){

            Route::get('/surat-aktif-kuliah', [HistoryPengajuanSurat::class, 'index'])->name('rekaman-pengajuan.aktif-kuliah');
            Route::get('/surat-ket-lulus', [HistoryPengajuanSurat::class, 'ket_lulus'])->name('rekaman-pengajuan.ket-lulus');
            Route::get('/surat-umum', [HistoryPengajuanSurat::class, 'surat_umum'])->name('rekaman-pengajuan.surat_umum');
            

            Route::group([
                'prefix'  => 'surat-masih-kuliah/'],function(){
                    Route::get('{id}/show-diperbaiki', [SuratMasihKuliahController::class, 'show_perbaiki'])->name('surat-masih-kuliah.diperbaiki');
                    Route::patch('{id}/update-diperbaiki', [SuratMasihKuliahController::class, 'update_diperbaiki'])->name('surat-masih-kuliah.diperbaiki-update');   
            });

            Route::group([
                'prefix'  => 'surat-umum/'],function(){
                    Route::get('{id}/show-diperbaiki', [SuratUmumMahasiswaController::class, 'show_perbaiki'])->name('surat-umum.diperbaiki');
                    Route::patch('{id}/update-diperbaiki', [SuratUmumMahasiswaController::class, 'update_diperbaiki'])->name('surat-umum.diperbaiki-update');   
            });


        });
});


//operator
Route::group([
    'middleware' => 'auth',
    'middleware' => 'is_operator',
    'prefix' => 'operator/'], function(){
    Route::get('/', [DashboardController::class, 'index'] )->name('operator.dashboard');

    Route::group([
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
        
        Route::get('{id}/cetak', [CetakController::class, 'aktif_kuliah'])->name('operator.cetak.aktif-kuliah'); 


        Route::group([
            'prefix'  => 'surat-umum/'],function(){
            Route::get('/', [SuratUmumMhsController::class, 'index'])->name('operator.surat-umum-mhs.index');
            Route::get('{id}/edit', [SuratUmumMhsController::class, 'edit'])->name('operator.surat-umum-mhs.edit');
            Route::patch('{id}/data-diperbarui', [SuratUmumMhsController::class, 'update'])->name('operator.surat-umum-mhs.update');
            Route::patch('{id}/verif_diterima', [SuratUmumMhsController::class, 'verifikasi'])->name('operator.surat-umum-mhs.verif_diterima');
            Route::patch('{id}/verif_ditolak', [SuratUmumMhsController::class, 'verifikasi_tolak'])->name('operator.surat-umum-mhs.verif_ditolak');
        
            Route::get('{id}/cetak', [CetakController::class, 'surat_umum_mhs'])->name('operator.cetak.surat-umum-mhs'); 
        });
    });

    Route::group([
        'prefix'  => 'surat-prodi/'],function(){
            Route::get('/', [SuratProdiOperatorController::class, 'index'])->name('operator.surat-umum.index');
            Route::get('tambah-data', [SuratProdiOperatorController::class, 'create'])->name('operator.surat-umum.create');
            Route::POST('simpan-data', [SuratProdiOperatorController::class, 'store'])->name('operator.surat-umum.store');
            
            Route::get('{id}/show-data', [SuratProdiOperatorController::class, 'show'])->name('operator.surat-umum.show');
            Route::get('{id}/edit-data', [SuratProdiOperatorController::class, 'edit'])->name('operator.surat-umum.edit');
            Route::patch('{id}/update-data', [SuratProdiOperatorController::class, 'update'])->name('operator.surat-umum.update');
        });
});


//kepala operator
Route::group([
    'middleware' => 'auth',
    'middleware' => 'is_kepalaoperator',
    'prefix' => 'kepala-operator/'], function(){
            Route::get('/', [DashboardController::class, 'index'] )->name('kepala-operator.dashboard');

            Route::group([
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
                    
                    Route::get('{id}/cetak', [CetakController::class, 'aktif_kuliah'])->name('kepala-operator.cetak.aktif-kuliah');
                });

                // surat umum mahasiswa
                Route::group([
                    'prefix'  => 'surat-umum-mahasiswa/'],function(){
                        Route::get('{prodi}', [SuratUmumKepOperatorController::class, 'mahasiswa'])->name('kep-operator.surat-umum-mhs.index');
                        Route::get('{id}/cetak', [CetakController::class, 'surat_umum_mhs'])->name('kep-operator.surat-umum-mhs.cetak');
                        Route::patch('{id}/verif-diterima', [SuratUmumKepOperatorController::class, 'verifikasi_mhs'])->name('kep-operator.surat-umum-mhs.verif_diterima');
                        Route::patch('{id}/verif-ditolak', [SuratUmumKepOperatorController::class, 'verifikasi_tolak_mhs'])->name('kep-operator.surat-umum-mhs.verif_ditolak');
                });



            });
            
            // surat umum prodi
            Route::group([
                'prefix'  => 'surat-umum-prodi/'],function(){
                    Route::get('{prodi}', [SuratUmumKepOperatorController::class, 'index'])->name('kep-operator.surat-umum.index');
                    
                    Route::get('{id}/show-data', [SuratUmumKepOperatorController::class, 'show'])->name('kep-operator.surat-umum.show');
                    
                    Route::patch('{prodi}/verif-diterima', [SuratUmumKepOperatorController::class, 'verifikasi'])->name('kep-operator.surat-umum.verif_diterima');
                    Route::patch('{prodi}/verif-ditolak', [SuratUmumKepOperatorController::class, 'verifikasi_tolak'])->name('kep-operator.surat-umum.verif_ditolak');
            });

            

            // pengaturan
            Route::group([
                'prefix'  => 'pengaturan/'],function(){
                Route::resource('judul-surat', JudulSuratController::class);

                Route::get('judul-surat-trash', [JudulSuratController::Class, 'trash'])->name('kep-operator.judul-surat.trash');
                Route::get('{id}/judul-surat-restore', [JudulSuratController::class, 'restore'])->name('kep-operator.judul-surat.restore');
            });

            Route::group([
                'prefix'  => 'pengaturan/'],function(){
                Route::resource('data-lampiran', LampiranSuratController::class);

                Route::get('data-lampiran-trash', [LampiranSuratController::Class, 'trash'])->name('kep-operator.data-lampiran.trash');
                Route::get('{id}/data-lampiran-restore', [LampiranSuratController::class, 'restore'])->name('kep-operator.data-lampiran.restore');
            });

            Route::group([
                'prefix'  => 'pengaturan/'],function(){
                Route::resource('data-tujuan', TujuanSuratController::class);

                Route::get('data-tujuan-trash', [TujuanSuratController::Class, 'trash'])->name('kep-operator.data-tujuan.trash');
                Route::get('{id}/data-tujuan-restore', [TujuanSuratController::class, 'restore'])->name('kep-operator.data-tujuan.restore');
            });
            // akhir pengaturan
            
            //Akun operator
            Route::group([
                'prefix'  => 'akun/'],function(){
                            Route::resource('akun-operator', AkunOperatorController::class);  
                            Route::get('akun-operator-trash', [AkunOperatorController::Class, 'trash'])->name('kep-operator.akun-operator.trash');
                            Route::get('{id}/akun-operator-restore', [AkunOperatorController::class, 'restore'])->name('kep-operator.akun-operator.restore');

                            Route::resource('akun-prodi', AkunProdiController::class);   
                            Route::get('akun-prodi-trash', [AkunProdiController::Class, 'trash'])->name('kep-operator.akun-prodi.trash');
                            Route::get('{id}/akun-prodi-restore', [AkunProdiController::class, 'restore'])->name('kep-operator.akun-prodi.restore');
                            
                            
                            Route::resource('akun-persetujuan', AkunPersetujuanController::class);  
                            Route::get('akun-persetujuan-trash', [AkunPersetujuanController::Class, 'trash'])->name('akun-persetujuan.trash');
                            Route::get('{id}/akun-persetujuan-restore', [AkunPersetujuanController::class, 'restore'])->name('akun-persetujuan.restore');
                            Route::get('{id}/akun-persetujuan-riset', [AkunPersetujuanController::class, 'riset'])->name('kep-operator.akun-persetujuan.riset');
                        
                            Route::resource('akun-kep-operator', AkunKepOperatorController::class);  
            

            });
});


//TTD persetujuan
Route::group([
    'middleware' => 'auth',
    'middleware' => 'is_ttdpersetujuan',
    'prefix' => 'pemegang-tanggung-jawab/'], function(){
    Route::get('/', [DashboardController::class, 'index'] )->name('ttd-persetujuan.dashboard');

    Route::group([
        'prefix'  => 'surat-mahasiswa/'],function(){

        Route::group([
            'prefix'  => 'surat-aktif-kuliah/'],function(){
            Route::get('{prodi}', [SuratAktifKuliahVerifPersetujuanController::class, 'index'] )->name('ttd-persetujuan.surat-aktif-kuliah.index');
            Route::get('{prodi}/Data-pengajuan', [SuratAktifKuliahVerifPersetujuanController::class, 'show'] )->name('ttd-persetujuan.surat-aktif-kuliah.show');
            
            Route::post('{prodi}/verifikasi', [SuratAktifKuliahVerifPersetujuanController::class, 'verifikasi'])->name('ttd-persetujuan.surat-aktif-kuliah.verifikasi');

            Route::get('{prodi}/History', [SuratAktifKuliahVerifPersetujuanController::class, 'history'] )->name('ttd-persetujuan.surat-aktif-kuliah.history');

            Route::get('{id}/cetak', [CetakController::class, 'aktif_kuliah'])->name('ttd-persetujuan.cetak.aktif-kuliah');
        });

        Route::group([
            'prefix'  => 'surat-umum-mahasiswa/'],function(){
                Route::get('{prodi}', [SuratUmumVerifPersetujuanController::class, 'mahasiswa'])->name('ttd-persetujuan.surat-umum-mhs.index');
                Route::get('{id}/cetak', [CetakController::class, 'surat_umum_mhs'])->name('ttd-persetujuan.surat-umum-mhs.cetak');
                Route::patch('{id}/verif-diterima', [SuratUmumVerifPersetujuanController::class, 'verifikasi_mhs'])->name('ttd-persetujuan.surat-umum-mhs.verif_diterima');
        });

    });

    Route::group([
        'prefix'  => 'surat-umum/'],function(){
            Route::get('{prodi}', [SuratUmumVerifPersetujuanController::class, 'index'])->name('ttd-persetujuan.surat-umum.index');
            
            Route::get('{id}/show-data', [SuratUmumVerifPersetujuanController::class, 'show'])->name('ttd-persetujuan.surat-umum.show');
            
            Route::patch('{prodi}/verif-diterima', [SuratUmumVerifPersetujuanController::class, 'verifikasi'])->name('ttd-persetujuan.surat-umum.verif_diterima');
          
    });

    Route::get('profile', [ProfilePersetujuanController::class, 'index'])->name('persetujaun.profile.index');
    Route::patch('{id}/profile/update', [ProfilePersetujuanController::class, 'update'])->name('persetujaun.profile.update');

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

