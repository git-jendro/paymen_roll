<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->string('nip', 50)->primary();
            $table->string('nama', 30);
            $table->integer('JK');
            $table->string('tempatlahir', 10);
            $table->date('dob');
            $table->string('notel',13);
            $table->string('alamatktp',50);
            $table->string('alamatdom',50);
            $table->string('email',100);
            $table->string('noktp',30);
            $table->string('nokk',30);
            $table->string('npwp',30);
            $table->integer('statusNikah');
            $table->string('namaAyah',30);
            $table->string('namaIbu',30);
            $table->integer('statusKerja');
            $table->integer('tipeumr');
            $table->string('noBpjsKet',30);
            $table->string('noBpjsKes',30);
            // $table->string('noBpjsKesPas',30)->nullable();
            // $table->string('noBpjsKesAn1',30)->nullable();
            // $table->string('noBpjsKesAn2',30)->nullable();
            // $table->string('noBpjsKesAn3',30)->nullable();
            // $table->string('namaPas',30)->nullable();
            // $table->integer('jkPas')->nullable();
            // $table->string('noKtpPas', 30)->nullable();
            // $table->string('tempatLahirPas', 30)->nullable();
            // $table->date('dobPas')->nullable();
            // $table->string('namaAn1', 30)->nullable();
            // $table->integer('jkAn1')->nullable();
            // $table->string('tempatLahirAn1', 30)->nullable();
            // $table->date('dobAn1')->nullable();
            // $table->string('namaAn2', 30)->nullable();
            // $table->integer('jkAn2')->nullable();
            // $table->string('tempatLahirAn2', 30)->nullable();
            // $table->date('dobAn2')->nullable();
            // $table->string('namaAn3', 30)->nullable();
            // $table->integer('jkAn3')->nullable();
            // $table->string('tempatLahirAn3', 30)->nullable();
            // $table->date('dobAn3')->nullable();
            $table->string('namaBank');
            $table->string('cabang', 30);
            $table->string('noRek', 30);
            $table->string('atasNama', 30);
            $table->integer('PendidikanTerakhir');
            $table->string('ipk', 10);
            $table->integer('tahunLulus');
            $table->integer('statusPendidikan');
            $table->integer('jabatan');
            $table->integer('divisi');
            $table->integer('penempatan');
            $table->date('tanggalMasuk');
            $table->string('noPkwt', 30);
            $table->date('mulai');
            $table->date('berakhir');
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
        Schema::dropIfExists('karyawan');
    }
}
