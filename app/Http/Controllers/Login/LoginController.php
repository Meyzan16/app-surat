<?php

namespace App\Http\Controllers\Login;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }

    public function authentication(Request $request)
    {
        //pasang rules
        $rules = [
            'username' => 'required',
            'password'=> 'required'
        ];

        //pasang pesan kesalahan
        $messages = [
            'username.required'     => 'Form username wajib diisi',
            'password.required'     => 'Form password wajib diisi',
        ];

        //ambil semua request dan pasang rules dan isi pesanya
        $validator = Validator::make($request->all(), $rules, $messages);
        //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
        if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        //jika berhasil jalankan script berrikut
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
            if (Auth::check()) {
                if(auth()->user()->status_aktif == 'Y'){
                    if (auth()->user()->roles == 'OPERATOR_PRODI') {
                        Session::put('kode_prodi', auth()->user()->kode_prodi);
                        $request->session()->regenerate();
                        return \redirect()->intended('/operator')->with('successs', 'Selamat datang '. auth()->user()->nama.' verifikator prodi ' . auth()->user()->kode_prodi  );
                    }
                    elseif (auth()->user()->roles == 'KEPALA_OPERATOR') {
                        $request->session()->regenerate();
                        return \redirect()->intended('/kepala-operator')->with('successs', 'Selamat datang '. auth()->user()->nama.'  kepala operator'  );
                    }elseif(auth()->user()->roles == 'VERIF_PERSETUJUAN')
                    {
                        $request->session()->regenerate();
                        return \redirect()->intended('/admin')->with('successs', 'Selamat datang '. auth()->user()->nama  );
                    }
                }else{
                    return redirect()->route('login')->with('loginerror','Akun belum diaktivasi');
                }
            }
        }else{
            return back()->with('loginerror', 'Username Dan Password Salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        //invalid session supaya tidak bisa dipakai
        $request->session()->flush();
        $request->session()->invalidate();
        //bikin token baru supaya tidak dibajak
        $request->session()->regenerateToken();
        //redirect ke halaman mana
        return \redirect()->route('login');
    }
}
