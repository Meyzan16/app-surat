<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $data = user::where('id', auth()->user()->id)->first();

        return view('Admin.main.profile', compact('data'));
    }

    public function update(Request $request, $id)
    {
        User::where('id', $id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'password_noenkripsi' => $request->password,
        ]);

        return redirect()->route('operator.profile.index')->with('toast_success',' Data berhasil di perbarui ');
    }
}
