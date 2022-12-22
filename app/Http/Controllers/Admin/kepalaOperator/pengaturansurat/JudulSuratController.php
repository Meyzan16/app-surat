<?php

namespace App\Http\Controllers\Admin\kepalaoperator\pengaturansurat;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\tb_judul_surat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class JudulSuratController extends Controller
{
    
    public function index()
    {
        $data = tb_judul_surat::all(); 
    
        return view('Admin.main.kep-operator.pengaturan.judulsurat.index',compact('data'));
    }

    public function store(Request $request)
    {
       

        tb_judul_surat::create([
            'kode_jenis_surat'   => $request->kode_jenis_surat,
            'judul_surat'   => $request->judul_surat,
            'masa_aktif'    =>  $request->masa_aktif,  
        ]);
        return redirect()->route('judul-surat.index')->with(['toast_success' =>  'Data Berhasil Di simpan']);
    }

   
    public function update(Request $request, $id)
    {

        tb_judul_surat::where('id',$id)->update([
            'kode_jenis_surat'   => $request->kode_jenis_surat,
            'judul_surat'   => $request->judul_surat,
            'masa_aktif'    =>  $request->masa_aktif,  
        ]);

        return redirect()->route('judul-surat.index')->with(['toast_success' =>  'Data Berhasil diperbarui']);
    }

    public function destroy($id)
    {
        tb_judul_surat::findorfail($id)->delete();   
        return redirect()->route('judul-surat.index')->with(['toast_success' =>  'Data Berhasil dinonaktifkan']);
    }

    // menampilkan data guru yang sudah dihapus
    public function trash()
    { 
        $data = tb_judul_surat::onlyTrashed()->latest()->get();  
        return view('Admin.main.kep-operator.pengaturan.judulsurat.trash',compact('data'));
    }

    
    public function restore($id) 
    {
        tb_judul_surat::where('id', $id)->withTrashed()->restore();

        return redirect()->route('judul-surat.index')->with('toast_success', 'Data berhasil di kembalikan');
    }

    
}
