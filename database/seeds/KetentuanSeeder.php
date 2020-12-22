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
            'qualifier' => 'TIPEUMR',
            'code'  => '1',
            'localizedName' => 'Jakarta'
        ]);
        Ketentuan::create([
            'qualifier' => 'TIPEUMR',
            'code'  => '2',
            'localizedName' => 'Depok'
        ]);
        Ketentuan::create([
            'qualifier' => 'HITUNG',
            'code'  => '1',
            'localizedName' => 'Dihitung'
        ]);
        Ketentuan::create([
            'qualifier' => 'HITUNG',
            'code'  => '2',
            'localizedName' => 'Belum'
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
        // Ketentuan::create([
        //     'qualifier' => 'DIVISI',
        //     'code'  => '2',
        //     'localizedName' => 'HRD'
        // ]);
        Ketentuan::create([
            'qualifier' => 'JABATAN',
            'code'  => '1',
            'localizedName' => 'Staff'
        ]);
        Ketentuan::create([
            'qualifier' => 'JABATAN',
            'code'  => '2',
            'localizedName' => 'Admin WFM & IT'
        ]);
        Ketentuan::create([
            'qualifier' => 'JABATAN',
            'code'  => '3',
            'localizedName' => 'Reguler'
        ]);
        Ketentuan::create([
            'qualifier' => 'JABATAN',
            'code'  => '4',
            'localizedName' => 'Unloading'
        ]);
        Ketentuan::create([
            'qualifier' => 'JABATAN',
            'code'  => '5',
            'localizedName' => 'Inbounder-FD/RTN'
        ]);
        Ketentuan::create([
            'qualifier' => 'JABATAN',
            'code'  => '6',
            'localizedName' => 'Inbounder Reguler'
        ]);
        Ketentuan::create([
            'qualifier' => 'JABATAN',
            'code'  => '7',
            'localizedName' => 'Troubleshoot'
        ]);
        Ketentuan::create([
            'qualifier' => 'PENEMPATAN',
            'code'  => '1',
            'localizedName' => 'Jakarta'
        ]);
        Ketentuan::create([
            'qualifier' => 'PENEMPATAN',
            'code'  => '2',
            'localizedName' => 'Depok'
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
        // Ketentuan::create([
        //     'qualifier' => 'AREA',
        //     'code'  => '1',
        //     'localizedName' => 'Jakarta'
        // ]);
        // Ketentuan::create([
        //     'qualifier' => 'AREA',
        //     'code'  => '2',
        //     'localizedName' => 'Depok'
        // ]);
        // Ketentuan::create([
        //     'qualifier' => 'AREA',
        //     'code'  => '3',
        //     'localizedName' => 'Jakarta'
        // ]);
        // Ketentuan::create([
        //     'qualifier' => 'AREA',
        //     'code'  => 'Jakarta',
        //     'localizedName' => 'Jakarta'
        // ]);
    }
}
