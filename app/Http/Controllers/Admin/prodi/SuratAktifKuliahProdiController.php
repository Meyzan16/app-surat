<?php

namespace App\Http\Controllers\Admin\prodi;
use App\Http\Controllers\Controller;
use App\Models\tb_log_srt_ket_msh_kuliah;
use App\Models\tb_prodi;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class SuratAktifKuliahProdiController extends Controller
{
    public function index(Request $reqeust, $prodi)
    {
        $data = tb_prodi::where([
            ['kode_prodi', '=',  $prodi],
        ])->first();


        return view('Admin.main.prodi.surat-mahasiswa.aktif-kuliah.index', compact('data'));
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

        return view('Admin.main.prodi.surat-mahasiswa.aktif-kuliah.data', compact('data', 'prodi'));
    }


    public function history(Request $reqeust, $prodi)
    {
        $data = tb_log_srt_ket_msh_kuliah::where([
            ['kode_prodi', '=',  $prodi],
            ['status_persetujuan', '=',  'Y']
        ])->get();

        
        $prodi = tb_prodi::where([
            ['kode_prodi', '=',  $prodi],
        ])->first();


        return view('Admin.main.prodi.surat-mahasiswa.aktif-kuliah.history', compact('data', 'prodi'));
    }

    

}
