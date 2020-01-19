@extends('layouts.base')

@section('css')

@endsection

@section('content')

  <div class="container-fluid">
  <div class="fade-in">
     <div class="card">
     	<div class="card-header">
     		
     	</div>
     	<div class="card-body">
     		<fieldset>
     			<legend> Data Pengajuan </legend>
     			<div class="row">
                    <div class="col-4">
                        <label>Nomor Pengajuan</label>
                        <input type="text" name="" class="form-control" value="{{ $list->no_pengajuan }}" readonly>
                    </div>
                    <div class="col-4">
                        <label>Tanggal Pengajuan</label>
                        <input type="text" name="" class="form-control" value="{{ \Carbon\Carbon::parse ($list->tgl_pengajuan)->format('d/m/Y') }}" readonly>
                    </div>
                    <div class="col-4">    
                        <label>Jenis Pengajuan</label>
                        <input type="text" name="" class="form-control" value="{{ $list->nama_jenis }}" readonly>
                    </div>
                    <div class="col-6">
                        <label>NIK</label>
                        <input type="text" name="" class="form-control" value="{{ $list->nik }}" readonly>
                        
                        <label>Nama Lengkap</label>
                        <input type="text" name="" class="form-control" value="{{ $list->nama_lengkap }}" readonly>

                        <label>Nomor KK </label>
                        <input type="text" name="" class="form-control" value="{{ $list->no_kk }}" readonly>
                        
                        <label>Nama Kepala KK</label>
                        <input type="text" name="" class="form-control" value="{{ $list->kepala_kk }}" readonly>
                    </div>
                    <div class="col-6">
                        <label>Data Yang Diubah</label>
                        <input type="text" name="" class="form-control" value="{{ $list->ubah }}" readonly>
                        
                        <label>Data Lama</label>
                        <input type="text" name="" class="form-control" value="{{ $list->data_lama }}" readonly>
                        
                        <label>Data Baru</label>
                        <input type="text" name="" class="form-control" value="{{ $list->data_baru }}" readonly>
                        
                        <label>Keterangan</label>
                        <input type="text" name="" class="form-control" value="{{ $list->keterangan }}" readonly>
                    </div>        
                </div>					
     		</fieldset>
     		<fieldset>
     			<legend> Data Lampiran </legend>
                <div class="row">
                @foreach (json_decode($list2->alamat_file, true) as $image)
                <div class="col-md-3">
                <div class="thumbnail">
                    <img src="{{ asset('files/'.$list2->no_pengajuan.'/'.$image) }}"  class="img-thumbnail">
                </div>
                </div>
                @endforeach
                </div>
     		</fieldset>
     	</div>
     </div>

     <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card">
    <div class="card-header">
    <i class="fa fa-align-justify"></i> {{ __('Validasi Data Pengajuan') }}</div>
    <div class="card-body">
    
    <form method="POST" action="{{ route('saveValidasi') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <fieldset>
            <legend> Validasi Data </legend>
        <div class="form-group">
        <input type="text" name="no_pengajuan" class="form-control" value="{{ $list->no_pengajuan }}" hidden>
        <label for="no_kk">Update Status</label>
        <select class="form-control" name="id_status">
        <option selected="{{ $list->id_status }}">{{ $list->nama_status }}</option>
        @foreach($status as $status)
        <option value="{{ $status->id }}">{{ $status->nama }}</option>
        @endforeach
        </select>

        <label for="id_pengajuan">Catatan</label>
        <textarea class="form-control" id="catatan" name="catatan">
            
        </textarea>
        </div>
        <button type="submit" class="btn btn-primary"> Validasi </button>
        </fieldset>
        </form>

        </div>
        </div>
        </div>
        </div>
     
  </div>
  </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
@endsection
