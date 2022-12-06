@extends('mhs.layout.layout')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengajuan Surat/</span>Surat Masih Kuliah</h4>

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
        <form  action="{{ route('mhs.biodata.save')}}" method="POST">
          @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-npm">NPM</label>
            <div class="col-sm-10">
              <input type="text"  name="npm" value="{{ Session::get('npm')}}" class="form-control" id="basic-default-npm" readonly />
            </div>
          </div>
          
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-semester">semester</label>
            <div class="col-sm-10">
              <input type="text"  name="semester" class="form-control @error('semester')is-invalid @enderror" id="basic-default-npm" required />
              <small class="text-danger d-flex mt-1" >dalam tipe romawi*</small>
            </div>
            @error('semester') 
                          <div class="invalid-feedback autohide">
                            {{ $message }}
                          </div>
                        @enderror
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-masa_studi">masa studi</label>
            <div class="col-sm-10">
              <input type="text"  name="masa_studi" class="form-control @error('masa_studi')is-invalid @enderror" id="basic-default-masa_studi" required />
              <small class="text-danger d-flex mt-1" >dalam tipe romawi*</small>
            </div>
            @error('masa_studi') 
                          <div class="invalid-feedback autohide">
                            {{ $message }}
                          </div>
                        @enderror
          </div>


          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-nama_ortu">nama ortu</label>
            <div class="col-sm-10">
              <input type="text"  name="nama_ortu" class="form-control @error('nama_ortu')is-invalid @enderror" id="basic-default-nama_ortu" required />
              <small class="text-danger d-flex mt-1" >dalam tipe romawi*</small>
            </div>
            @error('nama_ortu') 
                          <div class="invalid-feedback autohide">
                            {{ $message }}
                          </div>
                        @enderror
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-pekerjaan">Pekerjaan</label>
            <div class="col-sm-10">
              <input type="text"  name="pekerjaan" class="form-control @error('pekerjaan')is-invalid @enderror" id="basic-default-pekerjaan" required />
              <small class="text-danger d-flex mt-1" >dalam tipe romawi*</small>
            </div>
            @error('pekerjaan') 
                          <div class="invalid-feedback autohide">
                            {{ $message }}
                          </div>
                        @enderror
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-alamat">Alamat</label>
            <div class="col-sm-10">
              <input type="text"  name="alamat" class="form-control @error('alamat')is-invalid @enderror" id="basic-default-alamat" required />
              <small class="text-danger d-flex mt-1" >dalam tipe romawi*</small>
            </div>
            @error('alamat') 
                          <div class="invalid-feedback autohide">
                            {{ $message }}
                          </div>
                        @enderror
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