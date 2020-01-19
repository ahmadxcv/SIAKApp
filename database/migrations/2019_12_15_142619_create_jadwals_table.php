<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Carbon\Carbon;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_pengajuan');
            $table->datetime('jadwal')->nullable();
            $table->string('no_antrian')->nullable();
            $table->integer('id_status')->unsigned();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
        // DB::table('jadwals')->insert([ 
        //     ['no_pengajuan' => 'ONCOM-1', 'jadwal' => NOW() , 'no_antrian'=> date('d-m').'-001', 'id_status' => 1, 'keterangan' => 'test', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        //     ['no_pengajuan' => 'ONCOM-2', 'jadwal' => NOW() , 'no_antrian'=> date('d-m').'-002', 'id_status' => 1, 'keterangan' => 'test', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        //     ['no_pengajuan' => 'ONCOM-3', 'jadwal' => NOW() , 'no_antrian'=> date('d-m').'-003', 'id_status' => 2, 'keterangan' => 'test', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        //     ['no_pengajuan' => 'ONCOM-4', 'jadwal' => NOW() , 'no_antrian'=> date('d-m').'-004', 'id_status' => 2, 'keterangan' => 'test', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        //     ['no_pengajuan' => 'ONCOM-5', 'jadwal' => NOW() , 'no_antrian'=> date('d-m').'-005', 'id_status' => 3, 'keterangan' => 'test', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        //     ['no_pengajuan' => 'ONCOM-6', 'jadwal' => NOW() , 'no_antrian'=> date('d-m').'-006', 'id_status' => 3, 'keterangan' => 'test', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        //     ['no_pengajuan' => 'ONCOM-7', 'jadwal' => NOW() , 'no_antrian'=> date('d-m').'-007', 'id_status' => 1, 'keterangan' => 'test', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwals');
    }
}
