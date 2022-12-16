

@extends('admin.layout.layout')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Akun Operator Yang Tidak Aktif</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Akun Operator </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tidak Aktif</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">

            </div>

            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Tanggal Prodi</th>
                            <th>Tanggal dinon-aktifkan</th>
                            <th>status</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->tb_prodi->nama_prodi }}</td>
                            <td>{{ $item->deleted_at }}</td>

                            @if($item->status_aktif == 'Y')
                                <td>
                                    <span class="badge bg-success" >AKTIF</span>
                                </td>  
                            @else 
                                <td>
                                    <span class="badge bg-danger"> TIDAK AKTIF</span>
                                </td>  
                            @endif

                            <td>
                                    {{-- aturan default resource tambahakan edit di belakang --}}
                                   

                                    <a href="{{ route('kep-operator.akun-operator.restore', $item->id) }}"  class="badge bg-success"><span data-feather="eye">Restore</span></a>
                            </td>
                            

                        
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <button type="button" class="mb-2 btn btn-warning" aria-label="Left Align" onclick="location.href='{{ route('akun-operator.index') }}'">
                    <i class="fa fa-arrow-circle-left"> </i> Kembali
                </button>

            </div>
        </div>

    </section>
        

   
        
   

@endsection

