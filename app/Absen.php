<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = 'absen';

    // protected $guard = 'id';
    protected $fillable = [
       'absensi_gaji_id', 'month', 'year', 'daysamonth', 'data'
    ];

    protected $primaryKey = 'id';

    public function data()
    {
        return $this->belongsTo(AbsensiGaji::class, 'absensi_gaji_id');
    }
}
