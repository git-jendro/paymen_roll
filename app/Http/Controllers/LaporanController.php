<?php

namespace App\Http\Controllers;

use App\Absen;
use App\AbsensiGaji;
use App\DataLaporan;
use App\Karyawan;
use App\Ketentuan;
use App\Laporan;
use PDF;
use Carbon\Carbon;
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
        $data = Absen::all();
        $status = Ketentuan::where('qualifier', 'STATUSKARYAWAN')->get();
        $laporan = Laporan::paginate(25);
        $carbon = Carbon::create();
        $bulan = [];
        for ($m=1; $m<=12; $m++) {
            $bulan[] = Carbon::create()->months($m)->monthName;
        }

        return view('/laporan/index', compact('data', 'status', 'laporan', 'bulan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($month, $year, $status)
    {
        $stat = Karyawan::select('nip')->where('statusKaryawan', $status);
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
            ['qualifier', 'STATUSKARYAWAN'],
            ['code', $status],
        ])->first();
        $bank = Ketentuan::where('qualifier', 'BANK')->get();
        $divisi = Ketentuan::where('qualifier', 'DIVISI')->get();
        return response()->json([
            'absen' => $absen,
            'ket' => $ket,
            'bank' => $bank,
            'divisi' => $divisi,
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
            ['qualifier', 'STATUSKARYAWAN'],
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
        $ket = Ketentuan::where('qualifier', 'STATUSKARYAWAN')->get();
        $bank = Ketentuan::where('qualifier', 'BANK')->get();
        $divisi = Ketentuan::where('qualifier', 'DIVISI')->get();
        return response()->json([
            'data' => $data,
            'lap' => $lap,
            'ket' => $ket,
            'bank' => $bank,
            'divisi' => $divisi,
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
        $data = Absen::all();
        $status = Ketentuan::where('qualifier', 'STATUSKARYAWAN')->get();
        $laporan = Laporan::paginate(25);
        $carbon = Carbon::create();
        $bulan = [];
        for ($m=1; $m<=12; $m++) {
            $bulan[] = Carbon::create()->months($m)->monthName;
        }

        return view('/laporan/lihat', compact('data', 'status', 'laporan', 'bulan'));
    }

    public function simpan(Request $request)
    {
        $conn = DataLaporan::select('absensi_gaji_id')->where('laporan_id', $request->id);
        $data = AbsensiGaji::whereHas('karyawan', function ($query) use ($conn)
        {
            $query->whereIn('id', $conn);
        })->with('karyawan')->get();
        $lap = $this->lap_con($request->id)->first();
        $ket = Ketentuan::where('qualifier', 'STATUSKARYAWAN')->get();
        $bank = Ketentuan::where('qualifier', 'BANK')->get();
        $divisi = Ketentuan::where('qualifier', 'DIVISI')->get();
        $pdf = PDF::loadview('laporan/print', compact('data', 'ket', 'bank', 'divisi'))->setPaper('a4', 'landscape');
        return $pdf->stream('laporan-nilai-'.$lap->nama.'.pdf');
        // return view('laporan/print', compact('data', 'ket', 'bank', 'divisi'));
    }
}
