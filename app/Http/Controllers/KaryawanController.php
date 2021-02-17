<?php

namespace App\Http\Controllers;

use App\Absen;
use App\AbsensiGaji;
use App\Imports\KaryawanImport;
use App\Karyawan;
use App\Ketentuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Maatwebsite\Excel\Facades\Excel;

class KaryawanController extends Controller
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
        $karyawan = Karyawan::orderBy('statusKerja')->paginate(25);
        $carbon = $this->carbon();

        return view('karyawan/index', compact('ketentuan', 'karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ketentuan = $this->ketentuan();
        
        return view('/karyawan/create', compact('ketentuan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateRequest();
        $gp = Ketentuan::where([
            ['qualifier', 'TIPEUMR'],
            ['code', $request->tipeumr],
        ])->first();
        $carbon = $this->carbon();
        $nip = IdGenerator::generate(['table' => 'karyawan', 'field' => 'nip', 'length' => 15, 'prefix' =>'AK-INBOUND-']);
        Karyawan::create([
            'nip' => $nip,
            'nama' => $request->nama,
            'JK' => $request->JK,
            'tempatlahir' => $request->tempatlahir,
            'dob' => $request->dob,
            'notel' => $request->notel,
            'alamatktp' => $request->alamatktp,
            'alamatdom' => $request->alamatdom,
            'email' => $request->email,
            'noktp' => $request->noktp,
            'nokk' => $request->nokk,
            'npwp' => $request->npwp,
            'statusNikah' => $request->statusNikah,
            'namaAyah' => $request->namaAyah,
            'namaIbu' => $request->namaIbu,
            'statusKerja' => $request->statusKerja,
            'statusKaryawan' => $request->statusKaryawan,
            'tipeumr' => $request->tipeumr,
            'noBpjsKet' => $request->noBpjsKet,
            'noBpjsKes' => $request->noBpjsKes,
            'namaBank' => $request->namaBank,
            'atasNama' => $request->atasNama,
            'cabang' => $request->cabang,
            'noRek' => $request->noRek,
            'PendidikanTerakhir' => $request->PendidikanTerakhir,
            'ipk' => $request->ipk,
            'tahunLulus' => $request->tahunLulus,
            'statusPendidikan' => $request->statusPendidikan,
            'jabatan' => $request->jabatan,
            'divisi' => $request->divisi,
            'penempatan' => $request->penempatan,
            'tanggalMasuk' => $request->tanggalMasuk,
            'noPkwt' => $request->noPkwt,
            'berakhir' => $request->berakhir,
            'mulai' => $request->mulai,
        ]);

        $absen = new AbsensiGaji;
        $absen->nip = $nip;
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
            $data = new Absen;
            $data->absensi_gaji_id = $absen->id;
            $data->month = $carbon->monthName;
            $data->year = $carbon->year;
            $data->daysamonth = $carbon->daysInMonth;
            $data->data = '';
            $data->save();
        }

        return redirect()->action('KaryawanController@index')->with('store', 'Data karyawan berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $karyawan = $this->karyawan_first($id)->first();
        $ketentuan = $this->ketentuan();
        return view('/karyawan/show', compact('karyawan', 'ketentuan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawan = $this->karyawan_first($id)->first();
        $ketentuan = $this->ketentuan();
        return view('/karyawan/edit', compact('karyawan', 'ketentuan'));
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
        $this->validateRequest();
        $gp = Ketentuan::select('flagAttr1')->where([
            ['qualifier', 'TIPEUMR'],
            ['code', $request->tipeumr],
        ])->first();
        $carbon = $this->carbon();
        $this->karyawan_first($id)
        ->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'JK' => $request->JK,
            'tempatlahir' => $request->tempatlahir,
            'dob' => $request->dob,
            'notel' => $request->notel,
            'alamatktp' => $request->alamatktp,
            'alamatdom' => $request->alamatdom,
            'email' => $request->email,
            'noktp' => $request->noktp,
            'nokk' => $request->nokk,
            'npwp' => $request->npwp,
            'statusNikah' => $request->statusNikah,
            'namaAyah' => $request->namaAyah,
            'namaIbu' => $request->namaIbu,
            'statusKerja' => $request->statusKerja,
            'statusKaryawan' => $request->statusKaryawan,
            'tipeumr' => $request->tipeumr,
            'noBpjsKet' => $request->noBpjsKet,
            'noBpjsKes' => $request->noBpjsKes,
            'namaBank' => $request->namaBank,
            'atasNama' => $request->atasNama,
            'cabang' => $request->cabang,
            'noRek' => $request->noRek,
            'PendidikanTerakhir' => $request->PendidikanTerakhir,
            'ipk' => $request->ipk,
            'tahunLulus' => $request->tahunLulus,
            'statusPendidikan' => $request->statusPendidikan,
            'jabatan' => $request->jabatan,
            'divisi' => $request->divisi,
            'penempatan' => $request->penempatan,
            'tanggalMasuk' => $request->tanggalMasuk,
            'noPkwt' => $request->noPkwt,
            'berakhir' => $request->berakhir,
            'mulai' => $request->mulai,
        ]);

        $absen = AbsensiGaji::where('nip', $id)->first();
        AbsensiGaji::where('nip', $id)
            ->update([
                'gajiPokok' => $gp->flagAttr1
            ]);

        Absen::where('absensi_gaji_id', $absen->id)
            ->update([
                'month' => $carbon->monthName,
                'year' => $carbon->year,
                'daysamonth' => $carbon->daysInMonth,
            ]);
        
        return redirect()->action('KaryawanController@index')->with('update', 'Data karyawan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nip)
    {
        $data = AbsensiGaji::where('nip', $nip)->get();
        foreach ($data as $key ) {
            Absen::where('absensi_gaji_id', $key->id)->delete();
        }
        AbsensiGaji::where('nip', $nip)->delete();
        $this->karyawan_first($nip)->delete();

        return redirect()->action('KaryawanController@index')->with('delete', 'Data karyawan berhasil dihapus');
    }

    public function validateRequest()
    {
            return tap(request()->validate([
                'nama' => 'required',
                'JK' => 'required',
                'tempatlahir' => 'required',
                'dob' => 'required',
                'notel' => 'required|numeric',
                'alamatktp' => 'required',
                'alamatdom' => 'required',
                'email' => 'required',
                'noktp' => 'required|numeric',
                'nokk' => 'required|numeric',
                'npwp' => 'required|numeric',
                'statusNikah' => 'required',
                'namaAyah' => 'required',
                'namaIbu' => 'required',
                'statusKerja' => 'required',
                'statusKaryawan' => 'required',
                'tipeumr' => 'required',
                'noBpjsKet' => 'required|numeric',
                'noBpjsKes' => 'required|numeric',
                'namaBank' => 'required',
                'atasNama' => 'required',
                'cabang' => 'required',
                'noRek' => 'required|numeric',
                'PendidikanTerakhir' => 'required',
                'ipk' => 'required_if:PendidikanTerakhir,4,5',
                'tahunLulus' => 'required|numeric',
                'statusPendidikan' => 'required',
                'jabatan' => 'required',
                'divisi' => 'required',
                'penempatan' => 'required',
                'tanggalMasuk' => 'required',
                'noPkwt' => 'required|numeric',
                'berakhir' => 'required',
                'mulai' => 'required',
                ]), 
                function(){
                    },
                
            );
    }

    public function import(Request $request)
    {
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// $file = $request->file('file');
 
		Excel::import(new KaryawanImport, $request->file);

		return redirect()->action('KaryawanController@index')->with('store', 'Data Karyawan berhasil diimport !');
    }
}
