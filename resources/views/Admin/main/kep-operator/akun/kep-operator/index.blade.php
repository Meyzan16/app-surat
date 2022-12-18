
@extends('admin.layout.layout')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Akun Kepala Operator</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Akun operator</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
            </div>

            <div class="div">
                @if (count($errors) > 0)
                            <div class="alert alert-danger autohide">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
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

                <a href="{{ route('kep-operator.akun-operator.trash') }}" class='sidebar-link'>
                    <i class="fas fa-trash-alt"></i>
                    <span>Tempat Sampah</span>
                </a>
            </div>

            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>role</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->username }}</td>

                            @if($item->roles == 'KEPALA_OPERATOR')
                                <td>
                                    <span class="badge bg-primary" >KEPALA OPERATOR FAKULTAS</span>
                                </td>   
                            @endif

                         

                            <td>
                                    {{-- aturan default resource tambahakan edit di belakang --}}
                                <a class="badge bg-warning"   data-bs-toggle="modal" data-bs-target="#edit_data{{ $item->id }}">  <i class="fa fa-edit"> </i>  </a>
                            </td>
                            

                        
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
        

    
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
                <form action="{{ route('akun-kep-operator.update', $item1->id) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="modal-body">
                        <div>
                            <h6 class="modal-title" id="exampleModalCenterTitle" aria-required="true"> NAMA  </h6>
                           <input type="text" class="form-control" name="nama" value="{{  old('nama', $item1->nama)  }}">
                        </div>
                        <div>
                            <h6 class="modal-title" id="exampleModalCenterTitle" aria-required="true"> USERNAME  </h6>
                           <input type="text" class="form-control" name="username" value="{{  old('username', $item1->username)  }}">
                        </div>
                        
                        <div>
                            <h6 class="modal-title" id="exampleModalCenterTitle" aria-required="true"> PASSWORD  </h6>
                           <input type="text" class="form-control" name="password_noenkripsi" value="{{  old('password_noenkripsi', $item1->password_noenkripsi)  }}">
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

