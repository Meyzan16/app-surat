
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
                        <li class="breadcrumb-item active" aria-current="page">History</li>
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
                                <h5 class="text-center" > Data History Surat {{ $prodi->nama_prodi}} </h5>
                        </div>
                    </div>
            </div>
        </div>
    </div>


    <section class="section">
        <div class="card">
            <div class="card-header">
                <a class="badge bg-primary" href="{{ route('kepala-operator.surat-aktif-kuliah.index', $prodi->kode_prodi)}}" > Kembali </a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NPM</th>
                            <th>Nama</th>
                            <th>Tanggal dibuat</th>
                            <th>Operator</th>
                            <th>Kep.Operator</th>
                            <th>TTD Persetujuan</th>
                            <th>Masa Aktif 8 Hari</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->npm}}</td>
                            <td>{{ $item->tb_data_mahasiswa->nama}}</td>

                            <td>
                                <span class="badge bg-primary">{{ $item->created_at ;}}</span>
                            </td>
                           
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
                                <span class="badge bg-success">Diterima</span>
                            </td>
                            @endif


                        

                            @if ($item->kepala_operator == 'belum diverifikasi')
                                <td>
                                    <span class="badge bg-warning">Menunggu</span>
                                </td>
                            @else
                            <td>
                                <span class="badge bg-success">Diterima</span>
                            </td>
                            @endif

  


                            @if ($item->status_persetujuan == 'belum diverifikasi')
                                <td>
                                    <span class="badge bg-warning">Menunggu</span>
                                </td>
                            @else
                            <td>
                                <span class="badge bg-success">Diterima</span>     
                            </td>
                            @endif



                            @php
                            $created = new DateTime($item->time_acc_ttd);
                            $result = $created->format('d-m-Y');

                            
                            $datetime1 = date_create($result);

                            $now = date('d-m-Y');

                            $datetime2 = date_create($now); // waktu sekarang
                            
                            $selisih  = date_diff($datetime1, $datetime2);

                            $aa = $selisih->d;

                            if($aa > $item->tb_judul_surat->masa_aktif)
                            {
                                $dataa = "Kadaluarsa";
                                $color = "danger";
                            }else {
                                $dataa = "Masih Aktif";
                                $color = "success";
                            }


                            @endphp

                                <td>
                                    <span class="badge bg-{{$color}}"> Hari Ke-{{$aa}}  | {{ $dataa }}</span>
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

        <form action="{{ route('kepala-operator.surat-aktif-kuliah.verif_diterima', $prodi->kode_prodi) }}" method="POST">
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
        <form action="{{ route('kepala-operator.surat-aktif-kuliah.verif_ditolak', $prodi->kode_prodi)}}" method="POST">
            @csrf {{ method_field('PATCH') }}
            <div class="modal-body">

                    <p class="text-center">
                        Perhatian !!!
                        Data surat yang ditolak mohon tinggal kan catatan yang jelas agar mudah dimengerti dan dipahami
                    </p>
                    <center>
                        <span class="badge bg-danger" >Silahkan tinggal catatan penolakan</span>
                    </center>

                    <textarea class="form-control mt-2"  id="editor" name="catatan_operator_prodi" cols="50" rows="3"> </textarea>
                    <input type="hidden" value="{{ $item2->npm}}" name="npm"> 

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">kembali</span>
                </button>
       
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block" >ditolak</span>
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
            <h5 class="modal-title" id="exampleModalCenterTitle"> Validasi diteirma {{ $catatan->tb_data_mahasiswa->nama}}
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



{{-- verif kepala operator --}}
@foreach($data as $kepala_operator)
<div class="modal fade" id="exampleModalTerimaKepOperator{{$kepala_operator->npm}}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
    role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle"> Validasi diterima {{ $kepala_operator->tb_data_mahasiswa->nama}}
            </h5>
            <button type="button" class="close" data-bs-dismiss="modal"
                aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>

        <form action="{{ route('kepala-operator.surat-aktif-kuliah.verif-kep-operator', $prodi->kode_prodi) }}" method="POST">
            @csrf 
            <div class="modal-body">
                    
               @if ($kepala_operator->operator_prodi != 'Y')
                    <p class="text-center">
                        Perhatian !!!
                        Data mahasiswa belum diverifikasi oleh operator prodi
                    </p>
                    <center>
                        <span class="badge bg-primary" >Silahkan verifikasi oleh operator prodi</span>
                    </center>
               @else
                    <p class="text-center">
                        Perhatian !!!
                        Silahkan cek data mahasiswa dengan benar untuk diverifikasi , selanjutnya menungu verifikasi dari pihak pemegang tanggung jawab (ttd persetejuan)
                    </p>
               @endif
                <input type="hidden" value="{{ $kepala_operator->npm}}" name="npm"> 
                
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Kembali</span>
                    </button>

                    @if ($kepala_operator->operator_prodi == 'Y')
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



@endsection