<?php

namespace App\Http\Controllers;

use App\Absen;
use App\AbsensiGaji;
use App\Karyawan;
use App\Ketentuan;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function ketentuan()
    {
        $ketentuan = Ketentuan::all();

        return $ketentuan;
    }
    public function karyawan_get()
    {
        $karyawan = Karyawan::all();

        return $karyawan;
    }
    public function karyawan_first($id)
    {
        $karyawan = Karyawan::where('nip', $id);

        return $karyawan;
    }
    public function absensi_get()
    {
        $absensi = AbsensiGaji::all();

        return $absensi;
    }
    public function absensi_first($id)
    {
        $absensi = AbsensiGaji::where('id', $id);

        return $absensi;
    }
    public function carbon()
    {
        $carbon = Carbon::now();

        return $carbon;
    }

    public function absen()
    {
        $absen = Absen::get();

        return $absen;
    }
}
