<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Carbon\Carbon;

class CreateEditkksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editkks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_pengajuan');
            $table->integer('id_alasan')->unsigned();
            $table->string('no_kk');
            $table->string('kepala_kk');
            $table->string('nama_lengkap');
            $table->string('ubah');
            $table->string('data_lama');
            $table->string('data_baru');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
        DB::table('editkks')->insert([ 
            ['no_pengajuan' => 'ONCOM-2', 'id_alasan' => 1, 'no_kk'=> '320327111222', 'kepala_kk' => 'Riska', 'nama_lengkap' => 'Siska Maulani', 'ubah' => 'nama,kota', 'data_lama' => 'siska,ciamis', 'data_baru' => 'riska,kawali','keterangan' => 'test', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['no_pengajuan' => 'ONCOM-4', 'id_alasan' => 2, 'no_kk'=> '320327111222', 'kepala_kk' => 'Husen', 'nama_lengkap' => 'Hasan Husen', 'ubah' => 'nama', 'data_lama' => 'Hasang', 'data_baru' => 'Hasan','keterangan' => 'test', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]

            ]);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('editkks');
    }
}
