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
        return view('Admin.main.show_surat.surat-umum', compact('data'));
    }

 

    public function update(Request $request, $id)
    {
        tb_loghistory_surat_umum::where('id', $id)->update([
            'id_lampiran' => $request->id_lampiran,
            'id_perihal' => $request->id_perihal,
            'id_tujuan' => $request->id_tujuan,
            'isi_surat' => $request->isi_surat,
            'sub_tujuan' => $request->sub_tujuan,
            'tembusan' => $request->tembusan,
        ]);

        return redirect()->route('operator.surat-umum.index')->with('success',' Data berhasil di perbarui ');
    }


}
