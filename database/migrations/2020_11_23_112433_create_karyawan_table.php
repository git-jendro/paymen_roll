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
            $table->integer('statusKaryawan');
            $table->integer('tipeumr');
            $table->string('noBpjsKet',30);
            $table->string('noBpjsKes',30);
            $table->string('namaBank');
            $table->string('cabang', 30);
            $table->string('noRek', 30);
            $table->string('atasNama', 30);
            $table->integer('PendidikanTerakhir');
            $table->string('ipk', 10)->nullable();
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
