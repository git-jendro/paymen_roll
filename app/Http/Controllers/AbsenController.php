<?php

namespace App\Http\Controllers;

use App\Absen;
use App\AbsensiGaji;
use App\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsenController extends Controller
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $ketentuan = $this->ketentuan();
        $data = AbsensiGaji::orderBy('created_at', 'desc')->get();
        return view('/absen/index', compact('data', 'ketentuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $absen = $this->absensi_get();
        $carbon = $this->carbon();

        if (Absen::where('month', $carbon->monthName)->count() == 0) {
            $karyawan = Karyawan::all();
            foreach ($karyawan as $value) {
                $absensi = new AbsensiGaji;
                $absensi->nip = $value->nip;
                $absensi->isHitung = 1;
                $absensi->isBayar = 1;
                $absensi->save();
                for ($i=0; $i < $carbon->daysInMonth; $i++) { 
                    $absen = new Absen;
                    $absen->absensi_gaji_id = $absensi->id;
                    $absen->month = $carbon->monthName;
                    $absen->daysamonth = $carbon->daysInMonth;
                    $absen->data = '';
                    $absen->save();
                }
            }

        }

        return view('/absen/create', compact('absen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store($id, $m, $s, $i, $c, $l, $o, $total, $data, $index)
    {
        $item = Absen::find($index);
        $item->data = $data;
        $item->save();
 
        $absen = AbsensiGaji::find($id);
        $absen->jmlMasuk = $m;
        $absen->jmlSakit = $s;
        $absen->jmlIzin = $i;
        $absen->jmlCuti = $c;
        $absen->jmlLibur = $l;
        $absen->totalHari = $total;
        $absen->save();
        
        return response()->json($item);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('/absen/edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function get()
    {
        $carbon = $this->carbon()->monthName;
        $data = $this->absen();
        $absen = AbsensiGaji::orderBy('created_at', 'desc')->get();
        return response()->json([
            'absen' => $absen,
            'data' => $data
        ]);
    }

    public function upload(Request $request)
    {
        
    }
}
