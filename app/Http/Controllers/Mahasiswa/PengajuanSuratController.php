<?php

namespace App\Http\Controllers\Mahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\tb_judul_surat;
use App\Models\tb_log_srt_ket_msh_kuliah;
use App\Models\tb_log_ket_lulus;


use Illuminate\Http\Request;

class PengajuanSuratController extends Controller
{
    public function index()
    {
        $judul_surat = tb_judul_surat::with('tb_jenis_surat')->get();


        $data = tb_log_srt_ket_msh_kuliah::where('npm',Session::get('npm') )->first();

        if($data->semester == null)
        {
            return \redirect()->route('surat-masih-kuliah.index')->with('toast_success', 'anda belum melengkapi data');
        }
        
        return view('Mhs.main.pengajuan-surat.index', compact('judul_surat'));
    }

    public function proses_pengajuan(Request $request)
    {
        //pasang rules
        $rules = [
            'kode_judul_surat'=> 'required',
        ];

        //pasang pesan kesalahan
        $messages = [
            // 'email.unique'     => 'email sudah terdaftar',
            'kode_judul_surat.required'     => 'Pilih surat yang mau diajukan',
        ];

        //ambil semua request dan pasang rules dan isi pesanya
        $validator = Validator::make($request->all(), $rules, $messages);
        //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
        if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all());
        } else{

                if($request->kode_judul_surat == 'A1')
                {
                    tb_log_srt_ket_msh_kuliah::create([
                        'kode_judul_surat' => $request->kode_judul_surat,
                        'npm' => Session::get('npm'),
                    ]);

                    return \redirect()->route('surat-masih-kuliah.index')->with('successs', 'Silahkan lengkapai data data berikut');
               
                }elseif($request->kode_judul_surat == 'A2')
                {
                    tb_log_ket_lulus::create([
                        'kode_judul_surat' => $request->kode_judul_surat,
                        'npm' => Session::get('npm'),
                    ]);

                    return \redirect()->route('surat-ket-lulus.index')->with('successs', 'Silahkan lengkapai data data berikut');
                }
                            

        
        
        }

    }

}
