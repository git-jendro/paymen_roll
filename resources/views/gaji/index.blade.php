@extends('layouts.app')

@section('title', 'Data Gaji')

@section('content')
<div class="container">
    <div class="mt-5">
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
                            <input type="text" class="form-control" id="nip" onkeyup="filternip()">
                        </td>
                        <td class="pl-2 pr-2">
                            Status Hitung
                        </td>
                        <td class="pl-2 pr-2">
                            <select class="form-control" id="hitung" onchange="filterhitung()">
                                <option value="">Pilih Status Hitung</option>
                                @foreach ($ketentuan as $item)
                                @if ($item->qualifier == 'HITUNG')
                                <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                @endif
                                @endforeach
                            </select>
                        </td>
                        <td class="pl-2 pr-2">
                            Status Karyawan
                        </td>
                        <td class="pl-2 pr-2">
                            <select class="form-control" id="tipe" onchange="filtertipe()">
                                <option value="">Pilih Status Karyawan</option>
                                @foreach ($ketentuan as $item)
                                @if ($item->qualifier == 'STATUSKARYAWAN')
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
                            <input type="text" class="form-control" id="nama" onkeyup="filternama()">
                        </td>
                        <td class="pl-2 pr-2">
                            Status Bayar
                        </td>
                        <td class="pl-2 pr-2">
                            <select class="form-control" id="bayar" onchange="filterbayar()">
                                <option value="">Pilih Status Bayar</option>
                                @foreach ($ketentuan as $item)
                                @if ($item->qualifier == 'BAYAR')
                                <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                @endif
                                @endforeach
                            </select>
                        </td>
                        {{-- <td class="pl-2 pr-2">
                            NIK
                        </td>
                        <td class="pl-2 pr-2">
                            <input type="text" class="form-control" id="nik" onkeyup="filternik()">
                        </td> --}}
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container">
    <div class="mt-4">
        <div class="d-flex">
            <div class="mr-auto p-2"><h5>Data Gaji</h5></div>
            <div class="p-2">
                <button type="button"  class="btn btn-oval" onclick="cetak()"><h5 style="margin-bottom: 0rem">Cetak Slip</h5></button>
            </div>
            <div class="p-2">
                {{-- <button type="button"  class="btn btn-oval" onclick="hitung()"><h5 style="margin-bottom: 0rem">Hitung Gaji</h5></button> --}}
                <form action="/gaji/hitung" method="POST">
                    @csrf
                    <button type="submit"  class="btn btn-oval"><h5 style="margin-bottom: 0rem">Hitung Gaji</h5></button>
                </form>
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
@elseif (session('hitung'))
    <div class="container">
    <div class="alert alert-success">
        {{ session('hitung') }}
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
                        <th scope="col" class="pl-2 pr-2">Status Karyawan</th>
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
                <tbody id="tbody">
                    @foreach ($gaji as $item)
                    <tr>
                        <td class="pl-3 pr-3">
                            <input type="checkbox" class="form-control check" name="check[]" value="{{$item->absen->id}}">
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->nip}}
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->nama}}
                        </td>
                        <td class="pl-3 pr-3">
                            @foreach ($ketentuan as $row)
                                @if ($row->qualifier == 'STATUSKARYAWAN')
                                    @if ($row->code == $item->statusKaryawan)
                                        {{$row->localizedName}}
                                    @endif
                                @endif
                            @endforeach
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->absen->jmlMasuk}}
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->absen->jmlSakit}}
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->absen->jmlIzin}}
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->absen->jmlCuti}}
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->absen->jmlLembur}}
                        </td>
                        <td class="pl-3 pr-3">
                            @if ($item->absen->gajiBersih <= 10)
                                @foreach ($ketentuan as $row)
                                    @if ($row->qualifier == 'TIPEUMR')
                                        @if ($row->code == $item->absen->gajiBersih)
                                        {{$row->flagAttr1}}
                                        @endif
                                    @endif
                                @endforeach
                            @else
                                {{$item->absen->gajiBersih}}
                            @endif
                        </td>
                        <td class="pl-2 pr-2">
                            @foreach ($ketentuan as $row)
                                @if ($row->qualifier == 'HITUNG')
                                    @if ($row->code == $item->absen->isHitung)
                                        {{$row->localizedName}}
                                    @endif
                                @endif
                            @endforeach
                        </td>
                        <td class="pl-2 pr-2">
                            @foreach ($ketentuan as $row)
                                @if ($row->qualifier == 'BAYAR')
                                    @if ($row->code == $item->absen->Isbayar)
                                        {{$row->localizedName}}
                                    @endif
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="link">
                {{$gaji->links()}}
            </div>
        </div>
    </div>
</div>
<script>
    function cetak() {
        let _token   = $('meta[name="csrf-token"]').attr('content');
        var items = [];
        var checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
        for (var i = 0; i < checkboxes.length; i++) {
            items.push(checkboxes[i].value)
        };
        if (items.length == 0) {
            alert('Silahkan pilih data yang ingin dicetak !');
        }
        $.ajax({
            type : 'post',
            url : 'http://localhost:8000/gaji/print',
            data : {
                items : items,
                _token : _token
            },
            success: function (res) {
                console.log(checkboxes);
            }
        })
    }
    
    function hitung() {
        let _token   = $('meta[name="csrf-token"]').attr('content');
        var items = [];
        var checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
        for (var i = 0; i < checkboxes.length; i++) {
            items.push(checkboxes[i].value)
        };
        if (items.length == 0) {
            alert('Silahkan pilih data yang ingin dihitung !');
        }
        $.ajax({
            type : 'post',
            url : 'http://localhost:8000/gaji/hitung',
            data : {
                items : items,
                _token : _token
            },
            success : function (res) {
                console.log(res);
            }
        })
    }

    function filternip() {
        var nip = $('#nip').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type : 'POST',
            url : 'http://localhost:8000/nip/',
            data : {
                nip : nip,
                _token : _token
            },
            success : function (res) {
            $('#tbody').html('');
                if (nip == null) {
                    $.each(res.all, function (i, item) {
                        i++;
                        $('#tbody').append('<tr><td class="pl-3 pr-3"><input type="checkbox" id="check'+item.absen.id+'" class="form-control" name="check[]" value="'+item.absen.id+'"></td><td class="pl-3 pr-3">'+item.nip+'</td><td class="pl-3 pr-3">'+item.nama+'</td><td class="pl-3 pr-3" id="kar'+i+'"></td><td class="pl-3 pr-3">'+item.absen.jmlMasuk+'</td><td class="pl-3 pr-3">'+item.absen.jmlSakit+'</td><td class="pl-3 pr-3">'+item.absen.jmlIzin+'</td><td class="pl-3 pr-3">'+item.absen.jmlCuti+'</td><td class="pl-3 pr-3">'+item.absen.jmlLembur+'</td><td class="pl-3 pr-3"  id="gj'+i+'"></td><td class="pl-2 pr-2" id="htg'+i+'"></td><td class="pl-2 pr-2"  id="byr'+i+'"></td></tr>');
                        $.each(res.umr, function (x, xitem) {
                            if (item.gajiBersih <= 10) {
                                if (item.gajiBersih == xitem.code) {
                                    $('#gj'+i).append(xitem.flagAttr1);
                                }
                            } else {
                                $('#gj'+i).append(item.gajiBersih);
                            }
                        });
                        $.each(res.htg, function (x, xitem) {
                            if (item.absen.isHitung == xitem.code) {
                                $('#htg'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.byr, function (x, xitem) {
                            if (item.absen.Isbayar == xitem.code) {
                                $('#byr'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.kar, function (x, xitem) {
                            if (item.statusKaryawan == xitem.code) {
                                $('#kar'+i).append(xitem.localizedName);
                            }
                        });
                    });
                } else {
                    $.each(res.karyawan, function (i, item) {
                        i++;
                        $('#tbody').append('<tr><td class="pl-3 pr-3"><input type="checkbox" id="check'+item.absen.id+'" class="form-control" name="check[]" value="'+item.absen.id+'"></td><td class="pl-3 pr-3">'+item.nip+'</td><td class="pl-3 pr-3">'+item.nama+'</td><td class="pl-3 pr-3" id="kar'+i+'"></td><td class="pl-3 pr-3">'+item.absen.jmlMasuk+'</td><td class="pl-3 pr-3">'+item.absen.jmlSakit+'</td><td class="pl-3 pr-3">'+item.absen.jmlIzin+'</td><td class="pl-3 pr-3">'+item.absen.jmlCuti+'</td><td class="pl-3 pr-3">'+item.absen.jmlLembur+'</td><td class="pl-3 pr-3"  id="gj'+i+'"></td><td class="pl-2 pr-2" id="htg'+i+'"></td><td class="pl-2 pr-2"  id="byr'+i+'"></td></tr>');
                        $.each(res.umr, function (x, xitem) {
                            if (item.absen.gajiBersih <= 10) {
                                if (item.absen.gajiBersih == xitem.code) {
                                    $('#gj'+i).append(xitem.flagAttr1);
                                }
                            } else {
                                $('#gj'+i).append(item.absen.gajiBersih);
                            }
                        }); 
                        $.each(res.htg, function (x, xitem) {
                            if (item.absen.isHitung == xitem.code) {
                                $('#htg'+i).append(xitem.localizedName);
                            }
                        }); 
                        $.each(res.byr, function (x, xitem) {
                            if (item.absen.Isbayar == xitem.code) {
                                $('#byr'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.kar, function (x, xitem) {
                            if (item.statusKaryawan == xitem.code) {
                                $('#kar'+i).append(xitem.localizedName);
                            }
                        }); 
                    });
                }
            }
        })
    }

    function filternama() {
        var nama = $('#nama').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type : 'POST',
            url : 'http://localhost:8000/nama/',
            data : {
                nama : nama,
                _token : _token
            },
            success : function (res) {
            $('#tbody').html('');
                if (nama == null) {
                    $.each(res.all, function (i, item) {
                        i++;
                        $('#tbody').append('<tr><td class="pl-3 pr-3"><input type="checkbox" id="check'+item.absen.id+'" class="form-control" name="check[]" value="'+item.absen.id+'"></td><td class="pl-3 pr-3">'+item.nip+'</td><td class="pl-3 pr-3">'+item.nama+'</td><td class="pl-3 pr-3" id="kar'+i+'"></td><td class="pl-3 pr-3">'+item.absen.jmlMasuk+'</td><td class="pl-3 pr-3">'+item.absen.jmlSakit+'</td><td class="pl-3 pr-3">'+item.absen.jmlIzin+'</td><td class="pl-3 pr-3">'+item.absen.jmlCuti+'</td><td class="pl-3 pr-3">'+item.absen.jmlLembur+'</td><td class="pl-3 pr-3"  id="gj'+i+'"></td><td class="pl-2 pr-2" id="htg'+i+'"></td><td class="pl-2 pr-2"  id="byr'+i+'"></td></tr>');
                        $.each(res.umr, function (x, xitem) {
                            if (item.gajiBersih <= 10) {
                                if (item.gajiBersih == xitem.code) {
                                    $('#gj'+i).append(xitem.flagAttr1);
                                }
                            } else {
                                $('#gj'+i).append(item.gajiBersih);
                            }
                        });
                        $.each(res.htg, function (x, xitem) {
                            if (item.absen.isHitung == xitem.code) {
                                $('#htg'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.byr, function (x, xitem) {
                            if (item.absen.Isbayar == xitem.code) {
                                $('#byr'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.kar, function (x, xitem) {
                            if (item.statusKaryawan == xitem.code) {
                                $('#kar'+i).append(xitem.localizedName);
                            }
                        });
                    });
                } else {
                    $.each(res.karyawan, function (i, item) {
                        i++;
                        $('#tbody').append('<tr><td class="pl-3 pr-3"><input type="checkbox" id="check'+item.absen.id+'" class="form-control" name="check[]" value="'+item.absen.id+'"></td><td class="pl-3 pr-3">'+item.nip+'</td><td class="pl-3 pr-3">'+item.nama+'</td><td class="pl-3 pr-3" id="kar'+i+'"></td><td class="pl-3 pr-3">'+item.absen.jmlMasuk+'</td><td class="pl-3 pr-3">'+item.absen.jmlSakit+'</td><td class="pl-3 pr-3">'+item.absen.jmlIzin+'</td><td class="pl-3 pr-3">'+item.absen.jmlCuti+'</td><td class="pl-3 pr-3">'+item.absen.jmlLembur+'</td><td class="pl-3 pr-3"  id="gj'+i+'"></td><td class="pl-2 pr-2" id="htg'+i+'"></td><td class="pl-2 pr-2"  id="byr'+i+'"></td></tr>');
                        $.each(res.umr, function (x, xitem) {
                            if (item.absen.gajiBersih <= 10) {
                                if (item.absen.gajiBersih == xitem.code) {
                                    $('#gj'+i).append(xitem.flagAttr1);
                                }
                            } else {
                                $('#gj'+i).append(item.absen.gajiBersih);
                            }
                        }); 
                        $.each(res.htg, function (x, xitem) {
                            if (item.absen.isHitung == xitem.code) {
                                $('#htg'+i).append(xitem.localizedName);
                            }
                        }); 
                        $.each(res.byr, function (x, xitem) {
                            if (item.absen.Isbayar == xitem.code) {
                                $('#byr'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.kar, function (x, xitem) {
                            if (item.statusKaryawan == xitem.code) {
                                $('#kar'+i).append(xitem.localizedName);
                            }
                        }); 
                    });
                }
            }
        })
    }

    function filternik() {
        var nik = $('#nik').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type : 'POST',
            url : 'http://localhost:8000/nik/',
            data : {
                nik : nik,
                _token : _token
            },
            success : function (res) {
            $('#tbody').html('');
                if (nik == null) {
                    $.each(res.all, function (i, item) {
                        i++;
                        $('#tbody').append('<tr><td class="pl-3 pr-3"><input type="checkbox" id="check'+item.absen.id+'" class="form-control" name="check[]" value="'+item.absen.id+'"></td><td class="pl-3 pr-3">'+item.nip+'</td><td class="pl-3 pr-3">'+item.nama+'</td><td class="pl-3 pr-3" id="kar'+i+'"></td><td class="pl-3 pr-3">'+item.absen.jmlMasuk+'</td><td class="pl-3 pr-3">'+item.absen.jmlSakit+'</td><td class="pl-3 pr-3">'+item.absen.jmlIzin+'</td><td class="pl-3 pr-3">'+item.absen.jmlCuti+'</td><td class="pl-3 pr-3">'+item.absen.jmlLembur+'</td><td class="pl-3 pr-3"  id="gj'+i+'"></td><td class="pl-2 pr-2" id="htg'+i+'"></td><td class="pl-2 pr-2"  id="byr'+i+'"></td></tr>');
                        $.each(res.umr, function (x, xitem) {
                            if (item.gajiBersih <= 10) {
                                if (item.gajiBersih == xitem.code) {
                                    $('#gj'+i).append(xitem.flagAttr1);
                                }
                            } else {
                                $('#gj'+i).append(item.gajiBersih);
                            }
                        });
                        $.each(res.htg, function (x, xitem) {
                            if (item.absen.isHitung == xitem.code) {
                                $('#htg'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.byr, function (x, xitem) {
                            if (item.absen.Isbayar == xitem.code) {
                                $('#byr'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.kar, function (x, xitem) {
                            if (item.statusKaryawan == xitem.code) {
                                $('#kar'+i).append(xitem.localizedName);
                            }
                        });
                    });
                } else {
                    $.each(res.karyawan, function (i, item) {
                        i++;
                        $('#tbody').append('<tr><td class="pl-3 pr-3"><input type="checkbox" id="check'+item.absen.id+'" class="form-control" name="check[]" value="'+item.absen.id+'"></td><td class="pl-3 pr-3">'+item.nip+'</td><td class="pl-3 pr-3">'+item.nama+'</td><td class="pl-3 pr-3" id="kar'+i+'"></td><td class="pl-3 pr-3">'+item.absen.jmlMasuk+'</td><td class="pl-3 pr-3">'+item.absen.jmlSakit+'</td><td class="pl-3 pr-3">'+item.absen.jmlIzin+'</td><td class="pl-3 pr-3">'+item.absen.jmlCuti+'</td><td class="pl-3 pr-3">'+item.absen.jmlLembur+'</td><td class="pl-3 pr-3"  id="gj'+i+'"></td><td class="pl-2 pr-2" id="htg'+i+'"></td><td class="pl-2 pr-2"  id="byr'+i+'"></td></tr>');
                        $.each(res.umr, function (x, xitem) {
                            if (item.absen.gajiBersih <= 10) {
                                if (item.absen.gajiBersih == xitem.code) {
                                    $('#gj'+i).append(xitem.flagAttr1);
                                }
                            } else {
                                $('#gj'+i).append(item.absen.gajiBersih);
                            }
                        }); 
                        $.each(res.htg, function (x, xitem) {
                            if (item.absen.isHitung == xitem.code) {
                                $('#htg'+i).append(xitem.localizedName);
                            }
                        }); 
                        $.each(res.byr, function (x, xitem) {
                            if (item.absen.Isbayar == xitem.code) {
                                $('#byr'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.kar, function (x, xitem) {
                            if (item.statusKaryawan == xitem.code) {
                                $('#kar'+i).append(xitem.localizedName);
                            }
                        }); 
                    });
                }
            }
        })
    }

    function filterhitung() {
        var hitung = $('#hitung').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type : 'POST',
            url : 'http://localhost:8000/hitung/',
            data : {
                hitung : hitung,
                _token : _token
            },
            success : function (res) {
            $('#tbody').html('');
                if (hitung == null) {
                    $.each(res.all, function (i, item) {
                        i++;
                        $('#tbody').append('<tr><td class="pl-3 pr-3"><input type="checkbox" id="check'+item.id+'" class="form-control" name="check[]" value="'+item.id+'"></td><td class="pl-3 pr-3">'+item.karyawan.nip+'</td><td class="pl-3 pr-3">'+item.karyawan.nama+'</td><td class="pl-3 pr-3" id="kar'+i+'"></td><td class="pl-3 pr-3">'+item.jmlMasuk+'</td><td class="pl-3 pr-3">'+item.jmlSakit+'</td><td class="pl-3 pr-3">'+item.jmlIzin+'</td><td class="pl-3 pr-3">'+item.jmlCuti+'</td><td class="pl-3 pr-3">'+item.jmlLembur+'</td><td class="pl-3 pr-3"  id="gj'+i+'"></td><td class="pl-2 pr-2" id="htg'+i+'"></td><td class="pl-2 pr-2"  id="byr'+i+'"></td></tr>');
                        $.each(res.umr, function (x, xitem) {
                            if (item.gajiBersih <= 10) {
                                if (item.gajiBersih == xitem.code) {
                                    $('#gj'+i).append(xitem.flagAttr1);
                                }
                            } else {
                                $('#gj'+i).append(item.gajiBersih);
                            }
                        });
                        $.each(res.htg, function (x, xitem) {
                            if (item.isHitung == xitem.code) {
                                $('#htg'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.byr, function (x, xitem) {
                            if (item.Isbayar == xitem.code) {
                                $('#byr'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.kar, function (x, xitem) {
                            if (item.karyawan.statusKaryawan == xitem.code) {
                                $('#kar'+i).append(xitem.localizedName);
                            }
                        });
                    });
                } else {
                    $.each(res.karyawan, function (i, item) {
                        i++;
                        $('#tbody').append('<tr><td class="pl-3 pr-3"><input type="checkbox" id="check'+item.id+'" class="form-control" name="check[]" value="'+item.id+'"></td><td class="pl-3 pr-3">'+item.karyawan.nip+'</td><td class="pl-3 pr-3">'+item.karyawan.nama+'</td><td class="pl-3 pr-3" id="kar'+i+'"></td><td class="pl-3 pr-3">'+item.jmlMasuk+'</td><td class="pl-3 pr-3">'+item.jmlSakit+'</td><td class="pl-3 pr-3">'+item.jmlIzin+'</td><td class="pl-3 pr-3">'+item.jmlCuti+'</td><td class="pl-3 pr-3">'+item.jmlLembur+'</td><td class="pl-3 pr-3"  id="gj'+i+'"></td><td class="pl-2 pr-2" id="htg'+i+'"></td><td class="pl-2 pr-2"  id="byr'+i+'"></td></tr>');
                        $.each(res.umr, function (x, xitem) {
                            if (item.gajiBersih <= 10) {
                                if (item.gajiBersih == xitem.code) {
                                    $('#gj'+i).append(xitem.flagAttr1);
                                }
                            } else {
                                $('#gj'+i).append(item.gajiBersih);
                            }
                        }); 
                        $.each(res.htg, function (x, xitem) {
                            if (item.isHitung == xitem.code) {
                                $('#htg'+i).append(xitem.localizedName);
                            }
                        }); 
                        $.each(res.byr, function (x, xitem) {
                            if (item.Isbayar == xitem.code) {
                                $('#byr'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.kar, function (x, xitem) {
                            if (item.karyawan.statusKaryawan == xitem.code) {
                                $('#kar'+i).append(xitem.localizedName);
                            }
                        }); 
                    });
                }
            }
        })
    }

    function filterbayar() {
        var bayar = $('#bayar').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type : 'POST',
            url : 'http://localhost:8000/bayar/',
            data : {
                bayar : bayar,
                _token : _token
            },
            success : function (res) {
            $('#tbody').html('');
                if (bayar == null) {
                    $.each(res.all, function (i, item) {
                        i++;
                        $('#tbody').append('<tr><td class="pl-3 pr-3"><input type="checkbox" id="check'+item.id+'" class="form-control" name="check[]" value="'+item.id+'"></td><td class="pl-3 pr-3">'+item.karyawan.nip+'</td><td class="pl-3 pr-3">'+item.karyawan.nama+'</td><td class="pl-3 pr-3" id="kar'+i+'"></td><td class="pl-3 pr-3">'+item.jmlMasuk+'</td><td class="pl-3 pr-3">'+item.jmlSakit+'</td><td class="pl-3 pr-3">'+item.jmlIzin+'</td><td class="pl-3 pr-3">'+item.jmlCuti+'</td><td class="pl-3 pr-3">'+item.jmlLembur+'</td><td class="pl-3 pr-3"  id="gj'+i+'"></td><td class="pl-2 pr-2" id="htg'+i+'"></td><td class="pl-2 pr-2"  id="byr'+i+'"></td></tr>');
                        $.each(res.umr, function (x, xitem) {
                            if (item.gajiBersih <= 10) {
                                if (item.gajiBersih == xitem.code) {
                                    $('#gj'+i).append(xitem.flagAttr1);
                                }
                            } else {
                                $('#gj'+i).append(item.gajiBersih);
                            }
                        });
                        $.each(res.htg, function (x, xitem) {
                            if (item.isHitung == xitem.code) {
                                $('#htg'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.byr, function (x, xitem) {
                            if (item.Isbayar == xitem.code) {
                                $('#byr'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.kar, function (x, xitem) {
                            if (item.karyawan.statusKaryawan == xitem.code) {
                                $('#kar'+i).append(xitem.localizedName);
                            }
                        });
                    });
                } else {
                    $.each(res.karyawan, function (i, item) {
                        i++;
                        $('#tbody').append('<tr><td class="pl-3 pr-3"><input type="checkbox" id="check'+item.id+'" class="form-control" name="check[]" value="'+item.id+'"></td><td class="pl-3 pr-3">'+item.karyawan.nip+'</td><td class="pl-3 pr-3">'+item.karyawan.nama+'</td><td class="pl-3 pr-3" id="kar'+i+'"></td><td class="pl-3 pr-3">'+item.jmlMasuk+'</td><td class="pl-3 pr-3">'+item.jmlSakit+'</td><td class="pl-3 pr-3">'+item.jmlIzin+'</td><td class="pl-3 pr-3">'+item.jmlCuti+'</td><td class="pl-3 pr-3">'+item.jmlLembur+'</td><td class="pl-3 pr-3"  id="gj'+i+'"></td><td class="pl-2 pr-2" id="htg'+i+'"></td><td class="pl-2 pr-2"  id="byr'+i+'"></td></tr>');
                        $.each(res.umr, function (x, xitem) {
                            if (item.gajiBersih <= 10) {
                                if (item.gajiBersih == xitem.code) {
                                    $('#gj'+i).append(xitem.flagAttr1);
                                }
                            } else {
                                $('#gj'+i).append(item.gajiBersih);
                            }
                        }); 
                        $.each(res.htg, function (x, xitem) {
                            if (item.isHitung == xitem.code) {
                                $('#htg'+i).append(xitem.localizedName);
                            }
                        }); 
                        $.each(res.byr, function (x, xitem) {
                            if (item.Isbayar == xitem.code) {
                                $('#byr'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.kar, function (x, xitem) {
                            if (item.karyawan.statusKaryawan == xitem.code) {
                                $('#kar'+i).append(xitem.localizedName);
                            }
                        }); 
                    });
                }
            }
        })
    }
    
    function filtertipe() {
        var tipe = $('#tipe').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type : 'POST',
            url : 'http://localhost:8000/tipe/',
            data : {
                tipe : tipe,
                _token : _token
            },
            success : function (res) {
                console.log(tipe);
            $('#tbody').html('');
                if (tipe == null) {
                    $.each(res.all, function (i, item) {
                        i++;
                        $('#tbody').append('<tr><td class="pl-3 pr-3"><input type="checkbox" id="check'+item.absen.id+'" class="form-control" name="check[]" value="'+item.absen.id+'"></td><td class="pl-3 pr-3">'+item.nip+'</td><td class="pl-3 pr-3">'+item.nama+'</td><td class="pl-3 pr-3" id="kar'+i+'"></td><td class="pl-3 pr-3">'+item.absen.jmlMasuk+'</td><td class="pl-3 pr-3">'+item.absen.jmlSakit+'</td><td class="pl-3 pr-3">'+item.absen.jmlIzin+'</td><td class="pl-3 pr-3">'+item.absen.jmlCuti+'</td><td class="pl-3 pr-3">'+item.absen.jmlLembur+'</td><td class="pl-3 pr-3"  id="gj'+i+'"></td><td class="pl-2 pr-2" id="htg'+i+'"></td><td class="pl-2 pr-2"  id="byr'+i+'"></td></tr>');
                        $.each(res.umr, function (x, xitem) {
                            if (item.absen.gajiBersih <= 10) {
                                if (item.absen.gajiBersih == xitem.code) {
                                    $('#gj'+i).append(xitem.flagAttr1);
                                }
                            } else {
                                $('#gj'+i).append(item.absen.gajiBersih);
                            }
                        });
                        $.each(res.htg, function (x, xitem) {
                            if (item.absen.isHitung == xitem.code) {
                                $('#htg'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.byr, function (x, xitem) {
                            if (item.absen.Isbayar == xitem.code) {
                                $('#byr'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.kar, function (x, xitem) {
                            if (item.statusKaryawan == xitem.code) {
                                $('#kar'+i).append(xitem.localizedName);
                            }
                        });
                    });
                } else {
                    $.each(res.karyawan, function (i, item) {
                        i++;
                        $('#tbody').append('<tr><td class="pl-3 pr-3"><input type="checkbox" id="check'+item.absen.id+'" class="form-control" name="check[]" value="'+item.absen.id+'"></td><td class="pl-3 pr-3">'+item.nip+'</td><td class="pl-3 pr-3">'+item.nama+'</td><td class="pl-3 pr-3" id="kar'+i+'"></td><td class="pl-3 pr-3">'+item.absen.jmlMasuk+'</td><td class="pl-3 pr-3">'+item.absen.jmlSakit+'</td><td class="pl-3 pr-3">'+item.absen.jmlIzin+'</td><td class="pl-3 pr-3">'+item.absen.jmlCuti+'</td><td class="pl-3 pr-3">'+item.absen.jmlLembur+'</td><td class="pl-3 pr-3"  id="gj'+i+'"></td><td class="pl-2 pr-2" id="htg'+i+'"></td><td class="pl-2 pr-2"  id="byr'+i+'"></td></tr>');
                        $.each(res.umr, function (x, xitem) {
                            if (item.absen.gajiBersih <= 10) {
                                if (item.absen.gajiBersih == xitem.code) {
                                    $('#gj'+i).append(xitem.flagAttr1);
                                }
                            } else {
                                $('#gj'+i).append(item.absen.gajiBersih);
                            }
                        }); 
                        $.each(res.htg, function (x, xitem) {
                            if (item.absen.isHitung == xitem.code) {
                                $('#htg'+i).append(xitem.localizedName);
                            }
                        }); 
                        $.each(res.byr, function (x, xitem) {
                            if (item.absen.Isbayar == xitem.code) {
                                $('#byr'+i).append(xitem.localizedName);
                            }
                        });
                        $.each(res.kar, function (x, xitem) {
                            if (item.statusKaryawan == xitem.code) {
                                $('#kar'+i).append(xitem.localizedName);
                            }
                        });
                    });
                }
            }
        })
    }

</script>
@endsection