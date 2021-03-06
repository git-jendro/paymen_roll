<?php

namespace App\Http\Controllers;

use App\Absen;
use App\AbsensiGaji;
use App\Karyawan;
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
        // $gaji = $this->absensi_get();
        $gaji = Karyawan::orderBy('statusKerja')->with('absen')->paginate(25);
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
        if (request()->has(['namapotongan3','potongan3'])) {
            if ($request->namapotongan3 == null) {
                
            } elseif ($request->namapotongan3 == null) {

            } else {
                $ketentuan = new Ketentuan;
                $ketentuan->qualifier = 'POTONGAN';
                $ketentuan->code = 3;
                $ketentuan->localizedName = $request->namapotongan3;
                $ketentuan->flagAttr1 = $request->potongan3;
                $ketentuan->save();
            }
            
        }elseif (request()->has(['are4','potongan4'])) {
            if ($request->namapotongan4 == null) {
                
            } elseif ($request->namapotongan4 == null) {

            } else {
                $ketentuan = new Ketentuan;
                $ketentuan->qualifier = 'POTONGAN';
                $ketentuan->code = 4;
                $ketentuan->localizedName = $request->namapotongan4;
                $ketentuan->flagAttr1 = $request->potongan4;
                $ketentuan->save();
            }

        }elseif (request()->has(['namapotongan5','potongan5'])) {
            if ($request->namapotongan5 == null) {
                
            } elseif ($request->namapotongan5 == null) {

            } else {
                $ketentuan = new Ketentuan;
                $ketentuan->qualifier = 'POTONGAN';
                $ketentuan->code = 5;
                $ketentuan->localizedName = $request->are5;
                $ketentuan->flagAttr1 = $request->um5;
                $ketentuan->save();
            }

        }elseif (request()->has(['namapotongan6','potongan6'])) {
            if ($request->namapotongan6 == null) {
                
            } elseif ($request->namapotongan6 == null) {

            } else {
                $ketentuan = new Ketentuan;
                $ketentuan->qualifier = 'POTONGAN';
                $ketentuan->code = 6;
                $ketentuan->localizedName = $request->namapotongan6;
                $ketentuan->flagAttr1 = $request->potongan6;
                $ketentuan->save();
            }

        }elseif (request()->has(['namapotongan7','potongan7'])) {
            if ($request->namapotongan7 == null) {
                
            } elseif ($request->namapotongan7 == null) {

            } else {
                $ketentuan = new Ketentuan;
                $ketentuan->qualifier = 'POTONGAN';
                $ketentuan->code = 7;
                $ketentuan->localizedName = $request->namapotongan7;
                $ketentuan->flagAttr1 = $request->potongan7;
                $ketentuan->save();
            }

        }elseif (request()->has(['namapotongan8','potongan8'])) {
            if ($request->namapotongan8 == null) {
                
            } elseif ($request->namapotongan8 == null) {

            } else {
                $ketentuan = new Ketentuan;
                $ketentuan->qualifier = 'POTONGAN';
                $ketentuan->code = 8;
                $ketentuan->localizedName = $request->namapotongan8;
                $ketentuan->flagAttr1 = $request->potongan8;
                $ketentuan->save();
            }

        }elseif (request()->has(['namapotongan9','potongan9'])) {
            if ($request->namapotongan9 == null) {
                
            } elseif ($request->namapotongan9 == null) {

            } else {
                $ketentuan = new Ketentuan;
                $ketentuan->qualifier = 'POTONGAN';
                $ketentuan->code = 9;
                $ketentuan->localizedName = $request->namapotongan9;
                $ketentuan->flagAttr1 = $request->potongan9;
                $ketentuan->save();
            }

        }elseif (request()->has(['namapotongan10','potongan10'])) {
            if ($request->namapotongan10 == null) {
                
            } elseif ($request->namapotongan10 == null) {

            } else {
                $ketentuan = new Ketentuan;
                $ketentuan->qualifier = 'POTONGAN';
                $ketentuan->code = 10;
                $ketentuan->localizedName = $request->namapotongan10;
                $ketentuan->flagAttr1 = $request->potongan10;
            }
            $ketentuan->save();
            
        }
        return redirect()->action('GajiController@ketentuan_view')->with('store', 'Data Ketentuan telah diperbarui !');
    }

    public function show($id)
    {
        return view('/gaji/index');
    }

    public function ketentuan_view()
    {
        $ketentuan = $this->ketentuan();
        return view('/gaji/ketentuan', compact('ketentuan'));
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
        foreach ($request->items as $id) {
            $ketentuan = $this->ketentuan();
            $periode = Absen::where('absensi_gaji_id', $id)->first();
            $absen = $this->absensi_first($id)->with('karyawan')->first();
            $pdf = PDF::loadView('/gaji/invoice', compact('absen', 'ketentuan', 'periode'));
            return $pdf->download('invoice-gaji-'.$absen->karyawan->nama.'('.$absen->nip.').pdf');
        }
        // return response()->json($request);
        //     $ketentuan = $this->ketentuan();
        //     $periode = Absen::where('absensi_gaji_id', $request)->first();
        //     $absen = $this->absensi_first($request)->with('karyawan')->first();
        //     // dd($absen);
        //     $pdf = PDF::loadView('/gaji/invoice', compact('absen', 'ketentuan', 'periode'));
        //     return $pdf->download('invoice-gaji-'.$absen->nama.'('.$absen->nip.').pdf');
        
        // $html = '';
        // foreach ($request->items as $id) {
        //     $ketentuan = $this->ketentuan();
        //     $periode = Absen::where('absensi_gaji_id', $id)->first();
        //     $absen = $this->absensi_first($id)->first();
        //     $view = view('/gaji/invoice', ([
        //         'absen' => $absen, 
        //         'ketentuan' => $ketentuan, 
        //         'periode' => $periode
        //         ]));
        //     $html .= $view->render();
        // }
        // $pdf = PDF::loadView($html);
        // return $pdf->download('invoice-gaji-'.$absen->karyawan->nama.'('.$absen->nip.').pdf');

        // return response()->json();
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

    public function hitung(Request $request)
    {   
        //Get data dari table absensi_gaji yang statusnya belum dihitung
        $gaji = AbsensiGaji::where('isHitung', 1)->with('karyawan')->get();
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
            $raw = Ketentuan::where('qualifier', 'TIPEUMR')->where('code', $key->karyawan->tipeumr)->value('flagAttr1');
            //Kalkulasi jumlah Lembur
            $lembur = $raw / $l * $key->jmlLembur;
            $gk= $raw + $t + $lembur;
            if ($key->karyawan->statusKaryawan == 1) {
                //Kalkulasi Total Hari Kerja
                $th = $key->TotalHari - $key->jmlLibur;
    
                //Kalkulasi Potongan Absen
                $pa = (($key->jmlCuti + $key->jmlIzin) * ($raw + $t)) / $th;
                //Kalkulasi Potongan BPJSKES
                $pbpjs = ($raw / 100) * $kes;
    
                //Kalkulasi Total Gaji Inbound
                $tg = ($raw + $lembur + $i) - ($pa + $pbpjs);
            } else {

                $pa = $p;
                // Kalkulasi Gaji Harian
                $gh = $raw / $key->jmlMasuk;

                // Kalkulasi Total Gaji Daily Worker
                $tg =  $gh * $key->jmlMasuk + $lembur - $p;
            }
            
            $data = explode('.', $tg);
            $result =(int) value($data[0]);

            $absen = AbsensiGaji::find($key->id);
            $absen->lembur = $lembur;
            $absen->insentif = $i;
            $absen->bpjsTk = $tk;
            $absen->bpjsKes = $kes;
            $absen->bpjsJp = $jp;
            $absen->gajiKotor = $gk;
            $absen->totalPotongan = $pa;
            $absen->gajiBersih = $result;
            $absen->isHitung = 2;
            $absen->save();

        }
        return redirect()->action('GajiController@index')->with('hitung', 'Gaji telah dihitung !');
        // return response()->json('Hello !');
    }
}
