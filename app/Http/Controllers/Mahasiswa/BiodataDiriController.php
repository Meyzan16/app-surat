<?php

namespace App\Http\Controllers\Mahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BiodataDiriController extends Controller
{
    public function index()
    {
        return view('Mhs.main.biodata-diri.index');
    }
}
