@extends('layouts.app')

@section('title', 'Data Absensi')

@section('content')
<div class="container">
    <div class="mt-4">
        <div>
            <h5>SIM PT. Artha Kreasi Utama</h5>
        </div>
        <div>
            <label>Form Tambah Karyawan</label>
        </div>
    </div>
    <div class="mt-4">
        <div class="card">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col" colspan="6" class="pl-3 pr-3 py-2">Filter</th>
                    </tr>
                </thead>
                <tbody >
                    <tr>
                        <th class="pl-3 pr-3">
                            NIP
                        </th>
                        <th style="width: 30%" class="pl-3 pr-3">
                            <input type="text" class="form-control" id="nip" onkeyup="filternip()">
                        </th>
                        <th class="pl-3 pr-3">
                            Tipe Karyawan
                        </th>
                        <th class="pl-3 pr-3">
                            <select class="form-control" id="tipe" onchange="filtertipe()">
                                <option value="">Pilih Tipe Karyawan</option>
                                @foreach ($ketentuan as $item)
                                @if ($item->qualifier == 'TIPEKARYAWAN')
                                <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                @endif
                                @endforeach
                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th class="pl-3 pr-3">
                            Nama
                        </th>
                        <th style="width: 30%" class="pl-3 pr-3">
                            <input type="text" class="form-control" id="nama" onkeyup="filternama()">
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container">
    <div class="mt-4">
        <div class="d-flex">
            <div class="mr-auto p-2"><h5>Data Absensi</h5></div>
            <div class="p-2">
                <a href="/absen/create" class="btn btn-oval"><h5 style="margin-bottom: 0rem">Input Absen</h5></a>
            </div>
            <div class="p-2">
                <button type="button" class="btn btn-oval" data-toggle="modal" data-target="#exampleModal">
                    <h5 style="margin-bottom: 0rem">Upload  Absen</h5>
                  </button>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="mt-2">
        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th class="pl-3 pr-3" scope="col">No.</th>
                        <th class="pl-3 pr-3" scope="col">NIP</th>
                        <th class="pl-3 pr-3" scope="col">Nama</th>
                        <th class="pl-3 pr-3 text-center" scope="col">Masuk</th>
                        <th class="pl-3 pr-3 text-center" scope="col">Sakit</th>
                        <th class="pl-3 pr-3 text-center" scope="col">Izin</th>
                        <th class="pl-3 pr-3 text-center" scope="col">Cuti</th>
                        <th class="pl-3 pr-3 text-center" scope="col">Libur</th>
                        <th class="pl-3 pr- text-center" scope="col">Total Hari</th>
                        <th class="pl-3 pr-3" scope="col">Tipe Karyawan</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    @php
                        $i = 1
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <td class="pl-3 pr-3">
                            {{$i++}}
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->nip}}
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->karyawan->nama}}
                        </td>
                        <td class="pl-3 pr-3 text-center">
                            {{$item->jmlMasuk}}
                        </td>
                        <td class="pl-3 pr-3 text-center">
                            {{$item->jmlSakit}}
                        </td>
                        <td class="pl-3 pr-3 text-center">
                            {{$item->jmlIzin}}
                        </td>
                        <td class="pl-3 pr-3 text-center">
                            {{$item->jmlCuti}}
                        </td>
                        <td class="pl-3 pr-3 text-center">
                            {{$item->jmlLibur}}
                        </td>
                        <td class="pl-3 pr-3 text-center">
                            {{$item->TotalHari}}
                        </td>
                        <td class="pl-3 pr-3">
                            @foreach ($ketentuan as $row)
                                @if ($row->qualifier == 'STATUSKARYAWAN')
                                    @if ($row->code == $item->karyawan->statusKerja)
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
<!-- Button trigger modal -->  
  <!-- Modal -->
<div class="modal fade pl-2 pr-2 mt-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content"  style="height: 50%;width: 50%; margin:auto">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Data Absen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-inline my-2">
                    <label class="col-sm-4 col-form-label">Upload File</label>
                    <div class="col-sm-8">
                        <input type="file" name="path" class="form-control @error('path') is-invalid @enderror">
                        @error('path')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex">
                        <div class="py-2 mr-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        <div class="py-2">
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>
</div>
<script>
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
                        $('#tbody').append('<tr><td class="pl-3 pr-3">'+i+'</td><td class="pl-3 pr-3">'+item.nip+'</td><td class="pl-3 pr-3">'+item.nama+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlMasuk+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlSakit+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlIzin+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlCuti+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlLibur+'</td><td class="pl-3 pr-3 text-center">'+item.absen.TotalHari+'</td><td class="pl-3 pr-3" id="ket'+i+'"></td></tr>');
                        $.each(res.ket, function (x, xitem) {
                            if (item.statusKerja == xitem.code) {
                                $('#ket'+i).append(xitem.localizedName);
                            }
                        });
                    });
                } else {
                    $.each(res.karyawan, function (i, item) {
                        i++;
                        $('#tbody').append('<tr><td class="pl-3 pr-3">'+i+'</td><td class="pl-3 pr-3">'+item.nip+'</td><td class="pl-3 pr-3">'+item.nama+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlMasuk+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlSakit+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlIzin+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlCuti+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlLibur+'</td><td class="pl-3 pr-3 text-center">'+item.absen.TotalHari+'</td><td class="pl-3 pr-3" id="ket'+i+'"></td></tr>');
                        $.each(res.ket, function (x, xitem) {
                            if (item.statusKerja == xitem.code) {
                                $('#ket'+i).append(xitem.localizedName);
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
                        $('#tbody').append('<tr><td class="pl-3 pr-3">'+i+'</td><td class="pl-3 pr-3">'+item.nip+'</td><td class="pl-3 pr-3">'+item.nama+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlMasuk+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlSakit+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlIzin+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlCuti+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlLibur+'</td><td class="pl-3 pr-3 text-center">'+item.absen.TotalHari+'</td><td class="pl-3 pr-3" id="ket'+i+'"></td></tr>');
                        $.each(res.ket, function (x, xitem) {
                            if (item.statusKerja == xitem.code) {
                                $('#ket'+i).append(xitem.localizedName);
                            }
                        });
                    });
                } else {
                    $.each(res.karyawan, function (i, item) {
                        i++;
                        $('#tbody').append('<tr><td class="pl-3 pr-3">'+i+'</td><td class="pl-3 pr-3">'+item.nip+'</td><td class="pl-3 pr-3">'+item.nama+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlMasuk+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlSakit+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlIzin+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlCuti+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlLibur+'</td><td class="pl-3 pr-3 text-center">'+item.absen.TotalHari+'</td><td class="pl-3 pr-3" id="ket'+i+'"></td></tr>');
                        $.each(res.ket, function (x, xitem) {
                            if (item.statusKerja == xitem.code) {
                                $('#ket'+i).append(xitem.localizedName);
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
            $('#tbody').html('');
                if (tipe == null) {
                    $.each(res.all, function (i, item) {
                        i++;
                        $('#tbody').append('<tr><td class="pl-3 pr-3">'+i+'</td><td class="pl-3 pr-3">'+item.nip+'</td><td class="pl-3 pr-3">'+item.nama+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlMasuk+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlSakit+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlIzin+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlCuti+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlLibur+'</td><td class="pl-3 pr-3 text-center">'+item.absen.TotalHari+'</td><td class="pl-3 pr-3" id="ket'+i+'"></td></tr>');
                        $.each(res.ket, function (x, xitem) {
                            if (item.statusKerja == xitem.code) {
                                $('#ket'+i).append(xitem.localizedName);
                            }
                        });
                    });
                } else {
                    $.each(res.karyawan, function (i, item) {
                        i++;
                        $('#tbody').append('<tr><td class="pl-3 pr-3">'+i+'</td><td class="pl-3 pr-3">'+item.nip+'</td><td class="pl-3 pr-3">'+item.nama+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlMasuk+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlSakit+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlIzin+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlCuti+'</td><td class="pl-3 pr-3 text-center">'+item.absen.jmlLibur+'</td><td class="pl-3 pr-3 text-center">'+item.absen.TotalHari+'</td><td class="pl-3 pr-3" id="ket'+i+'"></td></tr>');
                        $.each(res.ket, function (x, xitem) {
                            if (item.statusKerja == xitem.code) {
                                $('#ket'+i).append(xitem.localizedName);
                            }
                        }); 
                    });
                }
            }
        })
    }
</script>
@endsection