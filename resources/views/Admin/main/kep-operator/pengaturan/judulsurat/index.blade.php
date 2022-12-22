
@extends('admin.layout.layout')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Judul Surat</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Judul Surat</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <button type="button" class="mr-3 btn btn-outline-primary block"
                data-bs-toggle="modal" data-bs-target="#catatan_penolakan">
                &nbsp;Tambah Data
                </button>

                <a href="{{ route('kep-operator.judul-surat.trash') }}" class='sidebar-link'>
                    <i class="fas fa-trash-alt"></i>
                    <span>Tempat Sampah</span>
                </a>
            </div>

            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Surat</th>
                            <th>Judul Surat</th>
                            <th>Masa Aktif</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->tb_jenis_surat->jenis_surat }}</td>
                            <td>{{ $item->judul_surat }}</td>
                            <td>{{ $item->masa_aktif }} Hari</td>
                            <td>{{ $item->created_at }}</td>   

                            <td>
                                <a class="badge bg-warning"   data-bs-toggle="modal" data-bs-target="#edit_data{{ $item->id }}">  <i class="fa fa-edit"> </i>  </a>
                                
                                <form action="{{ route('judul-surat.destroy', $item->id) }}" method="POST" class="d-inline">
                                    {{ csrf_field() }}  {{ method_field("DELETE") }}
                                    <button class="badge bg-danger border-0" onclick="return confirm('Data akan dinonaktifkan secara sementara')" >  <i class="fa fa-ban"> </i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>


    <div class="modal fade" id="catatan_penolakan" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"> Tambah Data
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('judul-surat.store') }}" method="POST">
                @csrf 
                <div class="modal-body">
                        <div class="div">
                            <h6 class="modal-title" id="exampleModalCenterTitle"> Kode Jenis Surat  </h6>
                            <select name="kode_jenis_surat" id="" class="form-control">
                                <option value="KDM2">Surat Mahasiswa</option>
                                <option value="KDU1">Surat Umum</option>
                            </select>
                        </div>

                        <div>
                            <h6 class="modal-title" id="exampleModalCenterTitle"> Judul Surat  </h6>
                            <input type="text" class="form-control" name="judul_surat">
                        </div>
                        
                        <div>
                            <h6 class="modal-title" id="exampleModalCenterTitle"> Masa Aktif </h6>
                            <input type="text" class="form-control" name="masa_aktif">
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Kembali</span>
                    </button>
    
                      
                        <button type="submit" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    
                </div>
            </form>
        </div>
    </div>
    </div>


    @foreach ($data as $item1)
    <div class="modal fade" id="edit_data{{ $item1->id  }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle"> Edit Data
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('judul-surat.update', $item1->id) }}" method="POST">
                    @csrf  @method('put')
                    <div class="modal-body">
                        <div>
                            <h6 class="modal-title" id="exampleModalCenterTitle"> Judul Surat  </h6>
                            <select name="kode_jenis_surat" id="" class="form-control">
                                @if ( old('kode_jenis_surat', $item1->kode_jenis_surat) === 'KDM2')
                                <option value="KDM2" selected>Surat Mahasiswa</option>
                                <option value="KDU1">Surat Umum</option>
                                
                                @else 
                                <option value="KDM2" >Surat Mahasiswa</option>
                                <option value="KDU1"selected>Surat Umum</option>
                                @endif
                            </select>
                        </div>

                        <div>
                            <h6 class="modal-title" id="exampleModalCenterTitle"> Judul Surat  </h6>
                            <input type="text" value="{{  old('judul_surat', $item1->judul_surat)  }}" class="form-control" name="judul_surat">
                        </div>

                        <div>
                            <h6 class="modal-title" id="exampleModalCenterTitle"> Masa Aktif  </h6>
                            <input type="text" value="{{  old('masa_aktif', $item1->masa_aktif)  }}" class="form-control" name="masa_aktif">
                        </div>
                   
                   
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Kembali</span>
                        </button>
        
                        
                            <button type="submit" class="btn btn-primary ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Simpan</span>
                            </button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

@endsection

