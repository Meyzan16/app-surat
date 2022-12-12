@extends('mhs.layout.layout')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-7">
            <div class="card-body">
              <h5 class="card-title text-primary">SELAMAT DATANG {{Session::get('nama_lengkap')}} | {{Session::get('terdaftar') }} 🎉</h5>
              <p class="mb-4">
                Website ini merupakan terobosan baru dari fakultas <span class="fw-bold">Matematika dan Ilmu Pengetahuan Alam </span>
                dalam mempermudah proses kebutuhan surat menyurat mahasiswa
              </p>



            </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img
                src="/template-siswa/assets/img/illustrations/man-with-laptop-light.png"
                height="140"
                alt="View Badge User"
                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                data-app-light-img="illustrations/man-with-laptop-light.png"
              />
            </div>
          </div>
        </div>
      </div>
    </div>

 
    <!-- Total Revenue -->
    <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Informasi Proses Pengajuan</h5>
        </div>  

        <div class="card-body">
          <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">

                <div class="table-responsive text-nowrap">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Judul Surat</th>
                        @if( empty($cek_surat_msh_kuliah) )
                          <th>Status</th>
                         
                        @elseif($cek_surat_msh_kuliah->semester == null)
                           <th>Status</th>
                           <th>Aksi</th>
                        @elseif($cek_surat_msh_kuliah->semester )
                          <th>Status Operator</th>
                          <th>Status Kepala Operator</th>
                          <th>Status TTD Persetujuan</th>
                        @endif()
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($pengajuan as $item)
                      <tr>                       
                     
                        <td>{{ $item->id }} </td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $item->tb_judul_surat->judul_surat }}</strong></td>

                        @if( $cek_surat_msh_kuliah->semester  )
                          
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
                            <td><span class="badge bg-label-warning me-1">Menunggu</span></td>
                            @else
                            <td><span class="badge bg-label-success me-1">Diterima</span></td>
                            @endif

                            @if($item->status_persetujuan == 'belum diverifikasi')
                            <td><span class="badge bg-label-warning me-1">Menunggu</span></td>
                            @else
                            <td><span class="badge bg-label-success me-1">Diterima</span></td>
                            @endif

                            
                        @elseif($cek_surat_msh_kuliah->semester == null)

                          <td> 
                            <a href="{{route('pengajuan-index')}}">
                              <span class="badge bg-label-primary me-1">Belum Melengkapi Data</span>
                            </a>
                          </td>

                          <td> 
                            <form action="{{route('surat-masih-kuliah.delete', $item->npm)}}" method="POST">
                              @csrf @method('delete')
                              <button type="submit" class="d-inline">
                                <span class="badge bg-label-danger me-1">Hapus</span>
                              </button>
                            </form>
                           
                          </td>

                        @endif
                        
                        </tr>
                        @endforeach
                    
                    </tbody>
                  </table>
                </div>
              
            </div>
        </div>
      </div>
    </div>

    <!--/ Total Revenue -->
    <div class="col-12">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-3 order-3 order-md-2 mb-4">
            <a href="{{ route('pengajuan-index') }}" >
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                    <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                      <div class="card-title">
                        <h5 class="text-nowrap mb-2">Pengajuan Surat</h5>
                        <span class="badge bg-label-warning rounded-pill">Proses Pengajuan</span>
                      </div>
                      <div class="mt-sm-auto">
                        {{-- <small class="text-success text-nowrap fw-semibold"
                          ><i class="bx bx-chevron-up"></i> 68.2%</small
                        > --}}
                        {{-- <h3 class="mb-0">$84,686k</h3> --}}
                      </div>
                    </div>
                  
                  </div>
                </div>
              </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-3 order-3 order-md-2 mb-4">
          <a href="{{ route('mhs.biodata-diri.index') }}" >
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                  <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                    <div class="card-title">
                      <h5 class="text-nowrap mb-2">Biodata Diri</h5>
                      @if($tb_data_mahasiswa)
                        
                        <span class="badge bg-label-success rounded-pill">Sudah dilengkapi</span>
                      @else
                        
                        <span class="badge bg-label-warning rounded-pill">Belum Melengkapi</span>
                      @endif
                      
                    </div>
                    <div class="mt-sm-auto">
                      {{-- @if($tb_data_mahasiswa)
                        <small class="text-success text-nowrap fw-semibold"
                          ><i class="bx bx-chevron-up"></i>Sudah dilengkapi</small
                        >
                      @else
                        <small class="text-danger text-nowrap fw-semibold"
                          ><i class="bx bx-chevron-up"></i>Belum Melengkapi</small
                        >
                      @endif --}}
                     
                    </div>
                  </div>
                
                </div>
              </div>
            </div>
          </a>
        </div>
     
        <div class="col-12 col-md-6 col-lg-3 order-3 order-md-2 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                  <div class="card-title">
                    <h5 class="text-nowrap mb-2">Informasi Operator Prodi</h5>
                    <span class="badge bg-label-warning rounded-pill">Narasumber penghubung</span>
                  </div>
                  <div class="mt-sm-auto">
                    {{-- <small class="text-success text-nowrap fw-semibold"
                      ><i class="bx bx-chevron-up"></i> 68.2%</small
                    > --}}
                    {{-- <h3 class="mb-0">$84,686k</h3> --}}
                  </div>
                </div>
              
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3 order-3 order-md-2 mb-4">
          <a href="{{ route('rekaman-pengajuan.aktif-kuliah') }}" >
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                  <div class="card-title">
                    <h5 class="text-nowrap mb-2">History Pengajuan Surat</h5>
                    <span class="badge bg-label-success rounded-pill">{{ $count_aktif_kuliah; }} Data Aktif </span>
                  </div>
                  <div class="mt-sm-auto">
                    <small class="text-success text-nowrap fw-semibold"
                      {{-- ><i class="bx bx-chevron-up"></i> {{ $count_aktif_kuliah; }} Data Aktif </small --}}
                    > 
                  </div>
                </div>
              
              </div>
            </div>
          </div>
          </a>
        </div>
      </div>
    </div>
    
  </div>

</div>


@endsection

