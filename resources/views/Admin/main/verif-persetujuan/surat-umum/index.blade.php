
@extends('admin.layout.layout')

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Surat Umum Prodi</h3>

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
           
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Perihal Surat</th>
                            <th>Status Kep.Operator</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status TTD Persetujuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->tb_judul_surat->judul_surat}}</td>
                      
                           
                            @if ($item->kepala_operator == 'belum diverifikasi' && $item->catatan_kepala_operator == null)
                                <td>
                                    <span class="badge bg-warning">Menunggu</span>
                                </td>
                            @elseif($item->kepala_operator == 'belum diverifikasi' && $item->catatan_kepala_operator != null)
                                <td>
                                    <span class="badge bg-warning">Menunggu Verifikasi Ulang</span>

                                    <a class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#exampleModalCatatan{{ $item->id }}">  <i class="fa fa-comment-dots"> </i>  </a>          
                                </td>
                            @elseif($item->kepala_operator == 'N')
                            <td>
                                <span class="badge bg-danger">Ditolak</span>
                                <a class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#exampleModalCatatan{{ $item->id }}">  <i class="fa fa-comment-dots"> </i>  </a>          
                            </td>
                            @else
                            <td>
                                <span class="badge bg-success">Diterima</span>
                            </td>
                            @endif
                      
                            <td>
                                <span class="badge bg-primary">{{ $item->created_at }}</span>
                            </td>
                            
                            

                            @if ($item->status_persetujuan == 'belum diverifikasi')
                                <td>
                                    <span class="badge bg-warning">Menunggu</span>
                                </td>
                            @else
                            <td>
                                <span class="badge bg-success">Diterima</span>
                            </td>
                            @endif

                            <td>      
                                    <a class="badge bg-success"   data-bs-toggle="modal" data-bs-target="#exampleModalTerima{{ $item->id }}">   <i class="fa fa-check-circle"> </i>  </a>                                  
                                @if($item->status_persetujuan == 'Y')
                                <a href="{{ route('ttd-persetujuan.surat-umum.show', $item->id)}}" target="_blank" class="badge bg-primary"> <i class="fa fa-print"> </i> </a>
                                
                                @else
                                <a href="{{ route('ttd-persetujuan.surat-umum.show', $item->id)}}" target="_blank" class="badge bg-primary"> <i class="fa fa-eye"> </i> </a>
                                    
                                @endif
                            </td>

                         
                        </tr>
                        
                        @endforeach
                     
                    </tbody>
                </table>
            </div>
        </div>

    </section>

{{-- verif terima --}}
@foreach($data as $item1)
<div class="modal fade" id="exampleModalTerima{{$item1->id}}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
    role="document">
    <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"> Validasi diterima
            </h5>
            <button type="button" class="close" data-bs-dismiss="modal"
                aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>

        <form action="{{ route('ttd-persetujuan.surat-umum.verif_diterima', $prodi->kode_prodi) }}" method="POST">
            @csrf {{ method_field('PATCH') }}
            <div class="modal-body">
                    
                <h6 class="text-center"> {{$item1->tb_judul_surat->judul_surat}} </h6>
                @if ($item1->kepala_operator != 'Y')
                    
                <center>
                    <span class="badge bg-primary" >Maaf , kepala operator belum verifikasi data</span>
                </center>
                @else
                <p class="text-center">
                    Perhatian !!!
                    Silahkan cek data surat yang diajukan dengan benar untuk diverifikasi ,
                </p>
                    
                @endif
            
                <input type="hidden" name="id" value="{{$item1->id}}">
                
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Kembali</span>
                    </button>

                    @if($item1->kepala_operator == 'Y')
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