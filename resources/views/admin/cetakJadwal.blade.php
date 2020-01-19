<html>
<head>
    <title>Laporan Jadwal</title>
</head>
<body>
    <style type="text/css">
        table tr td,
        table tr th{
            font-size: 9pt;
        }
    </style>
    <div class="text-left">
        <!-- <img src="{{ url('/public/img/logo.png') }}" width="46" height="46"> -->
    </div>
    <center>
        <h5>Laporan Jadwal</h4>
        <h6>Dinas Kependudukan dan Pencatatan Sipil Kabupaten Cianjur</h5>
            <hr>
    </center>

     		<table>
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
                <tfooter>
                    <div class="text-right">
                        <p> Cianjur, {{ \Carbon\Carbon::now()->format('d/m/Y') }} </p> 
                    </div>
                </tfooter>
     		</table>

</body>
</html>