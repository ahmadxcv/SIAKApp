@extends('layouts.base')

@section('content')

<div class="container-fluid">
<div class="animated fadeIn">
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
<div class="card">
	<div class="card-header">
		<i class="fa fa-align-justify"></i> {{ __('Pengajuan Registrasi KK Baru') }}
	</div>

<div class="card-body">
<form method="POST" action="{{ route('simpanReg') }}" enctype="multipart/form-data" id="Formulir">
@csrf

<fieldset>
	<legend>Data Wilayah</legend>
	<div class="form-group" >
		<label for="id_pengajuan">Nomor Pengajuan</label>
		<input type="text" class="form-control" id="id_p" name="id_pengajuan" value="{{$id_p}}" readonly required>
	</div>
	<div class="form-group">
	<label>Kecamatan</label>
	<select class="form-control" name="id_kecamatan">
		@foreach($kecamatan as $kec)
			<option value="{{ $kec->id }}">{{ $kec->nama }}</option>
		@endforeach
	</select>
	</div>

	<div class="form-group">
	<label>Desa</label>
	<select class="form-control" name="id_desa">
		@foreach($desa as $des)
			<option value="{{ $des->id }}">{{ $des->nama }}</option>
		@endforeach
	</select>
	</div>
</fieldset>

<fieldset>
	<legend>Data Individu</legend>
	<div class="form-group">
	<label class="control-label" for="nama_lengkap">Nama Lengkap:</label>
	<input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" required>
	</div>

	<div class="form-group">
	<label class="control-label" for="alamatTS">Tempat Tinggal Sebelumnya:</label>
	<input type="text" class="form-control" name="tempat_tinggal_sebelumnya" id="alamatTS" placeholder="Alamat" required>
	</div>

	<div class="form-group">
	<label class="control-label" for="nopas">No. Paspor:</label>
	<input type="text" class="form-control" name="no_pasport" id="nopas" placeholder="No. Paspor" >
	</div>

	<div class="form-group">
	<label class="control-label" for="tglpas">Tanggal Berakhir Pasport:</label>
	<input type="date" class="form-control" name="tanggal_akhir_pasport" id="tglpas" placeholder="Tanggal Paspor">
	</div>

	<div class="form-group">
	<label class="control-label" for="JK">Jenis Kelamin:</label>
	<select class="form-control" name="jenis_kelamin" id="JK" placeholder="Jenis Kelamin" required>
		<option value="L">Laki- Laki</option>
		<option value= "P">Perempuan</option>
	</select>
	</div>

	<div class="form-group">
	<label class="control-label" for="KotaL">Tempat Lahir:</label>
	<input type="text" class="form-control" name="tempat_lahir" id="KotaL" placeholder="Kota Lahir" required>
	</div>

	<div class="form-group">
	<label class="control-label" for="tglL">Tanggal Lahir:</label>
	<input type="date" class="form-control" name="tanggal_lahir" id="tglL" placeholder="Tanggal Lahir" required>
	</div>

	<div class="form-group">
	<label class="control-label" for="noakta">No. Akta/ Surat Lahir:</label>
	<input type="text" class="form-control" name="no_akta" id="noakta" placeholder="Nomor Akta" required>
	</div>

	<div class="form-group">
	<label class="control-label" for="GolD">Golongan Darah:</label>
	<select class="form-control" name="golongan_darah" id="GolD" placeholder="Golongan Darah" required>
		<option value="A" >A</option>
		<option value="B" >AB</option>
		<option value="AB" >B</option>
		<option value="O" >O</option>
	</select>
	</div>

	<div class="form-group">
	<label class="control-label" for="StatusK">Status Perkawinan:</label>
	<select class="form-control" name="status_perkawinan" id="StatusK" placeholder="Status" required>
		<option value="Kawin" >Kawin</option>
		<option value="Duda/Janda">Duda/Janda</option>
		<option value="Belum Kawin">Belum Kawin</option>
	</select>
	</div>

	<div class="form-group">
	<label class="control-label" for="PencatatanK">Pencatatan Perkawinan:</label>
	<input type="text" class="form-control" name="no_surat_kawin" id="PencatatanK" placeholder="Nomor Pencatatan Percekawinan">
	</div>

	<div class="form-group">
	<label class="control-label" for="tglK">Tanggal Perkawinan:</label>
	<input type="date" class="form-control" name="tanggal_kawin" id="tglK" placeholder="Tanggal" >
	</div>

	<div class="form-group">
	<label class="control-label" for="PencatatanC">Pencatatan Perceraian:</label>
	<input type="text" class="form-control" name="no_surat_cerai" id="PencatatanC" placeholder="Pencatatan Perceraian">
	</div>

	<div class="form-group">
	<label class="control-label" for="tglC">Tanggal Perceraian:</label>
	<input type="date" class="form-control" name="tanggal_cerai" id="tglC" placeholder="Tanggal">
	</div>

	<div class="form-group">
	<label>Agama</label>
	<select class="form-control" name="id_agama">
		@foreach($agama as $religi)
			<option value="{{ $religi->id }}">{{ $religi->nama }}</option>
		@endforeach
	</select>
	</div>

	<div class="form-group">
	<label>Pekerjaan</label>
	<select class="form-control" name="id_pekerjaan">
		@foreach($pekerjaan as $work)
			<option value="{{ $work->id }}">{{ $work->nama }}</option>
		@endforeach
	</select>
	</div>

	<div class="form-group">
	<label>Pendidikan Terakhir</label>
	<select class="form-control" name="id_pendidikan">
		@foreach($pendidikan as $education)
			<option value="{{ $education->id }}">{{ $education->nama }}</option>
		@endforeach
	</select>
	</div>

	<div class="form-group">
	<label>Kelainan Fisik/Mental/Cacat</label>
	<select class="form-control" name="id_penyakit">
		@foreach($penyakit as $sickness)
			<option value="{{ $sickness->id }}">{{ $sickness->nama }}</option>
		@endforeach
	</select>
	</div>
</fieldset>

<fieldset>	
	<legend>Data Keluarga</legend>
	<div class="form-group">
	<label class="control-label" for="namaKK">Nama Kepala Keluarga:</label>
	<input type="text" class="form-control" name="kepala_kk" id="namaKK" placeholder="Nama Lengkap" required>
	</div>
	<div class="form-group">
	<label class="control-label" for="alamatKK">Alamat Keluarga:</label>
	<input type="text" class="form-control" name="alamat_keluarga" id="alamatKK" placeholder="alamat" required>
	</div>
	<div class="form-group">
	<label class="control-label" for="RTDK">RT:</label>
	<input type="text" class="form-control" name="rt_keluarga" id="RT" placeholder="RT" required>
	</div>
	<div class="form-group">
	<label class="control-label" for="RWDK">RW:</label>
	<input type="text" class="form-control" name="rw_keluarga" id="RW" placeholder="RW" required>
	</div>
	<div class="form-group">
	<label class="control-label" for="dusun">Dusun/Kampung/Dukuh:</label>
	<input type="text" class="form-control" name="desa_keluarga" id="dusun" placeholder="Kampung/Dusun" required>
	</div>
	<div class="form-group">
	<label class="control-label" for="KodePos">Kode Pos:</label>
	<input type="text" class="form-control" name="kode_pos_keluarga" id="KodePos" placeholder="Kode Pos" required>
	</div>
	<div class="form-group">
	<label class="control-label" for="telp">No. Telepon:</label>
	<input type="text" class="form-control" name="nomor_telepon_keluarga" id="telp" placeholder="Nomor Telepon" required>
	</div>
</fieldset>

<fieldset>
	<legend>Data Orang Tua</legend>
	<div class="form-group">
	<label class="control-label" for="NIKIbu">NIK Ibu:</label>
	<input type="text" class="form-control" name="nik_ibu" id="NIKIbu" placeholder="NIK" required>
	</div>
	<div class="form-group">
	<label class="control-label" for="NIKAyah">NIK Ayah:</label>
	<input type="text" class="form-control" name="nik_ayah" id="NIKAyah" placeholder="NIK" required>				
	</div>
	<div class="form-group">
	<label class="control-label" for="NamaIbu">Nama Lengkap Ibu:</label>
	<input type="text" class="form-control" name="nama_ibu" id="NamaIbu" placeholder="Nama Lengkap" required>
	</div>
	<div class="form-group">
	<label class="control-label" for="NamaAyah">Nama Lengkap Ayah:</label>
	<input type="text" class="form-control" name="nama_ayah" id="NamaAyah" placeholder="Nama Lengkap" required>
	</div>	
</fieldset>

	<fieldset>
		<legend> Data Pendukung </legend>
			
			<div class="custom-file">
			<input type="file" class="custom-file-input" name="file[]" id="customFile" multiple>
			<label class="custom-file-label" for="customFile">Choose file</label>
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