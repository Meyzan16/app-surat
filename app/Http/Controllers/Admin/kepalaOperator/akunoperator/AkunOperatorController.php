<?php

namespace App\Http\Controllers\Admin\kepalaoperator\pengaturansurat;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AkunOperatorController extends Controller
{
    public function index()
    {
        $data = user::all(); 
    
        return view('Admin.main.kep-operator.akun.operator.index',compact('data'));
    }
}
