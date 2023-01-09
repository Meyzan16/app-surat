<?php

namespace App\Http\Controllers\Admin\verifpersetujuan;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\tb_persetujuan;
use Illuminate\Http\Request;

class ProfilePersetujuanController extends Controller
{
    public function index()
    {
        $data = user::where('id', auth()->user()->id)->first();

        return view('Admin.main.verif-persetujuan.profile', compact('data'));
    }

    public function update(Request $request, $id)
    {
        User::where('id', $id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'password_noenkripsi' => $request->password,
        ]);

        tb_persetujuan::where('users_id', $id)->update([
            'nip' => $request->nip,
            'golongan' => $request->golongan,
            'jabatan' => $request->jabatan,
        ]);

        return redirect()->route('persetujaun.profile.index')->with('toast_success',' Data berhasil di perbarui ');
    }
}
