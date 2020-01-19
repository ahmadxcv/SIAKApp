<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;

class PendudukController extends Controller
{

	public function __construct(){

        $this->middleware('auth');
    }

	public function index(){

        return view('penduduk.dashboard');
    }

    public function pengajuan(){
    	$user_id = Auth::id();
        $q = DB::table('pengajuans')
        ->join('statuses', 'statuses.id', '=', 'pengajuans.id_status')
        ->join('jenis', 'jenis.id', '=', 'pengajuans.id_jenis')
        ->select('pengajuans.*', 'statuses.nama AS nama_status','jenis.nama AS nama_jenis')
        ->where('pengajuans.user_id',$user_id)->get()
        ;
        $data = array(
            'daftar' => $q,
        );
        return view('penduduk.pengajuan',$data);
    }

    public function jadwal(){
    	$user_id = Auth::id();
        $q = DB::table('jadwals')
        ->join('pengajuans', 'pengajuans.no_pengajuan', '=', 'jadwals.no_pengajuan')
        ->join('statuses', 'statuses.id', '=', 'pengajuans.id_status')
        ->select('jadwals.*','pengajuans.*', 'statuses.nama AS nama_status')
        ->where('pengajuans.user_id',$user_id)->get()
        ;
        $data = array(
            'daftar' => $q,
        );
        return view('penduduk.jadwal',$data);
    }

}
