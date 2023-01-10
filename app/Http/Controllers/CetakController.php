<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\tb_log_srt_ket_msh_kuliah;
use App\models\tb_judul_surat;
use App\models\tb_log_surat_mhs_umum;
use DateTime;
use Illuminate\Support\Facades\Session;

class CetakController extends Controller
{
    public function aktif_kuliah($id)
    {
        
        $data = tb_log_srt_ket_msh_kuliah::with(['tb_judul_surat', 'tb_data_mahasiswa.tb_prodi',
        'user.tb_persetujuan'])
        ->where([
            ['id', '=',  $id],
            ['npm', '=',  Session::get('npm')]
            ])->first();   
        
        //cek masih aktif
        $created = new DateTime($data->created_at);
        $result = $created->format('d-m-Y');
        $datetime1 = date_create($result);

        $now = date('d-m-Y');
        $datetime2 = date_create($now); // waktu sekarang
        $selisih  = date_diff($datetime1, $datetime2);
        $aa = $selisih->d;


        $judul_surat = tb_judul_surat::where('id', $data->kode_judul_surat)->first(); 


        if($aa > $judul_surat->masa_aktif)
        {
            return redirect()->route('rekaman-pengajuan.aktif-kuliah')->with('toast_error', 'Surat Sudah Tidak Aktif');
        }else
        {
            return view('Mhs.print.surat-mahasiswa.aktif-kuliah', compact('data'));
        }

    }

    public function surat_umum_mhs($id)
    {
        
        $data = tb_log_surat_mhs_umum::with(['tb_judul_surat', 'tb_data_mahasiswa.tb_prodi',
        'user.tb_persetujuan'])
        ->where([
            ['id', '=',  $id],
            ['npm', '=',  Session::get('npm')]
            ])->first();   
        
        //cek masih aktif
        $created = new DateTime($data->created_at);
        $result = $created->format('d-m-Y');
        $datetime1 = date_create($result);

        $now = date('d-m-Y');
        $datetime2 = date_create($now); // waktu sekarang
        $selisih  = date_diff($datetime1, $datetime2);
        $aa = $selisih->d;


        $judul_surat = tb_judul_surat::where('id', $data->id_judul_surat)->first(); 


        if($aa > $judul_surat->masa_aktif)
        {
            return redirect()->route('rekaman-pengajuan.aktif-kuliah')->with('toast_error', 'Surat Sudah Tidak Aktif');
        }else
        {
            return view('Mhs.print.surat-mahasiswa.surat-umum-mhs', compact('data'));
        }

    }
}
