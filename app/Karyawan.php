<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    
    protected $primaryKey = 'nip';

    public $incrementing = false;

    protected $fillable = [
        'nip', 'nama' ,'JK' ,'tempatlahir' ,'dob' ,'notel' ,'alamatktp' ,'alamatdom' ,'email' ,'noktp' ,'nokk' ,'npwp' ,'statusNikah' ,'namaAyah' ,'namaIbu' ,'statusKerja' ,'tipeumr' ,'noBpjsKet' ,'noBpjsKes' ,'namaBank' ,'atasNama' ,'cabang' ,'noRek' ,'PendidikanTerakhir' ,'ipk' ,'tahunLulus' ,'statusPendidikan' ,'jabatan' ,'divisi' ,'penempatan' ,'tanggalMasuk' ,'noPkwt' ,'berakhir' ,'mulai' ,
    ];

    public function absen()
    {
        return $this->hasOne(AbsensiGaji::class, 'nip');
    }
    
}
