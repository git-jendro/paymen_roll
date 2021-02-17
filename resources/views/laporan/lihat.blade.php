@extends('layouts.app')

@section('title', 'Data Laporan')

@section('content')
<div class="container">
    <div class="mt-5">
        <div class="ml-4">
            <h5>SIM PT. Artha Kreasi Utama</h5>
        </div>
        <div class="ml-4">
            <label>Form Tambah Laporan</label>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-12 py-4">
        <div class="card">
            <div class="card-body">
                <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col" colspan="6" class="py-2">Filter</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="pl-2 pr-2">
                            ID Laporan
                        </th>
                        <th class="pl-2 pr-2">
                            <input type="text" class="form-control" id="id" onkeyup="filterid()">
                        </th>
                        <th class="pl-2 pr-2">
                            Nama Laporan
                        </th>
                        <th class="pl-2 pr-2">
                            <input type="text" class="form-control" id="nama" onkeyup="filternama()">
                        </th>
                        <th class="pl-2 pr-2">
                            Status Laporan
                        </th>
                        <th class="pl-2 pr-2">
                            <select class="form-control" id="statlap" onchange="filterstatus()">
                                <option value="">Pilih Status</option>
                                <option value="Dikirim">Dikirim</option>
                                <option value="Diterima">Diterima</option>
                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th class="pl-2 pr-2">
                            Bulan
                        </th>
                        <th class="pl-2 pr-2">
                            <select id="bulan" class="form-control" style="width: 100%" onchange="filterbulan()">
                                <option value="">Pilih Bulan</option>
                                @foreach ($bulan as $item)
                                <option value="{{$item}}">{{$item}}</option>
                                @endforeach
                            </select>
                        </th>
                        <th class="pl-2 pr-2">
                            Tahun
                        </th>
                        <th class="pl-2 pr-2">
                            <select id="tahun" class="form-control" style="width: 100%" onchange="filtertahun()">
                                <option value="">Pilih Tahun</option>
                                @foreach ($data->unique('year') as $item)
                                <option value="{{$item->year}}">{{$item->year}}</option>
                                @endforeach
                                <option value="2022">2022</option>
                            </select>
                        </th>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Laporan</th>
                            <th>Nama Laporan</th>
                            <th  class="text-center">Status Laporan</th>
                            <th  class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="lap">
                        @php
                        $i = 1
                        @endphp
                        @foreach ($laporan as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>
                                {{$item->id}}
                                <input type="hidden" id="lap{{$i}}" value="{{$item->id}}">
                            </td>
                            <td>{{$item->nama}}</td>
                            <td class="text-center">{{$item->status}}</td>
                            <td class="text-center">
                                <button type="button" onclick="lihat({{$i}})" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">
                                    Lihat
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="link">
                    {{$laporan->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ml-3">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/laporan/simpan" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="d-flex justify-content-around mb-2">
                    <div class="col-3">
                        <img src="{{ asset('img/logo.png')}}">
                    </div>
                    <div id="title" class="col-3">
                        
                    </div>
                    <div class="col-3 text-right">
                        <img src="{{ asset('img/lazada.jpg')}}">
                    </div>
                </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="font-size: 12px;">No</th>
                                <th style="font-size: 12px;">NIK</th>
                                <th style="font-size: 12px;">NAMA</th>
                                <th style="font-size: 12px;">BANK</th>
                                <th style="font-size: 12px;">NO REK</th>
                                <th style="font-size: 12px;">AN</th>
                                <th style="font-size: 12px;">TOTAL GAJI</th>
                                <th style="font-size: 12px;">Divisi</th>
                                <th style="font-size: 12px;">Status</th>
                                <th style="font-size: 12px;">Masuk</th>
                                <th style="font-size: 12px;">Sakit</th>
                                <th style="font-size: 12px;">Ijin</th>
                                <th style="font-size: 12px;">Cuti</th>
                                <th style="font-size: 12px;">Alfa</th>
                                <th style="font-size: 12px;">Libur</th>
                                <th style="font-size: 12px;">GAJI POKOK</th>
                                <th style="font-size: 12px;">LEMBUR</th>
                                <th style="font-size: 12px;">INSENTIF</th>
                                <th style="font-size: 12px;">BPJS KES</th>
                                <th style="font-size: 12px;">BPJS TK</th>
                                <th style="font-size: 12px;">BPJS JP</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                        </tbody>
                    </table>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-oval">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    function lihat(id) {
        var data = $('#lap'+id).val();
        $('#tbody').html('');
        $('#title').html('');
        $.ajax({
            type : 'GET',
            url : 'http://localhost:8000/laporan/'+data,
            success : function (res) {
                $('#title').html('<center><p><h4>'+res.lap.nama+'</h4></p></center>')
                $.each(res.data, function (i, item) {
                    i++
                    $('#tbody').append('<tr><td style="font-size: 12px;"><input type="text" class="form-control" value="'+res.lap.id+'" name="id" hidden>'+i+'</td><td style="font-size: 12px;">'+item.karyawan.noktp+'</td><td style="font-size: 12px;">'+item.karyawan.nama+'</td><td style="font-size: 12px;" id="bank'+i+'"></td><td style="font-size: 12px;">'+item.karyawan.noRek+'</td><td style="font-size: 12px;">'+item.karyawan.atasNama+'</td><td style="font-size: 12px;">'+item.gajiBersih+'</td><td style="font-size: 12px;" id="divisi'+i+'"></td><td style="font-size: 12px;" id="ket'+i+'"></td><td style="font-size: 12px;">'+item.jmlMasuk+'</td><td style="font-size: 12px;">'+item.jmlSakit+'</td><td style="font-size: 12px;">'+item.jmlIzin+'</td><td style="font-size: 12px;">'+item.jmlCuti+'</td><td style="font-size: 12px;">Alfa</td><td style="font-size: 12px;">'+item.jmlLibur+'</td><td style="font-size: 12px;">'+item.gajiPokok+'</td><td style="font-size: 12px;">'+item.lembur+'</td><td style="font-size: 12px;">'+item.insentif+'</td><td style="font-size: 12px;">'+item.bpjsKes+'</td><td style="font-size: 12px;">'+item.bpjsTK+'</td><td style="font-size: 12px;">'+item.bpjsJp+'</td></tr>');
                    $.each(res.bank, function (x, xitem) {
                        if (xitem.code == item.karyawan.namaBank) {
                            $('#bank'+i).append(xitem.localizedName);
                        }
                    })
                    $.each(res.divisi, function (x, xitem) {
                        if (xitem.code == item.karyawan.divisi) {
                            $('#divisi'+i).append(xitem.localizedName);
                        }
                    })
                    $.each(res.ket, function (x, xitem) {
                        if (xitem.code == item.karyawan.statusKaryawan) {
                            $('#ket'+i).append(xitem.localizedName);
                        }
                    })
                })
            }
        })
    }

    function filterid() {
        var id = $('#id').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type : 'post',
            url : 'http://localhost:8000/filterlaporan/id',
            data : {
                id : id,
                _token : _token,
            },
            success : function (res) {
                $('#lap').html('');
                if (id == null) {
                    $.each(res.all, function (i,item) {
                        console.log(item);
                        i++;
                        console.log(item);
                        $('#lap').append('<tr><td>'+i+'</td><td>'+item.id+'<input type="hidden" id="lap'+i+'" value="'+item.id+'"></td><td>'+item.nama+'</td><td class="text-center">'+item.status+'</td><td class="text-center"><button type="button" onclick="lihat('+i+')" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">Lihat</button></td></tr>');
                    })
                } else {
                    $.each(res.laporan, function (i,item) {
                        i++;
                        $('#lap').append('<tr><td>'+i+'</td><td>'+item.id+'<input type="hidden" id="lap'+i+'" value="'+item.id+'"></td><td>'+item.nama+'</td><td class="text-center">'+item.status+'</td><td class="text-center"><button type="button" onclick="lihat('+i+')" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">Lihat</button></td></tr>');
                    })
                }
            }
        })
    }

    function filternama() {
        var nama = $('#nama').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type : 'post',
            url : 'http://localhost:8000/filterlaporan/nama',
            data : {
                nama : nama,
                _token : _token,
            },
            success : function (res) {
                $('#lap').html('');
                if (nama == null) {
                    $.each(res.all, function (i,item) {
                        i++;
                        console.log(item);
                        $('#lap').append('<tr><td>'+i+'</td><td>'+item.id+'<input type="hidden" id="lap'+i+'" value="'+item.id+'"></td><td>'+item.nama+'</td><td class="text-center">'+item.status+'</td><td class="text-center"><button type="button" onclick="lihat('+i+')" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">Lihat</button></td></tr>');
                    })
                } else {
                    $.each(res.laporan, function (i,item) {
                        i++;
                        $('#lap').append('<tr><td>'+i+'</td><td>'+item.id+'<input type="hidden" id="lap'+i+'" value="'+item.id+'"></td><td>'+item.nama+'</td><td class="text-center">'+item.status+'</td><td class="text-center"><button type="button" onclick="lihat('+i+')" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">Lihat</button></td></tr>');
                    })
                }
            }
        })
    }

    function filterstatus() {
        var status = $('#statlap').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type : 'post',
            url : 'http://localhost:8000/filterlaporan/status',
            data : {
                status : status,
                _token : _token,
            },
            success : function (res) {
                $('#lap').html('');
                if (status == null) {
                    $.each(res.all, function (i,item) {
                        i++;
                        console.log(item);
                        $('#lap').append('<tr><td>'+i+'</td><td>'+item.id+'<input type="hidden" id="lap'+i+'" value="'+item.id+'"></td><td>'+item.nama+'</td><td class="text-center">'+item.status+'</td><td class="text-center"><button type="button" onclick="lihat('+i+')" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">Lihat</button></td></tr>');
                    })
                } else {
                    $.each(res.laporan, function (i,item) {
                        i++;
                        $('#lap').append('<tr><td>'+i+'</td><td>'+item.id+'<input type="hidden" id="lap'+i+'" value="'+item.id+'"></td><td>'+item.nama+'</td><td class="text-center">'+item.status+'</td><td class="text-center"><button type="button" onclick="lihat('+i+')" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">Lihat</button></td></tr>');
                    })
                }
            }
        })
    }

    function filterbulan() {
        var bulan = $('#bulan').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type : 'post',
            url : 'http://localhost:8000/filterlaporan/bulan',
            data : {
                bulan : bulan,
                _token : _token,
            },
            success : function (res) {
                $('#lap').html('');
                if (bulan == null) {
                    $.each(res.all, function (i,item) {
                        i++;
                        console.log(item);
                        $('#lap').append('<tr><td>'+i+'</td><td>'+item.id+'<input type="hidden" id="lap'+i+'" value="'+item.id+'"></td><td>'+item.nama+'</td><td class="text-center">'+item.status+'</td><td class="text-center"><button type="button" onclick="lihat('+i+')" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">Lihat</button></td></tr>');
                    })
                } else {
                    $.each(res.laporan, function (i,item) {
                        i++;
                        $('#lap').append('<tr><td>'+i+'</td><td>'+item.id+'<input type="hidden" id="lap'+i+'" value="'+item.id+'"></td><td>'+item.nama+'</td><td class="text-center">'+item.status+'</td><td class="text-center"><button type="button" onclick="lihat('+i+')" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">Lihat</button></td></tr>');
                    })
                }
            }
        })
    }

    function filtertahun() {
        var tahun = $('#tahun').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type : 'post',
            url : 'http://localhost:8000/filterlaporan/tahun',
            data : {
                tahun : tahun,
                _token : _token,
            },
            success : function (res) {
                $('#lap').html('');
                if (tahun == null) {
                    $.each(res.all, function (i,item) {
                        i++;
                        console.log(item);
                        $('#lap').append('<tr><td>'+i+'</td><td>'+item.id+'<input type="hidden" id="lap'+i+'" value="'+item.id+'"></td><td>'+item.nama+'</td><td class="text-center">'+item.status+'</td><td class="text-center"><button type="button" onclick="lihat('+i+')" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">Lihat</button></td></tr>');
                    })
                } else {
                    $.each(res.laporan, function (i,item) {
                        i++;
                        $('#lap').append('<tr><td>'+i+'</td><td>'+item.id+'<input type="hidden" id="lap'+i+'" value="'+item.id+'"></td><td>'+item.nama+'</td><td class="text-center">'+item.status+'</td><td class="text-center"><button type="button" onclick="lihat('+i+')" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">Lihat</button></td></tr>');
                    })
                }
            }
        })
    }
</script>
@endsection