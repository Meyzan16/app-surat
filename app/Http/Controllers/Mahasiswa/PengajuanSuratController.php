<?php

namespace App\Http\Controllers\Mahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\tb_judul_surat;
use App\Models\tb_log_srt_ket_msh_kuliah;
use App\Models\tb_log_ket_lulus;
use DateTime;


use Illuminate\Http\Request;

class PengajuanSuratController extends Controller
{
    public function index()
    {
        $judul_surat = tb_judul_surat::with('tb_jenis_surat')->get();


                $data = tb_log_srt_ket_msh_kuliah::where('npm', Session::get('npm'))
                ->where('status_persetujuan', 'belum diverifikasi')
                ->first();

                if(empty($data))
                {
                    return view('Mhs.main.pengajuan-surat.index', compact('judul_surat'));
                }
                elseif($data->semester == null)
                {

                    return \redirect()->route('surat-masih-kuliah.index')->with('toast_error', 'anda belum melengkapi data');
                }
                elseif($data->semester)
                {
                    return view('Mhs.main.pengajuan-surat.index', compact('judul_surat'));
                }    
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

                    $data = tb_log_srt_ket_msh_kuliah::where([
                        ['npm', '=',  Session::get('npm')]
                    ])->first();
                

                    if(empty($data))
                    {
                        // return "tidak ada data";
                        tb_log_srt_ket_msh_kuliah::create([
                            'kode_judul_surat' => $request->kode_judul_surat,
                            'npm' => Session::get('npm'),
                            'angkatan' => Session::get('angkatan'),
                            'kode_prodi' => Session::get('kode_prodi')
                        ]);
                        return \redirect()->route('surat-masih-kuliah.index')->with('successs', 'Silahkan lengkapai data data berikut');
                    }else{
                        // return "sudah ada data";
                        if($data->status_persetujuan == 'belum diverifikasi')
                        {
                            return \redirect()->route('pengajuan-index')->with('toast_error', 'Jenis surat keterangan aktif kuliah baru saja diajukan');

                        }elseif($data->status_persetujuan == 'Y')
                        {
                            //cek masih aktif
                            $created = new DateTime($data->time_acc_ttd);
                            $result = $created->format('d-m-Y');
                            $datetime1 = date_create($result);

                            $now = date('d-m-Y');
                            $datetime2 = date_create($now); // waktu sekarang
                            $selisih  = date_diff($datetime1, $datetime2);
                            $aa = $selisih->d;

                            if($aa > 8)
                            {
                                // jika kadaluarsa
                                tb_log_srt_ket_msh_kuliah::create([
                                    'kode_judul_surat' => $request->kode_judul_surat,
                                    'npm' => Session::get('npm'),
                                    'angkatan' => Session::get('angkatan'),
                                    'kode_prodi' => Session::get('kode_prodi')
                                 ]);
                                return \redirect()->route('surat-masih-kuliah.index')->with('successs', 'Silahkan lengkapai data data berikut');
                            }else{
                                return \redirect()->route('pengajuan-index')->with('toast_error', 'Surat aktif kuliah masih aktif, lihat history anda');
                            }

                        }
                    }


                    // elseif($data->status_persetujuan == 'belum diverifikasi')
                    // {
                    //     return \redirect()->route('pengajuan-index')->with('toast_error', 'Jenis surat keterangan aktif kuliah baru saja diajukan');

                    // }elseif($data->status_persetujuan == 'Y')
                    // {
                   
                    // }

               
                }
                
                elseif($request->kode_judul_surat == 'A2')
                {
                    tb_log_ket_lulus::create([
                        'kode_judul_surat' => $request->kode_judul_surat,
                        'npm' => Session::get('npm'),
                        'angkatan' => Session::get('angkatan'),
                        'kode_prodi' => Session::get('kode_prodi')
                    ]);

                    return \redirect()->route('surat-ket-lulus.index')->with('successs', 'Silahkan lengkapai data data berikut');
                }
                            

        
        
        }

    }

}
