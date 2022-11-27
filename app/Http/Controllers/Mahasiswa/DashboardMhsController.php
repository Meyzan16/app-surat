<?php

namespace App\Http\Controllers\Mahasiswa;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardMhsController extends Controller
{
    public function index()
    {
        return view('Mhs.main.dashboard');
    }
}
