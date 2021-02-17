<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbsensiGaji extends Model
{
    protected $table = 'absensi_gaji';

    // protected $guard = 'id';
    protected $fillable = [
        'nip', 'jmlMasuk', 'jmlSakit', 'jmlIzin', 'jmlCuti', 'jmlLibur', 'jmlLembur', 'totalHari', 'isHitung', 'isBayar', 'isBayar', 'gajiPokok'  
    ];

    protected $primaryKey = 'id';

    public function karyawan()
    {
        return $this->hasOne(Karyawan::class, 'nip', 'nip');
    }

    public function data()
    {
        return $this->hasMany(Absen::class, 'absensi_gaji_id');
    }

    public function laporan()
    {
        return $this->hasOne(DataLaporan::class, 'absensi_gaji_id');
    }
}   
