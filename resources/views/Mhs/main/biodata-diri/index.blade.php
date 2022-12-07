@extends('mhs.layout.layout')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms / </span> Biodata Diri</h4>

  <!-- Basic Layout & Basic with Icons -->
  <div class="row">
    <!-- Basic Layout -->

    @if($message = Session::get('successs'))
        <div class="autohide col-12 col-md-12 col-lg-12 order-0  mb-0 mt-4">
              <div class="alert alert-success  text-center">
                  {{$message}}
              </div>                  
      </div>
    @endif

    
      
    @if(Session::get('terdaftar') || Session::get('npm_terdaftar') )
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Silahkan perbarui data jika tidak sesuai</h5>
          </div>  

          <div class="card-body">  
              <form  action="{{ route('mhs.biodata.update', Session::get('npm'))}}" method="POST">
                @csrf @method('PATCH')
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-npm">NPM</label>
                  <div class="col-sm-10">
                    <input type="text"  name="npm" value="{{ Session::get('npm')}}" class="form-control" id="basic-default-npm" readonly />
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-nama">Nama</label>
                  <div class="col-sm-10">
                    <input type="text"  name="nama"   class="form-control @error('nama')is-invalid @enderror" id="basic-default-nama" />
                        @error('nama') 
                          <div class="invalid-feedback autohide">
                            {{ $message }}
                          </div>
                        @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-nama">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <input type="text" name="jenkel"  value="{{ Session::get('jenkel')}}" class="form-control" id="basic-default-nama" readonly />
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-tgllahir">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" name="tgl_lahir"  class="form-control @error('tgl_lahir')is-invalid @enderror" id="basic-default-tgllahir"  />
                          @error('tgl_lahir') 
                            <div class="invalid-feedback autohide">
                                {{ $message }}
                            </div>
                          @enderror
                  </div>
                </div>     

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                  <div class="col-sm-10">
                    <input type="text" name="email"  class="form-control @error('email')is-invalid @enderror" id="basic-default-email" placeholder="......@gmail.com"  />
                    <small class="text-danger d-flex mt-1" >Gunakan email yang aktif</small>
                      @error('email') 
                                                    <div class="invalid-feedback autohide">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                  </div>
                </div>

                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                  </div>
                </div>
              </form>

          </div>

        </div>
      </div>

      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">BIODATA DIRI </h5>
          </div>  

          <div class="card-body">  
            <form  action="{{ route('mhs.biodata.update', Session::get('npm'))}}" method="POST">
              @csrf @method('PATCH')
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-npm">NPM</label>
                  <div class="col-sm-10">
                    <input type="text"  name="npm" value="{{ Session::get('npm')}}" class="form-control" id="basic-default-npm" readonly />
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-nama">Nama</label>
                  <div class="col-sm-10">
                    <input type="text"  name="nama"  value="{{ Session::get('nama_terbaru')}}" class="form-control "  readonly/>
                        
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-nama">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <input type="text" name="jenkel"  value="{{ Session::get('jenkel')}}" class="form-control"  readonly />
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-tgllahir">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" name="tgl_lahir"  value="{{ Session::get('tgl_terbaru')}}" class="form-control" readonly  />
                        
                  </div>
                </div>     

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                  <div class="col-sm-10">
                    <input type="text" name="email" value="{{ Session::get('email')}}"  class="form-control" readonly  />
                  </div>
                </div> 
              </form>

          </div>

        </div>
      </div>
    </div>
    @else
    <div class="col-12 col-md-12 col-lg-8 order-3 order-md-2 mb-4">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Silahkan Melengkapi Biodata Diri</h5>
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
              <label class="col-sm-2 col-form-label" for="basic-default-nama">Nama</label>
              <div class="col-sm-10">
                <input type="text"  name="nama"  value="{{ Session::get('nama_lengkap')}}" class="form-control @error('nama')is-invalid @enderror" id="basic-default-nama" />
                    @error('nama') 
                      <div class="invalid-feedback autohide">
                        {{ $message }}
                      </div>
                    @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-nama">Jenis Kelamin</label>
              <div class="col-sm-10">
                <input type="text" name="jenkel"  value="{{ Session::get('jenkel')}}" class="form-control" id="basic-default-nama" readonly />
              </div>
            </div>
            
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-tgllahir">Tanggal Lahir</label>
              <div class="col-sm-10">
                <input type="date" name="tgl_lahir"  value="{{ Session::get('tgl_lahir')}}" class="form-control @error('tgl_lahir')is-invalid @enderror" id="basic-default-tgllahir"  />
                      @error('tgl_lahir') 
                        <div class="invalid-feedback autohide">
                            {{ $message }}
                        </div>
                      @enderror
              </div>
            </div>     

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
              <div class="col-sm-10">
                <input type="text" name="email" class="form-control @error('email')is-invalid @enderror" id="basic-default-email" placeholder="......@gmail.com"  />
                <small class="text-danger d-flex mt-1" >Gunakan email yang aktif</small>
                  @error('email') 
                                                <div class="invalid-feedback autohide">
                                                    {{ $message }}
                                                </div>
                                                @enderror
              </div>
            </div>
            {{-- <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-phone">No Hp</label>
              <div class="col-sm-10">
                <input
                  type="text"
                  id="basic-default-phone"
                  class="form-control phone-mask"
                  placeholder="658 799 8941"
                  aria-label="658 799 8941"
                  aria-describedby="basic-default-phone"
                />
              </div>
            </div> --}}


            
            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Kirim</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    @endif
    

    
  </div>
</div>
<!-- / Content -->



@endsection