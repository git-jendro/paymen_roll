<?php

namespace App\Http\Controllers;

use App\Ketentuan;
use Illuminate\Http\Request;

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
        return view('/gaji/index');
    }

    public function status()
    {
        return view('/gaji/status');
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validateRequest();
        Ketentuan::created([
            'qualifier' => 'LEMBUR',
            'code' =>1,
            'localizedName' => 'Lembur',
            'flagAttr1' => $request->lembur,
            'qualifier' => 'INSENTIF',
            'code' =>1,
            'localizedName' => 'Insentif',
            'flagAttr1' => $request->insentif,
            'qualifier' => 'BPJSTK',
            'code' =>1,
            'localizedName' => 'BPJSTK',
            'flagAttr1' => $request->bpjsTK,
            'qualifier' => 'BPJSKES',
            'code' =>1,
            'localizedName' => 'BPJSKES',
            'flagAttr1' => $request->bpjsKes,
            'qualifier' => 'BPJSJP',
            'code' =>1,
            'localizedName' => 'BPJSJP',
            'flagAttr1' => $request->bpjsJp,
        ]);

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

    // public function print()
    // {
    //     $data = 'Test';
    //     $pdf = \PDF::loadView('pdf.invoice');
    //     return $pdf->download('invoice.pdf');
    // }

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

    public function umr($umr)
    {
        if (request()->has(['area3','umr3'])) {
            $umr->update([
                'area3' => request()->area3,
                'umr3' => request()->umr3,
            ]);
        }elseif (request()->has(['are4','umr4'])) {
            $umr->update([
                'are4' => request()->are4,
                'umr4' => request()->umr4,
            ]);
        }elseif (request()->has(['area5','umr5'])) {
            $umr->update([
                'area5' => request()->area5,
                'umr5' => request()->umr5,
            ]);
        }elseif (request()->has(['area6','umr6'])) {
            $umr->update([
                'area6' => request()->area6,
                'umr6' => request()->umr6,
            ]);
        }elseif (request()->has(['area7','umr7'])) {
            $umr->update([
                'area7' => request()->area7,
                'umr7' => request()->umr7,
            ]);
        }elseif (request()->has(['area8','umr8'])) {
            $umr->update([
                'area8' => request()->area8,
                'umr8' => request()->umr8,
            ]);
        }elseif (request()->has(['area9','umr9'])) {
            $umr->update([
                'area9' => request()->area9,
                'umr9' => request()->umr9,
            ]);
        }elseif (request()->has(['area10','umr10'])) {
            $umr->update([
                'area10' => request()->area10,
                'umr10' => request()->umr10,
            ]);
        }
    }
}
