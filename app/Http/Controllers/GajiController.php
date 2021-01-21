<?php

namespace App\Http\Controllers;

use App\Absen;
use App\AbsensiGaji;
use App\Ketentuan;
use Illuminate\Http\Request;
use PDF;

class GajiController extends Controller
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
    
    public function index()
    {
        $gaji = $this->absensi_get();
        $ketentuan = $this->ketentuan();
        return view('/gaji/index', compact('gaji', 'ketentuan'));
    }

    public function status()
    {
        return view('/gaji/status');
    }

    public function store(Request $request)
    {
        if (Ketentuan::where('qualifier', 'LEMBUR')->count() > 0) {
            Ketentuan::where('qualifier', 'LEMBUR')->delete();
        } 
        if (Ketentuan::where('qualifier', 'INSENTIF')->count() > 0) {
            Ketentuan::where('qualifier', 'INSENTIF')->delete();
        } 
        if (Ketentuan::where('qualifier', 'BPJSTK')->count() > 0) {
            Ketentuan::where('qualifier', 'BPJSTK')->delete();
        } 
        if (Ketentuan::where('qualifier', 'BPJSKES')->count() > 0) {
            Ketentuan::where('qualifier', 'BPJSKES')->delete();
        } 
        if (Ketentuan::where('qualifier', 'BPJSJP')->count() > 0) {
            Ketentuan::where('qualifier', 'BPJSJP')->delete();
        } 
        if (Ketentuan::where('qualifier', 'POTONGAN')->count() > 0) {
            Ketentuan::where('qualifier', 'POTONGAN')->delete();
        } 
        if (Ketentuan::where('qualifier', 'TIPEUMR')->count() > 0) {
            Ketentuan::where('qualifier', 'TIPEUMR')->delete();
        } 
        if (Ketentuan::where('qualifier', 'TUNJANGAN')->count() > 0) {
            Ketentuan::where('qualifier', 'TUNJANGAN')->delete();
        }
        
        
        $this->validateRequest();
        $ketentuan = new Ketentuan;
        $ketentuan->qualifier = 'LEMBUR';
        $ketentuan->code = 1;
        $ketentuan->localizedName = 'Lembur';
        $ketentuan->flagAttr1 = $request->lembur;
        $ketentuan->save();

        $ketentuan = new Ketentuan;
        $ketentuan->qualifier = 'INSENTIF';
        $ketentuan->code = 1;
        $ketentuan->localizedName = 'Insentif';
        $ketentuan->flagAttr1 = $request->insentif;
        $ketentuan->save();

        $ketentuan = new Ketentuan;
        $ketentuan->qualifier = 'BPJSTK';
        $ketentuan->code = 1;
        $ketentuan->localizedName = 'BPJSTK';
        $ketentuan->flagAttr1 = $request->bpjsTK;
        $ketentuan->save();
        
        $ketentuan = new Ketentuan;
        $ketentuan->qualifier = 'BPJSKES';
        $ketentuan->code = 1;
        $ketentuan->localizedName = 'BPJSKES';
        $ketentuan->flagAttr1 = $request->bpjsKes;
        $ketentuan->save();
        
        $ketentuan = new Ketentuan;
        $ketentuan->qualifier = 'BPJSJP';
        $ketentuan->code = 1;
        $ketentuan->localizedName = 'BPJSJP';
        $ketentuan->flagAttr1 = $request->bpjsJp;
        $ketentuan->save();

        $ketentuan = new Ketentuan;
        $ketentuan->qualifier = 'POTONGAN';
        $ketentuan->code = 1;
        $ketentuan->localizedName = $request->namapotongan1;
        $ketentuan->flagAttr1 = $request->potongan1;
        $ketentuan->save();
        
        $ketentuan = new Ketentuan;
        $ketentuan->qualifier = 'POTONGAN';
        $ketentuan->code = 2;
        $ketentuan->localizedName = $request->namapotongan2;
        $ketentuan->flagAttr1 = $request->potongan2;
        $ketentuan->save();

        $ketentuan = new Ketentuan;
        $ketentuan->qualifier = 'TIPEUMR';
        $ketentuan->code = 1;
        $ketentuan->localizedName = $request->area1;
        $ketentuan->flagAttr1 = $request->umr1;
        $ketentuan->save();
        
        $ketentuan = new Ketentuan;
        $ketentuan->qualifier = 'TIPEUMR';
        $ketentuan->code = 2;
        $ketentuan->localizedName = $request->area2;
        $ketentuan->flagAttr1 = $request->umr2;
        $ketentuan->save();

        $ketentuan = new Ketentuan;
        $ketentuan->qualifier = 'TUNJANGAN';
        $ketentuan->code = 2;
        $ketentuan->localizedName = 'Tunjangan';
        $ketentuan->flagAttr1 = $request->tunjangan;
        $ketentuan->save();

        if (request()->has(['area3','umr3'])) {
            if ($request->area3 == null) {
                
            } elseif ($request->area3 == null) {

            } else {
                $ketentuan = new Ketentuan;
                $ketentuan->qualifier = 'TIPEUMR';
                $ketentuan->code = 3;
                $ketentuan->localizedName = $request->area3;
                $ketentuan->flagAttr1 = $request->umr3;
                $ketentuan->save();
            }
            
        }elseif (request()->has(['are4','umr4'])) {
            if ($request->area4 == null) {
                
            } elseif ($request->area4 == null) {

            } else {
                $ketentuan = new Ketentuan;
                $ketentuan->qualifier = 'TIPEUMR';
                $ketentuan->code = 4;
                $ketentuan->localizedName = $request->area4;
                $ketentuan->flagAttr1 = $request->umr4;
                $ketentuan->save();
            }

        }elseif (request()->has(['area5','umr5'])) {
            if ($request->area5 == null) {
                
            } elseif ($request->area5 == null) {

            } else {
                $ketentuan = new Ketentuan;
                $ketentuan->qualifier = 'TIPEUMR';
                $ketentuan->code = 5;
                $ketentuan->localizedName = $request->are5;
                $ketentuan->flagAttr1 = $request->um5;
                $ketentuan->save();
            }

        }elseif (request()->has(['area6','umr6'])) {
            if ($request->area6 == null) {
                
            } elseif ($request->area6 == null) {

            } else {
                $ketentuan = new Ketentuan;
                $ketentuan->qualifier = 'TIPEUMR';
                $ketentuan->code = 6;
                $ketentuan->localizedName = $request->area6;
                $ketentuan->flagAttr1 = $request->umr6;
                $ketentuan->save();
            }

        }elseif (request()->has(['area7','umr7'])) {
            if ($request->area7 == null) {
                
            } elseif ($request->area7 == null) {

            } else {
                $ketentuan = new Ketentuan;
                $ketentuan->qualifier = 'TIPEUMR';
                $ketentuan->code = 7;
                $ketentuan->localizedName = $request->area7;
                $ketentuan->flagAttr1 = $request->umr7;
                $ketentuan->save();
            }

        }elseif (request()->has(['area8','umr8'])) {
            if ($request->area8 == null) {
                
            } elseif ($request->area8 == null) {

            } else {
                $ketentuan = new Ketentuan;
                $ketentuan->qualifier = 'TIPEUMR';
                $ketentuan->code = 8;
                $ketentuan->localizedName = $request->area8;
                $ketentuan->flagAttr1 = $request->umr8;
                $ketentuan->save();
            }

        }elseif (request()->has(['area9','umr9'])) {
            if ($request->area9 == null) {
                
            } elseif ($request->area9 == null) {

            } else {
                $ketentuan = new Ketentuan;
                $ketentuan->qualifier = 'TIPEUMR';
                $ketentuan->code = 9;
                $ketentuan->localizedName = $request->area9;
                $ketentuan->flagAttr1 = $request->umr9;
                $ketentuan->save();
            }

        }elseif (request()->has(['area10','umr10'])) {
            if ($request->area10 == null) {
                
            } elseif ($request->area10 == null) {

            } else {
                $ketentuan = new Ketentuan;
                $ketentuan->qualifier = 'TIPEUMR';
                $ketentuan->code = 10;
                $ketentuan->localizedName = $request->area10;
                $ketentuan->flagAttr1 = $request->umr10;
            }
            $ketentuan->save();
            
        }
        return redirect()->action('HomeController@index')->with('store', 'Data Ketentuan telah ditambahkan !');
    }

    public function show($id)
    {
        return view('/gaji/index');
    }

    public function ketentuan_view()
    {

        return view('/gaji/ketentuan');
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
 
    public function print(Request $request)
    {
        if (request()->has('check')) { 
            foreach ($request->check as $id) {
                $ketentuan = $this->ketentuan();
                $periode = Absen::where('absensi_gaji_id', $id)->first();
                // dd(Absen::where('absensi_gaji_id', $id)->first());
                $absen = $this->absensi_first($id)->first();
                $pdf = PDF::loadView('/gaji/invoice', compact('absen', 'ketentuan', 'periode'));
                return $pdf->download('invoice-gaji-'.$absen->karyawan->nama.'('.$absen->nip.').pdf');
            }
            // return view('/gaji/invoice', compact('absen', 'ketentuan', 'periode'));
        }else {
            return redirect()->action('GajiController@index')->with('fail', 'Silahkan pilih data yang ingin dicetak');
        }
    }

    public function validateRequest()
    {
        return tap(request()->validate([
            'lembur' => 'required',
            'insentif' => 'required',
            'bpjsTK' => 'required',
            'bpjsKes' => 'required',
            'bpjsJp' => 'required',
            'namapotongan1' => 'required',
            'potongan1' => 'required',
            'namapotongan2' => 'required',
            'potongan2' => 'required',
            'area1' => 'required',
            'umr1' => 'required',
            'area2' => 'required',
            'umr2' => 'required',
            'tunjangan' => 'required',
            ]), 
            function(){
                },
            
        );
    }

    // public function umr($umr)
    // {
    //     if (request()->has(['area3','umr3'])) {
    //         $umr->update([
    //             'area3' => request()->area3,
    //             'umr3' => request()->umr3,
    //         ]);
    //     }elseif (request()->has(['are4','umr4'])) {
    //         $umr->update([
    //             'are4' => request()->are4,
    //             'umr4' => request()->umr4,
    //         ]);
    //     }elseif (request()->has(['area5','umr5'])) {
    //         $umr->update([
    //             'area5' => request()->area5,
    //             'umr5' => request()->umr5,
    //         ]);
    //     }elseif (request()->has(['area6','umr6'])) {
    //         $umr->update([
    //             'area6' => request()->area6,
    //             'umr6' => request()->umr6,
    //         ]);
    //     }elseif (request()->has(['area7','umr7'])) {
    //         $umr->update([
    //             'area7' => request()->area7,
    //             'umr7' => request()->umr7,
    //         ]);
    //     }elseif (request()->has(['area8','umr8'])) {
    //         $umr->update([
    //             'area8' => request()->area8,
    //             'umr8' => request()->umr8,
    //         ]);
    //     }elseif (request()->has(['area9','umr9'])) {
    //         $umr->update([
    //             'area9' => request()->area9,
    //             'umr9' => request()->umr9,
    //         ]);
    //     }elseif (request()->has(['area10','umr10'])) {
    //         $umr->update([
    //             'area10' => request()->area10,
    //             'umr10' => request()->umr10,
    //         ]);
    //     }
    // }

    public function hitung()
    {
        //Get data dari table absensi_gaji yang statusnya belum dihitung
        $gaji = AbsensiGaji::where('isHitung', 1)->get();
        //Get value ketentuan Lembur
        $l = Ketentuan::where('qualifier', 'LEMBUR')->value('flagAttr1');
        //Get value ketentuan Insentif
        $i = Ketentuan::where('qualifier', 'INSENTIF')->value('flagAttr1');
        //Get value ketentuan BPJSTK
        $tk = Ketentuan::where('qualifier', 'BPJSTK')->value('flagAttr1');
        //Get value ketentuan BPJSKES
        $kes = Ketentuan::where('qualifier', 'BPJSKES')->value('flagAttr1');
        //Get value ketentuan BPJSJP
        $jp = Ketentuan::where('qualifier', 'BPJSJP')->value('flagAttr1');
        //Get value ketentuan Potongan
        $p = Ketentuan::where('qualifier', 'POTONGAN')->sum('flagAttr1');
        //Get value ketentuan Tunjangan
        $t = Ketentuan::where('qualifier', 'TUNJANGAN')->sum('flagAttr1');
        foreach ($gaji as $key) {
            //Get value Gaji Pokok
            $raw = Ketentuan::where('qualifier', 'TIPEUMR')->where('code', $key->gajiPokok)->value('flagAttr1');
            //Kalkulasi jumlah Lembur
            $lembur = $raw / $l * $key->jmlLembur;
            
            //Kalkulasi Gaji Harian
            // $gh = $raw / $key->jmlMasuk;

            //Kalkulasi Total Gaji Daily Worker
            // $tg =  $gh * $key->jmlMasuk + $lembur - $p;

            //Kalkulasi Total Hari Kerja
            $th = $key->TotalHari - $key->jmlLibur;

            //Kalkulasi Potongan Absen
            $pa = (($key->jmlCuti + $key->jmlIzin) * ($raw + $t)) / $th;

            //Kalkulasi Potongan BPJSKES
            $pbpjs = ($raw / 100) * $kes;

            //Kalkulasi Total Gaji Inbound
            $tg = ($raw + $lembur + $i) - ($pa + $pbpjs);
            $data = explode('.', $tg);
            $result =(int) value($data[0]);
            $absen = AbsensiGaji::find($key->id);
            $absen->lembur = $lembur;
            $absen->insentif = $i;
            $absen->bpjsTk = $tk;
            $absen->bpjsKes = $kes;
            $absen->bpjsJp = $jp;
            $absen->gajiKotor = $raw;
            $absen->totalPotongan = $pa;
            $absen->gajiBersih = $result;
            $absen->isHitung = 2;
            $absen->save();

        }
        return redirect()->action('GajiController@index')->with('hitung', 'Gaji telah dihitung !');
    }
}
