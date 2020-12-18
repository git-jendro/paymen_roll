<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    protected $fillable = [
        'nip', 'nama' ,'JK' ,'tempatlahir' ,'dob' ,'notel' ,'alamatktp' ,'alamatdom' ,'email' ,'noktp' ,'nokk' ,'npwp' ,'statusNikah' ,'namaAyah' ,'namaIbu' ,'statusKerja' ,'tipeumr' ,'noBpjsKet' ,'noBpjsKes' ,'noBpjsKesPas' ,'noBpjsKesAn1' ,'noBpjsKesAn2' ,'noBpjsKesAn3' ,'namaPas' ,'jkPas' ,'noKtpPas' ,'tempatLahirPas' ,'dobPas' ,'namaAn1' ,'jkAn1' ,'tempatLahirAn1' ,'dobAn1' ,'namaAn2' ,'jkAn2' ,'tempatLahirAn2' ,'dobAn2' ,'namaAn3' ,'jkAn3' ,'tempatLahirAn3' ,'dobAn3' ,'namaBank' ,'atasNama' ,'cabang' ,'noRek' ,'PendidikanTerakhir' ,'ipk' ,'tahunLulus' ,'statusPendidikan' ,'jabatan' ,'divisi' ,'penempatan' ,'tanggalMasuk' ,'noPkwt' ,'berakhir' ,'mulai' ,
    ];
    
}
