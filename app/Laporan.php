<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';

    protected $guard = 'id';

    public $incrementing = false;
    
    public function data()
    {
        return $this->hasMany(DataLaporan::class, 'laporan_id');
    }
    
}
