
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
                                <h5 class="text-center" > Data History {{ $prodi->nama_prodi}} </h5>
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
                            <th>Tanggal dibuat</th>
                            <th>Status Operator</th>
                            <th>Status Kep.Operator</th>
                            <th>Status ttd</th>
                            <th>Masa Aktif 8 Hari</th>
                      

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->npm}}</td>
                            <td>{{ $item->tb_data_mahasiswa->nama}}</td>

                            @php
                                $datenow = $item->created_at;
                                $kon = date_format($datenow, 'd-M-Y')   
                            @endphp

                                <td>
                                    <span class="badge bg-primary">{{ $kon }}</span>
                                </td>
                          


                            @if ($item->operator_prodi == 'Y')
                            <td>
                                <span class="badge bg-success">Diterima</span>
                            </td>
                            @endif                      

                            @if ($item->kepala_operator == 'Y') 
                            <td>
                                <span class="badge bg-success">Diterima</span>
                            </td>
                            @endif


                            @if ($item->status_persetujuan == 'Y')
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

                            if($aa > 8)
                            {
                                $dataa = "Kadaluarsa";
                            }else {
                                $dataa = "Masih Aktif";
                            }


                            @endphp

                                <td>
                                    <span class="badge bg-primary">Hari Ke-{{$aa}}  | {{ $dataa }} </span>
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






@endsection