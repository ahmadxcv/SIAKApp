<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin\Pengajuan;

use Auth;
use DB;
use PDF;

class AdminController extends Controller
{

	public function __construct(){

        $this->middleware('auth');
    }
    
    public function index()
    {
        $count2 = DB::select(
            DB::raw("SELECT * FROM pengajuans WHERE DATE(created_at) LIKE CURRENT_DATE"));
        $count3 = DB::select(
            DB::raw("SELECT * FROM pengajuans WHERE id_status LIKE 3"));
        $count4 = DB::select(
            DB::raw("SELECT * FROM pengajuans WHERE id_status LIKE 1 OR id_status like 2"));
        
        $data = array(
            'count1' => Pengajuan::count(),
            'count2' => count($count2),
            'count3' => count($count3),
            'count4' => count($count4),
        );
        return view('admin.dashboard', $data);
    }

    public function Pengajuan(){
        $q = DB::select(
            DB::raw(" SELECT a.*, b.nama AS nama_jenis, c.nama AS nama_status FROM pengajuans AS a INNER JOIN jenis AS b ON b.id = a.id_jenis INNER JOIN statuses AS c ON c.id = a.id_status"));
        $data = array('daftar' => $q, );

        return view('admin.listPengajuan',$data);
    }

    public function Jadwal(){
         $q = DB::select(
            DB::raw(" SELECT a.*, c.nama AS nama_status FROM jadwals AS a INNER JOIN statuses AS c ON c.id = a.id_status"));
        $data = array(
            'daftar' => $q,
        );
        return view('admin.listJadwal',$data);
    }
}
