<?php

namespace App\Http\Controllers\Admin\kepalaoperator\pengaturansurat;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\tb_perihal_surat;

class PerihalSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = tb_perihal_surat::all(); 
    
        return view('Admin.main.kep-operator.pengaturan.perihal.index',compact('data'));
    }

    
    public function store(Request $request)
    {
        $data = $request->all();

        tb_perihal_surat::create($data);
        return redirect()->route('data-perihal.index')->with(['toast_success' =>  'Data Berhasil Di simpan']);
    }

 
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = tb_perihal_surat::findorfail($id);
        $item->update($data); 

        return redirect()->route('data-perihal.index')->with(['toast_success' =>  'Data Berhasil diperbarui']);
    }


    public function destroy($id)
    {
        tb_perihal_surat::findorfail($id)->delete();   
        return redirect()->route('data-perihal.index')->with(['toast_success' =>  'Data Berhasil dinonaktifkan']);
    }

    // menampilkan data guru yang sudah dihapus
    public function trash()
    { 
        $data = tb_perihal_surat::onlyTrashed()->latest()->get();  
        return view('Admin.main.kep-operator.pengaturan.perihal.trash',compact('data'));
    }

    
    public function restore($id) 
    {
        tb_perihal_surat::where('id', $id)->withTrashed()->restore();

        return redirect()->route('data-perihal.index')->with('toast_success', 'Data berhasil di kembalikan');
    }
}
