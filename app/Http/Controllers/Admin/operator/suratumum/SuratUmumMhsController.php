<?php

namespace App\Http\Controllers\Admin\operator\suratumum;
use App\Http\Controllers\Controller;
use App\Models\tb_log_surat_mhs_umum;
use App\Models\tb_lampiran;
use App\Models\tb_judul_surat;
use App\Models\tb_tujuan_surat;
use DateTime;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class SuratUmumMhsController extends Controller
{
    public function index()
    {
        
                $data = tb_log_surat_mhs_umum::where([
                    ['kode_prodi', '=',  auth()->user()->kode_prodi],
                    ['status_persetujuan', '=',  'belum diverifikasi'],
                ])->get();
            

                return view('Admin.main.operator.surat-umum-mhs.index', compact('data'));
    }

    public function history()
    {  
            $data = tb_log_surat_mhs_umum::where([
                ['kode_prodi', '=',  auth()->user()->kode_prodi],
                ['status_persetujuan', '=',  'Y'],
            ])->get();
            return view('Admin.main.operator.surat-umum-mhs.history', compact('data'));
    }


    public function verifikasi($id)
    {
        tb_log_surat_mhs_umum::where([
            ['id', '=',  $id],
        ])->update([
            'operator_prodi'    =>  'Y',
            'catatan_operator_prodi'   => NULL,
            'id_operator' => auth()->user()->id,
            'time_acc_operator_prodi' => date("Y-m-d H:i:s"),
        ]);

         return redirect()->route('operator.surat-umum-mhs.index')->with(['toast_success' => ' berhasil di verifikasi !!']);
    }


    public function verifikasi_tolak(Request $request, $id)
    {
            //pasang rules
            $rules = [
                'catatan_operator_prodi'=> 'required'
            ];

            //pasang pesan kesalahan
            $messages = [
                'catatan_operator_prodi.required'     => 'nama wajib diisi',
               
            ];

            //ambil semua request dan pasang rules dan isi pesanya
            $validator = Validator::make($request->all(), $rules, $messages);
            //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
            if($validator->fails())
            {
                return redirect()->route('operator.surat-umum-mhs.index')->with(['toast_error' =>' Catatan ditolak wajib di isi!!']);
                    // return redirect()->back()->withErrors($validator)->withInput($request->all());
            } 
            else{

                tb_log_surat_mhs_umum::where('id',$id)->update([
                    'catatan_operator_prodi'   => $request->catatan_operator_prodi,
                    'operator_prodi'    =>  'N',
                    'id_operator' => auth()->user()->id,     
                ]);
                return redirect()->route('operator.surat-umum-mhs.index')->with(['toast_error' => ' berhasil di tolak !!']);
            }
    }

    public function edit(Request $request, $id)
    {
        $data = tb_log_surat_mhs_umum::where([
            ['id', '=',  $id],
        ])->first();

        return view('Admin.main.operator.surat-umum-mhs.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {      
        //pasang rules
        $rules = [
            'tujuan_surat'=> 'required',
            'sub_tujuan'=> 'required',
            'isi_surat' => 'required',
        ];

        //pasang pesan kesalahan
        $messages = [
            'tujuan_surat.required'     => 'Tujuan surat wajib diisi',
            'sub_tujuan.required'     => 'Sub tujuan wajib diisi',
            'isi_surat.required'     => 'Isi surat wajib diisi',

       
          
        ];

        //ambil semua request dan pasang rules dan isi pesanya
        $validator = Validator::make($request->all(), $rules, $messages);
        //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
        if($validator->fails())
        {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
        }else{

                        tb_log_surat_mhs_umum::where([
                            ['id', '=',  $id],
                        ])->update([
                            'tujuan_surat' => $request->tujuan_surat,
                            'sub_tujuan' => $request->sub_tujuan,
                            'judul_penelitian' => $request->judul_penelitian,
                            'isi_surat' => $request->isi_surat,
                            'tembusan' => $request->tembusan,
                    ]);
                            

        
                    return \redirect()->route('operator.surat-umum-mhs.index')->with('toast_success',' Data berhasil di perbarui ');
         }
    }

    
}
