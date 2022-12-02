<?php

namespace App\Http\Controllers\Mahasiswa;
use App\Http\Controllers\Controller;
use App\Models\tb_judul_surat;

use Illuminate\Http\Request;

class PengajuanSuratController extends Controller
{
    public function index()
    {
        $judul_surat = tb_judul_surat::with('tb_jenis_surat')->get();
        return view('Mhs.main.pengajuansurat', compact('judul_surat'));
    }

    public function proses_pengajuan(Request $request)
    {
        $judul_surat = $request->judul_surat;
        return $judul_surat;
        
        
    }

}
