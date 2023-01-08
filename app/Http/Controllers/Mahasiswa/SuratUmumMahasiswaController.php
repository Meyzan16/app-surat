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
    public function index($id)
    {
                $data = tb_judul_surat::where('id', $id)->first();
                return view('Mhs.main.pengajuan-surat.surat-umum.index', compact('data'));
    }

    public function update(Request $request, $id)
    {
        tb_log_surat_mhs_umum::where([

                ['id','=' , $id],
                ['status_persetujuan', '=' , 'belum diverifikasi']
            ]
        )->update([
            'tujuan_surat' => $request->tujuan_surat,
            'sub_tujuan' => $request->sub_tujuan,
            'judul_penelitian' => $request->judul_penelitian,
            'isi_surat' => $request->isi_surat,
            'tembusan' => $request->tembusan,
        ]);
        return \redirect()->route('rekaman-pengajuan.surat_umum')->with('toast_success', 'Mohon menunggu diverifikasi');
    }

}
