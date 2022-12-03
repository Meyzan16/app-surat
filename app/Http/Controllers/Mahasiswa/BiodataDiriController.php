<?php

namespace App\Http\Controllers\Mahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tb_data_mahasiswa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class BiodataDiriController extends Controller
{
    public function index()
    {
        return view('Mhs.main.biodata-diri.index');
    }

    public function store(Request $request)
    {
        //pasang rules
        $rules = [
            'nama'=> 'required',
            'tgl_lahir'=> 'required',
            // 'email' => 'required|unique:tb_data_mahasiswas',
            'email' => 'required|email:rfc',
        ];

        //pasang pesan kesalahan
        $messages = [
            // 'email.unique'     => 'email sudah terdaftar',
            'nama.required'     => 'nama wajib diisi',
            'tgl_lahir.required'     => 'tanggal lahir wajib diisi',
            'email.required'     => 'email wajib diisi',
            'email.rfc'     => 'alamat email tidak valid',
        ];

        //ambil semua request dan pasang rules dan isi pesanya
        $validator = Validator::make($request->all(), $rules, $messages);
        //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
        if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all());
        } else{
        
                    tb_data_mahasiswa::create([
                        'npm' => Session::get('npm') ,
                        'nama' => $request->nama,
                        'email' => $request->email,
                        'jenkel' => Session::get('jenkel'),
                        'tanggal_lahir' => $request->tgl_lahir,
                        'kode_prodi' => Session::get('kode_prodi'),
                    ]);

                    Session::put('npm_terdaftar', $request->npm);
        
                    return \redirect()->route('mhs.biodata-diri.index')->with('success', 'Biodata Diri Berhasil Ditambahkan');

        }

    }
}
