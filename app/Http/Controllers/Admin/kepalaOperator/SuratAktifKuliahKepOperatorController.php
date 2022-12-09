<?php

namespace App\Http\Controllers\Admin\kepalaoperator;
use App\Http\Controllers\Controller;
use App\Models\tb_log_srt_ket_msh_kuliah;
use App\Models\tb_prodi;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class SuratAktifKuliahKepOperatorController extends Controller
{
    public function index(Request $reqeust, $prodi)
    {
        $data = tb_prodi::where([
            ['kode_prodi', '=',  $prodi],
        ])->first();


        return view('Admin.main.kep-operator.surat-mahasiswa.aktif-kuliah.index', compact('data'));
    }

    public function show(Request $reqeust, $prodi)
    {
        $data = tb_log_srt_ket_msh_kuliah::where([
            ['kode_prodi', '=',  $prodi],
            ['status_persetujuan', '=',  'belum diverifikasi']
        ])->get();

        $prodi = tb_prodi::where([
            ['kode_prodi', '=',  $prodi],
        ])->first();

        return view('Admin.main.kep-operator.surat-mahasiswa.aktif-kuliah.data', compact('data', 'prodi'));
    }

    // operator
    public function verifikasi(Request $request, $prodi){
        $npm = $request->npm;
        tb_log_srt_ket_msh_kuliah::where([
            ['npm', '=',  $npm],
            ['status_persetujuan', '=',  'belum diverifikasi']
        ])->update([
            'operator_prodi'    =>  'Y',
            'catatan_operator_prodi'   => NULL,
            'id_operator' => auth()->user()->id
        ]);

         return redirect()->route('kepala-operator.surat-aktif-kuliah.show', $prodi )->with(['toast_success' =>  $npm. ' berhasil di verifikasi !!']);
    }



    public function verifikasi_tolak(Request $request, $prodi){
            $npm = $request->npm;
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
                return redirect()->route('kepala-operator.surat-aktif-kuliah.show', $prodi)->with(['toast_error' =>' Catatan ditolak wajib di isi!!']);
                    // return redirect()->back()->withErrors($validator)->withInput($request->all());
            } 
            else{

                tb_log_srt_ket_msh_kuliah::where('npm',$npm)->update([
                    'catatan_operator_prodi'   => $request->catatan_operator_prodi,
                    'operator_prodi'    =>  'N',
                    'id_operator' => auth()->user()->id,     
                ]);
                return redirect()->route('kepala-operator.surat-aktif-kuliah.show', $prodi )->with(['toast_success' =>  $npm. ' berhasil di tolak !!']);
            }
    }
    // akhir operator


    public function verifikasi_kepala(Request $request, $prodi){

        $npm = $request->npm;
        tb_log_srt_ket_msh_kuliah::where([
            ['npm', '=',  $npm],
            ['status_persetujuan', '=',  'belum diverifikasi']
        ])->update([
            'kepala_operator'    =>  'Y',
            'id_kepala_operator' => auth()->user()->id
        ]);

         return redirect()->route('kepala-operator.surat-aktif-kuliah.show', $prodi )->with(['toast_success' =>  $npm. ' berhasil di verifikasi !!']);
    }

    public function history($prodi)
    {
        $data = tb_log_srt_ket_msh_kuliah::where([
            ['kode_prodi', '=',  $prodi],
            ['status_persetujuan', '=',  'Y']
        ])->get();

        $prodi = tb_prodi::where([
            ['kode_prodi', '=',  $prodi],
        ])->first();


        return view('Admin.main.kep-operator.surat-mahasiswa.aktif-kuliah.history', compact('data', 'prodi'));
    }
}
