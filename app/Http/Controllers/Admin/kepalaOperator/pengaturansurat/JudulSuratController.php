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

   
    public function update(Request $request, $id)
    {

        tb_judul_surat::where('id',$id)->update([
            'judul_surat'   => $request->judul_surat,
            'masa_aktif'    =>  $request->masa_aktif,  
        ]);

        return redirect()->route('judul-surat.index')->with(['toast_success' =>  'Data Berhasil diperbarui']);
    }

    
}
