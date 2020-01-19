<?php

use App\Models\Admin\Pengajuan;
use App\Models\Admin\Kecamatan;
use App\Models\Admin\Desa;
use App\Models\Admin\Alasan;
use App\Models\Admin\Pekerjaan;
use App\Models\Admin\Pendidikan;
use App\Models\Admin\Penyakit;
use App\Models\Admin\Agama;
use App\Models\Admin\Status;

use Carbon\Carbon;

//use DB;

	function get_no_pengajuan(){
        $id_p = Pengajuan::max('id');

        if ($id_p == null) {
            $id_p = 1;
        }else{
            $id_p = $id_p + 1;
        }
        return "ONCOM-".$id_p;
    }

    function get_alasan(){
        $alasan = Alasan::all();
        return $alasan;
    }

    function get_kecamatan(){
        $kecamatan = Kecamatan::all();
        return $kecamatan;
    }

    function get_desa(){
        $desa = Desa::all();
        return $desa;
    }

    function get_pekerjaan(){
        $pekerjaan = Pekerjaan::all();
        return $pekerjaan;
    }

    function get_pendidikan(){
        $pendidikan = Pendidikan::all();
        return $pendidikan;
    }

    function get_penyakit(){
        $penyakit = Penyakit::all();
        return $penyakit;
    }

    function get_agama(){
        $agama = Agama::all();
        return $agama;
    }

    function get_status(){
        $status = Status::all();
        return $status;
    }

    function get_count(){
        $count = DB::select(
            DB::raw("SELECT * FROM jadwals WHERE DATE(created_at) LIKE CURRENT_DATE"));
        return count($count);
    }

    function get_jadwal(){
        if (Carbon::today()->format('l') == 'Friday') {
            $jadwal = Carbon::today()->addDay(3);
        }else if (Carbon::today()->format('l') == 'Saturday') {
            $jadwal = Carbon::today()->addDay(2);
        }else{
            $jadwal = Carbon::tomorrow();
        }

        return $jadwal;
    }