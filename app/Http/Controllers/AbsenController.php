<?php

namespace App\Http\Controllers;

use App\Absen;
use App\AbsensiGaji;
use Illuminate\Http\Request;

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
        return view('/absen/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carbon = $this->carbon();
        $absen = $this->absensi_get();
        $a = Absen::all();
        $b = AbsensiGaji::find(4)->data;
        // dd($b);
        return view('/absen/create', compact('absen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store($id, $m, $s, $i, $c,$l, $total, $data, $index)
    {
        $carbon = $this->carbon();
        if (Absen::where('month', $carbon->monthName)->count() == 0 || Absen::where('absensi_gaji_id', $id)->count() == 0) {
            for ($i=0; $i < $carbon->daysInMonth; $i++) { 
                $absen = new Absen;
                $absen->absensi_gaji_id = $id;
                $absen->month = $carbon->monthName;
                $absen->daysamonth = $carbon->daysInMonth;
                $absen->data = '';
                $absen->save();
            }
        }

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
        $absen = $this->absensi_get();
        $data = $this->absen();

        return response()->json([
            'absen' => $absen,
            'data' => $data
        ]);
    }
}
