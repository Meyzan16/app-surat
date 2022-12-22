<?php

namespace App\Http\Controllers\Mahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tb_log_srt_ket_msh_kuliah;
use App\Models\tb_log_ket_lulus;
use App\Models\tb_log_surat_mhs_umum;
use Illuminate\Support\Facades\Session;

class HistoryPengajuanSurat extends Controller
{
    public function index()
    {
        $pengajuan = tb_log_srt_ket_msh_kuliah::where('npm', Session::get('npm'))->get();  
        return view('Mhs.main.history-surat.aktif-kuliah.index', compact('pengajuan'));
    }

    public function ket_lulus()
    {
        $pengajuan = tb_log_ket_lulus::where('npm', Session::get('npm'))->get();  
        return view('Mhs.main.history-surat.ket-lulus', compact('pengajuan'));
    }

    public function surat_umum()
    {
        $pengajuan = tb_log_surat_mhs_umum::where('npm', Session::get('npm'))->get();  
        return view('Mhs.main.history-surat.surat-umum.index', compact('pengajuan'));
    }
}
