

@extends('admin.layout.layout')

@section('content')
<div class="page-heading">
    <h3>Edit Data {{ $data->npm }}</h3>
</div>

<div class="page-content">
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Nama : {{ $data->tb_data_mahasiswa->nama }}</h4>
                    </div>

                    <div class="div">
                        @if(session()->has('success'))
                        <div class="autohide">
                            <div class="alert alert-success autohide" role="alert">
                             {{ session('success') }}
                            </div>    
                        </div>
                        @endif
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal mdi-responsive" action="{{route('operator.surat-aktif-kuliah.update', $data->npm)}}" method="POST" >
                                @csrf @method('PATCH')
                                <div class="form-body">
                                        <div class="row">
                                                <div class="col-md-4">
                                                    <label>Semester</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{ old('semester', $data->semester) }}" class="form-control @error('semester')is-invalid @enderror"
                                                        name="semester">
                                                        @error('semester') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror  
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Masa Studi</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{ old('masa_studi', $data->masa_studi) }}" class="form-control @error('masa_studi')is-invalid @enderror"
                                                        name="masa_studi">
                                                        @error('masa_studi') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                        
                                                </div>


                                                <div class="col-md-4">
                                                    <label>Nama Orangtua</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{ old('nama_ortu', $data->nama_ortu) }}" class="form-control @error('nama_ortu')is-invalid @enderror"
                                                        name="nama_ortu">
                                                        @error('nama_ortu') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                        
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Nip</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" maxlength="19" value="{{ old('nip', $data->nip) }}" onkeypress="return hanyaAngka(event)" class="form-control @error('nip')is-invalid @enderror"
                                                        name="nip">
                                                        @error('nip') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                        
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Golongan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{ old('golongan', $data->golongan) }}" class="form-control @error('golongan')is-invalid @enderror"
                                                        name="golongan">
                                                        @error('golongan') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                        
                                                </div>



                                                <div class="col-md-4">
                                                    <label>Pekerjaan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{ old('pekerjaan', $data->pekerjaan) }}" class="form-control @error('pekerjaan')is-invalid @enderror"
                                                        name="pekerjaan">
                                                        @error('pekerjaan') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                        
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Alamat</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{ old('alamat', $data->alamat) }}" class="form-control @error('alamat')is-invalid @enderror"
                                                        name="alamat">
                                                        @error('alamat') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                        
                                                </div>



                                                

                                            
                                                <div class="col-sm-12 d-flex justify-content-end">

                       
                                                    @if($data->kepala_operator != 'Y')
                                            
                                                            <button type="submit"  class="btn btn-primary me-1 mb-1"
                                                            >
                                                            &nbsp;Simpan
                                                            </button>
                                                        
                                                    @endif

                                                    <button type="reset" onclick="location.href='{{ route('operator.surat-aktif-kuliah.index') }}'"
                                                        class="btn btn-light-secondary me-1 mb-1">Kembali</button>
                                                
                                                </div>
                                        </div>

                                </div>
                            </form>

                           

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> 
@endsection

@push('addon-script')
<script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }
</script>   
@endpush







