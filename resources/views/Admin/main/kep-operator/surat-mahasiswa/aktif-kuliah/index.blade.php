
@extends('admin.layout.layout')

@section('content')

<div class="page-heading">
    <h3>Data prodi {{ $data->nama_prodi }}</h3>
</div>

<div class="page-content">
    <div class="row">
        <div class="col-12">
                <div class="card">
                    <div class="card-body px-3 py-4-5">   
                        @if(auth()->user()->kode_prodi)
                        
                            <h5>Selamat datang , verifikator prodi {{ auth()->user()->tb_prodi->nama_prodi }}</h5>
                        @elseif(auth()->user()->roles == 'KEPALA_OPERATOR')
                        
                            <h5>Selamat datang , {{auth()->user()->nama}} kepala operator</h5>
                        
                        @endif
                    </div>
                </div>
        </div>
    </div>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">

                <div class="col-12 col-lg-6 col-md-6">

                    <a href="{{ route ('kepala-operator.surat-aktif-kuliah.show', $data->kode_prodi)}}">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Data Pengajuan</h6>
                                        <h6 class="font-extrabold mb-0">112</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">History Pengajuan </h6>
                                    <h6 class="font-extrabold mb-0">112.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                
            </div>
          
            
        </div>
      
    </section>
</div>

@endsection