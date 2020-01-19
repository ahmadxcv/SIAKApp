<?php

namespace App\Http\Controllers\Penduduk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Pengajuan;
use App\Models\Admin\Jadwal;
use App\Models\Penduduk\Mutasikk;
use App\Models\Penduduk\Lampiran;

use Auth;
use DB;

class MutasikkController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function index(){

        return view('penduduk.dashboard');
    }

    public function create()
    {
        $data = array(
            'alasans' => get_alasan(), 
            'id_p' => get_no_pengajuan()
        );
        return view('penduduk.mutasikk', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Pengajuan();
        $post2 = new Mutasikk();
        $file= new Lampiran();

        $no_pengajuan = $request->input('id_pengajuan');

        //simpan ke tabel pengajuan
        $post->no_pengajuan = $no_pengajuan;
        $post->user_id = Auth::id();
        $post->nik = $request->input('nik');
        $post->id_jenis = '4';
        $post->id_status = '1';

        //simpan ke tabel mutasi kk
        $post2->no_pengajuan   = $no_pengajuan;
        $post2->id_alasan   = $request->input('id_alasan');
        $post2->nik = $request->input('nik');
        $post2->nama_lengkap = $request->input('nama_lengkap');
        $post2->no_kk = $request->input('no_kk');
        $post2->kepala_kk = $request->input('kepala_kk');

        //simpan ke tabel lampiran
        if ($request->hasFile('file')) {
            $destinationPath = 'files/'.$no_pengajuan;
            $berkas = $request->file('file'); // will get all files

            foreach ($berkas as $berkas) {//this statement will loop through all files.
                $file_name = $no_pengajuan.'-'.$berkas->getClientOriginalName(); //Get file original name
                $berkas->move($destinationPath , $file_name); // move files to destination folder
                $lampiran[] = $file_name;
            }
        }
        $file->no_pengajuan = $no_pengajuan;
        $file->alamat_file = json_encode($lampiran);

        $post->save();
        $post2->save();
        $file->save();

        return redirect('pengajuan/mutasikk')->with('success','Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function show(Penduduk $penduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(Penduduk $penduduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penduduk $penduduk)
    {
        //
    }
}
