<?php

namespace App\Http\Controllers\Admin\Operator;
use App\Http\Controllers\Controller;
use App\Models\tb_log_srt_ket_msh_kuliah;

use Illuminate\Http\Request;

class SuratAktifKuliahOperatorController extends Controller
{
    public function index()
    {
        $angkatan = tb_log_srt_ket_msh_kuliah::select('angkatan')
                    ->groupBy('angkatan')
                    ->get();
        return view('Admin.main.operator.aktif-kuliah.index', compact('angkatan'));
    }

    public function show(Request $request)
    {
        $data = $request->angkatan;
        return $data;
    }
}
