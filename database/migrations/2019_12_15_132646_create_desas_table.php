<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->integer('id_kecamatan')->unsigned();
            $table->timestamps();
        });

        DB::table('desas')->insert([
            ['nama' => 'Bojongkaso' , 'id_kecamatan' => 1],
            ['nama' => 'Bunisari' , 'id_kecamatan' => 1],
            ['nama' => 'Karangsari' , 'id_kecamatan' => 1],
            ['nama' => 'Mekarsari' , 'id_kecamatan' => 1],
            ['nama' => 'Mulyasari' , 'id_kecamatan' => 1],
            ['nama' => 'Neglasari' , 'id_kecamatan' => 1],
            ['nama' => 'Sinarlaut' , 'id_kecamatan' => 1],
            ['nama' => 'Sukamanah' , 'id_kecamatan' => 1],
            ['nama' => 'Tanjung Sari (Tanjungsari)', 'id_kecamatan' => 1],
            ['nama' => 'Wanasari', 'id_kecamatan' => 1],
            ['nama' => 'Wangunjaya', 'id_kecamatan' => 1],
            ['nama' => 'Bojongpicung', 'id_kecamatan' => 2],
            ['nama' => 'Cibarengkok', 'id_kecamatan' => 2],
            ['nama' => 'Cikondang', 'id_kecamatan' => 2],
            ['nama' => 'Hegarmanah', 'id_kecamatan' => 2],
            ['nama' => 'Jati', 'id_kecamatan' => 2],
            ['nama' => 'Jatisari', 'id_kecamatan' => 2],
            ['nama' => 'Kemang', 'id_kecamatan' => 2],
            ['nama' => 'Neglasari', 'id_kecamatan' => 2],
            ['nama' => 'Sukajaya', 'id_kecamatan' => 2],
            ['nama' => 'Sukarama', 'id_kecamatan' => 2],
            ['nama' => 'Sukaratu', 'id_kecamatan' => 2],
            ['nama' => 'Campaka', 'id_kecamatan' => 3],
            ['nama' => 'Cidadap', 'id_kecamatan' => 3],
            ['nama' => 'Cimenteng', 'id_kecamatan' => 3],
            ['nama' => 'Girimukti', 'id_kecamatan' => 3],
            ['nama' => 'Karyamukti', 'id_kecamatan' => 3],
            ['nama' => 'Margaluyu', 'id_kecamatan' => 3],
            ['nama' => 'Mekarjaya', 'id_kecamatan' => 3],
            ['nama' => 'Sukadana', 'id_kecamatan' => 3],
            ['nama' => 'Sukajadi', 'id_kecamatan' => 3],
            ['nama' => 'Susukan', 'id_kecamatan' => 3],
            ['nama' => 'Wangunjaya', 'id_kecamatan' => 3],
            ['nama' => 'Campakamulya', 'id_kecamatan' => 4],
            ['nama' => 'Campakawarna', 'id_kecamatan' => 4],
            ['nama' => 'Cibanggala', 'id_kecamatan' => 4],
            ['nama' => 'Sukabungah', 'id_kecamatan' => 4],
            ['nama' => 'Sukasirna', 'id_kecamatan' => 4],
            ['nama' => 'Babakan Karet (Babakankaret)', 'id_kecamatan' => 5],
            ['nama' => 'Bojongherang', 'id_kecamatan' => 5],
            ['nama' => 'Limbangansari (Limbangan Sari)', 'id_kecamatan' => 5],
            ['nama' => 'Mekarsari', 'id_kecamatan' => 5],
            ['nama' => 'Muka', 'id_kecamatan' => 5],
            ['nama' => 'Nagrak', 'id_kecamatan' => 5],
            ['nama' => 'Pamoyanan', 'id_kecamatan' => 5],
            ['nama' => 'Sawahgede (Sawah Gede)', 'id_kecamatan' => 5],
            ['nama' => 'Sayang', 'id_kecamatan' => 5],
            ['nama' => 'Solokpandan', 'id_kecamatan' => 5],
            ['nama' => 'Sukamaju', 'id_kecamatan' => 5],
            ['nama' => 'Cibadak', 'id_kecamatan' => 6],
            ['nama' => 'Cibaregbeg', 'id_kecamatan' => 6],
            ['nama' => 'Cibokor', 'id_kecamatan' => 6],
            ['nama' => 'Cihaur', 'id_kecamatan' => 6],
            ['nama' => 'Cikondang', 'id_kecamatan' => 6],
            ['nama' => 'Cimanggu', 'id_kecamatan' => 6],
            ['nama' => 'Cipetir', 'id_kecamatan' => 6],
            ['nama' => 'Cisalak', 'id_kecamatan' => 6],
            ['nama' => 'Girimulya', 'id_kecamatan' => 6],
            ['nama' => 'Kanoman', 'id_kecamatan' => 6],
            ['nama' => 'Karangnunggal', 'id_kecamatan' => 6],
            ['nama' => 'Mayak', 'id_kecamatan' => 6],
            ['nama' => 'Peuteuycondong', 'id_kecamatan' => 6],
            ['nama' => 'Salamnunggal', 'id_kecamatan' => 6],
            ['nama' => 'Selagedang (Salagedang)', 'id_kecamatan' => 6],
            ['nama' => 'Sukamaju', 'id_kecamatan' => 6],
            ['nama' => 'Sukamanah', 'id_kecamatan' => 6],
            ['nama' => 'Sukaraharja', 'id_kecamatan' => 6],
            ['nama' => 'Batulawang', 'id_kecamatan' => 7],
            ['nama' => 'Ciburial', 'id_kecamatan' => 7],
            ['nama' => 'Cikangkareng', 'id_kecamatan' => 7],
            ['nama' => 'Cimaskara', 'id_kecamatan' => 7],
            ['nama' => 'Girijaya', 'id_kecamatan' => 7],
            ['nama' => 'Hamerang', 'id_kecamatan' => 7],
            ['nama' => 'Mekarmukti', 'id_kecamatan' => 7],
            ['nama' => 'Padasuka', 'id_kecamatan' => 7],
            ['nama' => 'Pamoyanan', 'id_kecamatan' => 7],
            ['nama' => 'Pananggapan', 'id_kecamatan' => 7],
            ['nama' => 'Panyindangan', 'id_kecamatan' => 7],
            ['nama' => 'Sukajadi', 'id_kecamatan' => 7],
            ['nama' => 'Sukamekar', 'id_kecamatan' => 7],
            ['nama' => 'Wargaluyu', 'id_kecamatan' => 7],
            ['nama' => 'Cibuluh', 'id_kecamatan' => 8],
            ['nama' => 'Cidamar', 'id_kecamatan' => 8],
            ['nama' => 'Cimaragang', 'id_kecamatan' => 8],
            ['nama' => 'Cisalak', 'id_kecamatan' => 8],
            ['nama' => 'Gelarpawitan', 'id_kecamatan' => 8],
            ['nama' => 'Gelarwangi', 'id_kecamatan' => 8],
            ['nama' => 'Jayapura', 'id_kecamatan' => 8],
            ['nama' => 'Karangwangi', 'id_kecamatan' => 8],
            ['nama' => 'Karyabakti', 'id_kecamatan' => 8],
            ['nama' => 'Kertajadi', 'id_kecamatan' => 8],
            ['nama' => 'Mekarjaya', 'id_kecamatan' => 8],
            ['nama' => 'Neglasari', 'id_kecamatan' => 8],
            ['nama' => 'Puncakbaru', 'id_kecamatan' => 8],
            ['nama' => 'Sukapura', 'id_kecamatan' => 8],
            ['nama' => 'Bojonglarang', 'id_kecamatan' => 9],
            ['nama' => 'Caringin', 'id_kecamatan' => 9],
            ['nama' => 'Cibodas', 'id_kecamatan' => 9],
            ['nama' => 'Cijati', 'id_kecamatan' => 9],
            ['nama' =>  'Padaasih', 'id_kecamatan' =>  9],
            ['nama' => 'Parakantugu', 'id_kecamatan' =>  9],
            ['nama' => 'Sinarbakti', 'id_kecamatan' =>  9],
            ['nama' => 'Sukaluyu', 'id_kecamatan' =>  9],
            ['nama' => 'Sukamahi', 'id_kecamatan' =>  9],
            ['nama' => 'Sukamaju', 'id_kecamatan' =>  9],
            ['nama' => 'Cikadu',  'id_kecamatan' => 10],
            ['nama' => 'Cisaranten',  'id_kecamatan' => 10],
            ['nama' => 'Kalapanunggal',  'id_kecamatan' => 10],
            ['nama' => 'Mekarjaya',  'id_kecamatan' => 10],
            ['nama' => 'Mekarlaksana',  'id_kecamatan' => 10],
            ['nama' => 'Mekarwangi',  'id_kecamatan' => 10],
            ['nama' => 'Padaluyu',  'id_kecamatan' => 10],
            ['nama' => 'Sukaluyu',  'id_kecamatan' => 10],
            ['nama' => 'Sukamanah',  'id_kecamatan' => 10],
            ['nama' => 'Sukamulya',  'id_kecamatan' => 10]

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desas');
    }
}
