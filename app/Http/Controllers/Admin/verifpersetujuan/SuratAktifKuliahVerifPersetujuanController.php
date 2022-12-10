<?php

namespace App\Http\Controllers\Admin\verifpersetujuan;
use App\Http\Controllers\Controller;
use App\Models\tb_log_srt_ket_msh_kuliah;
use App\Models\tb_prodi;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class SuratAktifKuliahVerifPersetujuanController extends Controller
{
    public function index(Request $reqeust, $prodi)
    {
        $data = tb_prodi::where([
            ['kode_prodi', '=',  $prodi],
        ])->first();


        return view('Admin.main.verif-persetujuan.surat-mahasiswa.aktif-kuliah.index', compact('data'));
    }

    public function show(Request $reqeust, $prodi)
    {
        $data = tb_log_srt_ket_msh_kuliah::where([
            ['kode_prodi', '=',  $prodi],
            ['status_persetujuan', '=',  'belum diverifikasi']
        ])->get();

        $prodi = tb_prodi::where([
            ['kode_prodi', '=',  $prodi],
        ])->first();

        return view('Admin.main.verif-persetujuan.surat-mahasiswa.aktif-kuliah.data', compact('data', 'prodi'));
    }

    public function verifikasi(Request $request, $prodi){
        $npm = $request->npm;
        tb_log_srt_ket_msh_kuliah::where([
            ['npm', '=',  $npm],
            ['status_persetujuan', '=',  'belum diverifikasi']
        ])->update([
            'status_persetujuan'    =>  'Y',
            'id_persetujuan' => auth()->user()->id,
            'time_acc_ttd' => date("Y-m-d H:i:s"),
        ]);

         return redirect()->route('ttd-persetujuan.surat-aktif-kuliah.show', $prodi )->with(['toast_success' =>  $npm. ' berhasil di verifikasi !!']);
    }

}
