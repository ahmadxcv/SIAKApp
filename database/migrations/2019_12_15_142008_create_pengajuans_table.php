<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Carbon\Carbon;

class CreatePengajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_pengajuan');
            $table->integer('user_id')->unsigned();
            $table->string('nik')->nullable();
            $table->integer('id_jenis')->unsigned();
            $table->integer('id_status')->unsigned();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });

        DB::table('pengajuans')->insert([ 
            ['no_pengajuan' => 'ONCOM-1', 'user_id' => '3', 'nik'=> '320327111111', 'id_jenis' => 1, 'id_status' => 1, 'keterangan' => 'test', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['no_pengajuan' => 'ONCOM-2', 'user_id' => '3', 'nik'=> '320327111222', 'id_jenis' => 2, 'id_status' => 2, 'keterangan' => 'test', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['no_pengajuan' => 'ONCOM-3', 'user_id' => '3', 'nik'=> '320327111333', 'id_jenis' => 3, 'id_status' => 3, 'keterangan' => 'test', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['no_pengajuan' => 'ONCOM-4', 'user_id' => '4', 'nik'=> '320327111444', 'id_jenis' => 2, 'id_status' => 1, 'keterangan' => 'test', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['no_pengajuan' => 'ONCOM-5', 'user_id' => '4', 'nik'=> '320327111555', 'id_jenis' => 3, 'id_status' => 2, 'keterangan' => 'test', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['no_pengajuan' => 'ONCOM-6', 'user_id' => '4', 'nik'=> '320327111666', 'id_jenis' => 4, 'id_status' => 3, 'keterangan' => 'test', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['no_pengajuan' => 'ONCOM-7', 'user_id' => '5', 'nik'=> '320327111777', 'id_jenis' => 4, 'id_status' => 3, 'keterangan' => 'test', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuans');
    }
}
