<?php

namespace App\Http\Controllers\Admin\kepalaoperator\akun;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\tb_prodi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AkunKepOperatorController extends Controller
{
    public function index()
    {
        $data = user::where('roles', 'KEPALA_OPERATOR')->get(); 
    
        return view('Admin.main.kep-operator.akun.kep-operator.index',compact('data'));
    }

 
    public function update(Request $request, $id)
    {

        user::where('id', $id)->update([
                'nama' => $request->nama,
                'username' => $request->username,
                'password' =>  bcrypt($request->password_noenkripsi),
                'password_noenkripsi' => $request->password_noenkripsi,
        ]); 

        return redirect()->route('akun-kep-operator.index')->with(['toast_success' =>  'Data Berhasil diperbarui']);
    }


    
    
  
    

}
