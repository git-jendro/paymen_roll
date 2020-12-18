@extends('layouts.app')

@section('title', 'Karyawan Page')

@section('content')
<div class="container">
    <div class="mt-4">
        <div class="card">
            <table class="table table-borderless mt-2">
                <thead>
                    <tr>
                        <th scope="col" colspan="6" class="pl-2">Filter</th>
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
                        <td class="pl-2 pr-2">
                            Tipe Karyawan
                        </td>
                        <td class="pl-2 pr-2">
                            <select class="form-control" id="">
                                <option value="">Pilih Tipe Karyawan</option>
                                @foreach ($ketentuan as $item)
                                @if ($item->qualifier == 'TIPEKARYAWAN')
                                <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                @endif
                                @endforeach
                            </select>
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
                                <option value="">Pilih Status Karyawan</option>
                                @foreach ($ketentuan as $item)
                                @if ($item->qualifier == 'STATUSKERJA')
                                <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                @endif
                                @endforeach
                            </select>
                        </td>
                        <td class="pl-2 pr-2">
                            Jenis Kelamin
                        </td>
                        <td class="pl-2 pr-2">
                            <select class="form-control" id="">
                                <option value="">Pilih Jenis Kelamin</option>
                                @foreach ($ketentuan as $item)
                                @if ($item->qualifier == 'JENISKELAMIN')
                                <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                @endif
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container">
    <div class="mt-4">
        <div class="row d-flex justify-content-between">
            <div class="ml-4">
                <h5>Data Karyawan</h5>
            </div>
            <div class="mr-4">
                <h5><a href="/karyawan/create">Masukan Data Karyawan</a> | <a href="">Upload Data Karyawan</a></h5>
            </div>
        </div>
        @if (session('store'))
        <div class="alert alert-success">
            {{ session('store') }}
        </div>
        @elseif (session('update'))
        <div class="alert alert-success">
            {{ session('update') }}
        </div>
        @elseif (session('delete'))
        <div class="alert alert-danger">
            {{ session('delete') }}
        </div>
        @endif
    </div>
</div>
<div class="container">
    <div class="mt-2">
        <div class="card">
            <table class="table table-borderless mt-2 ml-2">
                <thead>
                    <tr>
                        <th class="pl-2 pr-2" scope="col">NIP</th>
                        <th class="pl-2 pr-2" scope="col">Nama</th>
                        <th class="pl-2 pr-2" scope="col">NIK</th>
                        <th class="pl-2 pr-2" scope="col">No. Telpon</th>
                        <th class="pl-2 pr-2" scope="col">Status Karyawan</th>
                        <th class="pl-2 pr-2" scope="col">Jenis Kelamin</th>
                        <th class="pl-2 pr-2 text-center" scope="col" colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawan as $item)
                    <tr>
                        {{-- {{dd($item)}} --}}
                        <td class="pl-2 pr-2">
                            {{$item->nip}}
                        </td>
                        <td class="pl-2 pr-2">
                            {{$item->nama}}
                        </td>
                        <td class="pl-2 pr-2">
                            {{$item->noktp}}
                        </td>
                        <td class="pl-2 pr-2">
                            {{$item->notel}}
                        </td>
                        <td class="pl-2 pr-2">
                            @foreach ($ketentuan as $row)
                                @if ($row->qualifier == 'STATUSKERJA')
                                    @if ($row->code == $item->statusKerja)
                                        <option value="{{$row->code}}">{{$row->localizedName}}</option>
                                    @endif
                                @endif
                            @endforeach
                        </td>
                        <td class="pl-2 pr-2">
                            @foreach ($ketentuan as $row)
                                @if ($row->qualifier == 'JENISKELAMIN')
                                    @if ($row->code == $item->JK)
                                        <option value="{{$row->code}}">{{$row->localizedName}}</option>
                                    @endif
                                @endif
                            @endforeach
                        </td>
                        <td class="pl-2 pr-2">
                            <a href="/karyawan/{{$item->id}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                  </svg>
                            </a>
                        </td>
                        <td class="pl-2 pr-2">
                            <a href="/karyawan/{{$item->id}}/edit">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                </svg>
                            </a>
                        </td>
                        <td class="pl-2 pr-2">
                            <a href="/karyawan/{{$item->id}}/delete">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-square-fill"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection