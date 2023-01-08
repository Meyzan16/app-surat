<?php

namespace App\Http\Controllers\Mahasiswa;
use App\Http\Controllers\Controller;
use App\Models\tb_log_surat_mhs_umum;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SuratUmumMahasiswaController extends Controller
{
    public function index($id)
    {
                $data = tb_log_surat_mhs_umum::where('id', $id)->first();
                return view('Mhs.main.pengajuan-surat.surat-umum.index', compact('data'));
    }

    public function update(Request $request, $id)
    {
        tb_log_surat_mhs_umum::where([

                ['id','=' , $id],
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

    public function show_perbaiki (request $request, $id)
    {
        $data = tb_log_surat_mhs_umum::where([
            ['id', '=',  $id],
            ['status_persetujuan', '=',  'belum diverifikasi']
        ])->first();

        return view('Mhs.main.history-surat.surat-umum.perbaiki', compact('data'));
    }

    public function update_diperbaiki(Request $request, $id)
    {
        //pasang rules
        $rules = [
            'tujuan_surat'=> 'required',
            'sub_tujuan'=> 'required',
            'isi_surat' => 'required',
        ];

        //pasang pesan kesalahan
        $messages = [
            'tujuan_surat.required'     => 'Tujuan surat wajib diisi',
            'sub_tujuan.required'     => 'Sub tujuan wajib diisi',
            'isi_surat.required'     => 'Isi surat wajib diisi',
        ];

        //ambil semua request dan pasang rules dan isi pesanya
        $validator = Validator::make($request->all(), $rules, $messages);
        //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
        if($validator->fails())
        {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
        }else{

                        tb_log_surat_mhs_umum::where([
                            ['id', '=',  $id]
                        ])->update([
                            'tujuan_surat' => $request->tujuan_surat,
                            'sub_tujuan' => $request->sub_tujuan,
                            'judul_penelitian' => $request->judul_penelitian,
                            'isi_surat' => $request->isi_surat,
                            'operator_prodi' => 'belum diverifikasi'
                    ]);
                            

        
                    return \redirect()->route('rekaman-pengajuan.surat_umum')->with('toast_success',' Data berhasil di perbarui ');
         }
       

    }


}
