@extends('mhs.layout.layout')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">History Surat /</span> rekaman pengajuan</h4>


  <!-- Basic Layout & Basic with Icons -->

    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Rekaman pengajuan surat</h5>
        </div>  

        <div class="card-body">
          <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">

                <div class="table-responsive text-nowrap">
                  <table  id="myTable" class="table-responsive table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Judul Surat</th>
                        <th>Status Operator Fakultas</th>
                        <th>Kepala Operator Fakultas</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($pengajuan as $item)
                      <tr>
                      
                            
                     
                        <td>{{ $loop->iteration }} </td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $item->tb_judul_surat->judul_surat }}</strong></td>

                          @if($item->operator_prodi == 'belum diverifikasi')
                           <td><span class="badge bg-label-warning me-1">Menunggu</span></td>
                           @elseif($item->operator_prodi == 'N')
                           <td><span class="badge bg-label-danger me-1">Ditolak</span></td>
                           @elseif($item->operator_prodi == 'Y')
                           <td><span class="badge bg-label-success me-1">Diterima</span></td>
                          @endif

                          @if($item->kepala_operator == 'belum diverifikasi')
                          <td><span class="badge bg-label-warning me-1">Menunggu</span></td>
                          @elseif($item->kepala_operator == 'N')
                          <td><span class="badge bg-label-danger me-1">Ditolak</span></td>
                          @elseif($item->kepala_operator == 'Y')
                          <td><span class="badge bg-label-success me-1">Diterima</span></td>
                         @endif



                        <td>
                          <a class="badge bg-label-primary "   data-bs-toggle="modal" data-bs-target="#edit_data{{ $item->npm }}">  <i class="fa fa-edit"> </i> Detail </a>  
                          
                          @if($item->status_persetujuan == 'Y')
                            <a class="badge bg-label-success "   data-bs-toggle="modal" data-bs-target="#show_data{{ $item->npm }}">  <i class="fa fa-eye"> </i> Print </a>          
                          @endif
                          
                        </td>

                      </tr>
                      @endforeach
                    
                    </tbody>
                  </table>
                </div>
              
            </div>
        </div>
      </div>
    </div>

  
</div>
<!-- / Content -->
@endsection

@push('prepend-script')
    <script> 
        $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
@endpush