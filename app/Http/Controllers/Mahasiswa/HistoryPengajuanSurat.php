<?php

namespace App\Http\Controllers\Mahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tb_log_srt_ket_msh_kuliah;
use Illuminate\Support\Facades\Session;

class HistoryPengajuanSurat extends Controller
{
    public function index()
    {
        $pengajuan = tb_log_srt_ket_msh_kuliah::where('npm', Session::get('npm'))->get();

        
        return view('Mhs.main.history-surat.index', compact('pengajuan'));
    }
}
