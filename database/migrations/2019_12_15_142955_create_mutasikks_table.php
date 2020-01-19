<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Carbon\Carbon;

class CreateMutasikksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutasikks', function (Blueprint $table) {
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
        DB::table('mutasikks')->insert([ 
            ['no_pengajuan' => 'ONCOM-6', 'id_alasan' => 1, 'nik'=> '320327111666', 'nama_lengkap'=> 'Biang Kerok', 'no_kk'=> '320327111888', 'kepala_kk' => 'Riska', 'keterangan' => 'test', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['no_pengajuan' => 'ONCOM-7', 'id_alasan' => 1, 'nik'=> '320327111777', 'nama_lengkap'=> 'Biang Keladi', 'no_kk'=> '320327111888', 'kepala_kk' => 'Hasan Husen', 'keterangan' => 'test', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mutasikks');
    }
}
