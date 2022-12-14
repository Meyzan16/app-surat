<?php

namespace App\Http\Controllers\Admin\kepalaoperator\akun;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\tb_prodi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AkunProdiController extends Controller
{
    public function index()
    {
        $prodi = tb_prodi::all();
        $data = user::where('roles', 'VERIF_PRODI')->get(); 
    
        return view('Admin.main.kep-operator.akun.prodi.index',compact('data', 'prodi'));
    }

    public function store(Request $request)
    {
        $rules = [
            'nama'=> 'required',
            'username'=> 'required|unique:users',
            'password'=> 'required',
            'kode_prodi'=> 'required',
            'status_aktif'=> 'required',
        ];

        //pasang pesan kesalahan
        $messages = [
            'nama.required'     => 'nama wajib diisi',
            'username.required'     => 'username wajib diisi',
            'username.unique'     => 'username sudah terdaftar',
            'password.required'     => 'password wajib diisi',
            'kode_prodi.required'     => 'kode prodi wajib diisi',
            'status_aktif.required'     => 'status aktif wajib diisi',
           
        ];

        //ambil semua request dan pasang rules dan isi pesanya
        $validator = Validator::make($request->all(), $rules, $messages);
        //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
        if($validator->fails())
        {
           
                return redirect()->back()->withErrors($validator)->withInput($request->all());
        } 
        else{
       
            user::create([
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'password_noenkripsi' => $request->password,
                'kode_prodi' => $request->kode_prodi,
                'roles' => 'VERIF_PRODI',
                'status_aktif' => $request->status_aktif
            ]);
            return redirect()->route('akun-prodi.index')->with(['toast_success' =>  'Data Berhasil Di simpan']);
        }
    }

 
    public function update(Request $request, $id)
    {

        user::where('id', $id)->update([
                'nama' => $request->nama,
                'username' => $request->username,
                'password' =>  bcrypt($request->password_noenkripsi),
                'password_noenkripsi' => $request->password_noenkripsi,
                'kode_prodi' => $request->kode_prodi,
                'status_aktif' => $request->status_aktif,
        ]); 

        return redirect()->route('akun-prodi.index')->with(['toast_success' =>  'Data Berhasil diperbarui']);
    }

    public function destroy($id)
    {

        user::where('id', $id)->update([
            'status_aktif' => 'N',
        ]);  
        user::findorfail($id)->delete();  
        return redirect()->route('akun-prodi.index')->with(['toast_success' =>  'Data Berhasil dihapus']);
    }

    // menampilkan data guru yang sudah dihapus
    public function trash()
    { 
        $data = user::onlyTrashed()->latest()->get();  
        return view('Admin.main.kep-operator.akun.prodi.trash',compact('data'));
    }

    
    public function restore($id) 
    {
        user::where('id', $id)->withTrashed()->restore();
        user::where('id', $id)->update([
            'status_aktif' => 'Y',
        ]);
        return redirect()->route('akun-prodi.index')->with('toast_success', 'Data berhasil di kembalikan');
    }


   

    
  
    

}
