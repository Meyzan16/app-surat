@extends('mhs.layout.layout')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengajuan Surat/</span>Surat Keteranga Lulus</h4>

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
            <label class="col-sm-2 col-form-label" for="basic-default-ipk">ipk</label>
            <div class="col-sm-10">
              <input type="text"  name="ipk" class="form-control" id="basic-default-ipk" required />
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