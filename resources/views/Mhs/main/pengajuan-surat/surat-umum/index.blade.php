@extends('mhs.layout.layout')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengajuan Surat/</span> </h4>

  @if ($message = Session::get('successs'))
        <div class="autohide col-12 col-md-12 col-lg-12 order-0  mb-0 mt-4">
               <div class="alert alert-success  text-center">
                {{$message}}
               </div>                  
       </div>
      @endif

  <!-- Basic Layout & Basic with Icons -->
  <div class="col-12 col-md-12 col-lg-8 order-3 order-md-2 mb-4">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Silahkan Melengkapi Data Berikut</h5>
      </div>  

      <div class="card-body">
        <form  action="{{ route('surat-umum.update', $data->id}}" method="POST">
          @csrf @method('PATCH')
         

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-npm">Tujuan Surat</label>
            <div class="col-sm-10">
               <input type="text" name="tujuan_surat" class="form-control">
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-npm">Sub Tujuan Surat</label>
            <div class="col-sm-10">
                <input type="text" name="sub_tujuan" class="form-control" placeholder="Universitas Bengkulu" required>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-npm">Judul Penelitian</label>
            <div class="col-sm-10">
                <input type="text" name="judul_penelitian" class="form-control">
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-npm">Isi Surat</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="isi_surat" id="editor" rows="3" required></textarea>                                                  
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-npm">Tembusan</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="tembusan" id="editor1" rows="3" ></textarea>                                                  
            </div>
          </div>
          
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Ajukan</button>
            </div>
          </div>

            
        </form>
      </div>
    </div>
  </div>

  
</div>
<!-- / Content -->
@endsection


@push('addon-script')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script>
CKEDITOR.replace( 'editor' );
CKEDITOR.replace( 'editor1' );
</script>  
@endpush
