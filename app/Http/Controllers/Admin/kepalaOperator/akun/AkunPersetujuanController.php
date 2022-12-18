<?php

namespace App\Http\Controllers\Admin\kepalaoperator\akun;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\tb_prodi;
use App\Models\tb_persetujuan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AkunPersetujuanController extends Controller
{
  
    public function index()
    {
        $data = user::where('roles', 'VERIF_PERSETUJUAN')->get(); 
    
        return view('Admin.main.kep-operator.akun.persetujuan.index',compact('data'));
    }

   
    public function store(Request $request)
    {
        $rules = [
            'nama'=> 'required',
            'username'=> 'required|unique:users',
            'password'=> 'required',
            'status_aktif'=> 'required',
        ];

        //pasang pesan kesalahan
        $messages = [
            'nama.required'     => 'nama wajib diisi',
            'username.required'     => 'username wajib diisi',
            'username.unique'     => 'username sudah terdaftar',
            'password.required'     => 'password wajib diisi',
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
                'roles' => 'VERIF_PERSETUJUAN',
                'status_aktif' => $request->status_aktif
            ]);

            $id_user = user::select('*')
            ->orderBy('id', 'desc')
            ->limit(1)
            ->where('roles', '=' , 'VERIF_PERSETUJUAN')
            ->first();

            tb_persetujuan::create([
                'users_id' => $id_user->id,
            ]);
            
            return redirect()->route('akun-persetujuan.index')->with(['toast_success' =>  'Data Berhasil Di simpan']);
        }
    }

 
    public function update(Request $request, $id)
    {

        user::where('id', $id)->update([
                'nama' => $request->nama,
                'username' => $request->username,
                'password' =>  bcrypt($request->password_noenkripsi),
                'password_noenkripsi' => $request->password_noenkripsi,
                'status_aktif' => $request->status_aktif,
        ]); 

        return redirect()->route('akun-persetujuan.index')->with(['toast_success' =>  'Data Berhasil diperbarui']);
    }


    public function destroy($id)
    {

        user::where('id', $id)->update([
            'status_aktif' => 'N',
        ]);  
        user::findorfail($id)->delete();  
        return redirect()->route('akun-persetujuan.index')->with(['toast_success' =>  'Data Berhasil dihapus']);
    }

    // menampilkan data guru yang sudah dihapus
    public function trash()
    { 
        $data = user::onlyTrashed()->latest()->get();  
        return view('Admin.main.kep-operator.akun.persetujuan.trash',compact('data'));
    }

    
    public function restore($id) 
    {
        user::where('id', $id)->withTrashed()->restore();
        user::where('id', $id)->update([
            'status_aktif' => 'Y',
        ]);
        return redirect()->route('akun-persetujuan.index')->with('toast_success', 'Data berhasil di kembalikan');
    }
}
