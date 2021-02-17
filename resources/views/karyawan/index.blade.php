@extends('layouts.app')

@section('title', 'Karyawan Page')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="container">
    <div class="mt-5">
        <div class="card">
            <table class="table table-borderless mt-2">
                <thead>
                    <tr>
                        <th scope="col" colspan="6" class="pl-2">Filter</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="pl-2 pr-2">
                            NIP
                        </th>
                        <th class="pl-2 pr-2">
                            <input type="text" class="form-control" id="nip" onkeyup="filternip()">
                        </th>
                        <th class="pl-2 pr-2">
                            NIK
                        </th>
                        <th class="pl-2 pr-2">
                            <input type="text" class="form-control" id="nik" onkeyup="filternik()">
                        </th>
                        <th class="pl-2 pr-2">
                            Status Karyawan
                        </th>
                        <th class="pl-2 pr-2">
                            <select class="form-control" id="tipe" onchange="filtertipe()">
                                <option value="">Pilih Tipe Karyawan</option>
                                @foreach ($ketentuan as $item)
                                @if ($item->qualifier == 'STATUSKARYAWAN')
                                <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                @endif
                                @endforeach
                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th class="pl-2 pr-2">
                            Nama
                        </th>
                        <th class="pl-2 pr-2">
                            <input type="text" class="form-control" id="nama" onkeyup="filternama()">
                        </th>
                        <th class="pl-2 pr-2">
                            Status Kerja
                        </th>
                        <th class="pl-2 pr-2">
                            <select class="form-control" id="status" onchange="filterstatus()">
                                <option value="">Pilih Status Karyawan</option>
                                @foreach ($ketentuan as $item)
                                @if ($item->qualifier == 'STATUSKERJA')
                                <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                @endif
                                @endforeach
                            </select>
                        </th>
                        <th class="pl-2 pr-2">
                            Jenis Kelamin
                        </th>
                        <th class="pl-2 pr-2">
                            <select class="form-control" id="jk" onchange="filterjk()">
                                <option value="">Pilih Jenis Kelamin</option>
                                @foreach ($ketentuan as $item)
                                @if ($item->qualifier == 'JENISKELAMIN')
                                <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                @endif
                                @endforeach
                            </select>
                        </th>
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
            @if (Auth::user()->role != 3)
            <div class="mr-4">
                <h5><a href="/karyawan/create">Masukan Data Karyawan</a> | 
                <button type="button" id="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">
                    <h5 style="margin-bottom: 0;">Upload Data Karyawan</h5>
                </button></h5> 
            </div>
            @endif
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
            <table class="table table-borderless mt-2 ml-2" id="table">
                <thead>
                    <tr>
                        <th class="pl-2 pr-2" scope="col">NIP</th>
                        <th class="pl-2 pr-2" scope="col">Nama</th>
                        <th class="pl-2 pr-2" scope="col">NIK</th>
                        <th class="pl-2 pr-2" scope="col">No. Telpon</th>
                        <th class="pl-2 pr-2" scope="col">Status Karyawan</th>
                        <th class="pl-2 pr-2" scope="col">Status Kerja</th>
                        <th class="pl-2 pr-2" scope="col">Jenis Kelamin</th>
                        <th class="pl-2 pr-2 text-center" scope="col" colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    @foreach ($karyawan as $item)
                    <tr>
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
                                @if ($row->qualifier == 'STATUSKARYAWAN')
                                    @if ($row->code == $item->statusKaryawan)
                                        {{$row->localizedName}}
                                    @endif
                                @endif
                            @endforeach
                        </td>
                        <td class="pl-2 pr-2">
                            @foreach ($ketentuan as $row)
                                @if ($row->qualifier == 'STATUSKERJA')
                                    @if ($row->code == $item->statusKerja)
                                        {{$row->localizedName}}
                                    @endif
                                @endif
                            @endforeach
                        </td>
                        <td class="pl-2 pr-2">
                            @foreach ($ketentuan as $row)
                                @if ($row->qualifier == 'JENISKELAMIN')
                                    @if ($row->code == $item->JK)
                                        {{$row->localizedName}}
                                    @endif
                                @endif
                            @endforeach
                        </td>
                        <td class="pl-2 pr-2">
                            <a href="/karyawan/{{$item->nip}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                  </svg>
                            </a>
                        </td>
                        @if (Auth::user()->role != 3)
                        <td class="pl-2 pr-2">
                            <a href="/karyawan/{{$item->nip}}/edit">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                </svg>
                            </a>
                        </td>
                        <td class="pl-2 pr-2">
                            <a href="/karyawan/{{$item->nip}}/delete">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-square-fill"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                </svg>
                            </a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="link">
                {{$karyawan->links()}}
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="col-5 modal-min">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/karyawan/import" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-inline my-2">
                        <label class="col-sm-4 col-form-label">Upload File Excel</label>
                        <div class="col-sm-8">
                            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                            @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-oval">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function filternip() {
        var nip = $('#nip').val();
        var nik = $('#nik').val();
        var tipe = $('#tipe').val();
        var nama = $('#nama').val();
        var status = $('#status').val();
        var jk = $('#jk').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type : 'POST',
            url : 'http://localhost:8000/nip/',
            data : {
                nip : nip,
                nik : nik,
                tipe : tipe,
                status : status,
                nama : nama,
                jk : jk,
                _token : _token
            },
            success : function (res) {
            $('#tbody').html('');
                if (nip == null) {
                    $.each(res.all, function (i, item) {
                        $('#tbody').append('<tr><td class="pl-2 pr-2">'+item.nip+'</td><td class="pl-2 pr-2">'+item.nama+'</td><td class="pl-2 pr-2">'+item.noktp+'</td><td class="pl-2 pr-2">'+item.notel+'</td><td class="pl-2 pr-2" id="statkar'+i+'"></td><td class="pl-2 pr-2" id="statker'+i+'"></td><td class="pl-2 pr-2" id="jk'+i+'"></td><td class="pl-2 pr-2"><a href="/karyawan/'+item.nip+'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>  </svg></a></td><td class="pl-2 pr-2" id="act'+i+'"><a href="/karyawan/'+item.nip+'/edit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill"fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" /></svg></a></td><td class="pl-2 pr-2" id="del'+i+'"><a href="/karyawan/'+item.nip+'/delete"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" /></svg></a></td></tr>');
                        $.each(res.kar, function (x, xitem) {
                            if (item.statusKaryawan == xitem.code) {
                                $('#statkar'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.ker, function (x, xitem) {
                            if (item.statusKerja == xitem.code) {
                                $('#statker'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.jk, function (x, xitem) {
                            if (item.JK == xitem.code) {
                                $('#jk'+i).append(xitem.localizedName);
                            }
                        });
                        if (res.user == 3) {
                            $('#act'+i).html('');
                            $('#del'+i).html('');
                        }
                    });
                } else {
                    $.each(res.karyawan, function (i, item) {
                        $('#tbody').append('<tr><td class="pl-2 pr-2">'+item.nip+'</td><td class="pl-2 pr-2">'+item.nama+'</td><td class="pl-2 pr-2">'+item.noktp+'</td><td class="pl-2 pr-2">'+item.notel+'</td><td class="pl-2 pr-2" id="statkar'+i+'"></td><td class="pl-2 pr-2" id="statker'+i+'"></td><td class="pl-2 pr-2" id="jk'+i+'"></td><td class="pl-2 pr-2"><a href="/karyawan/'+item.nip+'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>  </svg></a></td><td class="pl-2 pr-2" id="act'+i+'"><a href="/karyawan/'+item.nip+'/edit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill"fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" /></svg></a></td><td class="pl-2 pr-2" id="del'+i+'"><a href="/karyawan/'+item.nip+'/delete"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" /></svg></a></td></tr>');
                        $.each(res.kar, function (x, xitem) {
                            if (item.statusKaryawan == xitem.code) {
                                $('#statkar'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.ker, function (x, xitem) {
                            if (item.statusKerja == xitem.code) {
                                $('#statker'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.jk, function (x, xitem) {
                            if (item.JK == xitem.code) {
                                $('#jk'+i).append(xitem.localizedName);
                            }
                        }); 
                        if (res.user == 3) {
                            $('#act'+i).html('');
                            $('#del'+i).html('');
                        }
                    });
                }
            }
        })
    }

    function filternik() {
        var nip = $('#nip').val();
        var nik = $('#nik').val();
        var tipe = $('#tipe').val();
        var nama = $('#nama').val();
        var status = $('#status').val();
        var jk = $('#jk').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type : 'POST',
            url : 'http://localhost:8000/nik/',
            data : {
                nip : nip,
                nik : nik,
                tipe : tipe,
                status : status,
                nama : nama,
                jk : jk,
                _token : _token
            },
            success : function (res) {
                
            $('#tbody').html('');
                if (nik == null) {
                    $.each(res.all, function (i, item) {
                        $('#tbody').append('<tr><td class="pl-2 pr-2">'+item.nip+'</td><td class="pl-2 pr-2">'+item.nama+'</td><td class="pl-2 pr-2">'+item.noktp+'</td><td class="pl-2 pr-2">'+item.notel+'</td><td class="pl-2 pr-2" id="statkar'+i+'"></td><td class="pl-2 pr-2" id="statker'+i+'"></td><td class="pl-2 pr-2" id="jk'+i+'"></td><td class="pl-2 pr-2"><a href="/karyawan/'+item.nip+'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>  </svg></a></td><td class="pl-2 pr-2" id="act'+i+'"><a href="/karyawan/'+item.nip+'/edit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill"fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" /></svg></a></td><td class="pl-2 pr-2" id="del'+i+'"><a href="/karyawan/'+item.nip+'/delete"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" /></svg></a></td></tr>');
                        $.each(res.kar, function (x, xitem) {
                            if (item.statusKaryawan == xitem.code) {
                                $('#statkar'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.ker, function (x, xitem) {
                            if (item.statusKerja == xitem.code) {
                                $('#statker'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.jk, function (x, xitem) {
                            if (item.JK == xitem.code) {
                                $('#jk'+i).append(xitem.localizedName);
                            }
                        });
                        if (res.user == 3) {
                            $('#act'+i).html('');
                            $('#del'+i).html('');
                        }
                    })
                } else {
                    $.each(res.karyawan, function (i, item) {
                        $('#tbody').append('<tr><td class="pl-2 pr-2">'+item.nip+'</td><td class="pl-2 pr-2">'+item.nama+'</td><td class="pl-2 pr-2">'+item.noktp+'</td><td class="pl-2 pr-2">'+item.notel+'</td><td class="pl-2 pr-2" id="statkar'+i+'"></td><td class="pl-2 pr-2" id="statker'+i+'"></td><td class="pl-2 pr-2" id="jk'+i+'"></td><td class="pl-2 pr-2"><a href="/karyawan/'+item.nip+'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>  </svg></a></td><td class="pl-2 pr-2" id="act'+i+'"><a href="/karyawan/'+item.nip+'/edit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill"fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" /></svg></a></td><td class="pl-2 pr-2" id="del'+i+'"><a href="/karyawan/'+item.nip+'/delete"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" /></svg></a></td></tr>');
                        $.each(res.kar, function (x, xitem) {
                            if (item.statusKaryawan == xitem.code) {
                                $('#statkar'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.ker, function (x, xitem) {
                            if (item.statusKerja == xitem.code) {
                                $('#statker'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.jk, function (x, xitem) {
                            if (item.JK == xitem.code) {
                                $('#jk'+i).append(xitem.localizedName);
                            }
                        });
                        if (res.user == 3) {
                            $('#act'+i).html('');
                            $('#del'+i).html('');
                        }
                    })
                }
            }
        })
    }

    function filtertipe() {
        var nip = $('#nip').val();
        var nik = $('#nik').val();
        var tipe = $('#tipe').val();
        var nama = $('#nama').val();
        var status = $('#status').val();
        var jk = $('#jk').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type : 'POST',
            url : 'http://localhost:8000/tipe/',
            data : {
                nip : nip,
                nik : nik,
                tipe : tipe,
                status : status,
                nama : nama,
                jk : jk,
                _token : _token
            },
            success : function (res) {
                
            $('#tbody').html('');
                if (tipe == null) {
                    $.each(res.all, function (i, item) {
                        $('#tbody').append('<tr><td class="pl-2 pr-2">'+item.nip+'</td><td class="pl-2 pr-2">'+item.nama+'</td><td class="pl-2 pr-2">'+item.noktp+'</td><td class="pl-2 pr-2">'+item.notel+'</td><td class="pl-2 pr-2" id="statkar'+i+'"></td><td class="pl-2 pr-2" id="statker'+i+'"></td><td class="pl-2 pr-2" id="jk'+i+'"></td><td class="pl-2 pr-2"><a href="/karyawan/'+item.nip+'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>  </svg></a></td><td class="pl-2 pr-2" id="act'+i+'"><a href="/karyawan/'+item.nip+'/edit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill"fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" /></svg></a></td><td class="pl-2 pr-2" id="del'+i+'"><a href="/karyawan/'+item.nip+'/delete"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" /></svg></a></td></tr>');
                        $.each(res.kar, function (x, xitem) {
                            if (item.statusKaryawan == xitem.code) {
                                $('#statkar'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.ker, function (x, xitem) {
                            if (item.statusKerja == xitem.code) {
                                $('#statker'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.jk, function (x, xitem) {
                            if (item.JK == xitem.code) {
                                $('#jk'+i).append(xitem.localizedName);
                            }
                        });
                        if (res.user == 3) {
                            $('#act'+i).html('');
                            $('#del'+i).html('');
                        }
                    })
                } else {
                    $.each(res.karyawan, function (i, item) {
                        $('#tbody').append('<tr><td class="pl-2 pr-2">'+item.nip+'</td><td class="pl-2 pr-2">'+item.nama+'</td><td class="pl-2 pr-2">'+item.noktp+'</td><td class="pl-2 pr-2">'+item.notel+'</td><td class="pl-2 pr-2" id="statkar'+i+'"></td><td class="pl-2 pr-2" id="statker'+i+'"></td><td class="pl-2 pr-2" id="jk'+i+'"></td><td class="pl-2 pr-2"><a href="/karyawan/'+item.nip+'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>  </svg></a></td><td class="pl-2 pr-2" id="act'+i+'"><a href="/karyawan/'+item.nip+'/edit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill"fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" /></svg></a></td><td class="pl-2 pr-2" id="del'+i+'"><a href="/karyawan/'+item.nip+'/delete"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" /></svg></a></td></tr>');
                        $.each(res.kar, function (x, xitem) {
                            if (item.statusKaryawan == xitem.code) {
                                $('#statkar'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.ker, function (x, xitem) {
                            if (item.statusKerja == xitem.code) {
                                $('#statker'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.jk, function (x, xitem) {
                            if (item.JK == xitem.code) {
                                $('#jk'+i).append(xitem.localizedName);
                            }
                        });
                        if (res.user == 3) {
                            $('#act'+i).html('');
                            $('#del'+i).html('');
                        }
                    })
                }
            }
        })
    }
    
    function filterstatus() {
        var nip = $('#nip').val();
        var nik = $('#nik').val();
        var tipe = $('#tipe').val();
        var nama = $('#nama').val();
        var status = $('#status').val();
        var jk = $('#jk').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type : 'POST',
            url : 'http://localhost:8000/status/',
            data : {
                nip : nip,
                nik : nik,
                status : status,
                status : status,
                nama : nama,
                jk : jk,
                _token : _token
            },
            success : function (res) {
                
            $('#tbody').html('');
                if (status == null) {
                    $.each(res.all, function (i, item) {
                        $('#tbody').append('<tr><td class="pl-2 pr-2">'+item.nip+'</td><td class="pl-2 pr-2">'+item.nama+'</td><td class="pl-2 pr-2">'+item.noktp+'</td><td class="pl-2 pr-2">'+item.notel+'</td><td class="pl-2 pr-2" id="statkar'+i+'"></td><td class="pl-2 pr-2" id="statker'+i+'"></td><td class="pl-2 pr-2" id="jk'+i+'"></td><td class="pl-2 pr-2"><a href="/karyawan/'+item.nip+'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>  </svg></a></td><td class="pl-2 pr-2" id="act'+i+'"><a href="/karyawan/'+item.nip+'/edit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill"fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" /></svg></a></td><td class="pl-2 pr-2" id="del'+i+'"><a href="/karyawan/'+item.nip+'/delete"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" /></svg></a></td></tr>');
                        $.each(res.kar, function (x, xitem) {
                            if (item.statusKaryawan == xitem.code) {
                                $('#statkar'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.ker, function (x, xitem) {
                            if (item.statusKerja == xitem.code) {
                                $('#statker'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.jk, function (x, xitem) {
                            if (item.JK == xitem.code) {
                                $('#jk'+i).append(xitem.localizedName);
                            }
                        });
                        if (res.user == 3) {
                            $('#act'+i).html('');
                            $('#del'+i).html('');
                        }
                    })
                } else {
                    $.each(res.karyawan, function (i, item) {
                        $('#tbody').append('<tr><td class="pl-2 pr-2">'+item.nip+'</td><td class="pl-2 pr-2">'+item.nama+'</td><td class="pl-2 pr-2">'+item.noktp+'</td><td class="pl-2 pr-2">'+item.notel+'</td><td class="pl-2 pr-2" id="statkar'+i+'"></td><td class="pl-2 pr-2" id="statker'+i+'"></td><td class="pl-2 pr-2" id="jk'+i+'"></td><td class="pl-2 pr-2"><a href="/karyawan/'+item.nip+'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>  </svg></a></td><td class="pl-2 pr-2" id="act'+i+'"><a href="/karyawan/'+item.nip+'/edit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill"fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" /></svg></a></td><td class="pl-2 pr-2" id="del'+i+'"><a href="/karyawan/'+item.nip+'/delete"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" /></svg></a></td></tr>');
                        $.each(res.kar, function (x, xitem) {
                            if (item.statusKaryawan == xitem.code) {
                                $('#statkar'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.ker, function (x, xitem) {
                            if (item.statusKerja == xitem.code) {
                                $('#statker'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.jk, function (x, xitem) {
                            if (item.JK == xitem.code) {
                                $('#jk'+i).append(xitem.localizedName);
                            }
                        });
                        if (res.user == 3) {
                            $('#act'+i).html('');
                            $('#del'+i).html('');
                        }
                    })
                }
            }
        })
    }

    function filternama() {
        var nip = $('#nip').val();
        var nik = $('#nik').val();
        var tipe = $('#tipe').val();
        var nama = $('#nama').val();
        var status = $('#status').val();
        var jk = $('#jk').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type : 'POST',
            url : 'http://localhost:8000/nama/',
            data : {
                nip : nip,
                nik : nik,
                tipe : tipe,
                status : status,
                nama : nama,
                jk : jk,
                _token : _token
            },
            success : function (res) {
                
            $('#tbody').html('');
                if (nama == null) {
                    $.each(res.all, function (i, item) {
                        $('#tbody').append('<tr><td class="pl-2 pr-2">'+item.nip+'</td><td class="pl-2 pr-2">'+item.nama+'</td><td class="pl-2 pr-2">'+item.noktp+'</td><td class="pl-2 pr-2">'+item.notel+'</td><td class="pl-2 pr-2" id="statkar'+i+'"></td><td class="pl-2 pr-2" id="statker'+i+'"></td><td class="pl-2 pr-2" id="jk'+i+'"></td><td class="pl-2 pr-2"><a href="/karyawan/'+item.nip+'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>  </svg></a></td><td class="pl-2 pr-2" id="act'+i+'"><a href="/karyawan/'+item.nip+'/edit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill"fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" /></svg></a></td><td class="pl-2 pr-2" id="del'+i+'"><a href="/karyawan/'+item.nip+'/delete"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" /></svg></a></td></tr>');
                        $.each(res.kar, function (x, xitem) {
                            if (item.statusKaryawan == xitem.code) {
                                $('#statkar'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.ker, function (x, xitem) {
                            if (item.statusKerja == xitem.code) {
                                $('#statker'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.jk, function (x, xitem) {
                            if (item.JK == xitem.code) {
                                $('#jk'+i).append(xitem.localizedName);
                            }
                        });
                        if (res.user == 3) {
                            $('#act'+i).html('');
                            $('#del'+i).html('');
                        }
                    })
                } else {
                    $.each(res.karyawan, function (i, item) {
                        $('#tbody').append('<tr><td class="pl-2 pr-2">'+item.nip+'</td><td class="pl-2 pr-2">'+item.nama+'</td><td class="pl-2 pr-2">'+item.noktp+'</td><td class="pl-2 pr-2">'+item.notel+'</td><td class="pl-2 pr-2" id="statkar'+i+'"></td><td class="pl-2 pr-2" id="statker'+i+'"></td><td class="pl-2 pr-2" id="jk'+i+'"></td><td class="pl-2 pr-2"><a href="/karyawan/'+item.nip+'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>  </svg></a></td><td class="pl-2 pr-2" id="act'+i+'"><a href="/karyawan/'+item.nip+'/edit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill"fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" /></svg></a></td><td class="pl-2 pr-2" id="del'+i+'"><a href="/karyawan/'+item.nip+'/delete"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" /></svg></a></td></tr>');
                        $.each(res.kar, function (x, xitem) {
                            if (item.statusKaryawan == xitem.code) {
                                $('#statkar'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.ker, function (x, xitem) {
                            if (item.statusKerja == xitem.code) {
                                $('#statker'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.jk, function (x, xitem) {
                            if (item.JK == xitem.code) {
                                $('#jk'+i).append(xitem.localizedName);
                            }
                        });
                        if (res.user == 3) {
                            $('#act'+i).html('');
                            $('#del'+i).html('');
                        }
                    })
                }
            }
        })
    }

    function filterjk() {
        var nip = $('#nip').val();
        var nik = $('#nik').val();
        var tipe = $('#tipe').val();
        var nama = $('#nama').val();
        var status = $('#status').val();
        var jk = $('#jk').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type : 'POST',
            url : 'http://localhost:8000/jk/',
            data : {
                nip : nip,
                nik : nik,
                tipe : tipe,
                status : status,
                nama : nama,
                jk : jk,
                _token : _token
            },
            success : function (res) {
                
            $('#tbody').html('');
                if (jk == null) {
                    $.each(res.all, function (i, item) {
                        $('#tbody').append('<tr><td class="pl-2 pr-2">'+item.nip+'</td><td class="pl-2 pr-2">'+item.nama+'</td><td class="pl-2 pr-2">'+item.noktp+'</td><td class="pl-2 pr-2">'+item.notel+'</td><td class="pl-2 pr-2" id="statkar'+i+'"></td><td class="pl-2 pr-2" id="statker'+i+'"></td><td class="pl-2 pr-2" id="jk'+i+'"></td><td class="pl-2 pr-2"><a href="/karyawan/'+item.nip+'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>  </svg></a></td><td class="pl-2 pr-2" id="act'+i+'"><a href="/karyawan/'+item.nip+'/edit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill"fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" /></svg></a></td><td class="pl-2 pr-2" id="del'+i+'"><a href="/karyawan/'+item.nip+'/delete"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" /></svg></a></td></tr>');
                        $.each(res.kar, function (x, xitem) {
                            if (item.statusKaryawan == xitem.code) {
                                $('#statkar'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.ker, function (x, xitem) {
                            if (item.statusKerja == xitem.code) {
                                $('#statker'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.jk, function (x, xitem) {
                            if (item.JK == xitem.code) {
                                $('#jk'+i).append(xitem.localizedName);
                            }
                        });
                        if (res.user == 3) {
                            $('#act'+i).html('');
                            $('#del'+i).html('');
                        }
                    })
                } else {
                    $.each(res.karyawan, function (i, item) {
                        $('#tbody').append('<tr><td class="pl-2 pr-2">'+item.nip+'</td><td class="pl-2 pr-2">'+item.nama+'</td><td class="pl-2 pr-2">'+item.noktp+'</td><td class="pl-2 pr-2">'+item.notel+'</td><td class="pl-2 pr-2" id="statkar'+i+'"></td><td class="pl-2 pr-2" id="statker'+i+'"></td><td class="pl-2 pr-2" id="jk'+i+'"></td><td class="pl-2 pr-2"><a href="/karyawan/'+item.nip+'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>  </svg></a></td><td class="pl-2 pr-2" id="act'+i+'"><a href="/karyawan/'+item.nip+'/edit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill"fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" /></svg></a></td><td class="pl-2 pr-2" id="del'+i+'"><a href="/karyawan/'+item.nip+'/delete"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" /></svg></a></td></tr>');
                        $.each(res.kar, function (x, xitem) {
                            if (item.statusKaryawan == xitem.code) {
                                $('#statkar'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.ker, function (x, xitem) {
                            if (item.statusKerja == xitem.code) {
                                $('#statker'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.jk, function (x, xitem) {
                            if (item.JK == xitem.code) {
                                $('#jk'+i).append(xitem.localizedName);
                            }
                        });
                        if (res.user == 3) {
                            $('#act'+i).html('');
                            $('#del'+i).html('');
                        }
                    })
                }
            }
        })
    }
</script>
@endsection