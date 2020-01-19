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
                    @foreach ($daftar as $list)
                    <div class="col-4">
                        <label>Nomor Pengajuan</label>
                        <input type="text" name="no_pengajuan" class="form-control" value="{{ $list->no_pengajuan }}" readonly>
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
                        <legend>Data Wilayah</legend>
                        <label>Kecamatan</label>
                        <input type="text" name="" class="form-control" value="{{ $list->nama_kecamatan }}" readonly>

                        <label>Desa </label>
                        <input type="text" name="" class="form-control" value="{{ $list->nama_desa }}" readonly>

                        <legend>Data Individu</legend>
                        <label>NIK</label>
                        <input type="text" name="" class="form-control" value="{{ $list->nik }}" readonly>

                        <label>Nama Lengkap</label>
                        <input type="text" name="" class="form-control" value="{{ $list->nama_lengkap }}" readonly>

                        <label>Tempat Tinggal</label>
                        <input type="text" name="" class="form-control" value="{{ $list->tempat_tinggal_sebelumnya }}" readonly>

                        <label>Nomor Pasport</label>
                        <input type="text" name="" class="form-control" value="{{ $list->no_pasport }}" readonly>

                        <label>Tanggal Akhir Pasport </label>
                        <input type="text" name="" class="form-control" value="{{ $list->tanggal_akhir_pasport }}" readonly>

                        <label>Jenis Kelamin</label>
                        <input type="text" name="" class="form-control" value="{{ $list->jenis_kelamin }}" readonly>

                        <label>Tempat Lahir</label>
                        <input type="text" name="" class="form-control" value="{{ $list->tempat_lahir }}" readonly>

                        <label>Tanggal Lahir</label>
                        <input type="text" name="" class="form-control" value="{{ $list->tanggal_lahir }}" readonly>

                        <label>Nomor Akta Kelahiran</label>
                        <input type="text" name="" class="form-control" value="{{ $list->no_akta }}" readonly>

                        <label>Golongan Darah</label>
                        <input type="text" name="" class="form-control" value="{{ $list->golongan_darah }}" readonly>

                        <label>Status Perkawinan </label>
                        <input type="text" name="" class="form-control" value="{{ $list->status_perkawinan }}" readonly>

                        <label>Nomor Surat Perkawinan</label>
                        <input type="text" name="" class="form-control" value="{{ $list->no_surat_kawin }}" readonly>

                        <label>Tanggal Perkawinan</label>
                        <input type="text" name="" class="form-control" value="{{ $list->tanggal_kawin }}" readonly>

                        <label>Nomor Surat Perceraian</label>
                        <input type="text" name="" class="form-control" value="{{ $list->no_surat_cerai }}" readonly>

                        <label>Tanggal Perceraian</label>
                        <input type="text" name="" class="form-control" value="{{ $list->tanggal_cerai }}" readonly>

                    </div>
                    <div class="col-6">
                        <legend>Data Individu</legend>
                        <label>Agama</label>
                        <input type="text" name="" class="form-control" value="{{ $list->nama_agama }}" readonly>

                        <label>Pekerjaan</label>
                        <input type="text" name="" class="form-control" value="{{ $list->nama_pekerjaan }}" readonly>

                        <label>Pendidikan</label>
                        <input type="text" name="" class="form-control" value="{{ $list->nama_pendidikan }}" readonly>

                        <label>Penyakit</label>
                        <input type="text" name="" class="form-control" value="{{ $list->nama_penyakit }}" readonly>

                        <legend>Data Keluarga</legend>
                        
                        <label>Nama Kepala KK</label>
                        <input type="text" name="" class="form-control" value="{{ $list->kepala_kk }}" readonly>

                        <label>ALamat</label>
                        <input type="text" name="" class="form-control" value="{{ $list->alamat_keluarga }}" readonly>

                        <label>RT</label>
                        <input type="text" name="" class="form-control" value="{{ $list->rt_keluarga }}" readonly>

                        <label>RW</label>
                        <input type="text" name="" class="form-control" value="{{ $list->rw_keluarga }}" readonly>

                        <label>Desa/Dusun/Kelurahan</label>
                        <input type="text" name="" class="form-control" value="{{ $list->desa_keluarga }}" readonly>

                        <label>Kode Pos</label>
                        <input type="text" name="" class="form-control" value="{{ $list->kode_pos_keluarga }}" readonly>

                        <label>Nomor HP/Telepon</label>
                        <input type="text" name="" class="form-control" value="{{ $list->nomor_telepon_keluarga }}" readonly>

                        <legend>Data Orangtua</legend>
                        <label>NIK IBU</label>
                        <input type="text" name="" class="form-control" value="{{ $list->nik_ibu }}" readonly>

                        <label>Nama IBU</label>
                        <input type="text" name="" class="form-control" value="{{ $list->nama_ibu }}" readonly>

                        <label>NIK Ayah</label>
                        <input type="text" name="" class="form-control" value="{{ $list->nik_ayah }}" readonly>

                        <label>Nama Ayah</label>
                        <input type="text" name="" class="form-control" value="{{ $list->nama_ayah }}" readonly>

                        <label>Keterangan</label>
                        <input type="text" name="" class="form-control" value="{{ $list->keterangan }}" readonly>
                    </div>
                    @endforeach        
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
