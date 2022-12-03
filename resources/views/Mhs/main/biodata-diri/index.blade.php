@extends('mhs.layout.layout')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms / </span> Biodata Diri</h4>

  <!-- Basic Layout & Basic with Icons -->
  <div class="row">
    <!-- Basic Layout -->
    <div class="col-12 col-md-12 col-lg-8 order-3 order-md-2 mb-4">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Perbarui Data Jika Tidak Sesuai</h5>
        </div>  

        <div class="card-body">
          <form>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-npm">NPM</label>
              <div class="col-sm-10">
                <input type="text"  name="npm" value="{{ Session::get('npm')}}" class="form-control" id="basic-default-npm" readonly />
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-nama">Nama</label>
              <div class="col-sm-10">
                <input type="text"  name="nama"  value="{{ Session::get('nama_lengkap')}}" class="form-control" id="basic-default-nama" required />
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
                <input type="date" name="jenkel"  value="{{ Session::get('tgl_lahir')}}" class="form-control" id="basic-default-tgllahir"  />
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-smt">Semester</label>
              <div class="col-sm-10">
                <input type="text" name="semester" class="form-control" id="basic-default-smt" required />
              </div>
            </div>
            
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-smt">Masa Studi</label>
              <div class="col-sm-10">
                <input type="text" name="semester" class="form-control" id="basic-default-smt" placeholder="4 Sampai 7 Tahun" required />
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
              <div class="col-sm-10">
                <input type="email" name="email" class="form-control" id="basic-default-email" placeholder="......@gmail.com"  />
                <small class="text-danger d-flex mt-1" >Gunakan email yang aktif</small>
              </div>
            </div>




            <div class="row mb-3">
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
            </div>


            
            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Kirim</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- / Content -->



@endsection