<?php

namespace App\Http\Controllers;

use App\AbsensiGaji;
use App\Karyawan;
use App\Ketentuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $kar = Ketentuan::where('qualifier', 'STATUSKARYAWAN')->get();
        $ker = Ketentuan::where('qualifier', 'STATUSKERJA')->get();
        $jk = Ketentuan::where('qualifier', 'JENISKELAMIN')->get();
        $umr = Ketentuan::where('qualifier', 'TIPEUMR')->get();
        $htg = Ketentuan::where('qualifier', 'HITUNG')->get();
        $byr = Ketentuan::where('qualifier', 'BAYAR')->get();
        $karyawan = Karyawan::where('nip', 'like', '%'.$request->nip.'%')->with('absen')->get();
        $all = Karyawan::with('absen')->get();
        $user = Auth::user()->role;

        return response()->json([
            'karyawan' => $karyawan,
            'user' => $user,
            'all' => $all,
            'ker' => $ker,
            'kar' => $kar,
            'jk' => $jk,
            'umr' => $umr,
            'htg' => $htg,
            'byr' => $byr,
        ]);
        // return response()->json($request->nip);
    }

    public function nik(Request $request)
    {
        $kar = Ketentuan::where('qualifier', 'STATUSKARYAWAN')->get();
        $ker = Ketentuan::where('qualifier', 'STATUSKERJA')->get();
        $jk = Ketentuan::where('qualifier', 'JENISKELAMIN')->get();
        $umr = Ketentuan::where('qualifier', 'TIPEUMR')->get();
        $htg = Ketentuan::where('qualifier', 'HITUNG')->get();
        $byr = Ketentuan::where('qualifier', 'BAYAR')->get();
        $karyawan = Karyawan::where('noktp', 'like', '%'.$request->nik.'%')->with('absen')->get();
        $all = Karyawan::with('absen')->get();
        $user = Auth::user()->role;

        return response()->json([
            'karyawan' => $karyawan,
            'user' => $user,
            'all' => $all,
            'ker' => $ker,
            'kar' => $kar,
            'jk' => $jk,
            'umr' => $umr,
            'htg' => $htg,
            'byr' => $byr,
        ]);
        // return response()->json('Hello');
    }

    public function tipe(Request $request)
    {
        $kar = Ketentuan::where('qualifier', 'STATUSKARYAWAN')->get();
        $ker = Ketentuan::where('qualifier', 'STATUSKERJA')->get();
        $jk = Ketentuan::where('qualifier', 'JENISKELAMIN')->get();
        $umr = Ketentuan::where('qualifier', 'TIPEUMR')->get();
        $htg = Ketentuan::where('qualifier', 'HITUNG')->get();
        $byr = Ketentuan::where('qualifier', 'BAYAR')->get();
        $karyawan = Karyawan::where('statusKaryawan', 'like', '%'.$request->tipe.'%')->with('absen')->get();
        $all = Karyawan::with('absen')->get();
        $user = Auth::user()->role;

        return response()->json([
            'karyawan' => $karyawan,
            'user' => $user,
            'all' => $all,
            'ker' => $ker,
            'kar' => $kar,
            'jk' => $jk,
            'umr' => $umr,
            'htg' => $htg,
            'byr' => $byr,
        ]);
        // return response()->json('Hello');
    }

    public function status(Request $request)
    {
        $kar = Ketentuan::where('qualifier', 'STATUSKARYAWAN')->get();
        $ker = Ketentuan::where('qualifier', 'STATUSKERJA')->get();
        $jk = Ketentuan::where('qualifier', 'JENISKELAMIN')->get();
        $karyawan = Karyawan::where('statusKerja', 'like', '%'.$request->status.'%')->with('absen')->get();
        $all = Karyawan::with('absen')->get();
        $user = Auth::user()->role;

        return response()->json([
            'karyawan' => $karyawan,
            'user' => $user,
            'all' => $all,
            'ker' => $ker,
            'kar' => $kar,
            'jk' => $jk,
        ]);
        // return response()->json('Hello');
    }

    public function nama(Request $request)
    {
        $kar = Ketentuan::where('qualifier', 'STATUSKARYAWAN')->get();
        $ker = Ketentuan::where('qualifier', 'STATUSKERJA')->get();
        $jk = Ketentuan::where('qualifier', 'JENISKELAMIN')->get();
        $umr = Ketentuan::where('qualifier', 'TIPEUMR')->get();
        $htg = Ketentuan::where('qualifier', 'HITUNG')->get();
        $byr = Ketentuan::where('qualifier', 'BAYAR')->get();
        $karyawan = Karyawan::where('nama', 'like', '%'.$request->nama.'%')->with('absen')->get();
        $all = Karyawan::with('absen')->get();
        $user = Auth::user()->role;

        return response()->json([
            'karyawan' => $karyawan,
            'user' => $user,
            'all' => $all,
            'ker' => $ker,
            'kar' => $kar,
            'jk' => $jk,
            'umr' => $umr,
            'htg' => $htg,
            'byr' => $byr,
        ]);
        // return response()->json('Hello');
    }

    public function jk(Request $request)
    {
        $kar = Ketentuan::where('qualifier', 'STATUSKARYAWAN')->get();
        $ker = Ketentuan::where('qualifier', 'STATUSKERJA')->get();
        $jk = Ketentuan::where('qualifier', 'JENISKELAMIN')->get();
        $karyawan = Karyawan::where('JK', 'like', '%'.$request->jk.'%')->with('absen')->get();
        $all = Karyawan::with('absen')->get();
        $user = Auth::user()->role;

        return response()->json([
            'karyawan' => $karyawan,
            'user' => $user,
            'all' => $all,
            'ker' => $ker,
            'kar' => $kar,
            'jk' => $jk,
        ]);
        // return response()->json('Hello');
    }

    public function hitung(Request $request)
    {
        $kar = Ketentuan::where('qualifier', 'STATUSKARYAWAN')->get();
        $ker = Ketentuan::where('qualifier', 'STATUSKERJA')->get();
        $jk = Ketentuan::where('qualifier', 'JENISKELAMIN')->get();
        $umr = Ketentuan::where('qualifier', 'TIPEUMR')->get();
        $htg = Ketentuan::where('qualifier', 'HITUNG')->get();
        $byr = Ketentuan::where('qualifier', 'BAYAR')->get();
        // $karyawan = Karyawan::where('hitung', 'like', '%'.$request->nama.'%')->with('absen')->get();
        $karyawan = AbsensiGaji::where('isHitung', 'like', '%'.$request->hitung.'%')->with('karyawan')->get();
        $all = AbsensiGaji::with('karyawan')->get();
        $user = Auth::user()->role;

        return response()->json([
            'karyawan' => $karyawan,
            'user' => $user,
            'all' => $all,
            'ker' => $ker,
            'kar' => $kar,
            'jk' => $jk,
            'umr' => $umr,
            'htg' => $htg,
            'byr' => $byr,
        ]);
        // return response()->json('Hello');
    }

    public function bayar(Request $request)
    {
        $kar = Ketentuan::where('qualifier', 'STATUSKARYAWAN')->get();
        $ker = Ketentuan::where('qualifier', 'STATUSKERJA')->get();
        $jk = Ketentuan::where('qualifier', 'JENISKELAMIN')->get();
        $umr = Ketentuan::where('qualifier', 'TIPEUMR')->get();
        $htg = Ketentuan::where('qualifier', 'HITUNG')->get();
        $byr = Ketentuan::where('qualifier', 'BAYAR')->get();
        $karyawan = AbsensiGaji::where('Isbayar', 'like', '%'.$request->bayar.'%')->with('karyawan')->get();
        $all = AbsensiGaji::with('karyawan')->get();
        $user = Auth::user()->role;
        
        return response()->json([
            'karyawan' => $karyawan,
            'user' => $user,
            'all' => $all,
            'ker' => $ker,
            'kar' => $kar,
            'jk' => $jk,
            'umr' => $umr,
            'htg' => $htg,
            'byr' => $byr,
        ]);
        // return response()->json('Hello');
    }
}
