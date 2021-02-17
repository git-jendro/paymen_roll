<?php

use App\Ketentuan;
use Illuminate\Database\Seeder;

class KetentuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ketentuan::create([
            'qualifier' => 'PENDIDIKAN',
            'code'  => '1',
            'localizedName' => 'SD'
        ]);
        Ketentuan::create([
            'qualifier' => 'PENDIDIKAN',
            'code'  => '2',
            'localizedName' => 'SMP'
        ]);
        Ketentuan::create([
            'qualifier' => 'PENDIDIKAN',
            'code'  => '3',
            'localizedName' => 'SMA'
        ]);
        Ketentuan::create([
            'qualifier' => 'PENDIDIKAN',
            'code'  => '4',
            'localizedName' => 'D3'
        ]);
        Ketentuan::create([
            'qualifier' => 'PENDIDIKAN',
            'code'  => '5',
            'localizedName' => 'S1'
        ]);
        Ketentuan::create([
            'qualifier' => 'JENISKELAMIN',
            'code'  => '1',
            'localizedName' => 'Laki - laki'
        ]);
        Ketentuan::create([
            'qualifier' => 'JENISKELAMIN',
            'code'  => '2',
            'localizedName' => 'Wanita'
        ]);
        Ketentuan::create([
            'qualifier' => 'STATUSNIKAH',
            'code'  => '1',
            'localizedName' => 'Lajang'
        ]);
        Ketentuan::create([
            'qualifier' => 'STATUSNIKAH',
            'code'  => '2',
            'localizedName' => 'Menikah'
        ]);
        Ketentuan::create([
            'qualifier' => 'STATUSKERJA',
            'code'  => '1',
            'localizedName' => 'Aktif'
        ]);
        Ketentuan::create([
            'qualifier' => 'STATUSKERJA',
            'code'  => '2',
            'localizedName' => 'Resign'
        ]);
        Ketentuan::create([
            'qualifier' => 'STATUSKARYAWAN',
            'code'  => '1',
            'localizedName' => 'Karyawan Kontrak'
        ]);
        Ketentuan::create([
            'qualifier' => 'STATUSKARYAWAN',
            'code'  => '2',
            'localizedName' => 'Karyawan Harian'
        ]);
        Ketentuan::create([
            'qualifier' => 'HITUNG',
            'code'  => '1',
            'localizedName' => 'Belum Dihitung'
        ]);
        Ketentuan::create([
            'qualifier' => 'HITUNG',
            'code'  => '2',
            'localizedName' => 'Sudah Dihitung'
        ]);
        Ketentuan::create([
            'qualifier' => 'BAYAR',
            'code'  => '1',
            'localizedName' => 'Belum dibayar'
        ]);
        Ketentuan::create([
            'qualifier' => 'BAYAR',
            'code'  => '2',
            'localizedName' => 'Sudah dibayar'
        ]);
        Ketentuan::create([
            'qualifier' => 'TIPEKARYAWAN',
            'code'  => '1',
            'localizedName' => 'Karyawan Tetap'
        ]);
        Ketentuan::create([
            'qualifier' => 'TIPEKARYAWAN',
            'code'  => '2',
            'localizedName' => 'Karyawan Kontrak'
        ]);
        Ketentuan::create([
            'qualifier' => 'DIVISI',
            'code'  => '1',
            'localizedName' => 'Inbound'
        ]);
        Ketentuan::create([
            'qualifier' => 'JABATAN',
            'code'  => '1',
            'localizedName' => 'Staff'
        ]);
        Ketentuan::create([
            'qualifier' => 'PENEMPATAN',
            'code'  => '1',
            'localizedName' => 'Cimanggis'
        ]);
        Ketentuan::create([
            'qualifier' => 'STATUSPENDIDIKAN',
            'code'  => '1',
            'localizedName' => 'Lulus'
        ]);
        Ketentuan::create([
            'qualifier' => 'STATUSPENDIDIKAN',
            'code'  => '2',
            'localizedName' => 'Masih dalam pendidikan'
        ]);
        Ketentuan::create([
            'qualifier' => 'BANK',
            'code'  => '1',
            'localizedName' => 'BNI'
        ]);
        Ketentuan::create([
            'qualifier' => 'BANK',
            'code'  => '2',
            'localizedName' => 'BRI'
        ]);
        Ketentuan::create([
            'qualifier' => 'BANK',
            'code'  => '3',
            'localizedName' => 'BCA'
        ]);
        Ketentuan::create([
            'qualifier' => 'BANK',
            'code'  => '4',
            'localizedName' => 'DKI'
        ]);
        Ketentuan::create([
            'qualifier' => 'BANK',
            'code'  => '5',
            'localizedName' => 'Mandiri'
        ]);
        Ketentuan::create([
            'qualifier' => 'BANK',
            'code'  => '6',
            'localizedName' => 'CIMB Niaga'
        ]);
        Ketentuan::create([
            'qualifier' => 'ROLE',
            'code'  => '1',
            'localizedName' => 'Admin'
        ]);
        Ketentuan::create([
            'qualifier' => 'ROLE',
            'code'  => '2',
            'localizedName' => 'Direktur'
        ]);
        Ketentuan::create([
            'qualifier' => 'ROLE',
            'code'  => '3',
            'localizedName' => 'Finance'
        ]);
    }
}
