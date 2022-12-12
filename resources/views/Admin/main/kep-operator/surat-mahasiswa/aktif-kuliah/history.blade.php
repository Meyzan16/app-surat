
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
                           
                            @if ($item->operator_prodi == 'Y')
                            <td>
                                <span class="badge bg-success">disetujui</span>
                            </td>
                            @endif

                            @if ($item->kepala_operator == 'Y')
                            <td>
                                <span class="badge bg-success">disetujui</span>
                            </td>
                            @endif

                            @if ($item->status_persetujuan == 'Y')
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