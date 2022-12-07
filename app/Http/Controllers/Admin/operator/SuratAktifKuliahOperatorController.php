<?php

namespace App\Http\Controllers\Admin\Operator;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SuratAktifKuliahOperatorController extends Controller
{
    public function index()
    {
        return view('Admin.main.operator.aktif-kuliah.index');
    }
}
