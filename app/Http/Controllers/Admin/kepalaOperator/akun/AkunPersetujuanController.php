<?php

namespace App\Http\Controllers\Admin\kepalaoperator\akun;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\tb_prodi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AkunPersetujuanController extends Controller
{
  
    public function index()
    {
        $data = user::where('roles', 'VERIF_PERSETUJUAN')->get(); 
    
        return view('Admin.main.kep-operator.akun.persetujuan.index',compact('data'));
    }

   
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
