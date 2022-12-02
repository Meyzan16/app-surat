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

      @if (Session::get('error_belum_daftar'))
        <div class="autohide col-12 col-md-12 col-lg-12 order-0  mb-0 mt-4">
               <div class="alert alert-danger alert-block text-center">
                  SILAHKAN MELENGKAPI BIODATA DIRI
               </div>                  
       </div>
     @endif


    </div>

 
    <!-- Total Revenue -->
    <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
      <div class="card">
        <h5 class="card-header">Informasi Proses Pengajuan</h5>
        <div class="table-responsive text-nowrap">
          <table class="table table-borderless">
            <thead>
              <tr>
                <th>Project</th>
                <th>Client</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong></td>
                <td>Albert Cook</td>
              
                <td><span class="badge bg-label-primary me-1">Active</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                      >
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="bx bx-trash me-1"></i> Delete</a
                      >
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>React Project</strong></td>
                <td>Barry Hunter</td>
                
                <td><span class="badge bg-label-success me-1">Completed</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                      >
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="bx bx-trash me-1"></i> Delete</a
                      >
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td><i class="fab fa-vuejs fa-lg text-success me-3"></i> <strong>VueJs Project</strong></td>
                <td>Trevor Baker</td>
               
                <td><span class="badge bg-label-info me-1">Scheduled</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                      >
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="bx bx-trash me-1"></i> Delete</a
                      >
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Bootstrap Project</strong>
                </td>
                <td>Jerry Milton</td>
               
                <td><span class="badge bg-label-warning me-1">Pending</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                      >
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="bx bx-trash me-1"></i> Delete</a
                      >
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
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
                        <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                      </div>
                      <div class="mt-sm-auto">
                        <small class="text-success text-nowrap fw-semibold"
                          ><i class="bx bx-chevron-up"></i> 68.2%</small
                        >
                        <h3 class="mb-0">$84,686k</h3>
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
                    <h5 class="text-nowrap mb-2">Biodata Diri</h5>
                    <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                  </div>
                  <div class="mt-sm-auto">
                    <small class="text-success text-nowrap fw-semibold"
                      ><i class="bx bx-chevron-up"></i> 68.2%</small
                    >
                    <h3 class="mb-0">$84,686k</h3>
                  </div>
                </div>
              
              </div>
            </div>
          </div>
        </div>
     
        <div class="col-12 col-md-6 col-lg-3 order-3 order-md-2 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                  <div class="card-title">
                    <h5 class="text-nowrap mb-2">Informasi Verifaktor Prodi</h5>
                    <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                  </div>
                  <div class="mt-sm-auto">
                    <small class="text-success text-nowrap fw-semibold"
                      ><i class="bx bx-chevron-up"></i> 68.2%</small
                    >
                    <h3 class="mb-0">$84,686k</h3>
                  </div>
                </div>
              
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3 order-3 order-md-2 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                  <div class="card-title">
                    <h5 class="text-nowrap mb-2">History Pengajuan Surat</h5>
                    <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                  </div>
                  <div class="mt-sm-auto">
                    <small class="text-success text-nowrap fw-semibold"
                      ><i class="bx bx-chevron-up"></i> 68.2%</small
                    >
                    <h3 class="mb-0">$84,686k</h3>
                  </div>
                </div>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>

</div>


@endsection