

@extends('admin.layout.layout')
@section('content')
<div id="main-content">
    <div class="page-heading">
        <h3>Data Perihal Surat Yang Tidak Aktif</h3>
    </div>


    <div class="page-content">
            <section class="section">
                <div class="card">
                    <div class="card-header text-right">

                    </div>


                    

                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Perihal</th>
                                    <th>Tanggal dinon-aktifkan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->namao }}</td>
                                    <td>{{ $item->deleted_at }}</td>    

                                    <td>
                                            <a href="{{ route('kep-operator.data-perihal.restore', $item->id) }}"  class="badge bg-success"><span data-feather="eye">Restore</span></a>
                                    </td>
                                    

                                
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <button type="button" class="mb-2 btn btn-warning" aria-label="Left Align" onclick="location.href='{{ route('data-lampiran.index') }}'">
                            <i class="fa fa-arrow-circle-left"> </i> Kembali
                        </button>

                    </div>
                </div>
        </section>
    </div>
        
   

@endsection

