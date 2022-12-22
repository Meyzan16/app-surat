<?php

namespace App\Http\Controllers\Admin\operator\suratumum;
use App\Http\Controllers\Controller;
use App\Models\tb_log_surat_mhs_umum;
use App\Models\tb_lampiran;
use App\Models\tb_judul_surat;
use App\Models\tb_tujuan_surat;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class SuratUmumMhsController extends Controller
{
    public function index()
    {
        $data = tb_log_surat_mhs_umum::where([
            ['kode_prodi', '=',  auth()->user()->kode_prodi],
        ])->get();


        return view('Admin.main.operator.surat-umum-mhs.index', compact('data'));
    }

    
}
