<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\tb_log_srt_ket_msh_kuliah;
use App\Models\tb_log_ket_lulus;
use App\Models\tb_log_surat_mhs_umum;
use App\Models\tb_loghistory_surat_umum;

class DashboardController extends Controller
{
    public function index()
    {
        $count_aktif_kuliah = tb_log_srt_ket_msh_kuliah::where('kode_prodi', auth()->user()->kode_prodi)
                            ->count();
        $count_ket_lulus = tb_log_ket_lulus::where('kode_prodi', auth()->user()->kode_prodi)
                            ->count();
        $srt_umum_mhs = tb_log_surat_mhs_umum::where('kode_prodi', auth()->user()->kode_prodi)
                            ->count();
        $srt_umum = tb_loghistory_surat_umum::where('kode_prodi', auth()->user()->kode_prodi)
                            ->count();

        return view('Admin.main.dashboard', compact('count_aktif_kuliah', 'count_ket_lulus','srt_umum', 'srt_umum_mhs'));
    }
}
