<?php

namespace App\Http\Controllers\Mahasiswa;
use App\Http\Controllers\Controller;
use App\Models\tb_judul_surat;
use App\Models\tb_log_srt_ket_msh_kuliah;
use Illuminate\Support\Facades\Validator;

class SuratKetLulusController extends Controller
{
    public function index()
    {
        return view('Mhs.main.pengajuan-surat.srt-ket-lulus.index');
    }

    
}
