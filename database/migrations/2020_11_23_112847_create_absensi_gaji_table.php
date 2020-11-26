<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiGajiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi_gaji', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 50);
            $table->integer('jmlMasuk');
            $table->integer('jmlSakit');
            $table->integer('jmlIzin');
            $table->integer('jmlCuti');
            $table->integer('jmlLibur');
            $table->integer('TotalHari');
            $table->integer('jmlLembur');
            $table->integer('gajiPokok');
            $table->integer('lembur');
            $table->integer('insentif');
            $table->integer('bpjsTK');
            $table->integer('bpjsKes');
            $table->integer('bpjsJp');
            $table->integer('gajiKotor');
            $table->integer('totalPotongan');
            $table->integer('gajiBersih');
            $table->integer('isHitung');
            $table->integer('Isbayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensi_gaji');
    }
}
