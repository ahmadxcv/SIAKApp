<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Pengajuan;
use App\Models\Admin\Jadwal;

use Carbon\Carbon;

use Auth;
use DB;

class DetailController extends Controller
{
    
	public function __construct(){

        $this->middleware('auth');
    }

    public function Jenis($id, $id_jenis){
        if($id_jenis == 1){
            return $this->RegKK($id);
        }else if ($id_jenis == 2){
            return $this->EditKK($id);
        }else if($id_jenis == 3){
            return $this->GantiKK($id);
        }else if($id_jenis == 4){
            return $this->MutasiKK($id);
        }else{
            return $this->Pengajuan($id);
        }
    }
    public function Pengajuan($id){
        $data = array(
            'list' => DB::table('pengajuans')
            ->join('jenis', 'jenis.id', '=', 'pengajuans.id_jenis')
            ->select('pengajuans.*', 'jenis.nama','pengajuans.created_at as tgl')
            ->where('pengajuans.id', $id)
            ->first(),
            // 'kolom' => $kolom,
        );

        return view('admin.detailregkk')->with($data);
    }

    public function RegKK($id){
        $data = array(
            'daftar' => DB::table('pengajuans')
            ->join('regkks', 'regkks.no_pengajuan', '=', 'pengajuans.no_pengajuan')
            ->join('jenis', 'jenis.id', '=', 'pengajuans.id_jenis')
            ->join('statuses', 'statuses.id', '=', 'pengajuans.id_status')
            ->join('kecamatans', 'kecamatans.id', '=', 'regkks.id_kecamatan')
            ->join('desas', 'desas.id', '=', 'regkks.id_desa')
            ->join('agamas', 'agamas.id', '=', 'regkks.id_agama')
            ->join('pekerjaans', 'pekerjaans.id', '=', 'regkks.id_pekerjaan')
            ->join('pendidikans', 'pendidikans.id', '=', 'regkks.id_pendidikan')
            ->join('penyakits', 'penyakits.id', '=', 'regkks.id_penyakit')
            ->select('pengajuans.*','regkks.*', 'jenis.nama AS nama_jenis','pengajuans.created_at AS tgl_pengajuan','statuses.nama AS nama_status','kecamatans.nama AS nama_kecamatan','desas.nama AS nama_desa', 'agamas.nama as nama_agama','pekerjaans.nama AS nama_pekerjaan','pendidikans.nama AS nama_pendidikan','penyakits.nama AS nama_penyakit')
            ->where('pengajuans.id', $id)
            ->get(),
            // 'kolom' => $kolom,
            'list2' => DB::table('lampirans')
                ->select('*')
                ->where('no_pengajuan','ONCOM-'.$id)
                ->first(),
            'status' => get_status()
        );

        return view('admin.detailregkk')->with($data);
    }

    public function EditKK($id){
        $data = array(
            'list' => DB::table('pengajuans')
            ->join('editkks', 'editkks.no_pengajuan', '=', 'pengajuans.no_pengajuan')
            ->join('jenis', 'jenis.id', '=', 'pengajuans.id_jenis')
            ->join('statuses', 'statuses.id', '=', 'pengajuans.id_status')
            ->select('pengajuans.*','editkks.*', 'jenis.nama AS nama_jenis','pengajuans.created_at as tgl_pengajuan','statuses.nama AS nama_status')
            ->where('pengajuans.id', $id)
            ->first(),
            // 'kolom' => $kolom,
            'list2' => DB::table('lampirans')
                ->select('*')
                ->where('no_pengajuan','ONCOM-'.$id)
                ->first(),
            'status' => get_status()
        );

        return view('admin.detaileditkk')->with($data);
    }

    public function GantiKK($id){
        $data = array(
            'list' => DB::table('pengajuans')
            ->join('gantikks', 'gantikks.no_pengajuan', '=', 'pengajuans.no_pengajuan')
            ->join('jenis', 'jenis.id', '=', 'pengajuans.id_jenis')
            ->join('statuses', 'statuses.id', '=', 'pengajuans.id_status')
            ->join('alasans', 'alasans.id', '=', 'gantikks.id_alasan')
            ->select('pengajuans.*','gantikks.*', 'jenis.nama AS nama_jenis','alasans.nama AS alasan','pengajuans.created_at as tgl_pengajuan','statuses.nama AS nama_status')
            ->where('pengajuans.id', $id)
            ->first(),
            // 'kolom' => $kolom,
            'list2' => DB::table('lampirans')
                ->select('*')
                ->where('no_pengajuan','ONCOM-'.$id)
                ->first(),
            'status' => get_status()
        );

        return view('admin.detailgantikk')->with($data);
    }

    public function MutasiKK($id){
        $data = array(
            'list' => DB::table('pengajuans')
            ->join('mutasikks', 'mutasikks.no_pengajuan', '=', 'pengajuans.no_pengajuan')
            ->join('jenis', 'jenis.id', '=', 'pengajuans.id_jenis')
            ->join('statuses', 'statuses.id', '=', 'pengajuans.id_status')
            ->join('alasans', 'alasans.id', '=', 'mutasikks.id_alasan')
            ->select('pengajuans.*','mutasikks.*', 'jenis.nama AS nama_jenis', 'alasans.nama AS alasan' ,'pengajuans.created_at as tgl_pengajuan','statuses.nama AS nama_status')
            ->where('pengajuans.id', $id)
            ->first(),
            // 'kolom' => $kolom,
            'list2' => DB::table('lampirans')
                ->select('*')
                ->where('no_pengajuan','ONCOM-'.$id)
                ->first(),
            'status' => get_status()
        );

        return view('admin.detailmutasikk')->with($data);
    }

    public function update(Request $request){
        $no_pengajuan = $request->input('no_pengajuan');
        $id_status = $request->input('id_status');
        $catatan = $request->input('catatan');
        DB::table('pengajuans')
              ->where('no_pengajuan', $no_pengajuan)
              ->update(['id_status' => $id_status],
                        ['keterangan' => $catatan]
          );

        $no_antrian = date('d-m').get_count();

        if ($id_status == '2' ) {
        DB::table('jadwals')
              ->insert(
                    ['no_pengajuan' => $no_pengajuan,
                    'jadwal' => get_jadwal(),
                    'no_antrian' => $no_antrian,
                    'id_status' => $id_status,
                    'keterangan' => $catatan,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);         
        }

        return redirect('pengajuan')->with('success','Data Berhasil Disimpan!');
    }

}
