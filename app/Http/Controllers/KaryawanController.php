<?php

namespace App\Http\Controllers;

use App\Karyawan;
use App\Ketentuan;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Validation\Rule;

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
        // $this->validateRequest();

        // $karyawan = new Karyawan;
        // $karyawan->nip = IdGenerator::generate(['table' => 'karyawan', 'field' => 'nip' , 'length' => 6, 'prefix' => 'AKU']);
        // $karyawan->nama = $request->nama;
        // $karyawan->JK = $request->JK;
        // $karyawan->tempatlahir = $request->tempatlahir;
        // $karyawan->dob = $request->dob;
        // $karyawan->notel = $request->notel;
        // $karyawan->alamatktp = $request->alamatktp;
        // $karyawan->alamatdom = $request->alamatdom;
        // $karyawan->email = $request->email;
        // $karyawan->noktp = $request->noktp;
        // $karyawan->nokk = $request->nokk;
        // $karyawan->npwp = $request->npwp;
        // $karyawan->statusNikah = $request->statusNikah;
        // $karyawan->namaAyah = $request->namaAyah;
        // $karyawan->namaIbu = $request->namaIbu;
        // $karyawan->statusKerja = $request->statusKerja;
        // $karyawan->tipeumr = $request->tipeumr;
        // $karyawan->noBpjsKet = $request->noBpjsKet;
        // $karyawan->noBpjsKes = $request->noBpjsKes;
        // $karyawan->noBpjsKesPas = $request->noBpjsKesPas;
        // $karyawan->noBpjsKesAn1 = $request->noBpjsKesAn1;
        // $karyawan->noBpjsKesAn2 = $request->noBpjsKesAn2;
        // $karyawan->noBpjsKesAn3 = $request->noBpjsKesAn3;
        // $karyawan->namaPas = $request->namaPas;
        // $karyawan->jkPas = $request->jkPas;
        // $karyawan->noKtpPas = $request->noKtpPas;
        // $karyawan->tempatLahirPas = $request->tempatLahirPas;
        // $karyawan->dobPas = $request->dobPas;
        // $karyawan->namaAn1 = $request->namaAn1;
        // $karyawan->jkAn1 = $request->jkAn1;
        // $karyawan->tempatLahirAn1 = $request->tempatLahirAn1;
        // $karyawan->dobAn1 = $request->dobAn1;
        // $karyawan->namaAn2 = $request->namaAn2;
        // $karyawan->jkAn2 = $request->jkAn2;
        // $karyawan->tempatLahirAn2 = $request->tempatLahirAn2;
        // $karyawan->dobAn2 = $request->dobAn2;
        // $karyawan->namaAn3 = $request->namaAn3;
        // $karyawan->jkAn3 = $request->jkAn3;
        // $karyawan->tempatLahirAn3 = $request->tempatLahirAn3;
        // $karyawan->dobAn3 = $request->dobAn3;
        // $karyawan->namaBank = $request->namaBank;
        // $karyawan->atasNama = $request->atasNama;
        // $karyawan->cabang = $request->cabang;
        // $karyawan->noRek = $request->noRek;
        // $karyawan->PendidikanTerakhir = $request->PendidikanTerakhir;
        // $karyawan->ipk = $request->ipk;
        // $karyawan->tahunLulus = $request->tahunLulus;
        // $karyawan->statusPendidikan = $request->statusPendidikan;
        // $karyawan->jabatan = $request->jabatan;
        // $karyawan->divisi = $request->divisi;
        // $karyawan->penempatan = $request->penempatan;
        // $karyawan->tanggalMasuk = $request->tanggalMasuk;
        // $karyawan->noPkwt = $request->noPkwt;
        // $karyawan->berakhir = $request->berakhir;
        // $karyawan->mulai = $request->mulai;
        // $karyawan->save();
        // dd($request);

        Karyawan::create($this->validateRequest());

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
        // dd(request('statusNikah'));
        $karyawan = $this->karyawan_first($id)->first();
        $karyawan->update($this->validateRequest());
        // $this->storePas($request, $karyawan);
        // dd($query);
        
        return redirect()->action('KaryawanController@index')->with('update', 'Data karyawan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Karyawan::destroy($id);

        return redirect()->action('KaryawanController@index')->with('delete', 'Data karyawan berhasil dihapus');
    }

    public function validateRequest()
    {
            return tap(request()->validate([
                'nip' => 'required',
                'nama' => 'required',
                'JK' => 'required',
                'tempatlahir' => 'required',
                'dob' => 'required',
                'notel' => 'required',
                'alamatktp' => 'required',
                'alamatdom' => 'required',
                'email' => 'required',
                'noktp' => 'required',
                'nokk' => 'required',
                'npwp' => 'required',
                'statusNikah' => 'required',
                'namaAyah' => 'required',
                'namaIbu' => 'required',
                'statusKerja' => 'required',
                'tipeumr' => 'required',
                'noBpjsKet' => 'required',
                'noBpjsKes' => 'required',
                //kondisi saat status nikah 2 (menikah) sedangkan field yang divalidasi kosong
                'noBpjsKesPas' => 'required_if:statusNikah,2|required_unless:statusNikah,1',
                'namaPas' => 'required_if:statusNikah,2|required_unless:statusNikah,1|required_with:namaAn1,namaAn2,namaAn3',
                'jkPas' => 'required_if:statusNikah,2|required_unless:statusNikah,1',
                'noKtpPas' => 'required_if:statusNikah,2|required_unless:statusNikah,1',
                'tempatLahirPas' => 'required_if:statusNikah,2|required_unless:statusNikah,1',
                'dobPas' => 'required_if:statusNikah,2|required_unless:statusNikah,1',
                //kondisi field akan error bila field yang ada didalam required_with diisi sedang field yang yang divalidasi kosong
                //pengisian field require_with tidak boleh pakai spasi
                'noBpjsKesAn1' => 'required_with:namaAn1,jkAn1,tempatLahirAn1,dobAn1',
                'namaAn1' => 'required_with:noBpjsKesAn1,jkAn1,tempatLahirAn1,dobAn1,namaAn2,namaAn3',
                'jkAn1' => 'required_with:namaAn1,noBpjsKesAn1,tempatLahirAn1,dobAn1',
                'tempatLahirAn1' => 'required_with:namaAn1,noBpjsKesAn1,jkAn1,dobAn1',
                'dobAn1' => 'required_with:namaAn1,noBpjsKesAn1,tempatLahirAn1,jkAn1',
                'namaAn2' => 'required_with:noBpjsKesAn2,jkAn2,tempatLahirAn2,dobAn2,namaAn3',
                'noBpjsKesAn2' => 'required_with:namaAn2,jkAn2,tempatLahirAn2,dobAn2',
                'jkAn2' => 'required_with:namaAn2,noBpjsKesAn2,tempatLahirAn2,dobAn2',
                'tempatLahirAn2' => 'required_with:namaAn2,noBpjsKesAn2,jkAn2,dobAn2',
                'dobAn2' => 'required_with:namaAn2,noBpjsKesAn2,jkAn2,tempatLahirAn2',
                'namaAn3' => 'required_with:jkAn3,tempatLahirAn3,dobAn3,noBpjsKesAn3',
                'noBpjsKesAn3' => 'required_with:namaAn3,jkAn3,tempatLahirAn3,dobAn3',
                'jkAn3' => 'required_with:namaAn3,jkAn3,tempatLahirAn3,dobAn3,noBpjsKesAn3',
                'tempatLahirAn3' => 'required_with:namaAn3,jkAn3,tempatLahirAn3,dobAn3,noBpjsKesAn3',
                'dobAn3' => 'required_with:namaAn3,jkAn3,tempatLahirAn3,dobAn3,noBpjsKesAn3',
                'namaBank' => 'required',
                'atasNama' => 'required',
                'cabang' => 'required',
                'noRek' => 'required',
                'PendidikanTerakhir' => 'required',
                'ipk' => 'required',
                'tahunLulus' => 'required',
                'statusPendidikan' => 'required',
                'jabatan' => 'required',
                'divisi' => 'required',
                'penempatan' => 'required',
                'tanggalMasuk' => 'required',
                'noPkwt' => 'required',
                'berakhir' => 'required',
                'mulai' => 'required',
            ]), 
            function(){
                    // if (request()->has(['namaPas', 'noBpjsKesPas' , 'namaPas' , 'jkPas' , 'noKtpPas' , 'tempatLahirPas' , 'dobPas' ,])) {
                    //     request()->validate([
                    //         'noBpjsKesPas' => 'required',
                    //         'namaPas' => 'required',
                    //         'jkPas' => 'required',
                    //         'noKtpPas' => 'required',
                    //         'tempatLahirPas' => 'required',
                    //         'dobPas' => 'required',
                    //     ]);
                    //     // if (request('JK') == 1) {
                    //     //     request('jkPas') != 1;
                    //     // } elseif (request('JK') == 2) {
                    //     //     request('jkPas') !=2;
                    //     // }
                    // }
                },
                // function(){
                //     if (request()->has('namaAn1')) {
                //         request()->validate([
                //             'noBpjsKesPas' => 'required',
                //             'namaPas' => 'required',
                //             'jkPas' => 'required',
                //             'noKtpPas' => 'required',
                //             'tempatLahirPas' => 'required',
                //             'dobPas' => 'required',
                //             'noBpjsKesAn1' => 'required',
                //             'jkAn1' => 'required',
                //             'tempatLahirAn1' => 'required',
                //             'dobAn1' => 'required',
                //         ]);
                //     }
                // },
                // function(){
                //     if (request()->has('namaAn2')) {
                //         request()->validate([
                //             'noBpjsKesPas' => 'required',
                //             'namaPas' => 'required',
                //             'jkPas' => 'required',
                //             'noKtpPas' => 'required',
                //             'tempatLahirPas' => 'required',
                //             'dobPas' => 'required',
                //             'noBpjsKesAn1' => 'required',
                //             'jkAn1' => 'required',
                //             'tempatLahirAn1' => 'required',
                //             'dobAn1' => 'required',
                //             'noBpjsKesAn2' => 'required',
                //             'jkAn2' => 'required',
                //             'tempatLahirAn2' => 'required',
                //             'dobAn2' => 'required',
                //         ]);
                //     }
                // },
                // function(){
                //     if (request()->has('namaAn3')) {
                //         request()->validate([
                //             'noBpjsKesPas' => 'required',
                //             'namaPas' => 'required',
                //             'jkPas' => 'required',
                //             'noKtpPas' => 'required',
                //             'tempatLahirPas' => 'required',
                //             'dobPas' => 'required',
                //             'noBpjsKesAn1' => 'required',
                //             'jkAn1' => 'required',
                //             'tempatLahirAn1' => 'required',
                //             'dobAn1' => 'required',
                //             'noBpjsKesAn2' => 'required',
                //             'jkAn2' => 'required',
                //             'tempatLahirAn2' => 'required',
                //             'dobAn2' => 'required',
                //             'noBpjsKesAn3' => 'required',
                //             'jkAn3' => 'required',
                //             'tempatLahirAn3' => 'required',
                //             'dobAn3' => 'required',
                //         ]);
                //     }
                // }
        );
    }

    // public function storePas($request, $karyawan)
    // {
    //     if (request('statusNikah') == 2) {
    //         $karyawan->update([
    //             'noBpjsKesPas' => $request->noBpjsKesPas,
    //             'namaPas' => $request->namaPas,
    //             'jkPas' => $request->jkPas,
    //             'noKtpPas' => $request->noKtpPas,
    //             'tempatLahirPas' => $request->tempatLahirPas,
    //             'dobPas' => $request->dobPas,
    //         ]);
    //     }
    // }
}
