<?php

namespace App\Http\Controllers;

use App\Absen;
use App\AbsensiGaji;
use App\Imports\AbsenImport;
use App\Karyawan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
        $data = Karyawan::orderBy('statusKerja')->paginate(25);
        $carbon = $this->carbon();
        $con = AbsensiGaji::select('id')->where('nip', 'AK-INBOUND-0001 ');
        // $raw = AbsensiGaji::whereHas('karyawan', function ($query) use ($con)
        // {
        //     $query->whereIn('id', $con);
        // })->where('nip', $row[0]);
        $raw = Absen::whereHas('data', function ($query) use ($con)
        {
            $query->whereIn('absensi_gaji_id', $con);
        })->where('month', $carbon->monthName)->get();
        $count = $carbon->daysInMonth + 1;

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
        $ketentuan = $this->ketentuan();

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
                    $absen->year = $carbon->year;
                    $absen->daysamonth = $carbon->daysInMonth;
                    $absen->data = '';
                    $absen->save();
                }
            }

        }

        return view('/absen/create', compact('absen', 'ketentuan'));
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
        $absen->jmlLembur = $o;
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
        $absen = AbsensiGaji::orderBy('created_at', 'desc')->with('karyawan')->get();
        return response()->json([
            'absen' => $absen,
            'data' => $data
        ]);
    }

    public function nama(Request $request)
    {
        $carbon = $this->carbon()->monthName;
        $data = $this->absen();
        // $karyawan = Karyawan::select('nip')->where('nama', 'like', '%'.$request->nama.'%');
        // $absen = AbsensiGaji::whereHas('karyawan', function ($query) use ($karyawan)
        // {
        //     $query->whereIn('nip', $karyawan);
        // })->with('karyawan')->get();
        $absen = Karyawan::where('nama', 'like', '%'.$request->nama.'%')->with('absen')->orderBy('statusKerja')->get();
        $all = Karyawan::with('absen')->orderBy('statusKerja')->get();
        return response()->json([
            'absen' => $absen,
            'data' => $data,
            'all' => $all,
        ]);
        // return response()->json($absen);
    }

    public function import(Request $request)
    {
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		Excel::import(new AbsenImport, $request->file);
        // $data = Absen::all();
        // foreach ($data as $item) {
            
        // }

		return redirect()->action('AbsenController@index')->with('store', 'Data Absen berhasil diimport !');
    }
}
