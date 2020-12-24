<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbsensiGaji extends Model
{
    protected $table = 'absensi_gaji';

    protected $guard = 'id';

    public function karyawan()
    {
        return $this->hasOne(Karyawan::class, 'nip', 'nip');
    }
}
