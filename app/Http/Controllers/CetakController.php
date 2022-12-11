<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\tb_log_srt_ket_msh_kuliah;

class CetakController extends Controller
{
    public function aktif_kuliah($npm)
    {

        $data = tb_log_srt_ket_msh_kuliah::with(['tb_judul_surat', 'tb_data_mahasiswa',
        'user.tb_persetujuan'])
        ->where('npm', $npm)->first();                           

        // return $data;


        return view('Mhs.print.surat-mahasiswa.aktif-kuliah', compact('data'));
    }
}
