<?php

namespace App\Http\Controllers\Admin\kepalaOperator;
use App\Http\Controllers\Controller;
use App\Models\tb_log_srt_ket_msh_kuliah;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class SuratAktifKuliahKepOperatorController extends Controller
{
    public function index()
    {
        return view('Admin.main.kep-operator.surat-mahasiswa.aktif-kuliah.index');
    }
}
