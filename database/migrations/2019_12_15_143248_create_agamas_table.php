<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgamasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agamas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });

        DB::table('agamas')->insert([
            ['nama' => 'Islam' ],
            ['nama' => 'Katholik' ],
            ['nama' => 'Protestan' ],
            ['nama' => 'Hindu' ],
            ['nama' => 'Budha' ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agamas');
    }
}
