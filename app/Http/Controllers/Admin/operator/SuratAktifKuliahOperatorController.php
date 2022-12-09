<?php

namespace App\Http\Controllers\Admin\Operator;
use App\Http\Controllers\Controller;
use App\Models\tb_log_srt_ket_msh_kuliah;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class SuratAktifKuliahOperatorController extends Controller
{
    public function index()
    {
        $data = tb_log_srt_ket_msh_kuliah::where([
            ['kode_prodi', '=',  auth()->user()->kode_prodi],
            ['status_persetujuan', '=',  'belum diverifikasi']
        ])->get();


        return view('Admin.main.operator.aktif-kuliah.data', compact('data'));
    }



    public function verifikasi($npm){
        tb_log_srt_ket_msh_kuliah::where([
            ['npm', '=',  $npm],
            ['status_persetujuan', '=',  'belum diverifikasi']
        ])->update([
            'operator_prodi'    =>  'Y',
            'catatan_operator_prodi'   => NULL,
            'id_operator' => auth()->user()->id
        ]);

         return redirect()->route('operator.surat-aktif-kuliah.index')->with(['toast_success' =>  $npm. ' berhasil di verifikasi !!']);
    }



    public function verifikasi_tolak(Request $request, $npm){
            //pasang rules
            $rules = [
                'catatan_operator_prodi'=> 'required'
            ];

            //pasang pesan kesalahan
            $messages = [
                'catatan_operator_prodi.required'     => 'nama wajib diisi',
               
            ];

            //ambil semua request dan pasang rules dan isi pesanya
            $validator = Validator::make($request->all(), $rules, $messages);
            //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
            if($validator->fails())
            {
                return redirect()->route('operator.surat-aktif-kuliah.index')->with(['toast_error' =>' Catatan ditolak wajib di isi!!']);
                    // return redirect()->back()->withErrors($validator)->withInput($request->all());
            } 
            else{

                tb_log_srt_ket_msh_kuliah::where('npm',$npm)->update([
                    'catatan_operator_prodi'   => $request->catatan_operator_prodi,
                    'operator_prodi'    =>  'N',
                    'id_operator' => auth()->user()->id,     
                ]);
                return redirect()->route('operator.surat-aktif-kuliah.index')->with(['toast_error' =>  $npm. ' berhasil di tolak !!']);
            }
        

      
    }

    public function edit(Request $request, $npm)
    {

        $data = tb_log_srt_ket_msh_kuliah::where([
            ['npm', '=',  $npm],
            ['status_persetujuan', '=',  'belum diverifikasi']
        ])->first();

        return view('Admin.main.operator.aktif-kuliah.edit', compact('data'));

    }

    public function update(Request $request, $npm)
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
            'masa_studi.required'     => 'masa studi wajib diisi',
            'nama_ortu.required'     => 'nama ortu wajib diisi',
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
        }else{

                    
           
        
                    tb_log_srt_ket_msh_kuliah::where('npm', $npm)->update([
                        'semester' => $request->semester,
                        'masa_studi' => $request->masa_studi,
                        'nama_ortu' => $request->nama_ortu,
                        'pekerjaan' => $request->pekerjaan,
                        'alamat' => $request->alamat,
                        'nip' => $request->nip,
                        'golongan' => $request->golongan,
                        
                    ]);
                            

        
                    return \redirect()->route('operator.surat-aktif-kuliah.index')->with('toast_success',' Data '. $npm .' berhasil di perbarui ');
         }
    }

    public function history()
    {
        $data = tb_log_srt_ket_msh_kuliah::where([
            ['kode_prodi', '=',  auth()->user()->kode_prodi],
            ['status_persetujuan', '=',  'Y']
        ])->get();


    return view('Admin.main.operator.aktif-kuliah.history-surat', compact('data'));
    }


}
