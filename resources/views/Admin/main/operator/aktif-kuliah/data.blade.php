
@extends('admin.layout.layout')

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>DataTable</h3>
                <p class="text-subtitle text-muted">For user to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a class="badge bg-primary" href="{{ route('operator.surat-aktif-kuliah.index')}}" > Kembali </a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NPM</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Aksi</th>
                            <th>Status Kepala Operator</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->npm}}</td>
                            <td>{{ $item->tb_data_mahasiswa->nama}}</td>
                           
                            @if ($item->operator_prodi == 'belum diverifikasi')
                                <td>
                                    <span class="badge bg-warning">Menunggu</span>
                                </td>
                            @elseif($item->operator_prodi == 'N')
                            <td>
                                <span class="badge bg-danger">Ditolak</span>



                                <a class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#show_data">  <i class="fa fa-comment-dots"> </i>  </a>          

                            </td>
                            @else
                            <td>
                                <span class="badge bg-success">Diterima</span>
                            </td>
                            @endif


                            <td>
                                 <form action="{{ route('operator.surat-aktif-kuliah.verif_diterima', $item->npm) }}" method="POST">
                                    {{ csrf_field() }} {{ method_field('PATCH') }}
                                    <button type="submit" class="badge bg-success  d-flex d-inline ">
                                        <i class="fa fa-check-circle"> </i> 
                                    </button>
                                </form> 
                                
                               
                               
                                <a class="badge bg-danger"   data-bs-toggle="modal" data-bs-target="#exampleModalTolak{{ $item->npm }}">  <i class="fa fa-ban"> </i>  </a>                                  
                               
                                <a href="#showdata"  class="badge bg-primary"> <i class="fa fa-eye"> </i> </a>

                                <a href="#edit"  class="badge bg-warning">  <i class="fa fa-edit"> </i>  </a>

                            </td>

                             @if ($item->kepala_operator == 'belum diverifikasi')
                                <td>
                                    <span class="badge bg-warning">Menunggu</span>
                                </td>
                            @elseif($item->kepala_operator == 'N')
                            <td>
                                <span class="badge bg-danger">Ditolak</span>

                                <a class="badge bg-label-danger" data-bs-toggle="modal" data-bs-target="#show_data">  <i class="fa fa-comment-dots"> </i>  </a>          

                            </td>
                            @else
                            <td>
                                <span class="badge bg-success">Diterima</span>
                            </td>
                            @endif


                         
                        </tr>
                        
                        @endforeach
                     
                    </tbody>
                </table>
            </div>
        </div>

    </section>

{{-- penolakan --}}
@foreach($data as $item1)
<div class="modal fade" id="exampleModalTolak{{$item1->npm}}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
    role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle"> Validasi Ditolak {{ $item1->tb_data_mahasiswa->nama}}
            </h5>
            <button type="button" class="close" data-bs-dismiss="modal"
                aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>
        <form action="" method="POST">
            @csrf {{ method_field('PATCH') }}
            <div class="modal-body">
                <h6 class="modal-title" id="exampleModalCenterTitle"> Catatan </h6>
                <textarea class="form-control"  id="editor" name="catatan_biodata" cols="50" rows="3"> </textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Kembali</span>
                </button>

                  
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Verifikasi</span>
                    </button>
                
            </div>
        </form>
    </div>
</div>
</div>
@endforeach


@endsection