<?php

namespace App\Http\Controllers;

use App\Absen;
use App\AbsensiGaji;
use App\Karyawan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

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
        $karyawan = $this->karyawan_get();

        return view('/karyawan/index', compact('ketentuan', 'karyawan'));
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
        // $karyawan = Karyawan::create($this->validateRequest());
        // $this->nip($karyawan);
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
        $absen->save();

        
        if (Absen::where('month', Carbon::now()->month)->count() == 0) {
            
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
        // $this->nip($karyawan);
        
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
                'tipeumr' => 'required',
                'noBpjsKet' => 'required|numeric',
                'noBpjsKes' => 'required|numeric',
                //kondisi saat status nikah 2 (menikah) sedangkan field yang divalidasi kosong
                // 'noBpjsKesPas' => 'required_if:statusNikah,2',
                // 'namaPas' => 'required_if:statusNikah,2|required_with:namaAn1,namaAn2,namaAn3',
                // 'jkPas' => 'required_if:statusNikah,2',
                // 'noKtpPas' => 'required_if:statusNikah,2',
                // 'tempatLahirPas' => 'required_if:statusNikah,2',
                // 'dobPas' => 'required_if:statusNikah,2',
                //kondisi field akan error bila field yang ada didalam required_with diisi sedang field yang yang divalidasi kosong
                //pengisian field require_with tidak boleh pakai spasi
                // 'noBpjsKesAn1' => 'required_with:namaAn1,jkAn1,tempatLahirAn1,dobAn1',
                // 'namaAn1' => 'required_with:noBpjsKesAn1,jkAn1,tempatLahirAn1,dobAn1,namaAn2,namaAn3',
                // 'jkAn1' => 'required_with:namaAn1,noBpjsKesAn1,tempatLahirAn1,dobAn1',
                // 'tempatLahirAn1' => 'required_with:namaAn1,noBpjsKesAn1,jkAn1,dobAn1',
                // 'dobAn1' => 'required_with:namaAn1,noBpjsKesAn1,tempatLahirAn1,jkAn1',
                // 'namaAn2' => 'required_with:noBpjsKesAn2,jkAn2,tempatLahirAn2,dobAn2,namaAn3',
                // 'noBpjsKesAn2' => 'required_with:namaAn2,jkAn2,tempatLahirAn2,dobAn2',
                // 'jkAn2' => 'required_with:namaAn2,noBpjsKesAn2,tempatLahirAn2,dobAn2',
                // 'tempatLahirAn2' => 'required_with:namaAn2,noBpjsKesAn2,jkAn2,dobAn2',
                // 'dobAn2' => 'required_with:namaAn2,noBpjsKesAn2,jkAn2,tempatLahirAn2',
                // 'namaAn3' => 'required_with:jkAn3,tempatLahirAn3,dobAn3,noBpjsKesAn3',
                // 'noBpjsKesAn3' => 'required_with:namaAn3,jkAn3,tempatLahirAn3,dobAn3',
                // 'jkAn3' => 'required_with:namaAn3,jkAn3,tempatLahirAn3,dobAn3,noBpjsKesAn3',
                // 'tempatLahirAn3' => 'required_with:namaAn3,jkAn3,tempatLahirAn3,dobAn3,noBpjsKesAn3',
                // 'dobAn3' => 'required_with:namaAn3,jkAn3,tempatLahirAn3,dobAn3,noBpjsKesAn3',
                'namaBank' => 'required',
                'atasNama' => 'required',
                'cabang' => 'required',
                'noRek' => 'required|numeric',
                'PendidikanTerakhir' => 'required',
                'ipk' => 'required',
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

    // public function nip($karyawan)
    // {
    //     if (request()->has('nip')) {
    //         $karyawan->update([
    //             'nip' => request()->nip
    //         ]);
    //     }else {
    //         $karyawan->update([
    //             'nip' => IdGenerator::generate(['table' => 'karyawan', 'field' => 'nip', 'length' => 15, 'prefix' =>'AK-INBOUND-'])
    //         ]);
    //     }
    // }
}
