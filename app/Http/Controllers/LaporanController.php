<?php

namespace App\Http\Controllers;

use App\Absen;
use App\AbsensiGaji;
use App\DataLaporan;
use App\Karyawan;
use App\Ketentuan;
use App\Laporan;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $stat = Karyawan::select('nip')->where('gajiPokok', 1);
        

        // $ket = AbsensiGaji::select('id')->where('nip', 10);
        // $coll = Absen::whereHas('data', function ($query) use ($ket)
        // {
        //     $query->whereIn('absensi_gaji_id', $ket);
        // })->with('data')->get();
        // dd($absen);
        $data = Absen::all();
        $status = Ketentuan::where('qualifier', 'STATUSKARYAWAN')->get();
        $laporan = $this->laporan_get();

        return view('/laporan/index', compact('data', 'status', 'laporan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($month, $year, $status)
    {
        $stat = Karyawan::select('nip')->where('statusKerja', $status);
        $bul = Absen::select('absensi_gaji_id')->where([
            ['month', $month],
            ['year', $year],
        ]);
        $absen = AbsensiGaji::whereHas('karyawan', function ($query) use ($bul, $stat)
        {
            $query->whereIn('id', $bul)
            ->whereIn('nip', $stat);
        })->with('karyawan')->get();

        $ket = Ketentuan::where([
            ['qualifier', 'TIPEKARYAWAN'],
            ['code', $status],
        ])->first();
        // dd($status);
        
        // $collection = UserRule::select('id_menu')->where('id_level_user', Auth::user()->id_level_user);
        // $sql_menu = $menu->whereHas('rule', function ($query) use ($collection) {
        // $query->whereIn('id', $collection)
        // ->where('is_main_menu', 0);
        // })->get();
        // $absen = AbsensiGaji::with('data')->get();
        return response()->json([
            'absen' => $absen,
            'ket' => $ket
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ket = Ketentuan::where([
            ['qualifier', 'TIPEKARYAWAN'],
            ['code', $request->status],
        ])->first();
        $id = IdGenerator::generate(['table' => 'laporan', 'field' => 'id', 'length' => 6, 'prefix' =>'LAP']);
        $lap = new Laporan;
        $lap->id = $id;
        $lap->nama = 'Laporan Gaji '.$ket->localizedName.' '.$request->bulan.' '.$request->tahun;
        $lap->status = 'Dikirim';
        $lap->save();

        foreach ($request->id as $key ) {
            $data = new DataLaporan;
            $data->laporan_id = $lap->id;
            $data->absensi_gaji_id = $key;
            $data->save();
        }

        return redirect()->action('LaporanController@index')->with('store', 'Data laporan berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conn = DataLaporan::select('absensi_gaji_id')->where('laporan_id', $id);
        $data = AbsensiGaji::whereHas('karyawan', function ($query) use ($conn)
        {
            $query->whereIn('id', $conn);
        })->with('karyawan')->get();
        $lap = $this->lap_con($id)->first();
        
        // dd($data);
        return response()->json([
            'data' => $data,
            'lap' => $lap
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    public function lihat()
    {
        return view('/laporan/lihat');
    }
}
