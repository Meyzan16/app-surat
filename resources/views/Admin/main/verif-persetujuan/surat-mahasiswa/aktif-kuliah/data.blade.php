
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
                        <li class="breadcrumb-item"><a href="index.html">Surat Aktif Kuliah</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                    <div class="card">
                        <div class="card-body px-3 py-2-3">   
                                <h5 class="text-center" > Data Pengajuan {{ $prodi->nama_prodi}} </h5>
                        </div>
                    </div>
            </div>
        </div>
    </div>


    <section class="section">
        <div class="card">
            <div class="card-header">
                <a class="badge bg-primary" href="{{ route('ttd-persetujuan.surat-aktif-kuliah.index', $prodi->kode_prodi)}}" > Kembali </a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NPM</th>
                            <th>Nama</th>
                            <th>Status Operator</th>
                            <th>Status Kep.Operator</th>
                            <th>Status ttd</th>
                            <th>Aksi</th>

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
                                <a class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#exampleModalCatatan{{ $item->npm }}">  <i class="fa fa-comment-dots"> </i>  </a>          
                            </td>
                            @else
                            <td>
                                <span class="badge bg-success">disetujui</span>
                            </td>
                            @endif                      

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
                            @elseif($item->status_persetujuan == 'N')
                            <td>
                                <span class="badge bg-danger">Ditolak</span>

                                <a class="badge bg-label-danger" data-bs-toggle="modal" data-bs-target="#show_data">  <i class="fa fa-comment-dots"> </i>  </a>          

                            </td>
                            
                            @endif

                            <td>           
                                <a class="badge bg-success"   data-bs-toggle="modal" data-bs-target="#exampleModalTerima{{ $item->npm }}">   <i class="fa fa-check-circle"> </i>  </a>                                  
                                
                                <a href="{{route('ttd-persetujuan.cetak.aktif-kuliah', $item->id)}}" target="_blank" class="badge bg-primary"> <i class="fa fa-eye"> </i> </a>
                            </td>

                        </tr>
                        
                        @endforeach
                     
                    </tbody>
                </table>
            </div>
        </div>

    </section>

{{-- verif terima operator --}}
@foreach($data as $item1)
<div class="modal fade" id="exampleModalTerima{{$item1->npm}}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
    role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle"> Validasi diteirma {{ $item1->tb_data_mahasiswa->nama}}
            </h5>
            <button type="button" class="close" data-bs-dismiss="modal"
                aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>

        <form action="{{ route('ttd-persetujuan.surat-aktif-kuliah.verifikasi', $prodi->kode_prodi) }}" method="POST">
            @csrf 
            <div class="modal-body">
                    
               
                <p class="text-center">
                    Perhatian !!!
                    Silahkan cek data mahasiswa dengan benar untuk diverifikasi ,
                    data yang telah diverifikasi tidak bisa di verifikasi ulang.
                    setelah diverifikasi.
                </p>
                <center>
                    <span class="badge bg-primary" >Selanjutnya menunggu verifikasi kepala operator</span>
                </center>

                <input type="hidden" value="{{ $item1->npm}}" name="npm"> 
                
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Kembali</span>
                    </button>

                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block" >Verifikasi</span>
                    </button>
                    
                
            </div>
        </form>
    </div>
</div>
</div>
@endforeach




{{-- catatan penolakan --}}
@foreach($data as $catatan)
<div class="modal fade" id="exampleModalCatatan{{$catatan->npm}}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
    role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle"> Catatan Penolakan {{ $catatan->tb_data_mahasiswa->nama}}
            </h5>
            <button type="button" class="close" data-bs-dismiss="modal"
                aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>

            <div class="modal-body">              
                <textarea readonly class="form-control mt-2" cols="50" rows="3"> {{ $catatan->catatan_operator_prodi}} </textarea> 
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
{{-- akhir operator --}}






@endsection