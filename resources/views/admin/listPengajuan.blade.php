@extends('layouts.base')

@section('css')

@endsection

@section('content')

  <div class="container-fluid">
  <div class="fade-in">
     <div class="card" >
     	<div class="card-header" >
     		<i class="fa fa-align-justify"></i>{{ __('Daftar Pengajuan') }}
     	</div>
     	<div class="card-body" >
     		<table class="table table-responsive-sm table-striped" >
     			<thead>
     				<tr>
     					<th> Nomor </th>
                        <th> Nomor Pengajuan </th>
     					<th> Tanggal </th>
     					<th> NIK </th>
     					<th> Jenis Pengajuan </th>
     					<th> Status </th>
     					<th> Detail </th>
     				</tr>
     			</thead>
     			<tbody>
     				@foreach($daftar as $list)
     				<tr>
     					<td> {{ $list->id }} </td>
                        <td> {{ $list->no_pengajuan }} </td>
     					<td> {{ \Carbon\Carbon::parse ($list->created_at)->format('d/m/Y') }} </td>
     					<td> {{ $list->nik }} </td>
     					<td> {{ $list->nama_jenis }} </td>
     					<td> {{ $list->nama_status }} </td>
     					<td>
                        	<a href="{{ url('/detail/detail/' . $list->id.'/'.$list->id_jenis) }}" class="btn btn-block btn-primary">Rincian</a>
                      	</td>
     				</tr>
     				@endforeach
     			</tbody>
     		</table>
     	</div>
     </div>
  </div>
  </div>

@endsection

@section('javascript')

@endsection
