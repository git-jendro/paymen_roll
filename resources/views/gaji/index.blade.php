@extends('layouts.app')

@section('title', 'Data Gaji')

@section('content')
<div class="container">
    <div class="mt-4">
        <div class="card ">
            <table class="table table-borderless mt-2">
                <thead>
                    <tr>
                        <th scope="col" colspan="6" class="pl-2 pr-2">Filter</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="pl-2 pr-2">
                            NIP
                        </td>
                        <td class="pl-2 pr-2">
                            <input type="text" class="form-control" id="nip">
                        </td>
                        <td class="pl-2 pr-2">
                            NIK
                        </td>
                        <td class="pl-2 pr-2">
                            <input type="text" class="form-control" id="nip">
                        </td>
                    </tr>
                    <tr>
                        <td class="pl-2 pr-2">
                            Nama
                        </td>
                        <td class="pl-2 pr-2">
                            <input type="text" class="form-control" id="nip">
                        </td>
                        <td class="pl-2 pr-2">
                            Status
                        </td>
                        <td class="pl-2 pr-2">
                            <select class="form-control" id="">
                                <option value=""></option>
                                <option value="">3</option>
                                <option value="">2</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<form action="/gaji/print" method="POST" enctype="multipart/form-data" style="width: 93%">
    @csrf
<div class="container">
    <div class="mt-4">
        <div class="d-flex">
            <div class="mr-auto p-2"><h5>Data Gaji</h5></div>
            <div class="p-2">
                <button type="submit" class="btn btn-oval"><h5 style="margin-bottom: 0rem">Cetak Slip</h5></button>
            </div>
            <div class="p-2">
                <a href="" class="btn btn-oval"><h5 style="margin-bottom: 0rem">Hitung</h5></a>
            
            </div>
        </div>
    </div>
</div>
@if (session('fail'))
    <div class="container">
        <div class="alert alert-danger">
            {{ session('fail') }}
        </div>
    </div>
@endif
<div class="container">
    <div class="mt-2">
        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="pl-2 pr-2">#</th>
                        <th scope="col" class="pl-2 pr-2">NIP</th>
                        <th scope="col" class="pl-2 pr-2">Nama</th>
                        <th scope="col" class="pl-2 pr-2">Masuk</th>
                        <th scope="col" class="pl-2 pr-2">Sakit</th>
                        <th scope="col" class="pl-2 pr-2">Izin</th>
                        <th scope="col" class="pl-2 pr-2">Cuti</th>
                        <th scope="col" class="pl-2 pr-2">Lembur</th>
                        <th scope="col" class="pl-2 pr-2">Total Gaji</th>
                        <th scope="col" class="pl-2 pr-2">Status Hitung</th>
                        <th scope="col" class="pl-2 pr-2">Status Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gaji as $item)
                    <tr>
                        <td class="pl-3 pr-3">
                            <input type="checkbox" class="form-control" name="check[]" value="{{$item->id}}">
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->nip}}
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->karyawan->nama}}
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->jmlMasuk}}
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->jmlSakit}}
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->jmlIzin}}
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->jmlCuti}}
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->jmlLibur}}
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->gajiBersih}}
                        </td>
                        <td class="pl-2 pr-2">
                            {{$item->isHitung}}
                        </td>
                        <td class="pl-2 pr-2">
                            {{$item->isBayar}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</form>
<script>
    function check(id) {
        document.getElementById('buttonLED'+id).setAttribute('onclick','writeLED(1,1)')
    }
</script>
@endsection