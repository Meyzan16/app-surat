

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
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="form-body">
                    <form action="{{ route('operator.profile.update', auth()->user()->id )}}" method="POST">
                        @csrf @method('patch')

                        <div class="row">
                            
                            <div class="col-md-2">
                                <label>Nama</label>
                            </div>
                            <div class="col-md-10 form-group">                                                 
                                <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" required>
                                                                    
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
                              

                                <a  href="{{ route('operator.surat-umum.index') }}"
                                    class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                            </div>

                            
                        </div>
                    </form>

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


