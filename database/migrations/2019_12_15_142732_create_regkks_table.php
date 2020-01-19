<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Carbon\Carbon;

class CreateRegkksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regkks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_pengajuan');
            //Data Wilayah
            $table->integer('id_kecamatan')->unsigned();
            $table->integer('id_desa')->unsigned();
            //Data Individu
            $table->string('nama_lengkap');
            $table->string('tempat_tinggal_sebelumnya');
            $table->string('no_pasport')->nullable();
            $table->date('tanggal_akhir_pasport')->nullable();
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('no_akta');
            $table->string('golongan_darah');
            $table->string('status_perkawinan');
            $table->string('no_surat_kawin')->nullable();
            $table->date('tanggal_kawin')->nullable();
            $table->string('no_surat_cerai')->nullable();
            $table->date('tanggal_cerai')->nullable();
            $table->integer('id_agama')->unsigned();
            $table->integer('id_pekerjaan')->unsigned();
            $table->integer('id_pendidikan')->unsigned();
            $table->integer('id_penyakit')->unsigned();
            //Data Keluarga
            $table->string('kepala_kk');
            $table->string('alamat_keluarga');
            $table->string('rt_keluarga');
            $table->string('rw_keluarga');
            $table->string('desa_keluarga');
            $table->string('kode_pos_keluarga')->nullable();
            $table->string('nomor_telepon_keluarga')->nullable();
            //Data Orang Tua
            $table->string('nik_ibu')->nullable();
            $table->string('nik_ayah')->nullable();
            $table->string('nama_ibu');
            $table->string('nama_ayah');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });

        DB::table('regkks')->insert([
                'no_pengajuan' => 'ONCOM-1',
                'id_kecamatan' => 1,
                'id_desa' => 1,
                'nama_lengkap' => 'Abdul Rozak',
                'tempat_tinggal_sebelumnya' => 'Bandung',
                'no_pasport' => '02020202',
                'tanggal_akhir_pasport' => '2019-12-23',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1994-12-23',
                'no_akta' => '034023402',
                'golongan_darah' => 'A',
                'status_perkawinan' => 'Kawin',
                'no_surat_kawin' => '049583405980',
                'tanggal_kawin' => '2019-12-23',
                'no_surat_cerai' => '02470234',
                'tanggal_cerai' => '2019-12-23',
                'id_agama' => 1,
                'id_pekerjaan' => 1,
                'id_pendidikan' => 1,
                'id_penyakit' => 1,
                'kepala_kk' => 'Sebastian Ozak',
                'alamat_keluarga' => 'Gunung Halu',
                'rt_keluarga' => '001',
                'rw_keluarga' => '002',
                'desa_keluarga' => 'Saluyu',
                'kode_pos_keluarga' => '43212',
                'nomor_telepon_keluarga' => '081234567890',
                'nik_ibu' => '320327321322',
                'nama_ibu' => 'Ibu',
                'nik_ayah' => '320327322222',
                'nama_ayah' => 'Bapak',
                'keterangan' => 'test',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regkks');
    }
}
