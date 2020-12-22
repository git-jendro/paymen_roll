@extends('layouts.app')

@section('title', 'Tambah Karyawan')

@section('content')
<div class="container">
    <div class="mt-4">
        <div class="ml-4">
            <h5>SIM PT. Artha Kreasi Utama</h5>
        </div>
        <div class="ml-4">
            <label>Form Tambah Karyawan</label>
        </div>
    </div>
</div>
<div class="container">
    <form action="/karyawan/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mt-4 ml-1">
            <div class="container col-8" style="margin-left: 0px; margin-right: 0px">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h2>Informasi Personal</h2>
                            <hr>
                        </div>
                        <div class="row d-flex">
                            <div class="container col-5 text-left" style="margin-left: 1rem; margin-right:0rem">
                                {{-- <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nomor Pegawai</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" placeholder="NIP">
                                        @error('nip')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nama</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{old('nama')}}" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama">
                                        @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-8">
                                        <select name="JK" class="form-control @error('JK') is-invalid @enderror" placeholder="JK">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            @foreach ($ketentuan as $item)
                                            @if ($item->qualifier == 'JENISKELAMIN')
                                            <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('JK')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{old('tempatlahir')}}" class="form-control @error('tempatlahir') is-invalid @enderror" name="tempatlahir"
                                        placeholder="Tempat Lahir">
                                    @error('tempatlahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob">
                                    @error('dob')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nomor Telepon</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{old('notel')}}" class="form-control @error('notel') is-invalid @enderror" name="notel"
                                        placeholder="Nomor Telpon">
                                    @error('notel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" name="email"
                                        placeholder="Email">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nomor KTP</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{old('noktp')}}" class="form-control @error('noktp') is-invalid @enderror" name="noktp"
                                        placeholder="Nomor KTP">
                                    @error('noktp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nomor KK</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{old('nokk')}}" class="form-control @error('nokk') is-invalid @enderror" name="nokk"
                                        placeholder="Nomor KK">
                                    @error('nokk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-inline mt-4 pt-2">
                                    <label class="col-sm-4 col-form-label">No. BPJS TK</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{old('noBpjsKet')}}" name="noBpjsKet" class="form-control @error('noBpjsKet') is-invalid @enderror" placeholder="No. BPJS TK">
                                        @error('noBpjsKet')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="container col-5 text-left" style="margin-right:0rem">
                                <div class="form-inline mt-3">
                                    <label class="col-sm-4 col-form-label">NPWP</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{old('npwp')}}" class="form-control @error('npwp') is-invalid @enderror" name="npwp"
                                        placeholder="NPWP">
                                    @error('npwp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Status Pernikahan</label>
                                    <div class="col-sm-8">
                                        <select name="statusNikah" class="form-control @error('statusNikah') is-invalid @enderror" >
                                            <option value="">Pilih Status Pernikahan</option>
                                            @foreach ($ketentuan as $item)
                                                @if ($item->qualifier == 'STATUSNIKAH')
                                                    <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('statusNikah')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nama Ayah</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{old('namaAyah')}}" name="namaAyah" class="form-control @error('namaAyah') is-invalid @enderror" placeholder="Nama Ayah">
                                    @error('namaAyah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nama Ibu</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{old('namaIbu')}}" name="namaIbu" class="form-control @error('namaIbu') is-invalid @enderror" placeholder="Nama Ibu">
                                        @error('namaIbu')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Status Karyawan</label>
                                    <div class="col-sm-8">
                                        <select name="statusKerja" class="form-control @error('statusKerja') is-invalid @enderror">
                                            <option value="">Pilih Status Karyawan</option>
                                            @foreach ($ketentuan as $item)
                                                @if ($item->qualifier == 'STATUSKERJA')
                                                    <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('statusKerja')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Tipe UMR</label>
                                    <div class="col-sm-8">
                                        <select name="tipeumr" class="form-control @error('tipeumr') is-invalid @enderror">
                                            <option value="">Pilih Tipe UMR</option>
                                            @foreach ($ketentuan as $item)
                                                @if ($item->qualifier == 'TIPEUMR')
                                                    <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('tipeumr')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Alamat KTP</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control @error('alamatktp') is-invalid @enderror" name="alamatktp" rows="3">{{old('alamatktp')}}</textarea>
                                        @error('alamatktp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Alamat Domisili</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control @error('alamatdom') is-invalid @enderror" name="alamatdom" rows="3">{{old('alamatdom')}}</textarea>
                                        @error('alamatdom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">No. BPJS KES</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{old('noBpjsKes')}}" name="noBpjsKes" class="form-control @error('noBpjsKes') is-invalid @enderror" placeholder="No. BPJS KES">
                                        @error('noBpjsKes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="card my-3">
                    <div class="card-body">
                        <div>
                            <h2>Informasi Keluarga</h2>
                            <hr>
                        </div>
                        <div class="row d-flex">
                            <div class="container col-5 text-left" style="margin-left: 1rem; margin-right:0rem">
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nama Pasangan</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="namaPas" class="form-control @error('namaPas') is-invalid @enderror" placeholder="Nama Pasangan">
                                        @error('namaPas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-8">
                                        <select name="jkPas" class="form-control @error('jkPas') is-invalid @enderror">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            @foreach ($ketentuan as $item)
                                            @if ($item->qualifier == 'JENISKELAMIN')
                                            <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('jkPas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nomor KTP</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="noKtpPas" class="form-control  @error('noKtpPas') is-invalid @enderror" placeholder="Nomor KTP">
                                        @error('noKtpPas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="tempatLahirPas" class="form-control @error('tempatLahirPas') is-invalid @enderror" placeholder="Tempat Lahir">
                                        @error('tempatLahirPas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="date" name="dobPas" class="form-control @error('dobPas') is-invalid @enderror">
                                        @error('dobPas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nama Anak 1</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="namaAn1" class="form-control @error('namaAn1') is-invalid @enderror" placeholder="Nama Anak 1">
                                        @error('namaAn1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-8">
                                        <select name="jkAn1" class="form-control @error('jkAn1') is-invalid @enderror">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            @foreach ($ketentuan as $item)
                                                @if ($item->qualifier == 'JENISKELAMIN')
                                                    <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('jkAn1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="tempatLahirAn1" class="form-control @error('tempatLahirAn1') is-invalid @enderror" placeholder="Tempat Lahir Anak 1">
                                        @error('tempatLahirAn1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="date" name="dobAn1" class="form-control @error('dobAn1') is-invalid @enderror">
                                        @error('dobAn1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="container col-5 text-left" style="margin-right:0rem">
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nama Anak 2</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="namaAn2" class="form-control @error('namaAn2') is-invalid @enderror" placeholder="Nama Anak 2">
                                        @error('namaAn2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-8">
                                        <select name="jkAn2" class="form-control @error('jkAn2') is-invalid @enderror">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            @foreach ($ketentuan as $item)
                                                @if ($item->qualifier == 'JENISKELAMIN')
                                                    <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('jkAn2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="tempatLahirAn2" class="form-control @error('tempatLahirAn2') is-invalid @enderror" placeholder="Tempat Lahir Anak 2">
                                        @error('tempatLahirAn2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="date" name="dobAn2" class="form-control @error('dobAn2') is-invalid @enderror">
                                        @error('dobAn2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nama Anak 3</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="namaAn3" class="form-control @error('namaAn3') is-invalid @enderror">
                                        @error('namaAn3')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-8">
                                        <select name="jkAn3" class="form-control @error('jkAn3') is-invalid @enderror">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            @foreach ($ketentuan as $item)
                                                @if ($item->qualifier == 'JENISKELAMIN')
                                                    <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('jkAn3')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="tempatLahirAn3" class="form-control @error('tempatLahirAn3') is-invalid @enderror" placeholder="Tempat Lahir Anak 3">
                                        @error('tempatLahirAn3')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="date" name="dobAn3" class="form-control @error('dobAn3') is-invalid @enderror">
                                        @error('dobAn3')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
            <div class="container col-4" style="margin-left: 0px; margin-right: 0px; padding-left:0px">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h2>Informasi Rekening</h2>
                            <hr>
                        </div>
                        <div class="container pl-3 pt-2" style="margin: auto">
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nama Bank</label>
                                <div class="col-sm-8">
                                    {{-- <select name="namaBank" class="form-control @error('namaBank') is-invalid @enderror" >
                                        <option value="">Pilih Bank</option>
                                        @foreach ($ketentuan as $item)
                                            @if ($item->qualifier == 'BANK')
                                                <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                            @endif
                                        @endforeach --}}
                                    <input type="text" value="{{old('namaBank')}}" name="namaBank" class="form-control @error('namaBank') is-invalid @enderror" placeholder="Nama Bank">
                                    </select>
                                    @error('namaBank')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Cabang</label>
                                <div class="col-sm-8">
                                    <input type="text" value="{{old('cabang')}}" name="cabang" class="form-control @error('cabang') is-invalid @enderror" placeholder="Cabang">
                                    @error('cabang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nomor Rekening</label>
                                <div class="col-sm-8">
                                    <input type="text" value="{{old('noRek')}}" name="noRek" class="form-control @error('noRek') is-invalid @enderror" placeholder="Nomor Rekening">
                                    @error('noRek')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Atas Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" value="{{old('atasNama')}}" name="atasNama"  class="form-control @error('atasNama') is-invalid @enderror" placeholder="Atas Nama">
                                    @error('atasNama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card my-2">
                    <div class="card-body">
                        <div>
                            <h2>Informasi Jenjang Pendidikan</h2>
                            <hr>
                        </div>
                        <div class="container pl-3 pt-2" style="margin: auto">
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Jenjang Terakhir</label>
                                <div class="col-sm-8">
                                    <select name="PendidikanTerakhir" class="form-control @error('PendidikanTerakhir') is-invalid @enderror">
                                        <option value="">Pilih Jenjang Terakhir</option>
                                        @foreach ($ketentuan as $item)
                                            @if ($item->qualifier == 'PENDIDIKAN')
                                                <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('PendidikanTerakhir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">IPK</label>
                                <div class="col-sm-8">
                                    <input type="text" value="{{old('ipk')}}" name="ipk" class="form-control @error('ipk') is-invalid @enderror" placeholder="IPK">
                                        @error('ipk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Status</label>
                                <div class="col-sm-8">
                                    <select name="statusPendidikan" class="form-control @error('statusPendidikan') is-invalid @enderror" placeholder="Status">
                                        <option value="">Pilih Status Pendidikan</option>
                                        @foreach ($ketentuan as $item)
                                            @if ($item->qualifier == 'STATUSPENDIDIKAN')
                                                <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('statusPendidikan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tahun Ajaran</label>
                                <div class="col-sm-8">
                                    <input type="text" value="{{old('tahunLulus')}}" name="tahunLulus" class="form-control @error('tahunLulus') is-invalid @enderror" placeholder="Tahun Ajaran">
                                        @error('tahunLulus')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card my-2">
                    <div class="card-body">
                        <div>
                            <h2>Informasi Kontrak</h2>
                            <hr>
                        </div>
                        <div class="container pl-3 pt-2" style="margin: auto">
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Jabatan</label>
                                <div class="col-sm-8">
                                    <select name="jabatan" class="form-control @error('jabatan') is-invalid @enderror">
                                        <option value="">Pilih Jabatan</option>
                                        @foreach ($ketentuan as $item)
                                            @if ($item->qualifier == 'JABATAN')
                                                <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                            @endif                                                          
                                        @endforeach
                                    </select>
                                    @error('jabatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Divisi</label>
                                <div class="col-sm-8">
                                    <select name="divisi" class="form-control @error('divisi') is-invalid @enderror">
                                        <option value="">Pilih Divisi</option>
                                        @foreach ($ketentuan as $item)
                                            @if ($item->qualifier == 'DIVISI')
                                                <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                            @endif                                                          
                                        @endforeach
                                    </select>
                                    @error('divisi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Penempatan</label>
                                <div class="col-sm-8">
                                    <select name="penempatan" class="form-control @error('penempatan') is-invalid @enderror" placeholder="penempatan">
                                        @error('penempatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <option value="">Pilih Penempatan</option>
                                        @foreach ($ketentuan as $item)
                                            @if ($item->qualifier == 'PENEMPATAN')
                                                <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                            @endif                                                          
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tanggal Masuk</label>
                                <div class="col-sm-8">
                                    <input type="date" name="tanggalMasuk" class="form-control @error('tanggalMasuk') is-invalid @enderror" placeholder="Tanggal Masuk">
                                        @error('tanggalMasuk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nomor PKWT</label>
                                <div class="col-sm-8">
                                    <input type="text" value="{{old('noPkwt')}}" name="noPkwt" class="form-control @error('noPkwt') is-invalid @enderror" placeholder="Nomor PKWT">
                                        @error('noPkwt')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tanggal Mulai</label>
                                <div class="col-sm-8">
                                    <input type="date" name="mulai" class="form-control @error('mulai') is-invalid @enderror" placeholder="Tanggal Mulai">
                                        @error('mulai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tanggal Berakhir</label>
                                <div class="col-sm-8">
                                    <input type="date" name="berakhir" class="form-control @error('berakhir') is-invalid @enderror" placeholder="Tanggal Berakhir">
                                        @error('berakhir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="card my-2">
                    <div class="card-body">
                        <div>
                            <h2>Informasi BPJS</h2>
                            <hr>
                        </div>
                        <div class="container pl-3 pt-2" style="margin: auto">
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">No. BPJS TK</label>
                                <div class="col-sm-8">
                                    <input type="text" name="noBpjsKet" class="form-control @error('noBpjsKet') is-invalid @enderror" placeholder="No. BPJS TK">
                                        @error('noBpjsKet')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">No. BPJS KES</label>
                                <div class="col-sm-8">
                                    <input type="text" name="noBpjsKes" class="form-control @error('noBpjsKes') is-invalid @enderror" placeholder="No. BPJS KES">
                                        @error('noBpjsKes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">No. BPJS KES Pasangan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="noBpjsKesPas" class="form-control @error('noBpjsKesPas') is-invalid @enderror" placeholder="No. BPJS KES Pasangan">
                                        @error('noBpjsKesPas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">No. BPJS KES Anak 1</label>
                                <div class="col-sm-8">
                                    <input type="text" name="noBpjsKesAn1" class="form-control @error('noBpjsKesAn1') is-invalid @enderror" placeholder="No. BPJS Anak 1">
                                        @error('noBpjsKesAn1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">No. BPJS KES Anak 2</label>
                                <div class="col-sm-8">
                                    <input type="text" name="noBpjsKesAn2" class="form-control @error('noBpjsKesAn2') is-invalid @enderror" placeholder="No. BPJS Anak 2">
                                        @error('noBpjsKesAn2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">No. BPJS KES Anak 3</label>
                                <div class="col-sm-8">
                                    <input type="text" name="noBpjsKesAn3" class="form-control @error('noBpjsKesAn3') is-invalid @enderror" placeholder="No. BPJS Anak 3">
                                        @error('noBpjsKesAn3')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="row d-flex justify-content-end">
            <div class="col-md-2 py-4 ml-2 text-right" style="padding-right:0px">
                <a href="{{url()->previous()}}" class="btn btn-danger" style="width: 80%">Batal</a>
            </div>
            <div class="col-md-2 py-4 text-center" style="padding-left:0px">
                <button type="submit" class="btn btn-primary" style="width: 80%">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection