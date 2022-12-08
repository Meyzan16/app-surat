<?php

namespace App\Http\Controllers\Admin\Operator;
use App\Http\Controllers\Controller;
use App\Models\tb_log_srt_ket_msh_kuliah;

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



    // public function verifikasi_tolak(Request $request, $nisn){

    //     tb_log_srt_ket_msh_kuliah::where('npm',$nisn)->update([
    //         'catatan_ortu'   => $request->catatan_ortu,
    //         'status_ortu'    =>  'N',
    //         'id_verifikasi_ortu' => auth()->user()->id, 
    //         'time_acc_operator_prodi' => datetime
    //     ]);
    //     return redirect()->route('admin.data-ortu.show', $nisn)->with(['success_tolak' =>  'Data Berhasil Di Verifikasi !!']);
    // }


}
