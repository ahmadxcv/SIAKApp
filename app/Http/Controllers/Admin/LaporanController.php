<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use DB;
use PDF;

class LaporanController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function Pengajuan(){
        $q = DB::select(
            DB::raw(" SELECT a.*, b.nama AS nama_jenis, c.nama AS nama_status FROM pengajuans AS a INNER JOIN jenis AS b ON b.id = a.id_jenis INNER JOIN statuses AS c ON c.id = a.id_status"));
        $data = array('daftar' => $q, );
        return view('admin.reportPengajuan',$data);
    }

    public function Jadwal(){
         $q = DB::select(
            DB::raw(" SELECT a.*, c.nama AS nama_status FROM jadwals AS a INNER JOIN statuses AS c ON c.id = a.id_status"));
        $data = array(
            'daftar' => $q,
        );
        return view('admin.reportJadwal',$data);
    }

    public function cetak_Pengajuan(Request $request){
        $day = $request->input('tanggal');
        $month = $request->input('bulan');
        $year = $request->input('tahun');
        
        $q = DB::table('pengajuans')
            ->join('statuses', 'statuses.id', '=', 'pengajuans.id_status')
            ->join('jenis', 'jenis.id', '=', 'pengajuans.id_jenis')
            ->select('pengajuans.*', 'statuses.nama AS nama_status','jenis.nama AS nama_jenis')
            ->get();

        $data = array('daftar' => $q, );

        $pdf = PDF::loadview('admin.cetakPengajuan',$data);
        // return $pdf->download('Laporan-Pengajuan-pdf');
        return $pdf->stream();
    }

    public function cetak_Jadwal(){
        $q = DB::select(
            DB::raw(" SELECT a.*, c.nama AS nama_status FROM jadwals AS a INNER JOIN statuses AS c ON c.id = a.id_status"));
        $data = array(
            'daftar' => $q,
        );

        $pdf = PDF::loadview('admin.cetakJadwal',$data);
        return $pdf->stream();
    }
}
