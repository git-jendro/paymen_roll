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
                            <input type="text" class="form-control" id="nip" onkeyup="filternip()">
                        </td>
                        <td class="pl-2 pr-2">
                            NIK
                        </td>
                        <td class="pl-2 pr-2">
                            <input type="text" class="form-control" id="nik" onkeyup="filternik()">
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
                            Status
                        </td>
                        <td class="pl-2 pr-2">
                            <select class="form-control" id="status" onchange="filterstatus()">
                                <option value="">Pilih Status Karyawan</option>
                                @foreach ($ketentuan as $item)
                                @if ($item->qualifier == 'STATUSKERJA')
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
<form action="" method="POST" enctype="multipart/form-data" style="width: 93%">
    @csrf
<div class="container">
    <div class="mt-4">
        <div class="d-flex">
            <div class="mr-auto p-2"><h5>Data Gaji</h5></div>
            <div class="p-2">
                <button type="submit"  class="btn btn-oval" ><h5 style="margin-bottom: 0rem">Cetak Slip</h5></button>
            </div>
            <div class="p-2">
                <button type="button"  class="btn btn-oval" ><h5 style="margin-bottom: 0rem">Hitung Gaji</h5></button>
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
                <tbody id="tbody">
                    @foreach ($gaji as $item)
                    <tr>
                        <td class="pl-3 pr-3">
                            <input type="checkbox" id="check{{$item->id}}" class="form-control" name="check[]" value="{{$item->id}}">
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
                            {{$item->jmlLembur}}
                        </td>
                        <td class="pl-3 pr-3">
                            @if ($item->gajiBersih <= 10)
                                @foreach ($ketentuan as $row)
                                    @if ($row->qualifier == 'TIPEUMR')
                                        @if ($row->code == $item->gajiBersih)
                                        {{$row->flagAttr1}}
                                        @endif
                                    @endif
                                @endforeach
                            @else
                                {{$item->gajiBersih}}
                            @endif
                        </td>
                        <td class="pl-2 pr-2">
                            @foreach ($ketentuan as $row)
                                @if ($row->qualifier == 'HITUNG')
                                    @if ($row->code == $item->isHitung)
                                        {{$row->localizedName}}
                                    @endif
                                @endif
                            @endforeach
                        </td>
                        <td class="pl-2 pr-2">
                            @foreach ($ketentuan as $row)
                                @if ($row->qualifier == 'BAYAR')
                                    @if ($row->code == $item->Isbayar)
                                        {{$row->localizedName}}
                                    @endif
                                @endif
                            @endforeach
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
    function cetak(id) {
        var check = $('#id'+id).val();
        console.log(check);
        if (!check) {
            alert
        }
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
                        $('#tbody').append('<tr><td class="pl-3 pr-3"><input type="checkbox" id="check'+item.absen.id+'" class="form-control" name="check[]" value="'+item.absen.id+'"></td><td class="pl-3 pr-3">'+item.nip+'</td><td class="pl-3 pr-3">'+item.nama+'</td><td class="pl-3 pr-3">'+item.absen.jmlMasuk+'</td><td class="pl-3 pr-3">'+item.absen.jmlSakit+'</td><td class="pl-3 pr-3">'+item.absen.jmlIzin+'</td><td class="pl-3 pr-3">'+item.absen.jmlCuti+'</td><td class="pl-3 pr-3">'+item.absen.jmlLembur+'</td><td class="pl-3 pr-3"  id="gj'+i+'"></td><td class="pl-2 pr-2" id="htg'+i+'"></td><td class="pl-2 pr-2"  id="byr'+i+'"></td></tr>');
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
                    });
                } else {
                    $.each(res.karyawan, function (i, item) {
                        i++;
                        $('#tbody').append('<tr><td class="pl-3 pr-3"><input type="checkbox" id="check'+item.absen.id+'" class="form-control" name="check[]" value="'+item.absen.id+'"></td><td class="pl-3 pr-3">'+item.nip+'</td><td class="pl-3 pr-3">'+item.nama+'</td><td class="pl-3 pr-3">'+item.absen.jmlMasuk+'</td><td class="pl-3 pr-3">'+item.absen.jmlSakit+'</td><td class="pl-3 pr-3">'+item.absen.jmlIzin+'</td><td class="pl-3 pr-3">'+item.absen.jmlCuti+'</td><td class="pl-3 pr-3">'+item.absen.jmlLembur+'</td><td class="pl-3 pr-3"  id="gj'+i+'"></td><td class="pl-2 pr-2" id="htg'+i+'"></td><td class="pl-2 pr-2"  id="byr'+i+'"></td></tr>');
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
                        $('#tbody').append('<tr><td class="pl-3 pr-3"><input type="checkbox" id="check'+item.absen.id+'" class="form-control" name="check[]" value="'+item.absen.id+'"></td><td class="pl-3 pr-3">'+item.nip+'</td><td class="pl-3 pr-3">'+item.nama+'</td><td class="pl-3 pr-3">'+item.absen.jmlMasuk+'</td><td class="pl-3 pr-3">'+item.absen.jmlSakit+'</td><td class="pl-3 pr-3">'+item.absen.jmlIzin+'</td><td class="pl-3 pr-3">'+item.absen.jmlCuti+'</td><td class="pl-3 pr-3">'+item.absen.jmlLembur+'</td><td class="pl-3 pr-3"  id="gj'+i+'"></td><td class="pl-2 pr-2" id="htg'+i+'"></td><td class="pl-2 pr-2"  id="byr'+i+'"></td></tr>');
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
                    });
                } else {
                    $.each(res.karyawan, function (i, item) {
                        i++;
                        $('#tbody').append('<tr><td class="pl-3 pr-3"><input type="checkbox" id="check'+item.absen.id+'" class="form-control" name="check[]" value="'+item.absen.id+'"></td><td class="pl-3 pr-3">'+item.nip+'</td><td class="pl-3 pr-3">'+item.nama+'</td><td class="pl-3 pr-3">'+item.absen.jmlMasuk+'</td><td class="pl-3 pr-3">'+item.absen.jmlSakit+'</td><td class="pl-3 pr-3">'+item.absen.jmlIzin+'</td><td class="pl-3 pr-3">'+item.absen.jmlCuti+'</td><td class="pl-3 pr-3">'+item.absen.jmlLembur+'</td><td class="pl-3 pr-3"  id="gj'+i+'"></td><td class="pl-2 pr-2" id="htg'+i+'"></td><td class="pl-2 pr-2"  id="byr'+i+'"></td></tr>');
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
                        $('#tbody').append('<tr><td class="pl-3 pr-3"><input type="checkbox" id="check'+item.absen.id+'" class="form-control" name="check[]" value="'+item.absen.id+'"></td><td class="pl-3 pr-3">'+item.nip+'</td><td class="pl-3 pr-3">'+item.nama+'</td><td class="pl-3 pr-3">'+item.absen.jmlMasuk+'</td><td class="pl-3 pr-3">'+item.absen.jmlSakit+'</td><td class="pl-3 pr-3">'+item.absen.jmlIzin+'</td><td class="pl-3 pr-3">'+item.absen.jmlCuti+'</td><td class="pl-3 pr-3">'+item.absen.jmlLembur+'</td><td class="pl-3 pr-3"  id="gj'+i+'"></td><td class="pl-2 pr-2" id="htg'+i+'"></td><td class="pl-2 pr-2"  id="byr'+i+'"></td></tr>');
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
                    });
                } else {
                    $.each(res.karyawan, function (i, item) {
                        i++;
                        $('#tbody').append('<tr><td class="pl-3 pr-3"><input type="checkbox" id="check'+item.absen.id+'" class="form-control" name="check[]" value="'+item.absen.id+'"></td><td class="pl-3 pr-3">'+item.nip+'</td><td class="pl-3 pr-3">'+item.nama+'</td><td class="pl-3 pr-3">'+item.absen.jmlMasuk+'</td><td class="pl-3 pr-3">'+item.absen.jmlSakit+'</td><td class="pl-3 pr-3">'+item.absen.jmlIzin+'</td><td class="pl-3 pr-3">'+item.absen.jmlCuti+'</td><td class="pl-3 pr-3">'+item.absen.jmlLembur+'</td><td class="pl-3 pr-3"  id="gj'+i+'"></td><td class="pl-2 pr-2" id="htg'+i+'"></td><td class="pl-2 pr-2"  id="byr'+i+'"></td></tr>');
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
                    });
                }
            }
        })
    }

</script>
@endsection