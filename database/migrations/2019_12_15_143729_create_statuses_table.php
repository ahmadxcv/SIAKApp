<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });

        DB::table('statuses')->insert([
            ['nama' => 'Pending' ],
            ['nama' => 'Proses' ],
            ['nama' => 'Selesai' ],
            ['nama' => 'Ditolak' ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
