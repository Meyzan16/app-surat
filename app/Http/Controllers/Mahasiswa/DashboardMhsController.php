<?php

namespace App\Http\Controllers\Mahasiswa;
use App\Http\Controllers\Controller;
use App\Models\tb_log_srt_ket_msh_kuliah;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class DashboardMhsController extends Controller
{
    public function index()
    {
        $pengajuan = tb_log_srt_ket_msh_kuliah::where('npm', Session::get('npm'))
                    ->where('operator_prodi','belum diverifikasi')
                    ->where('kepala_operator','belum diverifikasi')
                    ->get();

        return view('Mhs.main.dashboard', compact('pengajuan'));
    }
}
