@extends('mhs.layout.layout')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">History Surat /</span> Perbaiki catatan</h4>


  <!-- Basic Layout & Basic with Icons -->

    <div class="col-8">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Data {{ $data->tb_judul_surat->judul_surat}}</h5>
        </div>  

        <div class="card-body">
            <div class="col-12 col-8 order-2 order-md-3 order-lg-2 mb-4">

                <form action="{{ route('surat-umum.diperbaiki-update', $data->id) }}" method="POST">
                    @csrf {{ method_field('PATCH') }}
                      <div class="modal-body">              
                        <div class="row">
                          
                            <div class="row mt-2">
                              <div class="col-md-4">
                                  <label>Tujuan Surat</label>
                              </div>
                              <div class="col-md-8 form-group">
                                <input type="text" value="{{ old('tujuan_surat', $data->tujuan_surat) }}" class="form-control @error('tujuan_surat')is-invalid @enderror"
                                name="tujuan_surat">
                                @error('tujuan_surat') 
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror 
                                      
                              </div>
                            </div>
        
                            
                            <div class="row mt-2">
                              <div class="col-md-4">
                                <label>Sub Tujuan</label>
                              </div>
                              <div class="col-md-8 form-group">
                                    <input type="text" value="{{ old('sub_tujuan', $data->sub_tujuan) }}" class="form-control @error('sub_tujuan')is-invalid @enderror"
                                                        name="sub_tujuan">
                                                        @error('sub_tujuan') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                              </div>
                            </div>


                            @if($data->judul_penelitian)
                                
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <label>Judul Penelitian</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" value="{{ old('judul_penelitian', $data->judul_penelitian) }}" class="form-control" required
                                        name="judul_penelitian">
                                        
                                    </div>
                                </div>
                            @endif
        
        
                            <div class="row mt-2">
                              <div class="col-md-4">
                                  <label>Isi Surat</label>
                              </div>
                              <div class="col-md-8 form-group">
                                <textarea requred class="form-control" name="isi_surat" id="editor" rows="3" required>{!! $data->isi_surat !!}</textarea>                    
                              </div>
                            </div>

                        </div>
                     
        
                        <div class="modal-footer">
                                <button type="submit"  class="btn btn-primary me-1 mb-1">
                                &nbsp;Simpan
                                </button>
          
                                <a href="{{ route('rekaman-pengajuan.surat_umum')}}" class="btn btn-secondary">
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
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script>
CKEDITOR.replace( 'editor' );
</script>  

@endpush