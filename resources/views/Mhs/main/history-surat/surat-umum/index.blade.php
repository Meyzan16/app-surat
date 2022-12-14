@extends('mhs.layout.layout')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">History Surat /</span> Surat Umum</h4>


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
                        <th>Tanggal Pengajuan</th>
                        <th>Data</th>
                        <th>Status Operator</th>
                        <th>Status Kep.Operator</th>
                        <th>Status TTD Persetujuan</th>
                        <th>Masa Aktif</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($pengajuan as $item)
                      <tr>     
                     
                        <td>{{ $item->id }} </td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $item->tb_judul_surat->judul_surat }}</strong></td>
                        
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> {{ $item->created_at }}</td>

                        @if($item->tujuan_surat)
                        <td>                      
                          <span class="justify-content-center d-flex badge bg-success me-1"> Data Lengkap </span></td>
                        @else
                        <td>
                          <a href="{{ route('surat-umum.index', $item->id)}}">
                            <span class="justify-content-center d-flex badge bg-danger me-1"> Lengkapi Data </span></td>
                          </a>
                            
                        @endif

                          @if($item->tujuan_surat == NULL)
                            <td><span class="justify-content-center d-flex badge bg-label-warning me-1"> -- </span></td>
                          @elseif($item->operator_prodi == 'belum diverifikasi' && $item->catatan_operator_prodi == null)
                           <td><span class="badge bg-label-warning me-1">Menunggu</span></td>

                          @elseif($item->operator_prodi == 'belum diverifikasi' && $item->catatan_operator_prodi != null)
                             <td>
                              <span class="badge bg-label-warning me-1">Menunggu Verifikasi ulang</span>
                            </td>
                          
                          @elseif($item->operator_prodi == 'N')
                           <td>
                            <span class="badge bg-label-danger me-1">Ditolak</span>
                            <a class="badge bg-label-danger me-1" data-bs-toggle="modal" data-bs-target="#catatan{{$item->id}}"> Catatan  </a>          
                            
                            <a href="{{ route('surat-umum.diperbaiki', $item->id) }}" class="badge bg-label-warning me-1"> Edit  </a>          
                          
                            </td>
                          @elseif($item->operator_prodi == 'Y')
                           <td><span class="badge bg-label-success me-1">disetujui</span></td>
                          @endif


                          @if($item->tujuan_surat == NULL)
                          <td><span class="justify-content-center d-flex badge bg-label-warning me-1"> -- </span></td>
                          @elseif($item->kepala_operator == 'belum diverifikasi')
                          <td><span class="badge bg-label-warning me-1">Menunggu</span></td>
                          @elseif($item->kepala_operator == 'N')
                          <td><span class="badge bg-label-warning me-1">Menunggu</span></td>
                          @else
                          <td><span class="badge bg-label-success me-1">disetujui</span></td>
                          @endif

                       

                         <td>
                            @if($item->status_persetujuan == 'Y')
                                   <span class="badge bg-label-success me-1">disetujui</span>

                                    @php
                                    $created = new DateTime($item->created_at);
                                    $result = $created->format('d-m-Y');
        
                                    
                                    $datetime1 = date_create($result);
        
                                    $now = date('d-m-Y');
        
                                    $datetime2 = date_create($now); // waktu sekarang
                                    
                                    $selisih  = date_diff($datetime1, $datetime2);
        
                                    $aa = $selisih->d;
                                    @endphp

                               
                                    @if($aa < $item->tb_judul_surat->masa_aktif)
                                      <a href="{{ route('cetak.surat_umum_mhs', $item->id)}}" class="badge bg-label-primary" >  <i class="fa fa-eye"> </i> Print </a>          
                                    @endif
                                    
                            @elseif($item->tujuan_surat == NULL)
                            <span class="justify-content-center d-flex badge bg-label-warning me-1"> -- </span>
                            @elseif($item->status_persetujuan == 'belum diverifikasi')
                            <span class="badge bg-label-warning me-1">Menunggu disetujui</span>
                            @endif
                        </td>

                        @php
                        $created = new DateTime($item->created_at);
                        $result = $created->format('d-m-Y');

                        
                        $datetime1 = date_create($result);

                        $now = date('d-m-Y');

                        $datetime2 = date_create($now); // waktu sekarang
                        
                        $selisih  = date_diff($datetime1, $datetime2);

                        $aa = $selisih->d;

                        if($aa > 8)
                        {
                            $dataa = "Kadaluarsa";
                            $color = "danger";
                        }else {
                            $dataa = "Masih Aktif";
                            $color = "success";
                        }


                        @endphp
                        
                        <td>
                          
                          <a class="badge bg-label-{{$color}} "> Hari ke-{{$aa}} | {{ $dataa }} </a>          
                          
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
@foreach($pengajuan as $item2)
<div class="modal fade" id="catatan{{$item2->id}}" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
      role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle"> Catatan {{ $item2->tb_data_mahasiswa->nama}}
              </h5>
             
          </div>
  
              <div class="modal-body">              
                  <textarea readonly class="form-control mt-2" cols="50" rows="3"> {{ $item2->catatan_operator_prodi}} </textarea> 
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
@endforeach





@endsection

@push('prepend-script')
    <script> 
        $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
@endpush