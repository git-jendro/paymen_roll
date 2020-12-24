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
            $table->string('nip', 50)->nullable();
            $table->integer('jmlMasuk')->nullable();
            $table->integer('jmlSakit')->nullable();
            $table->integer('jmlIzin')->nullable();
            $table->integer('jmlCuti')->nullable();
            $table->integer('jmlLibur')->nullable();
            $table->integer('TotalHari')->nullable();
            $table->integer('jmlLembur')->nullable();
            $table->integer('gajiPokok')->nullable();
            $table->integer('lembur')->nullable();
            $table->integer('insentif')->nullable();
            $table->integer('bpjsTK')->nullable();
            $table->integer('bpjsKes')->nullable();
            $table->integer('bpjsJp')->nullable();
            $table->integer('gajiKotor')->nullable();
            $table->integer('totalPotongan')->nullable();
            $table->integer('gajiBersih')->nullable();
            $table->integer('isHitung')->nullable();
            $table->integer('Isbayar')->nullable();
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
