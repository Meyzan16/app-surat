<?php

namespace App\Http\Controllers\Admin\verifpersetujuan\suratumum;
use App\Http\Controllers\Controller;
use App\Models\tb_loghistory_surat_umum;
use App\Models\tb_lampiran;
use App\Models\tb_perihal_surat;
use App\Models\tb_tujuan_surat;
use App\Models\tb_prodi;
use App\Models\tb_log_surat_mhs_umum;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class SuratUmumVerifPersetujuanController extends Controller
{
    public function index($prodi)
    {
        $data = tb_loghistory_surat_umum::where([
            ['kode_prodi', '=',  $prodi],
        ])->get();
        $prodi = tb_prodi::where([
            ['kode_prodi', '=',  $prodi],
        ])->first();

        return view('Admin.main.verif-persetujuan.surat-umum.index', compact('data', 'prodi'));
    }

    public function show($id)
    {

        $data = tb_loghistory_surat_umum::where([
            ['id', '=',  $id],
        ])->first();
        return view('Admin.main.show_surat.surat-umum-prodi', compact('data'));
    }

 

     // kepala operator
     public function verifikasi(Request $request, $prodi){
        $id = $request->id;
        tb_loghistory_surat_umum::where([
            ['id', '=',  $id]
        ])->update([
            'status_persetujuan'    =>  'Y',
            'id_persetujuan' => auth()->user()->id,
            'time_acc_ttd' => date("Y-m-d H:i:s"),
        ]);

         return redirect()->route('ttd-persetujuan.surat-umum.index', $prodi )->with(['toast_success' => 'Data berhasil di verifikasi !!']);
    }


    public function mahasiswa(Request $reqeust, $prodi)
    {
        
        $data = tb_prodi::where([
            ['kode_prodi', '=',  $prodi],
        ])->first();

        $count_aktif_kuliah = tb_log_surat_mhs_umum::where('kode_prodi', $prodi)
                    ->where('status_persetujuan', 'Y')  
                    ->count();
        $data_pengajuan_aktif_kuliah = tb_log_surat_mhs_umum::where('kode_prodi', $prodi)
                    ->where('status_persetujuan', 'belum diverifikasi')  
                    ->count();

        return view('Admin.main.verif-persetujuan.surat-umum-mhs.index', compact('data','data_pengajuan_aktif_kuliah', 'count_aktif_kuliah'));
    }

    // mahasiswa
    public function pengajuan($prodi)
    {
            $data = tb_log_surat_mhs_umum::where([
                ['kode_prodi', '=',  $prodi],
                ['status_persetujuan', '=',  'belum diverifikasi'],
            ])->get();
            $prodi = tb_prodi::where([
                ['kode_prodi', '=',  $prodi],
            ])->first();

            return view('Admin.main.verif-persetujuan.surat-umum-mhs.pengajuan', compact('data', 'prodi'));
    }

    public function history($prodi)
    {  
            $data = tb_log_surat_mhs_umum::where([
                ['kode_prodi', '=',  $prodi],
                ['status_persetujuan', '=',  'Y'],
            ])->get();
            $prodi = tb_prodi::where([
                ['kode_prodi', '=',  $prodi],
            ])->first();
            return view('Admin.main.verif-persetujuan.surat-umum-mhs.history', compact('data', 'prodi'));
    }


    public function verifikasi_mhs(Request $request, $prodi)
    {
        $id = $request->id;
        tb_log_surat_mhs_umum::where([
            ['id', '=',  $id]
        ])->update([
            'status_persetujuan'    =>  'Y',
            'id_persetujuan'    =>  auth()->user()->id,
            'time_acc_ttd' => date("Y-m-d H:i:s"),
        ]);

         return redirect()->route('ttd-persetujuan.surat-umum-mhs.index', $prodi )->with(['toast_success' => 'Data berhasil di verifikasi !!']);
    }


  


}
