<?php

namespace App\Http\Controllers;

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
        //
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
}
