@extends('layouts.base')

@section('css')
	
@endsection

@section('content')

<div class="container-fluid">
<div class="animated fadeIn">
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
	<div class="card">
	<div class="card-header">
	<i class="fa fa-align-justify"></i> {{ __('Pengajuan Perubahan Data KK') }}</div>
	<div class="card-body">
	<form method="POST" action="{{ route('simpanEdit') }}" enctype="multipart/form-data" id="Formulir">
		@csrf
		<fieldset>
			<legend> Data Pengaju </legend>
		<div class="form-group">
			<label for="id_pengajuan">Nomor Pengajuan</label>
			<input type="text" class="form-control" id="id_p" name="id_pengajuan" value="{{$id_p}}" readonly required>
		</div>

		<div class="form-group">
			<label for="no_kk">Nomor KK</label>
			<input type="text" class="form-control" id="no_kk" placeholder="Nomor KK" name="no_kk" required>
		</div>

		<div class="form-group">
			<label for="kepala_kk">Nama Kepala KK</label>
			<input type="text" class="form-control" id="kepala_kk" placeholder="Nama Kepala KK" name="kepala_kk" required>
		</div>

		<div class="form-group">
			<label for="nik">NIK</label>
			<input type="text" class="form-control" id="nik" placeholder="Enter NIK" name="nik" required>
		</div>

		<div class="form-group">
			<label for="nama">Nama Lengkap</label>
			<input type="text" class="form-control" id="nama_lengkap" placeholder="Enter NIK" name="nama_lengkap" required>
		</div>

		<div class="form-group">
			<label>Alasan Penggantian</label>
			<select class="form-control" name="id_alasan">
				@foreach($alasans as $alasan)
				<option value="{{ $alasan->id }}">{{ $alasan->nama }}</option>
				@endforeach
			</select>
		</div>

		</fieldset>
		<fieldset>
		<legend> Data Pengajuan </legend>
			<div class="form-group">
			<label for="ubah">Jenis</label>
			<input type="text" class="form-control" id="ubah" placeholder="Contoh: Nama, Alamat" name="ubah" required>
			</div>Contoh

			<div class="form-group">
			<label for="data_lama">Data lama</label>
			<input type="text" class="form-control" id="data_lama" placeholder="Contoh: Riska, Kawali" name="data_lama" required>
			</div>

			<div class="form-group">
				<label for="data_baru">Data Baru</label>
				<input type="text" class="form-control" id="data_baru" placeholder="Contoh: Siska, Ciamis" name="data_baru" required>
			</div>

		</fieldset>
		<fieldset>
		<legend> Data Pendukung </legend>
			<div class="custom-file">
			<input type="file" class="custom-file-input" name="file[]" id="customFile" multiple>
			<label class="custom-file-label" for="customFile">Choose file</label>
			</div>

			</div>
		</fieldset>
		
		<div class="text-right">
			<button class="btn btn-success" type="submit">{{ __('Ajukan') }}</button>
			<a href="/dashboard/penduduk" class="btn btn-primary">{{ __('Kembali') }}</a>			
		</div>
	</form>
	</div>
	</div>
	</div>
</div>
</div>
</div>

@endsection

@section('javascript')
	<script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script> 
	<script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/messages_id.min.js') }}"></script>
    <script>
    	$("#Formulir").validate(
    		{
    			highlight: function(element) {
		        $(element).closest('.form-group').find(".form-control:first").addClass('is-invalid');
		    },
		    unhighlight: function(element) {
		        $(element).closest('.form-group').find(".form-control:first").removeClass('is-invalid');
		        $(element).closest('.form-group').find(".form-control:first").addClass('is-valid');

		    },
		    errorElement: 'span',
		    errorClass: 'invalid-feedback',
		    errorPlacement: function(error, element) {
		        if(element.parent('.input-group').length) {
		            error.insertAfter(element.parent());
		        } else {
		            error.insertAfter(element);
		        }
		    }
    		});
    </script>
@endsection