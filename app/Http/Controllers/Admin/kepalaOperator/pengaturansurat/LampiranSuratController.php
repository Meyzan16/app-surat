<?php

namespace App\Http\Controllers\Admin\kepalaoperator\pengaturansurat;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\tb_lampiran;

class LampiranSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = tb_lampiran::all(); 
    
        return view('Admin.main.kep-operator.pengaturan.lampiran.index',compact('data'));
    }

    
    public function store(Request $request)
    {
        $data = $request->all();

        tb_lampiran::create($data);
        return redirect()->route('data-lampiran.index')->with(['toast_success' =>  'Data Berhasil Di simpan']);
    }

 
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = tb_lampiran::findorfail($id);
        $item->update($data); 

        return redirect()->route('data-lampiran.index')->with(['toast_success' =>  'Data Berhasil diperbarui']);
    }


    public function destroy($id)
    {
        tb_lampiran::findorfail($id)->delete();   
        return redirect()->route('data-lampiran.index')->with(['toast_success' =>  'Data Berhasil dinonaktifkan']);
    }

    // menampilkan data guru yang sudah dihapus
    public function trash()
    { 
        $data = tb_lampiran::onlyTrashed()->latest()->get();  
        return view('Admin.main.kep-operator.pengaturan.lampiran.trash',compact('data'));
    }

    
    public function restore($id) 
    {
        tb_lampiran::where('id', $id)->withTrashed()->restore();

        return redirect()->route('data-lampiran.index')->with('toast_success', 'Data berhasil di kembalikan');
    }
}
