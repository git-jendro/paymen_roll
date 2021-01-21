<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataLaporan extends Model
{
    protected $table = 'data_laporan';

    protected $guard = 'id';

    public function data()
    {
        return $this->belongsTo(DataLaporan::class);
    }

    public function absen()
    {
        return $this->hasOne(AbsensiGaji::class, 'absensi_gaji_id');
    }
}
