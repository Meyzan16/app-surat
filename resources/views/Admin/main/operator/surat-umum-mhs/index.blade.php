
@extends('admin.layout.layout')

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Surat Umum Mahasiswa</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Surat Umum </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a class="badge bg-primary" href="{{ route('operator.surat-umum.create')}}" > Tambah Data </a>
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
                            <th>Status TTD Persetujuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->npm}}</td>
                            <td>{{ $item->tb_data_mahasiswa->nama}}</td>
                           
                            @if ($item->operator_prodi == 'belum diverifikasi' && $item->catatan_operator_prodi == null)
                                <td>
                                    <span class="badge bg-warning">Menunggu</span>
                                </td>
                            @elseif($item->operator_prodi == 'belum diverifikasi' && $item->catatan_operator_prodi != null)
                                <td>
                                    <span class="badge bg-warning">Menunggu Verifikasi Ulang</span>

                                    <a class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#exampleModalCatatan{{ $item->npm }}">  <i class="fa fa-comment-dots"> </i>  </a>          
                                </td>
                            @elseif($item->operator_prodi == 'N')
                            <td>
                                <span class="badge bg-danger">Ditolak</span>
                                <a class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#exampleModalCatatan{{ $item->npm }}">  <i class="fa fa-comment-dots"> </i>  </a>          
                            </td>
                            @else
                            <td>
                                <span class="badge bg-success">disetujui</span>
                            </td>
                            @endif


                            <td>           
                               
                                
                                <a class="badge bg-success"   data-bs-toggle="modal" data-bs-target="#exampleModalTerima{{ $item->npm }}">   <i class="fa fa-check-circle"> </i>  </a>                                  
                                
                                <a class="badge bg-danger"   data-bs-toggle="modal" data-bs-target="#exampleModalTolak{{ $item->npm }}">  <i class="fa fa-ban"> </i>  </a>                                  
                               
                                <a href="{{route('operator.cetak.aktif-kuliah', $item->id)}}" target="_blank" class="badge bg-primary"> <i class="fa fa-eye"> </i> </a>

                                @if($item->kepala_operator != 'Y')
                                    <a onclick="location.href='{{ route('operator.surat-aktif-kuliah.edit', $item->npm) }}'"   class="badge bg-warning">  <i class="fa fa-edit"> </i>  </a>
                                @endif

                            </td>

                            @if ($item->kepala_operator == 'belum diverifikasi')
                                <td>
                                    <span class="badge bg-warning">Menunggu</span>
                                </td>
                            @elseif($item->kepala_operator == 'N')
                                <td>
                                    <span class="badge bg-warning">Verifikasi Dibatalkan</span>
                                </td>
                            @else
                            <td>
                                <span class="badge bg-success">disetujui</span>
                            </td>
                            @endif

                            

                            @if ($item->status_persetujuan == 'belum diverifikasi')
                                <td>
                                    <span class="badge bg-warning">Menunggu</span>
                                </td>
                            @else
                            <td>
                                <span class="badge bg-success">disetujui</span>
                            </td>
                            @endif


                         
                        </tr>
                        
                        @endforeach
                     
                    </tbody>
                </table>
            </div>
        </div>

    </section>



{{-- catatan penolakan --}}
@foreach($data as $catatan)
<div class="modal fade" id="exampleModalCatatan{{$catatan->id}}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
    role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle"> Catatan Penolakan
            </h5>
            <button type="button" class="close" data-bs-dismiss="modal"
                aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>

            <div class="modal-body">              
                <textarea readonly class="form-control mt-2" cols="50" rows="3"> {{ $catatan->catatan_kepala_operator}} </textarea> 
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Kembali</span>
                    </button>
            </div>
    </div>
</div>
</div>
@endforeach

@endsection