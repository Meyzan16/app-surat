
@extends('admin.layout.layout')

@section('content')

<div class="page-heading">
    <h3>Dashboard</h3>
</div>

<div class="page-content">
    <div class="row">
        <div class="col-12">
                <div class="card">
                    <div class="card-body px-3 py-4-5">   
                        @if(auth()->user()->roles == 'OPERATOR_PRODI')
                        
                            <h5>Selamat datang , verifikator prodi {{ auth()->user()->tb_prodi->nama_prodi }}</h5>
                        @elseif(auth()->user()->roles == 'KEPALA_OPERATOR')
                        
                            <h5>Selamat datang , {{auth()->user()->nama}} kepala operator</h5>
                        @elseif(auth()->user()->roles == 'VERIF_PERSETUJUAN')
                        
                            <h5>Selamat datang , {{auth()->user()->nama}} Penanggung Jawab</h5>
                        @elseif(auth()->user()->roles == 'VERIF_PRODI')
                        
                            <h5>Selamat datang , {{auth()->user()->nama}} dari prodi {{ auth()->user()->tb_prodi->nama_prodi }} </h5> 
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
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Surat Keterangan Aktif Kuliah </h6>
                                    <h6 class="font-extrabold mb-0">{{$count_aktif_kuliah}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Surat Keterangan Lulus</h6>
                                    <h6 class="font-extrabold mb-0">{{$count_ket_lulus}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Surat Umum Mahasiswa</h6>
                                    <h6 class="font-extrabold mb-0">{{$srt_umum_mhs}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Surat Pengajuan Prodi</h6>
                                    <h6 class="font-extrabold mb-0">{{$srt_umum}}</h6>
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