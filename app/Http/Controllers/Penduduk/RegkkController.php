<?php

namespace App\Http\Controllers\Penduduk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Pengajuan;
use App\Models\Admin\Jadwal;
use App\Models\Penduduk\Regkk;
use App\Models\Penduduk\Lampiran;

use DB;
use Auth;

class RegkkController extends Controller
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
            'kecamatan' => get_kecamatan(),
            'desa' => get_desa(),
            'pekerjaan' => get_pekerjaan(),
            'pendidikan' => get_pendidikan(),
            'penyakit' => get_penyakit(),
            'agama' => get_agama(),
            'id_p' => get_no_pengajuan()
        );
        return view('penduduk.regkk',$data);
    }


    public function store(Request $request)
    {
        $post = new Pengajuan();
        $post2 = new Regkk();
        $file= new Lampiran();

        $no_pengajuan = $request->input('id_pengajuan');

        //simpan ke tabel pengajuan
        $post->no_pengajuan = $no_pengajuan;
        $post->user_id = Auth::id();
        $post->nik = $request->input('nik');
        $post->id_jenis = '1';
        $post->id_status = '1';

        //simpan ke tabel regkks
        $post2->no_pengajuan = $no_pengajuan;
        $post2->id_kecamatan = $request->input('id_kecamatan');
        $post2->id_desa = $request->input('id_desa');
        $post2->nama_lengkap = $request->input('nama_lengkap');
        $post2->tempat_tinggal_sebelumnya = $request->input('tempat_tinggal_sebelumnya');
        $post2->no_pasport = $request->input('no_pasport');
        $post2->tanggal_akhir_pasport = $request->input('tanggal_akhir_pasport');
        $post2->jenis_kelamin = $request->input('jenis_kelamin');
        $post2->tempat_lahir = $request->input('tempat_lahir');
        $post2->tanggal_lahir = $request->input('tanggal_lahir');
        $post2->no_akta = $request->input('no_akta');
        $post2->golongan_darah = $request->input('golongan_darah');
        $post2->status_perkawinan = $request->input('status_perkawinan');
        $post2->no_surat_kawin = $request->input('no_surat_kawin');
        $post2->tanggal_kawin = $request->input('tanggal_kawin');
        $post2->no_surat_cerai = $request->input('no_surat_cerai');
        $post2->tanggal_cerai = $request->input('tanggal_cerai');
        $post2->id_agama = $request->input('id_agama');
        $post2->id_pekerjaan = $request->input('id_pekerjaan');
        $post2->id_pendidikan = $request->input('id_pendidikan');
        $post2->id_penyakit = $request->input('id_penyakit');
        $post2->kepala_kk = $request->input('kepala_kk');
        $post2->alamat_keluarga = $request->input('alamat_keluarga');
        $post2->rt_keluarga = $request->input('rt_keluarga');
        $post2->rw_keluarga = $request->input('rw_keluarga');
        $post2->desa_keluarga = $request->input('desa_keluarga');
        $post2->kode_pos_keluarga = $request->input('kode_pos_keluarga');
        $post2->nomor_telepon_keluarga = $request->input('nomor_telepon_keluarga');
        $post2->nik_ibu = $request->input('nik_ibu');
        $post2->nik_ayah = $request->input('nik_ayah');
        $post2->nama_ibu = $request->input('nama_ibu');
        $post2->nama_ayah = $request->input('nama_ayah');
        $post2->keterangan = $request->input('keterangan');

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

        return redirect('pengajuan/regkk')->with('success','Data Berhasil Disimpan!');
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
