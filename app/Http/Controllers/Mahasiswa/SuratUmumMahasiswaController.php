<?php

namespace App\Http\Controllers\Mahasiswa;
use App\Http\Controllers\Controller;
use App\Models\tb_log_surat_mhs_umum;
use App\Models\tb_judul_surat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SuratUmumMahasiswaController extends Controller
{
    public function index()
    {
                $data = tb_judul_surat::where('id', Session::get('session_judul_surat'))->first();
                return view('Mhs.main.pengajuan-surat.surat-umum.index', compact('data'));
    }

    public function update(Request $request, $npm)
    {
        tb_log_surat_mhs_umum::where([

                ['npm','=' , $npm],
                ['status_persetujuan', '=' , 'belum diverifikasi'],
                ['id_judul_surat', '=' , 3]
            ]
        )->update([
            'tujuan_surat' => $request->tujuan_surat,
            'sub_tujuan' => $request->sub_tujuan,
            'judul_penelitian' => $request->judul_penelitian,
            'isi_surat' => $request->isi_surat,
            'tembusan' => $request->tembusan,
        ]);
        return redirect()->route('pengajuan.index');
    }

}
