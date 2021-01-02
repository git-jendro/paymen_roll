<?php

namespace App\Http\Controllers;

use App\Absen;
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
        return view('/gaji/index', compact('gaji'));
    }

    public function status()
    {
        return view('/gaji/status');
    }

    public function store(Request $request)
    {
        // dd($request);
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
        $ketentuan->flagAttr1 = $request->bpjsJP;
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

        if (request()->has(['area3','umr3'])) {
            
            $ketentuan = new Ketentuan;
            $ketentuan->qualifier = 'TIPEUMR';
            $ketentuan->code = 3;
            $ketentuan->localizedName = $request->area3;
            $ketentuan->flagAttr1 = $request->umr3;
            $ketentuan->save();

        }elseif (request()->has(['are4','umr4'])) {
            
            $ketentuan = new Ketentuan;
            $ketentuan->qualifier = 'TIPEUMR';
            $ketentuan->code = 4;
            $ketentuan->localizedName = $request->area4;
            $ketentuan->flagAttr1 = $request->umr4;
            $ketentuan->save();

        }elseif (request()->has(['area5','umr5'])) {
            
            $ketentuan = new Ketentuan;
            $ketentuan->qualifier = 'TIPEUMR';
            $ketentuan->code = 5;
            $ketentuan->localizedName = $request->are5;
            $ketentuan->flagAttr1 = $request->um5;
            $ketentuan->save();

        }elseif (request()->has(['area6','umr6'])) {
            
            $ketentuan = new Ketentuan;
            $ketentuan->qualifier = 'TIPEUMR';
            $ketentuan->code = 6;
            $ketentuan->localizedName = $request->area6;
            $ketentuan->flagAttr1 = $request->umr6;
            $ketentuan->save();

        }elseif (request()->has(['area7','umr7'])) {
            
            $ketentuan = new Ketentuan;
            $ketentuan->qualifier = 'TIPEUMR';
            $ketentuan->code = 7;
            $ketentuan->localizedName = $request->area7;
            $ketentuan->flagAttr1 = $request->umr7;
            $ketentuan->save();

        }elseif (request()->has(['area8','umr8'])) {
            
            $ketentuan = new Ketentuan;
            $ketentuan->qualifier = 'TIPEUMR';
            $ketentuan->code = 8;
            $ketentuan->localizedName = $request->area8;
            $ketentuan->flagAttr1 = $request->umr8;
            $ketentuan->save();

        }elseif (request()->has(['area9','umr9'])) {
            
            $ketentuan = new Ketentuan;
            $ketentuan->qualifier = 'TIPEUMR';
            $ketentuan->code = 9;
            $ketentuan->localizedName = $request->area9;
            $ketentuan->flagAttr1 = $request->umr9;
            $ketentuan->save();

        }elseif (request()->has(['area10','umr10'])) {
            
            $ketentuan = new Ketentuan;
            $ketentuan->qualifier = 'TIPEUMR';
            $ketentuan->code = 10;
            $ketentuan->localizedName = $request->area10;
            $ketentuan->flagAttr1 = $request->umr10;
            $ketentuan->save();

        }

        return redirect()->action('GajiController@index')->with('store', 'Ketentuan Gaji berhasil ditambah !');
    }

    public function show($id)
    {
        return view('/gaji/index');
    }

    public function ketentuan()
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
                $ketentuan = Ketentuan::all();
                $periode = Absen::where('absensi_gaji_id', $id)->first();
                $absen = $this->absensi_first($id)->first();
                $pdf = PDF::loadView('/gaji/invoice', compact('absen', 'ketentuan', 'periode'));
                return $pdf->download('invoice-gaji-'.$absen->karyawan->nama.'.pdf');
                // return view('/gaji/invoice', compact('absen', 'ketentuan', 'periode'));
            }
            
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
            'TotalHari' => 'required',
            'namapotongan1' => 'required',
            'potongan1' => 'required',
            'namapotongan2' => 'required',
            'potongan2' => 'required',
            'area1' => 'required',
            'umr1' => 'required',
            'area2' => 'required',
            'umr2' => 'required',
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
}
