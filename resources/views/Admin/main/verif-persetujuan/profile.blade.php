

@extends('admin.layout.layout')

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Profile</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Profile </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
     <!-- Basic Horizontal form layout section start -->
     <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Biodata Diri</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('persetujaun.profile.update', auth()->user()->id )}}" method="POST">
                                @csrf @method('patch')
        
                                <div class="row">
                                    
                                    <div class="col-md-2">
                                        <label>NIP</label>
                                    </div>
                                    <div class="col-md-10 form-group">                                                 
                                        <input type="text" name="nip" class="form-control" value="{{ $data->tb_persetujuan->nip }}" required>                                
                                    </div>
        
                                    <div class="col-md-2">
                                        <label>Nama</label>
                                    </div>
                                    <div class="col-md-10 form-group">                                                 
                                        <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" required>
                                                                            
                                    </div>
        
                                    <div class="col-md-2">
                                        <label>Golongan</label>
                                    </div>
                                    <div class="col-md-10 form-group">                                                 
                                        <input type="text" name="golongan" class="form-control" value="{{ $data->tb_persetujuan->golongan }}" required>
                                                                            
                                    </div>
        
                                    <div class="col-md-2">
                                        <label>Jabatan</label>
                                    </div>
                                    <div class="col-md-10 form-group">                                                 
                                        <input type="text" name="jabatan" class="form-control" value="{{ $data->tb_persetujuan->jabatan }}" required>
                                                                            
                                    </div>
        
                                    <div class="col-md-2">
                                        <label>Username</label>
                                    </div>
                                    <div class="col-md-10 form-group">                                                 
                                        <input type="text" name="username" class="form-control" value="{{ $data->username }}" required>                                 
                                    </div>
        
                                    
        
        
                                   
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit"  class="btn btn-primary me-1 mb-1">
                                        &nbsp;Simpan
                                        </button>
                                    </div>
        
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Yang Diperbarui</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal">
                                <div class="row">
                                    
                                    <div class="col-md-2">
                                        <label>NIP</label>
                                    </div>
                                    <div class="col-md-10 form-group">                                                 
                                        <input type="text" name="nip" class="form-control" value="{{ $data->tb_persetujuan->nip }}" readonly>                                
                                    </div>
        
                                    <div class="col-md-2">
                                        <label>Nama</label>
                                    </div>
                                    <div class="col-md-10 form-group">                                                 
                                        <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" readonly>
                                                                            
                                    </div>
        
                                    <div class="col-md-2">
                                        <label>Golongan</label>
                                    </div>
                                    <div class="col-md-10 form-group">                                                 
                                        <input type="text" name="golongan" class="form-control" value="{{ $data->tb_persetujuan->golongan }}" readonly>
                                                                            
                                    </div>
        
                                    <div class="col-md-2">
                                        <label>Jabatan</label>
                                    </div>
                                    <div class="col-md-10 form-group">                                                 
                                        <input type="text" name="jabatan" class="form-control" value="{{ $data->tb_persetujuan->jabatan }}" readonly>
                                                                            
                                    </div>
        
                                    <div class="col-md-2">
                                        <label>Username</label>
                                    </div>
                                    <div class="col-md-10 form-group">                                                 
                                        <input type="text" name="username" class="form-control" value="{{ $data->username }}" readonly>                                 
                                    </div>
        
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
@endsection

    @push('addon-script')
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

        <script>
        CKEDITOR.replace( 'editor' );
        CKEDITOR.replace( 'editor1' );
        </script>
    @endpush


