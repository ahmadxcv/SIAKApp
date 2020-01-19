<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePekerjaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekerjaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    
        DB::table('pekerjaans')->insert([
            ['nama' => 'Wiraswasta' ],
            ['nama' => 'Buruh' ],
            ['nama' => 'Petani' ],
            ['nama' => 'PNS' ],
            ['nama' => 'Pelajar/Mahasiswa' ],
            ['nama' => 'Lain- lain' ]
        ]);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pekerjaans');
    }
}
