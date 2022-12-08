
@extends('admin.layout.layout')

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Surat Aktif Kuliah</h3>
             
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Surat Mahasiswa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Surat Aktif Kulih</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row match-height">
            <div class="col-md-8 col-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title">Silahkan pilih prodi</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form>
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Pilih Prodi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select name="angkatan" id="angkatan" class="form-control" required>
                                                <option value="">-- pilih data -- </option>
                                                @foreach ($angkatan as $item)
                                                <option value=" {{ $item->angkatan}}"> {{ $item->angkatan}} </option>
                                                    
                                                @endforeach
                                            </select>
                                           
                                        </div>
                                       

                            
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button onclick="return cari()"
                                                    class="btn btn-primary me-1 mb-1">Cari</button>
                                                
                                            </div>

                                            
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

