@extends('mhs.layout.layout')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">History Surat /</span> Surat Aktif Kuliah</h4>


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
                        <th>Status Operator</th>
                        <th>Kepala Operator</th>
                        <th>Cetak Surat</th>
                        <th>Masa Aktif</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($pengajuan as $item)
                      <tr>
                      
                            
                     
                        <td>{{ $loop->iteration }} </td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $item->tb_judul_surat->judul_surat }}</strong></td>

                          @if($item->operator_prodi == 'belum diverifikasi' && $item->catatan_operator_prodi == null)
                           <td><span class="badge bg-label-warning me-1">Menunggu</span></td>
                          
                           @elseif($item->operator_prodi == 'belum diverifikasi' && $item->catatan_operator_prodi != null)
                             <td>
                              <span class="badge bg-label-warning me-1">Menunggu Verifikasi ulang</span>
                            </td>
                          
                           @elseif($item->operator_prodi == 'N')
                           <td>
                            <span class="badge bg-label-danger me-1">Ditolak</span>
                            <a class="badge bg-label-danger me-1" data-bs-toggle="modal" data-bs-target="#catatan{{$item->npm}}"> Catatan  </a>          
                            
                            <a href="{{ route('surat-masih-kuliah.diperbaiki', $item->id) }}" class="badge bg-label-warning me-1"> Edit  </a>          
                          
                          </td>
                           @elseif($item->operator_prodi == 'Y')
                           <td><span class="badge bg-label-success me-1">Diterima</span></td>
                          @endif



                          @if($item->kepala_operator == 'belum diverifikasi')
                          <td><span class="badge bg-label-warning me-1">Menunggu</span></td>
                          @else
                          <td><span class="badge bg-label-success me-1">Diterima</span></td>
                           @endif

                       

                        <td>
                          @if($item->status_persetujuan == 'Y')
                          <a class="badge bg-label-primary "   data-bs-toggle="modal" data-bs-target="#show_data{{ $item->npm }}">  <i class="fa fa-eye"> </i> Print </a>          
                          @elseif($item->status_persetujuan == 'belum diverifikasi')
                          <span class="badge bg-label-warning me-1">Menunggu disetujui</span>
                          @endif
                        </td>
                        
                        <td>
                          
                          <a class="badge bg-label-primary "   data-bs-toggle="modal" data-bs-target="#show_data">  <i class="fa fa-eye"> </i> {{ date('Y-m-d') }} </a>          
                          
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
<div class="modal fade" id="catatan{{$item->npm}}" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
      role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle"> Catatan {{ $item->tb_data_mahasiswa->nama}}
              </h5>
             
          </div>
  
              <div class="modal-body">              
                  <textarea readonly class="form-control mt-2" cols="50" rows="3"> {{ $item->catatan_operator_prodi}} </textarea> 
              </div>
              <div class="modal-footer">
                      <button type="button" class="btn btn-primary"
                          data-bs-dismiss="modal">
                          <i class="bx bx-x d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Kembali</span>
                      </button>
  
                      
                  
              </div>
      </div>
  </div>
</div>





@endsection

@push('prepend-script')
    <script> 
        $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
@endpush