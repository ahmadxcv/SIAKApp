<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKecamatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecamatans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('kode_pos');
            $table->integer('jumlah_desa')->unsigned();
            $table->timestamps();
        });
        DB::table('kecamatans')->insert([ 
            ['nama' => 'Agrabinta', 'kode_pos' => '43276', 'jumlah_desa'=> 11],
            ['nama' => 'Bojongpicung', 'kode_pos' => '43283','jumlah_desa'=> 11],
            ['nama' => 'Campaka','kode_pos' => '43263','jumlah_desa'=> 11],
            ['nama' => 'Campakamulya (Campaka Mulya)', 'kode_pos' => '43269','jumlah_desa'=> 5],
            ['nama' => 'Cianjur','kode_pos' => '43215','jumlah_desa'=> 11],
            ['nama' => 'Cibeber','kode_pos' => '43262','jumlah_desa'=> 18],
            ['nama' => 'Cibinong','kode_pos' => '43271','jumlah_desa'=> 14],
            ['nama' => 'Cidaun','kode_pos' => '43275','jumlah_desa'=> 14],
            ['nama' => 'Cijati','kode_pos' => '43284','jumlah_desa'=> 10],
            ['nama' => 'Cikadu','kode_pos' => '43286','jumlah_desa'=> 10],
            ['nama' => 'Cikalongkulon','kode_pos' => '43291',  'jumlah_desa'=> 18],
            ['nama' => 'Cilaku','kode_pos' => '43285', 'jumlah_desa'=> 10],
            ['nama' => 'Cipanas', 'kode_pos' => '43253', 'jumlah_desa'=> 7],
            ['nama' => 'Ciranjang','kode_pos' =>  '43282', 'jumlah_desa'=> 9],
            ['nama' => 'Cugenang','kode_pos' =>  '43252', 'jumlah_desa'=> 16],
            ['nama' => 'Gekbrong','kode_pos' =>  '43261', 'jumlah_desa'=> 8],
            ['nama' => 'Haurwangi','kode_pos' =>  '43280', 'jumlah_desa'=> 8],
            ['nama' => 'Kadupandak','kode_pos' =>  '43268', 'jumlah_desa'=> 14],
            ['nama' => 'Karangtengah','kode_pos' =>  '43281', 'jumlah_desa'=> 16],
            ['nama' => 'Leles','kode_pos' =>  '43273', 'jumlah_desa'=> 12],
            ['nama' => 'Mande','kode_pos' =>  '43292', 'jumlah_desa'=> 12],
            ['nama' => 'Naringgul','kode_pos' => '43274', 'jumlah_desa' => 11],
            ['nama' => 'Pacet', 'kode_pos' => '43253', 'jumlah_desa' => 7],
            ['nama' => 'Pagelaran','kode_pos' => '43266', 'jumlah_desa' => 14],
            ['nama' => 'Pasirkuda','kode_pos' => '43267', 'jumlah_desa' => 9],
            ['nama' => 'Sindangbarang','kode_pos' => '43272', 'jumlah_desa' => 11],
            ['nama' => 'Sukaluyu','kode_pos' => '43287', 'jumlah_desa' => 10],
            ['nama' => 'Sukanagara', 'kode_pos' =>'43264', 'jumlah_desa' => 10],
            ['nama' => 'Sukaresmi','kode_pos' => '43254', 'jumlah_desa' => 11],
            ['nama' => 'Takokak','kode_pos' => '43265', 'jumlah_desa' => 9],
            ['nama' => 'Tanggeung', 'kode_pos' => '43267', 'jumlah_desa' => 12],
            ['nama' => 'Warungkondang', 'kode_pos' => '43260', 'jumlah_desa' => 11]
         
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kecamatans');
    }
}
