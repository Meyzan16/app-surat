

@extends('admin.layout.layout')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Tujuan Yang Tidak Aktif</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Tujuan </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tidak Aktif</li>
                    </ol>
                </nav>
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

                <a href="{{ route('kep-operator.data-tujuan.trash') }}" class='sidebar-link'>
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
                            <th>Tanggal dinon-aktifkan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->deleted_at }}</td>    

                            <td>
                                    <a href="{{ route('kep-operator.data-tujuan.restore', $item->id) }}"  class="badge bg-success"><span data-feather="eye">Restore</span></a>
                            </td>
                            

                        
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <button type="button" class="mb-2 btn btn-warning" aria-label="Left Align" onclick="location.href='{{ route('data-tujuan.index') }}'">
                    <i class="fa fa-arrow-circle-left"> </i> Kembali
                </button>

            </div>
        </div>

    </section>
        

   
        
   

@endsection

