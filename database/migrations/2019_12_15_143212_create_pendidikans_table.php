<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
        
        DB::table('pendidikans')->insert([
            ['nama' => 'TK/PAUD/Sederajat' ],
            ['nama' => 'SD/MI/Sederajat' ],
            ['nama' => 'SMP/MTs/Sederajat' ],
            ['nama' => 'SMA/SMK/MA/Sederajat' ],
            ['nama' => 'D1/D2/D3/D4' ],
            ['nama' => 'S1/S2/S3' ]
        ]);

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendidikans');
    }
}
