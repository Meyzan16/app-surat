

@extends('admin.layout.layout')

@section('content')
<div class="page-heading">
    <h3>Edit Data Surat {{ $data->tb_judul_surat->judul_surat }}</h3>
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
                            <form class="form form-horizontal mdi-responsive" action="{{route('operator.surat-umum-mhs.update', $data->id)}}" method="POST" >
                                @csrf @method('PATCH')
                                <div class="form-body">
                                        <div class="row">
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

                                                <div class="col-md-4">
                                                    <label>Sub Tujuan Surat</label>
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

                                                @if ($data->judul_penelitian)            
                                                    <div class="col-md-4">
                                                        <label>Judul Penelitian</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" value="{{ old('judul_penelitian', $data->judul_penelitian) }}" class="form-control" required
                                                            name="judul_penelitian">
                                                    </div>
                                                @endif


                                                <div class="col-md-4">
                                                    <label>Isi Surat</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                        <textarea requred class="form-control" name="isi_surat" id="editor" rows="3" required>{!! $data->isi_surat !!}</textarea>               
                                                        
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Tembusan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                        <textarea requred class="form-control" name="tembusan" id="editor1" rows="3" required>{!! $data->tembusan !!}</textarea>               
                                                        
                                                </div>

                                            
                                                <div class="col-sm-12 d-flex justify-content-end">

                       
                                                    @if($data->kepala_operator != 'Y')
                                            
                                                            <button type="submit"  class="btn btn-primary me-1 mb-1"
                                                            >
                                                            &nbsp;Simpan
                                                            </button>
                                                        
                                                    @endif

                                                    <button type="reset" onclick="location.href='{{ route('operator.surat-umum-mhs.index') }}'"
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

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script>
CKEDITOR.replace( 'editor' );
CKEDITOR.replace( 'editor1' );
</script>  


@endpush







