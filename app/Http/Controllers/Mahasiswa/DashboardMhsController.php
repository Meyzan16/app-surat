<?php

namespace App\Http\Controllers\Mahasiswa;
use App\Http\Controllers\Controller;
use App\Models\tb_log_srt_ket_msh_kuliah;
use App\Models\tb_data_mahasiswa;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class DashboardMhsController extends Controller
{
    public function index()
    {
        $pengajuan = tb_log_srt_ket_msh_kuliah::where('npm', Session::get('npm'))
                     ->where('status_persetujuan', 'belum diverifikasi')    
                     ->get();

        $cek_surat_msh_kuliah = tb_log_srt_ket_msh_kuliah::where('npm',Session::get('npm') )
                    ->where('status_persetujuan', 'belum diverifikasi')  
                    ->first();
        // return $cek_surat_msh_kuliah

        $count_aktif_kuliah = tb_log_srt_ket_msh_kuliah::where('npm',Session::get('npm') )
                    ->where('status_persetujuan', 'Y')  
                    ->count();

        $tb_data_mahasiswa = tb_data_mahasiswa::where('npm', session::get('npm'))->first();



        
        return view('Mhs.main.dashboard', compact('pengajuan' , 'cek_surat_msh_kuliah' , 'count_aktif_kuliah', 'tb_data_mahasiswa'));
    }
}
