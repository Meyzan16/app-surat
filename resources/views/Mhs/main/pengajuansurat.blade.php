@extends('mhs.layout.layout')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengajuan Surat/</span> Pengajuan Surat</h4>

  <!-- Basic Layout & Basic with Icons -->
  <div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0"></h5>
        </div>
        <div class="card-body">
          <form>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Jenis Surat</label>
              <div class="col-sm-10">
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                  <option selected>Pilih Surat</option>
                    @foreach ($judul_surat as $item)
                      <option value="{{ $item->kode_jenis_surat }}"> {{ $item->tb_jenis_surat->jenis_surat }} | {{ $item->judul_surat }}</option>   
                     @endforeach
                </select>
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
    <!-- Basic with Icons -->
    
  </div>
</div>
<!-- / Content -->



@endsection