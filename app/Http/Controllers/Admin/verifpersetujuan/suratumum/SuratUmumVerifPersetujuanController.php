<?php

namespace App\Http\Controllers\Admin\verifpersetujuan\suratumum;
use App\Http\Controllers\Controller;
use App\Models\tb_loghistory_surat_umum;
use App\Models\tb_lampiran;
use App\Models\tb_perihal_surat;
use App\Models\tb_tujuan_surat;
use App\Models\tb_prodi;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class SuratUmumVerifPersetujuanController extends Controller
{
    public function index($prodi)
    {
        $data = tb_loghistory_surat_umum::where([
            ['kode_prodi', '=',  $prodi],
        ])->get();
        $prodi = tb_prodi::where([
            ['kode_prodi', '=',  $prodi],
        ])->first();

        return view('Admin.main.verif-persetujuan.surat-umum.index', compact('data', 'prodi'));
    }

    public function show($id)
    {

        $data = tb_loghistory_surat_umum::where([
            ['id', '=',  $id],
        ])->first();
        return view('Admin.main.show_surat.surat-umum', compact('data'));
    }

 

     // kepala operator
     public function verifikasi(Request $request, $prodi){
        $id = $request->id;
        tb_loghistory_surat_umum::where([
            ['id', '=',  $id]
        ])->update([
            'status_persetujuan'    =>  'Y',
            'id_persetujuan' => auth()->user()->id,
            'time_acc_ttd' => date("Y-m-d H:i:s"),
        ]);

         return redirect()->route('ttd-persetujuan.surat-umum.index', $prodi )->with(['toast_success' => 'Data berhasil di verifikasi !!']);
    }


  


}
