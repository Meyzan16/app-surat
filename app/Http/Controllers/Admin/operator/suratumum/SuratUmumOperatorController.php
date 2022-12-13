<?php

namespace App\Http\Controllers\Admin\operator\suratumum;
use App\Http\Controllers\Controller;
use App\Models\tb_loghistory_surat_umum;
use App\Models\tb_lampiran;
use App\Models\tb_perihal_surat;
use App\Models\tb_tujuan_surat;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class SuratUmumOperatorController extends Controller
{
    public function index()
    {
        $data = tb_loghistory_surat_umum::where([
            ['kode_prodi', '=',  auth()->user()->kode_prodi],
        ])->get();


        return view('Admin.main.operator.surat-umum.index', compact('data'));
    }

    public function create()
    {
        $lampiran = tb_lampiran::all();
        $perihal = tb_perihal_surat::all();
        $tujuan = tb_tujuan_surat::all();


        return view('Admin.main.operator.surat-umum.create', compact('lampiran','perihal','tujuan'));
    }

    public function store(Request $request)
    {
        tb_loghistory_surat_umum::create([
            'users_id' => auth()->user()->id,
            'kode_prodi' => auth()->user()->kode_prodi ,
            'id_lampiran' => $request->id_lampiran,
            'id_perihal' => $request->id_perihal,
            'id_tujuan' => $request->id_tujuan,
            'isi_surat' => $request->isi_surat,
            'sub_tujuan' => $request->sub_tujuan,
            'tembusan' => $request->tembusan,
        ]);

        return redirect()->route('operator.surat-umum.index')->with('toast_success',' Data berhasil di ajukan ');
    }

    public function show($id)
    {

        $data = tb_loghistory_surat_umum::where([
            ['id', '=',  $id],
        ])->first();
        return view('Admin.main.show_surat.surat-umum', compact('data'));
    }

    public function edit($id)
    {

        $data = tb_loghistory_surat_umum::where([
            ['id', '=',  $id],
        ])->first();
        $lampiran = tb_lampiran::all();
        $perihal = tb_perihal_surat::all();
        $tujuan = tb_tujuan_surat::all();

        return view('Admin.main.operator.surat-umum.edit', compact('data','lampiran','perihal','tujuan'));
    }

    public function update(Request $request, $id)
    {
        $data = tb_loghistory_surat_umum::where('id',$id)->first();

        if($data->kepala_operator == 'N' && $data->catatan_kepala_operator != null)
        {
            tb_loghistory_surat_umum::where('id', $id)->update([
                'id_lampiran' => $request->id_lampiran,
                'id_perihal' => $request->id_perihal,
                'id_tujuan' => $request->id_tujuan,
                'isi_surat' => $request->isi_surat,
                'sub_tujuan' => $request->sub_tujuan,
                'tembusan' => $request->tembusan,
                'kepala_operator' => 'belum diverifikasi',
            ]);

        }else
        {
            tb_loghistory_surat_umum::where('id', $id)->update([
                'id_lampiran' => $request->id_lampiran,
                'id_perihal' => $request->id_perihal,
                'id_tujuan' => $request->id_tujuan,
                'isi_surat' => $request->isi_surat,
                'sub_tujuan' => $request->sub_tujuan,
                'tembusan' => $request->tembusan,
            ]);
        }

        return redirect()->route('operator.surat-umum.index')->with('toast_success',' Data berhasil di perbarui ');
    }


}
