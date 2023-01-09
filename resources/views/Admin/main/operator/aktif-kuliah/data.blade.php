
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
                        <li class="breadcrumb-item"><a href="index.html">Surat AKtif Kuliah</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
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

                                <a onclick="location.href='{{ route('operator.surat-aktif-kuliah.edit', $item->npm) }}'"   class="badge bg-warning">  <i class="fa fa-edit"> </i>  </a>

                            </td>

                            @if ($item->kepala_operator == 'belum diverifikasi')
                                <td>
                                    <span class="badge bg-warning">Menunggu</span>
                                </td>
                            @elseif($item->kepala_operator == 'N')
                                <td>
                                    <span class="badge bg-warning">Verifikasi Ulang</span>
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





{{-- verif terima --}}
@foreach($data as $item1)
<div class="modal fade" id="exampleModalTerima{{$item1->npm}}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
    role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle"> Validasi Disetujui {{ $item1->tb_data_mahasiswa->nama}}
            </h5>
            <button type="button" class="close" data-bs-dismiss="modal"
                aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>

        <form action="{{ route('operator.surat-aktif-kuliah.verif_diterima', $item1->npm) }}" method="POST">
            @csrf {{ method_field('PATCH') }}


            <div class="modal-body">
                    
                @if ($item1->kepala_operator == 'Y')
                    <p class="text-center">
                        Data sudah diverifikasi Kepala Operator
                    </p>
                    <center>
                        <span class="badge bg-primary" >untuk verifikasi ulang, silahkan hubungi kepala operator</span>
                    </center>
                @else 
                <p class="text-center">
                    Perhatian !!!
                    Silahkan cek data mahasiswa dengan benar untuk diverifikasi ,
                    data yang telah diverifikasi tidak bisa di verifikasi ulang.
                    setelah diverifikasi, selanjutnya menunggu verifikasi kepala operator
                </p>
               
                @endif

                
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Kembali</span>
                    </button>

                @if ($item1->kepala_operator != 'Y')
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block" >Verifikasi</span>
                    </button>
                @endif
                    
                
            </div>
        </form>
    </div>
</div>
</div>
@endforeach



{{-- verif tolak --}}
@foreach($data as $item2)
<div class="modal fade" id="exampleModalTolak{{$item2->npm}}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
    role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle"> Validasi Ditolak {{ $item2->tb_data_mahasiswa->nama}}
            </h5>
            <button type="button" class="close" data-bs-dismiss="modal"
                aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>
        <form action="{{ route('operator.surat-aktif-kuliah.verif_ditolak', $item2->npm)}}" method="POST">
            @csrf {{ method_field('PATCH') }}
            <div class="modal-body">

                @if ($item2->kepala_operator == 'Y')
                <p class="text-center">
                    Data sudah diverifikasi Kepala Operator
                </p>
                <center>
                    <span class="badge bg-primary" >untuk verifikasi ulang, silahkan hubungi kepala operator</span>
                </center>
                @else 
                    <p class="text-center">
                        Perhatian !!!
                        Data surat yang ditolak dimohon untuk
                        diteliti kembali 
                    </p>
                    <center>
                        <span class="badge bg-danger" >Silahkan tinggal catatan penolakan</span>
                    </center>

                    <textarea class="form-control mt-2"  id="editor" name="catatan_operator_prodi" cols="50" rows="3"> </textarea>
            
                @endif

               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">kembali</span>
                </button>

                @if ($item2->kepala_operator != 'Y')
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block" >ditolak</span>
                    </button>  
                @endif
               

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
            <h5 class="modal-title" id="exampleModalCenterTitle"> Validasi Disetujui {{ $catatan->tb_data_mahasiswa->nama}}
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

                    @if($item1->operator_prodi != 'N')
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block" >Verifikasi</span>
                    </button>
                    @endif
                
            </div>
    </div>
</div>
</div>
@endforeach

@endsection