<?php

namespace App\Http\Controllers\Mahasiswa;
use App\Http\Controllers\Controller;
use App\Models\tb_log_srt_ket_msh_kuliah;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SuratMasihKuliahController extends Controller
{
    public function index()
    {
            return view('Mhs.main.pengajuan-surat.srt-msh-kuliah.index');
        
        
    }

    public function update(Request $request, $npm)
    {
        //pasang rules
        $rules = [
            'semester'=> 'required|alpha',
            'masa_studi'=> 'required',
            'nama_ortu' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
        ];

        //pasang pesan kesalahan
        $messages = [
            'semester.required'     => 'semester wajib diisi',
            'masa_studi.required'     => 'masa_studi wajib diisi',
            'nama_ortu.required'     => 'nama_ortu wajib diisi',
            'pekerjaan.required'     => 'pekerjaan wajib diisi',
            'alamat.required'     => 'alamat wajib diisi'
       
          
        ];

        //ambil semua request dan pasang rules dan isi pesanya
        $validator = Validator::make($request->all(), $rules, $messages);
        //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
        if($validator->fails())
        {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
        } 
        else{
        
                    tb_log_srt_ket_msh_kuliah::where('npm', $npm)->update([
                        'semester' => $request->semester,
                        'masa_studi' => $request->masa_studi,
                        'nama_ortu' => $request->nama_ortu,
                        'pekerjaan' => $request->pekerjaan,
                        'alamat' => $request->alamat,
                        'nip' => $request->nip,
                        'golongan' => $request->golongan,
                    ]);
                            

        
                    return \redirect()->route('dashboard-mhs')->with('toast_success', 'Mohon menunggu diverifikasi');
         }
    }

    public function destroy($npm)
    {
        $data = tb_log_srt_ket_msh_kuliah::where('npm', $npm)->first();

        tb_log_srt_ket_msh_kuliah::where([
            ['npm', '=',  $data->npm],
            ['kode_judul_surat', '=',  $data->kode_judul_surat],
        ])->delete();

     

        return \redirect()->route('dashboard-mhs')->with('toast_success', 'Pengajuan surat berhasil dihapus');


    }

    public function show_perbaiki (request $request, $id)
    {
        $item = tb_log_srt_ket_msh_kuliah::where([
            ['id', '=',  $id],
            ['status_persetujuan', '=',  'belum diverifikasi']
        ])->first();

        return view('Mhs.main.history-surat.aktif-kuliah.perbaiki', compact('item'));
    }

    public function update_diperbaiki(Request $request, $id)
    {
        //pasang rules
        $rules = [
            'semester'=> 'required|alpha',
            'masa_studi'=> 'required',
            'nama_ortu' => 'required|alpha',
            'pekerjaan' => 'required|alpha',
            'alamat' => 'required',
        ];

        //pasang pesan kesalahan
        $messages = [
            'semester.required'     => 'semester wajib diisi',
            'masa_studi.required'     => 'masa_studi wajib diisi',
            'nama_ortu.required'     => 'nama_ortu wajib diisi',
            'pekerjaan.required'     => 'pekerjaan wajib diisi',
            'alamat.required'     => 'alamat wajib diisi',

            'semester.alpha'     => 'semester hanya boleh huruf',
            'nama_ortu.alpha'     => 'nama ortu hanya boleh huruf',
            'pekerjaan.alpha'     => 'pekerjaan hanya boleh huruf',
       
          
        ];

        //ambil semua request dan pasang rules dan isi pesanya
        $validator = Validator::make($request->all(), $rules, $messages);
        //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
        if($validator->fails())
        {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
        } 
        else{
        
                    tb_log_srt_ket_msh_kuliah::where('id', $id)->update([
                        'operator_prodi' => 'belum diverifikasi',
                        'semester' => $request->semester,
                        'masa_studi' => $request->masa_studi,
                        'nama_ortu' => $request->nama_ortu,
                        'pekerjaan' => $request->pekerjaan,
                        'alamat' => $request->alamat,
                        'nip' => $request->nip,
                        'golongan' => $request->golongan,
                    ]);
                            

        
                    return \redirect()->route('rekaman-pengajuan.aktif-kuliah')->with('toast_success', 'Mohon menunggu diverifikasi ulang');
         }
    }

    

    
}
