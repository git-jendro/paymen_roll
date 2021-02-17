<?php

namespace App\Imports;

use App\Absen;
use App\AbsensiGaji;
use Importable;

use App\Karyawan;
use App\Ketentuan;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;

class KaryawanImport implements ToModel, WithValidation, SkipsOnError
{
    public function rules(): array
    {
        return [
            'nip' => 'unique:karyawan',
        ];
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row[2] == 'Laki - laki' || $row[2] == 'Laki-laki' || $row[2] == 'Pria') {
            $jk = 1;
        } elseif ($row[2] == 'Wanita' || $row[2] == 'Perempuan') {
            $jk = 2;
        }
        if ($row[12] == 'Lajang' || $row[12] == 'Single' || $row[12] == 'Belum Menikah') {
            $nikah = 1;
        } elseif ($row[12] == 'Menikah' || $row[12] == 'Married') {
            $nikah = 2;
        }
        if ($row[15] == 'Aktif') {
            $statker = 1;
        } elseif ($row[15] == 'Resign' || $row[15] == 'Keluar') {
            $statker = 2;
        }
        if ($row[16] == 'Karyawan Kontrak') {
            $statkar = 1;
        } elseif ($row[16] == 'Karyawan Harian') {
            $statkar = 2;
        }
        if ($row[28] == 'Staff') {
            $jab = 1;
        }
        if ($row[29] == 'Inbound') {
            $div = 1;
        }
        if ($row[30] == 'Cimanggis') {
            $penm = 1;
        }
        $gp = Ketentuan::where([
            ['qualifier', 'TIPEUMR'],
            ['localizedName', $row[17]],
        ])->first();
        $bank = Ketentuan::where([
            ['qualifier', 'BANK'],
            ['localizedName', $row[20]],
        ])->first();
        $pend = Ketentuan::where([
            ['qualifier', 'PENDIDIKAN'],
            ['localizedName', $row[24]],
        ])->first();
        $statpend = Ketentuan::where([
            ['qualifier', 'STATUSPENDIDIKAN'],
            ['localizedName', $row[27]],
        ])->first();
        $karyawan = new Karyawan([
            'nip' =>$row[0],
            'nama'  =>$row[1],
            'JK'  =>$jk,
            'tempatlahir'  =>$row[3],
            'dob'  =>$row[4],
            'notel'  =>$row[5],
            'alamatktp'  =>$row[6],
            'alamatdom'  =>$row[7],
            'email'  =>$row[8],
            'noktp'  =>$row[9],
            'nokk'  =>$row[10],
            'npwp'  =>$row[11],
            'statusNikah'  =>$nikah,
            'namaAyah'  =>$row[13],
            'namaIbu'  =>$row[14],
            'statusKerja' =>$statker,
            'statusKaryawan'  =>$statkar,
            'tipeumr'  =>$gp->code,
            'noBpjsKet'  =>$row[18],
            'noBpjsKes'  =>$row[19],
            'namaBank'  =>$bank,
            'atasNama'  =>$row[21],
            'cabang'  =>$row[22],
            'noRek'  =>$row[23],
            'PendidikanTerakhir'  =>$pend->code,
            'ipk'  =>$row[25],
            'tahunLulus'  =>$row[26],
            'statusPendidikan'  =>$statpend->code,
            'jabatan'  =>$jab,
            'divisi'  =>$div,
            'penempatan'  =>$penm,
            'tanggalMasuk'  =>$row[31],
            'noPkwt'  =>$row[32],
            'berakhir'  =>$row[33],
            'mulai'  =>$row[34],

        ]);
        $nip = $row[0];
        $carbon = Carbon::now();
        $con = Absen::select('absensi_gaji_id')->where('month', $carbon->monthName);
        $count = AbsensiGaji::whereHas('karyawan', function ($query) use ($con)
        {
            $query->whereIn('id', $con);
        })->where('nip', $row[0])->count();

        if ($count == 0) {
            $absen = new AbsensiGaji();
            $absen->nip = $row[0];
            $absen->jmlMasuk = 0;
            $absen->jmlSakit = 0;
            $absen->jmlIzin = 0;
            $absen->jmlCuti = 0;
            $absen->jmlLibur = 0;
            $absen->jmlLembur = 0;
            $absen->totalHari = 0;
            $absen->isHitung = 1;
            $absen->isBayar = 1;
            $absen->isBayar = 1;
            $absen->gajiPokok = $gp->flagAttr1;
            $absen->save();

            for ($i=0; $i < $carbon->daysInMonth; $i++) { 
                $data = new Absen();
                $data->absensi_gaji_id = $absen->id;
                $data->month = $carbon->monthName;
                $data->year = $carbon->year;
                $data->daysamonth = $carbon->daysInMonth;
                $data->data = '';
                $data->save();
            }
            return [$karyawan, $absen, $data];
        } else {
            return [$karyawan];
        }
    }
    
    /**
     * @param \Throwable $e
     */
    public function onError(\Throwable $e)
    {
        // Handle the exception how you'd like.
    }
}
