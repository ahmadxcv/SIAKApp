<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Carbon\Carbon;

class CreateGantikksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gantikks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_pengajuan');
            $table->integer('id_alasan')->unsigned();
            $table->string('nik');
            $table->string('nama_lengkap');
            $table->string('no_kk');
            $table->string('kepala_kk');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
        
        DB::table('gantikks')->insert([ 
            ['no_pengajuan' => 'ONCOM-3', 'id_alasan' => 1, 'nik'=> '320327111333', 'nama_lengkap' => 'Hasan', 'no_kk'=> '320327111222', 'kepala_kk' => 'Riska', 'keterangan' => 'test', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['no_pengajuan' => 'ONCOM-5', 'id_alasan' => 1, 'nik'=> '320327111555', 'nama_lengkap' => 'Siska','no_kk'=> '320327111222', 'kepala_kk' => 'Husen', 'keterangan' => 'test', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gantikks');
    }
}
