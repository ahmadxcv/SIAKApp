<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Carbon\Carbon;

class CreateLampiransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lampirans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('alamat_file');
            $table->string('no_pengajuan');
            $table->timestamps();
        });

        DB::table('lampirans')->insert([
            ['alamat_file' => '["ONCOM-8-1.jpg","ONCOM-8-2.jpg","ONCOM-8-3.jpg","ONCOM-8-4.jpg"]', 'no_pengajuan' => 'ONCOM-1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            ['alamat_file' => '["ONCOM-8-1.jpg","ONCOM-8-2.jpg","ONCOM-8-3.jpg","ONCOM-8-4.jpg"]', 'no_pengajuan' => 'ONCOM-2', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            ['alamat_file' => '["ONCOM-8-1.jpg","ONCOM-8-2.jpg","ONCOM-8-3.jpg","ONCOM-8-4.jpg"]', 'no_pengajuan' => 'ONCOM-3', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            ['alamat_file' => '["ONCOM-8-1.jpg","ONCOM-8-2.jpg","ONCOM-8-3.jpg","ONCOM-8-4.jpg"]', 'no_pengajuan' => 'ONCOM-4', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            ['alamat_file' => '["ONCOM-8-1.jpg","ONCOM-8-2.jpg","ONCOM-8-3.jpg","ONCOM-8-4.jpg"]', 'no_pengajuan' => 'ONCOM-5', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            ['alamat_file' => '["ONCOM-8-1.jpg","ONCOM-8-2.jpg","ONCOM-8-3.jpg","ONCOM-8-4.jpg"]', 'no_pengajuan' => 'ONCOM-6', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            ['alamat_file' => '["ONCOM-8-1.jpg","ONCOM-8-2.jpg","ONCOM-8-3.jpg","ONCOM-8-4.jpg"]', 'no_pengajuan' => 'ONCOM-7', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lampirans');
    }
}