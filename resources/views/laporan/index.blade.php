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
    @if (session('store'))
    <div class="alert alert-success">
        {{ session('store') }}
    </div>
    @endif
    <div class="row mt-4 ml-1">
        <div class="container col-5" style="margin-left: 0px; margin-right: 0px">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h2>Generate Laporan</h2>
                        <hr>
                    </div>
                    <div class="container text-left" style="margin-left: 1rem; margin-right:0rem">
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Bulan</label>
                            <div class="col-sm-8">
                                <select id="month" class="form-control" style="width: 100%">
                                    <option value="">Pilih Bulan</option>
                                    @foreach ($data->unique('month') as $item)
                                    <option value="{{$item->month}}">{{$item->month}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Tahun</label>
                            <div class="col-sm-8">
                                <select id="year" class="form-control" style="width: 100%">
                                    <option value="">Pilih Tahun</option>
                                    @foreach ($data->unique('year') as $item)
                                    <option value="{{$item->year}}">{{$item->year}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Status Karyawan</label>
                            <div class="col-sm-8">
                                <select id="status" class="form-control" style="width: 100%">
                                    <option value="">Pilih Status Karyawan</option>
                                    @foreach ($status as $item)
                                    <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-5 py-4 text-center" style="padding-left:0px">
                            <button type="button" onclick="buat()" id="button" class="btn btn-primary">
                                Buat Laporan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Buat Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/laporan/store" method="POST" enctype="multipart/form-data">
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
                    @csrf
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <input id="bln" type="hidden" name="bulan">
                                <input id="thn" type="hidden" name="tahun">
                                <input id="stt" type="hidden" name="status">
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
    function buat() {
        var month = document.getElementById("month").value;
        var year = document.getElementById("year").value;
        var status = document.getElementById("status").value;

        if (!month) {
            alert('Silahkan Pilih Bulan !')
        }
        if (!year) {
            alert('Silahkan Pilih Tahun !')
        }
        if (!status) {
            alert('Silahkan Pilih Status !')
        } else {
            document.getElementById("button").setAttribute("data-toggle", "modal");
            document.getElementById("button").setAttribute("data-target", "#exampleModal");
            document.getElementById("bln").setAttribute("value", month);
            document.getElementById("thn").setAttribute("value", year);
            document.getElementById("stt").setAttribute("value", status);
            $('#tbody').html('');
            $.ajax({
                type : 'GET',
                url : 'http://localhost:8000/laporan/create/'+month+'/'+year+'/'+status,
                success : function (res) {
                    // console.log(res.ket);
                    $('#title').html('<center><p>LIST TRANSFER GAJI PT. ARTHA KARYA UTAMA PROJECT LAZADA JAKARTA '+month+' '+year+' ('+res.ket.localizedName+')</p></center>');
                    $('.modal-footer').html('<button type="submit" class="btn btn-oval">Simpan</button>');
                    $.each(res.absen, function (i, item) {
                        // console.log(item);
                        i++
                        $('#tbody').append('<tr><td style="font-size: 12px;"><input type="text" class="form-control" value="'+item.id+'" name="id[]" hidden>'+i+'</td><td style="font-size: 12px;">'+item.karyawan+'</td><td style="font-size: 12px;">'+item.karyawan.nama+'</td><td style="font-size: 12px;" id="bank'+i+'"></td><td style="font-size: 12px;">'+item.karyawan.noRek+'</td><td style="font-size: 12px;">'+item.karyawan.atasNama+'</td><td style="font-size: 12px;">'+item.gajiBersih+'</td><td style="font-size: 12px;" id="divisi'+i+'"></td><td style="font-size: 12px;">'+res.ket.localizedName+'</td><td style="font-size: 12px;">'+item.jmlMasuk+'</td><td style="font-size: 12px;">'+item.jmlSakit+'</td><td style="font-size: 12px;">'+item.jmlIzin+'</td><td style="font-size: 12px;">'+item.jmlCuti+'</td><td style="font-size: 12px;">Alfa</td><td style="font-size: 12px;">'+item.jmlLibur+'</td><td style="font-size: 12px;">'+item.gajiPokok+'</td><td style="font-size: 12px;">'+item.lembur+'</td><td style="font-size: 12px;">'+item.insentif+'</td><td style="font-size: 12px;">'+item.bpjsKes+'</td><td style="font-size: 12px;">'+item.bpjsTK+'</td><td style="font-size: 12px;">'+item.bpjsJp+'</td></tr>');
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
                    })
                }
            })
        }
    }
    function lihat(id) {
        var data = $('#lap'+id).val();
        $('#tbody').html('');
        $('#title').html('');
        $('.modal-footer').html('');
        $.ajax({
            type : 'GET',
            url : 'http://localhost:8000/laporan/'+data,
            success : function (res) {
                $('#title').html('<center><p><h4>'+res.lap.nama+'</h4></p></center>')
                $.each(res.data, function (i, item) {
                    // console.log(item);
                    i++
                    $('#tbody').append('<tr><td style="font-size: 12px;"><input type="text" class="form-control" value="'+item.id+'" name="id[]" hidden>'+i+'</td><td style="font-size: 12px;">'+item.karyawan.noktp+'</td><td style="font-size: 12px;">'+item.karyawan.nama+'</td><td style="font-size: 12px;" id="bank'+i+'"></td><td style="font-size: 12px;">'+item.karyawan.noRek+'</td><td style="font-size: 12px;">'+item.karyawan.atasNama+'</td><td style="font-size: 12px;">'+item.gajiBersih+'</td><td style="font-size: 12px;" id="divisi'+i+'"></td><td style="font-size: 12px;" id="ket'+i+'"></td><td style="font-size: 12px;">'+item.jmlMasuk+'</td><td style="font-size: 12px;">'+item.jmlSakit+'</td><td style="font-size: 12px;">'+item.jmlIzin+'</td><td style="font-size: 12px;">'+item.jmlCuti+'</td><td style="font-size: 12px;">Alfa</td><td style="font-size: 12px;">'+item.jmlLibur+'</td><td style="font-size: 12px;">'+item.gajiPokok+'</td><td style="font-size: 12px;">'+item.lembur+'</td><td style="font-size: 12px;">'+item.insentif+'</td><td style="font-size: 12px;">'+item.bpjsKes+'</td><td style="font-size: 12px;">'+item.bpjsTK+'</td><td style="font-size: 12px;">'+item.bpjsJp+'</td></tr>');
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