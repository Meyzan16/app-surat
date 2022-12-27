<?php

namespace App\Http\Controllers\Admin\kepalaoperator\suratumum;
use App\Http\Controllers\Controller;
use App\Models\tb_loghistory_surat_umum;
use App\Models\tb_lampiran;
use App\Models\tb_perihal_surat;
use App\Models\tb_tujuan_surat;
use App\Models\tb_prodi;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class SuratUmumKepOperatorController extends Controller
{
    public function index($prodi)
    {
        $data = tb_loghistory_surat_umum::where([
            ['kode_prodi', '=',  $prodi],
        ])->get();
        $prodi = tb_prodi::where([
            ['kode_prodi', '=',  $prodi],
        ])->first();

        return view('Admin.main.kep-operator.surat-umum.index', compact('data', 'prodi'));
    }

    public function show($id)
    {

        $data = tb_loghistory_surat_umum::where([
            ['id', '=',  $id],
        ])->first();
        return view('Admin.main.show_surat.surat-umum-prodi', compact('data'));
    }

 

     // kepala operator
     public function verifikasi(Request $request, $prodi){
        $id = $request->id;
        tb_loghistory_surat_umum::where([
            ['id', '=',  $id]
        ])->update([
            'kepala_operator'    =>  'Y',
            'catatan_kepala_operator' => NULL,
            'time_acc_kep_operator' => date("Y-m-d H:i:s"),
        ]);

         return redirect()->route('kep-operator.surat-umum.index', $prodi )->with(['toast_success' => 'Data berhasil di verifikasi !!']);
    }

    
    public function verifikasi_tolak(Request $request, $prodi){
        $id = $request->id;
        //pasang rules
        $rules = [
            'catatan_kepala_operator'=> 'required'
        ];


        //ambil semua request dan pasang rules dan isi pesanya
        $validator = Validator::make($request->all(), $rules);
        //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
        if($validator->fails())
        {
            return redirect()->route('kep-operator.surat-umum.index', $prodi)->with(['toast_error' =>' Catatan wajib di isi!!']);
 
        } 
        else{

            tb_loghistory_surat_umum::where('id',$id)->update([
                'kepala_operator'    =>  'N',
                'catatan_kepala_operator'   => $request->catatan_kepala_operator,
                'time_acc_kep_operator' => date("Y-m-d H:i:s"),     
            ]);
            return redirect()->route('kep-operator.surat-umum.index', $prodi )->with(['toast_success' => 'Data berhasil di tolak !!']);
        }
}


  


}
