<html>
<head>
    <title>Laporan Jadwal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <style type="text/css">
        table tr td,
        table tr th{
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Pengajuan</h4>
        <h6>Dinas Kependudukan dan Pencatatan Sipil Kabupaten Cianjur</h5>
    </center>
  <div class="container-fluid">
  <div class="fade-in">
     <div class="card" >
     	
     	<div class="card-body" >
     		<table class="table table-responsive-sm table-striped" >
     			<thead>
                    <tr>
                        <th> Nomor Pengajuan </th>
                        <th> Tanggal </th>
                        <th> NIK </th>
                        <th> Jenis Pengajuan </th>
                        <th> Status </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($daftar as $list)
                    <tr>
                        <td> {{ $list->no_pengajuan }} </td>
                        <td> {{ \Carbon\Carbon::parse ($list->created_at)->format('d/m/Y-H:m:i') }} </td>
                        <td> {{ $list->nik }} </td>
                        <td> {{ $list->nama_jenis }} </td>
                        <td> {{ $list->nama_status }} </td>
                    </tr>
                    @endforeach
                </tbody>
     		</table>
     	</div>
     </div>
  </div>
  </div>

</body>
</html>