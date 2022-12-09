@extends('mhs.layout.layout')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">History Surat /</span> Perbaiki catatan</h4>


  <!-- Basic Layout & Basic with Icons -->

    <div class="col-8">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Data {{ $item->tb_judul_surat->judul_surat}}</h5>
        </div>  

        <div class="card-body">
            <div class="col-12 col-8 order-2 order-md-3 order-lg-2 mb-4">

                <form action="{{ route('surat-masih-kuliah.diperbaiki-update', $item->id) }}" method="POST">
                    @csrf {{ method_field('PATCH') }}
                      <div class="modal-body">              
                        <div class="row">
                          
                            <div class="row mt-2">
                              <div class="col-md-4">
                                  <label>Semester</label>
                              </div>
                              <div class="col-md-8 form-group">
                                  <input type="text" value="{{ old('semester', $item->semester) }}" class="form-control @error('semester')is-invalid @enderror"
                                      name="semester">
                                      @error('semester') 
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                      
                              </div>
                            </div>
        
                            <div class="row mt-2">
        
                              <div class="col-md-4">
                                <label>Masa Studi</label>
                              </div>
                              <div class="col-md-8 form-group">
                                <input type="text" value="{{ old('masa_studi', $item->masa_studi) }}" class="form-control @error('masa_studi')is-invalid @enderror"
                                name="masa_studi">
                                @error('masa_studi') 
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                                @enderror
                                
                              </div>
                            </div>
        
        
                            <div class="row mt-2">
        
                              <div class="col-md-4">
                                  <label>Nama Orangtua</label>
                              </div>
                              <div class="col-md-8 form-group">
                                  <input type="text" value="{{ old('nama_ortu', $item->nama_ortu) }}" class="form-control @error('nama_ortu')is-invalid @enderror"
                                      name="nama_ortu">
                                      @error('nama_ortu') 
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                      
                              </div>
                            </div>
        
                            @if ($item->nip)
                                
                     
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <label>Nip</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" maxlength="19" value="{{ old('nip', $item->nip) }}" onkeypress="return hanyaAngka(event)" class="form-control @error('nip')is-invalid @enderror"
                                        name="nip">
                                        @error('nip') 
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                      @enderror 
                                </div>
                            </div>
        
        
                            <div class="row mt-2">
                              <div class="col-md-4">
                                  <label>Golongan</label>
                              </div>
                              <div class="col-md-8 form-group">
                                  <input type="text" value="{{ old('golongan', $item->golongan) }}" class="form-control @error('golongan')is-invalid @enderror"
                                      name="golongan">
                                      @error('golongan') 
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                      
                              </div>
                            </div>
        
                            @endif
        
        
                            <div class="row mt-2">
                              <div class="col-md-4">
                                  <label>Pekerjaan</label>
                              </div>
                              <div class="col-md-8 form-group">
                                  <input type="text" value="{{ old('pekerjaan', $item->pekerjaan) }}" class="form-control @error('pekerjaan')is-invalid @enderror"
                                      name="pekerjaan">
                                      @error('pekerjaan') 
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                              </div>
                            </div>
        
                            <div class="row mt-2">
                              <div class="col-md-4">
                                  <label>Alamat</label>
                              </div>
                              <div class="col-md-8 form-group">
                                  <input type="text" value="{{ old('alamat', $item->alamat) }}" class="form-control @error('alamat')is-invalid @enderror"
                                      name="alamat">
                                      @error('alamat') 
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror  
                              </div>
                            </div>
                      
                         
                        </div>
                     
        
                        <div class="modal-footer">
                                <button type="submit"  class="btn btn-primary me-1 mb-1">
                                &nbsp;Simpan
                                </button>
          
                                <a href="{{ route('rekaman-pengajuan.aktif-kuliah')}}" class="btn btn-secondary">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Kembali</span>
                                </a>
                        </div>

                      </div>
                  </form>
              
            </div>
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