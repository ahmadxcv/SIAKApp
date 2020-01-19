<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlasansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alasans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('keterangan')->nullable();
            $table->integer('id_jenis');
            $table->timestamps();
        });
        
        DB::table('alasans')->insert([
            ['nama' => 'Lain-lain' , 'id_jenis' => 1 ],
            ['nama' => 'Kerusakan' , 'id_jenis' => 3 ],
            ['nama' => 'Kehilangan' , 'id_jenis' => 3 ],
            ['nama' => 'Menikah' , 'id_jenis' => 4 ],
            ['nama' => 'Perceraian' , 'id_jenis' => 4 ],
            ['nama' => 'Mandiri' , 'id_jenis' => 4 ]
        ]);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alasans');
    }
}
