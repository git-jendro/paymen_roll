<?php

namespace App\Http\Controllers;

use App\Laporan;
use Illuminate\Http\Request;

class FilterLaporanController extends Controller
{
    public function id(Request $request)
    {
        $laporan = Laporan::where('id', 'like', '%'.$request->id.'%')->get();
        $all = Laporan::all();
        return response()->json([
            'laporan'=> $laporan,
            'all' => $all,
        ]);
    }
     
    public function bulan(Request $request)
    {
        $laporan = Laporan::where('nama', 'like', '%'.$request->bulan.'%')->get();
        $all = Laporan::all();
        return response()->json([
            'laporan'=> $laporan,
            'all' => $all,
        ]);
    }

    public function nama(Request $request)
    {
        $laporan = Laporan::where('nama', 'like', '%'.$request->nama.'%')->get();
        $all = Laporan::all();
        return response()->json([
            'laporan'=> $laporan,
            'all' => $all,
        ]);
    }

    public function tahun(Request $request)
    {
        $laporan = Laporan::where('nama', 'like', '%'.$request->tahun.'%')->get();
        $all = Laporan::all();
        return response()->json([
            'laporan'=> $laporan,
            'all' => $all,
        ]);
    }

    public function status(Request $request)
    {
        $laporan = Laporan::where('status', $request->status)->get();
        $all = Laporan::all();
        return response()->json([
            'laporan'=> $laporan,
            'all' => $all,
        ]);
    }
}
