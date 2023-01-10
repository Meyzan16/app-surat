

@extends('admin.layout.layout')

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Data Surat Umum</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Surat Umum </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a class="badge bg-primary" href="{{ route('operator.surat-umum.index')}}" > Kembali </a>
            </div>
            <div class="card-body">
                <div class="form-body">
                    <form action="{{ route('operator.surat-umum.update', $data->id)}}" method="POST">
                        @csrf @method('patch')

                        <div class="row">
                            <div class="col-md-2">
                                <label>Lampiran</label>
                            </div>
                            <div class="col-md-10 form-group">
                               <select name="id_lampiran" class="form-control" required>
                                    @foreach ($lampiran as $item)
                                        @if(old('id_lampiran', $item->id) == $data->id )
                                            <option value="{{ $item->id }}" selected>{{ $item->judul_lampiran }}</option>      
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->judul_lampiran }}</option>    
                                        @endif
                                    @endforeach
                               </select>
                            </div>
                            
                            <div class="col-md-2">
                                <label>Perihal</label>
                            </div>
                            <div class="col-md-10 form-group">
                               <select name="id_judul_surat" class="form-control" required>
                                    @foreach ($perihal as $item)
                                        @if(old('id', $item->id) == $data->id_judul_surat )
                                            <option value="{{ $item->id }}" selected>{{ $item->judul_surat }}</option>      
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->judul_surat }}</option>    
                                        @endif
                                    @endforeach
                            
                               </select>
                            </div>

                       
                            <div class="col-md-2">
                                    <label>Tujuan Surat</label>
                            </div>
                            <div class="col-md-6 form-group">
                                  <select name="id_tujuan" class="form-control" required>
                                       @foreach ($tujuan as $item)
                                           @if(old('id_tujuan', $item->id) == $data->id )
                                               <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>      
                                           @else
                                               <option value="{{ $item->id }}">{{ $item->nama }}</option>    
                                           @endif
                                       @endforeach
                                  </select>
                            </div>
                            <div class="col-md-4 form-group">
                                    <input type="text" name="sub_tujuan" class="form-control" value="{{ $data->sub_tujuan }}">
                            </div>
                        


                            <div class="col-md-2">
                                <label>Isi Surat</label>
                            </div>
                            <div class="col-md-10 form-group">                                                 
                                <textarea class="form-control" name="isi_surat" id="editor" rows="3" required> {!! $data->isi_surat !!} </textarea>                                                  
                            </div>

                            <div class="col-md-2">
                                <label>Tembusan</label>
                            </div>
                            <div class="col-md-8 form-group">                                                 
                                <textarea class="form-control" name="tembusan" id="editor1" cols="2"> {!! $data->tembusan !!} </textarea>  
                                <h6 class="text-danger d-flex mt-1" >kosongkan jika tidak ada*</small>                                             
                            </div>


                           
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit"  class="btn btn-primary me-1 mb-1">
                                &nbsp;Simpan
                                </button>
                              

                                <a  href="{{ route('operator.surat-umum.index') }}"
                                    class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                            </div>

                            
                        </div>
                    </form>

                </div>       
        </div>
        </div>
    </section>
@endsection

    @push('addon-script')
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

        <script>
        CKEDITOR.replace( 'editor' );
        CKEDITOR.replace( 'editor1' );
        </script>
    @endpush


