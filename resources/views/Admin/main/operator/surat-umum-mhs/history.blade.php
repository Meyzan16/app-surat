
@extends('admin.layout.layout')

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Rekaman Surat Umum Mahasiswa</h3>

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
           
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NPM</th>
                            <th>Judul</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                            <th>Status Kep.Operator</th>
                            <th>Status Persetujuan</th>
                            <th>Masa Aktif</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->npm}}</td>
                            <td>{{ $item->tb_judul_surat->judul_surat}}</td>

                            <td>{{ $item->created_at}}</td>
                           
                            @if ($item->operator_prodi == 'belum diverifikasi' && $item->catatan_operator_prodi == null)
                                <td>
                                    <span class="badge bg-warning">Menunggu</span>
                                </td>
                            @elseif($item->operator_prodi == 'belum diverifikasi' && $item->catatan_operator_prodi != null)
                                <td>
                                    <span class="badge bg-warning">Menunggu Verifikasi Ulang</span>

                                    <a class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#exampleModalCatatan{{ $item->id }}">  <i class="fa fa-comment-dots"> </i>  </a>          
                                </td>
                            @elseif($item->operator_prodi == 'N')
                            <td>
                                <span class="badge bg-danger">Ditolak</span>
                                <a class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#exampleModalCatatan{{ $item->id }}">  <i class="fa fa-comment-dots"> </i>  </a>          
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
                            @else
                            <td>
                                <span class="badge bg-success">disetujui</span>
                            </td>
                            @endif

                            @php
                            $created = new DateTime($item->created_at);
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


@endsection 