<?php

namespace App\Http\Controllers;

use App\Karyawan;
use App\Ketentuan;
use Illuminate\Http\Request;

class FilterKaryawanController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
    $this->middleware('auth');
    }

    //Filter berdasarkan data NIP Karyawan
    public function nip(Request $request)
    {
        $ket = Ketentuan::where('qualifier', 'STATUSKARYAWAN')->get();
        $jk = Ketentuan::where('qualifier', 'JENISKELAMIN')->get();
        $umr = Ketentuan::where('qualifier', 'TIPEUMR')->get();
        $htg = Ketentuan::where('qualifier', 'HITUNG')->get();
        $byr = Ketentuan::where('qualifier', 'BAYAR')->get();
        $karyawan = Karyawan::where('nip', 'like', '%'.$request->nip.'%')->with('absen')->get();
        $all = Karyawan::with('absen')->get();

        return response()->json([
            'karyawan' => $karyawan,
            'all' => $all,
            'ket' => $ket,
            'jk' => $jk,
            'umr' => $umr,
            'htg' => $htg,
            'byr' => $byr,
        ]);
        // return response()->json($request->nip);
    }

    public function nik(Request $request)
    {
        $ket = Ketentuan::where('qualifier', 'STATUSKARYAWAN')->get();
        $jk = Ketentuan::where('qualifier', 'JENISKELAMIN')->get();
        $umr = Ketentuan::where('qualifier', 'TIPEUMR')->get();
        $htg = Ketentuan::where('qualifier', 'HITUNG')->get();
        $byr = Ketentuan::where('qualifier', 'BAYAR')->get();
        $karyawan = Karyawan::where('noktp', 'like', '%'.$request->nik.'%')->with('absen')->get();
        $all = Karyawan::with('absen')->get();

        return response()->json([
            'karyawan' => $karyawan,
            'all' => $all,
            'ket' => $ket,
            'jk' => $jk,
            'umr' => $umr,
            'htg' => $htg,
            'byr' => $byr,
        ]);
        // return response()->json('Hello');
    }

    public function tipe(Request $request)
    {
        $ket = Ketentuan::where('qualifier', 'STATUSKARYAWAN')->get();
        $jk = Ketentuan::where('qualifier', 'JENISKELAMIN')->get();
        $karyawan = Karyawan::where('statusKerja', 'like', '%'.$request->tipe.'%')->with('absen')->get();
        $all = Karyawan::with('absen')->get();

        return response()->json([
            'karyawan' => $karyawan,
            'all' => $all,
            'ket' => $ket,
            'jk' => $jk,
        ]);
        // return response()->json('Hello');
    }

    public function nama(Request $request)
    {
        $ket = Ketentuan::where('qualifier', 'STATUSKARYAWAN')->get();
        $jk = Ketentuan::where('qualifier', 'JENISKELAMIN')->get();
        $umr = Ketentuan::where('qualifier', 'TIPEUMR')->get();
        $htg = Ketentuan::where('qualifier', 'HITUNG')->get();
        $byr = Ketentuan::where('qualifier', 'BAYAR')->get();
        $karyawan = Karyawan::where('nama', 'like', '%'.$request->nama.'%')->with('absen')->get();
        $all = Karyawan::with('absen')->get();

        return response()->json([
            'karyawan' => $karyawan,
            'all' => $all,
            'ket' => $ket,
            'jk' => $jk,
            'umr' => $umr,
            'htg' => $htg,
            'byr' => $byr,
        ]);
        // return response()->json('Hello');
    }

    public function jk(Request $request)
    {
        $ket = Ketentuan::where('qualifier', 'STATUSKARYAWAN')->get();
        $jk = Ketentuan::where('qualifier', 'JENISKELAMIN')->get();
        $karyawan = Karyawan::where('JK', 'like', '%'.$request->jk.'%')->with('absen')->get();
        $all = Karyawan::with('absen')->get();

        return response()->json([
            'karyawan' => $karyawan,
            'all' => $all,
            'ket' => $ket,
            'jk' => $jk,
        ]);
        // return response()->json('Hello');
    }
}
