@extends('layouts.base')

@section('css')

@endsection

@section('content')

  <div class="container-fluid">
  <div class="fade-in">
     <div class="card" >
     	<div class="card-header text-right" >
            <a href="{{ url('/cetak/jadwal') }}" class="btn btn-brand btn-behance">Cetak</a>     		
     	</div>
     	<div class="card-body" >
     		<table class="table table-responsive-sm table-striped" >
     			<thead>
     				<tr>
     					<th> Nomor Pengajuan </th>
     					<th> Tanggal Pengajuan </th>
     					<th> Jadwal </th>
     					<th> Nomor Antrian </th>
     					<th> Status </th>
     				</tr>
     			</thead>
     			<tbody>
     				@foreach($daftar as $list)
     				<tr>
     					<td> {{ $list->no_pengajuan }} </td>
     					<td> {{ $list->created_at }} </td>
     					<td> {{ \Carbon\Carbon::parse ($list->jadwal)->format('d/m/Y-H:m:i') }} </td>
     					<td> {{ $list->no_antrian }} </td>
     					<td> {{ $list->nama_status }} </td>
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

    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
@endsection
