<?php

namespace App\Http\Controllers\Error;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function index()
    {
        return view('Admin.error.404');
    }
}
