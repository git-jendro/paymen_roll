@extends('layouts.app')

@section('title', 'Tambah Karyawan')

@section('content')
<div class="container">
    <div class="mt-5">
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
                            <input type="text" value="{{old('nama')}}" name="nama"
                                class="form-control @error('nama') is-invalid @enderror" placeholder="Nama">
                            @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-inline my-2">
                        <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <select name="JK" class="form-control @error('JK') is-invalid @enderror" placeholder="JK">
                                @foreach ($ketentuan as $item)
                                @if ($item->qualifier == 'JENISKELAMIN')
                                @if (old('JK') != null)
                                @if (old('JK')==$item->code)
                                @php
                                $key = $item->localizedName;
                                @endphp
                                @endif
                                @endif
                                @endif
                                @endforeach
                                <option value="{{old('JK') != null ? old('JK') : ''}}">
                                    {{old('JK') != null ? $key : 'Pilih Jenis Kelamin'}}</option>
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
                            <input type="text" value="{{old('tempatlahir')}}"
                                class="form-control @error('tempatlahir') is-invalid @enderror" name="tempatlahir"
                                placeholder="Tempat Lahir">
                            @error('tempatlahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-inline my-2">
                        <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-8">
                            <input type="date" value="{{old('dob')}}"
                                class="form-control @error('dob') is-invalid @enderror" name="dob">
                            @error('dob')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-inline my-2">
                        <label class="col-sm-4 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-8">
                            <input type="text" value="{{old('notel')}}"
                                class="form-control @error('notel') is-invalid @enderror" name="notel"
                                placeholder="Nomor Telpon">
                            @error('notel')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-inline my-2">
                        <label class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" value="{{old('email')}}"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Email">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-inline my-2">
                        <label class="col-sm-4 col-form-label">Nomor KTP</label>
                        <div class="col-sm-8">
                            <input type="text" value="{{old('noktp')}}"
                                class="form-control @error('noktp') is-invalid @enderror" name="noktp"
                                placeholder="Nomor KTP">
                            @error('noktp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-inline my-2">
                        <label class="col-sm-4 col-form-label">Nomor KK</label>
                        <div class="col-sm-8">
                            <input type="text" value="{{old('nokk')}}"
                                class="form-control @error('nokk') is-invalid @enderror" name="nokk"
                                placeholder="Nomor KK">
                            @error('nokk')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="container col-5 text-left" style="margin-right:0rem">
                    <div class="form-inline mt-3">
                        <label class="col-sm-4 col-form-label">NPWP</label>
                        <div class="col-sm-8">
                            <input type="text" value="{{old('npwp')}}"
                                class="form-control @error('npwp') is-invalid @enderror" name="npwp" placeholder="NPWP">
                            @error('npwp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-inline my-2">
                        <label class="col-sm-4 col-form-label">Status Pernikahan</label>
                        <div class="col-sm-8">
                            <select name="statusNikah" class="form-control @error('statusNikah') is-invalid @enderror">
                                @foreach ($ketentuan as $item)
                                @if ($item->qualifier == 'STATUSNIKAH')
                                {{-- <option value="{{$item->code}}">{{$item->localizedName}}</option> --}}
                                @if (old('statusNikah') != null)
                                @if (old('statusNikah')==$item->code)
                                @php
                                $key = $item->localizedName;
                                @endphp
                                @endif
                                @endif
                                @endif
                                @endforeach
                                <option value="{{old('statusNikah') != null ? old('statusNikah') : ''}}">
                                    {{old('statusNikah') != null ? $key : 'Pilih Status Pernikahan'}}</option>
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
                            <input type="text" value="{{old('namaAyah')}}" name="namaAyah"
                                class="form-control @error('namaAyah') is-invalid @enderror" placeholder="Nama Ayah">
                            @error('namaAyah')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-inline my-2">
                        <label class="col-sm-4 col-form-label">Nama Ibu</label>
                        <div class="col-sm-8">
                            <input type="text" value="{{old('namaIbu')}}" name="namaIbu"
                                class="form-control @error('namaIbu') is-invalid @enderror" placeholder="Nama Ibu">
                            @error('namaIbu')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-inline my-2">
                        <label class="col-sm-4 col-form-label">Status Karyawan</label>
                        <div class="col-sm-8">
                            <select name="statusKaryawan" class="form-control @error('statusKaryawan') is-invalid @enderror">
                                @foreach ($ketentuan as $item)
                                @if ($item->qualifier == 'STATUSKARYAWAN')
                                {{-- <option value="{{$item->code}}">{{$item->localizedName}}</option> --}}
                                @if (old('statusKaryawan') != null)
                                @if (old('statusKaryawan')==$item->code)
                                @php
                                $key = $item->localizedName;
                                @endphp
                                @endif
                                @endif
                                @endif
                                @endforeach
                                <option value="{{old('statusKaryawan') != null ? old('statusKaryawan') : ''}}">
                                    {{old('statusKaryawan') != null ? $key : 'Pilih Status Karyawan'}}</option>
                                @foreach ($ketentuan as $item)
                                @if ($item->qualifier == 'STATUSKARYAWAN')
                                <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('statusKaryawan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-inline my-2">
                        <label class="col-sm-4 col-form-label">Status Kerja</label>
                        <div class="col-sm-8">
                            <select name="statusKerja" class="form-control @error('statusKerja') is-invalid @enderror">
                                @foreach ($ketentuan as $item)
                                @if ($item->qualifier == 'STATUSKERJA')
                                {{-- <option value="{{$item->code}}">{{$item->localizedName}}</option> --}}
                                @if (old('statusKerja') != null)
                                @if (old('statusKerja')==$item->code)
                                @php
                                $key = $item->localizedName;
                                @endphp
                                @endif
                                @endif
                                @endif
                                @endforeach
                                <option value="{{old('statusKerja') != null ? old('statusKerja') : ''}}">
                                    {{old('statusKerja') != null ? $key : 'Pilih Status Kerja'}}</option>
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
                                @foreach ($ketentuan as $item)
                                @if ($item->qualifier == 'TIPEUMR')
                                {{-- <option value="{{$item->code}}">{{$item->localizedName}}</option> --}}
                                @if (old('tipeumr') != null)
                                @if (old('tipeumr')==$item->code)
                                @php
                                $key = $item->localizedName;
                                @endphp 
                                @endif
                                @endif
                                @endif
                                @endforeach
                                <option value="{{old('tipeumr') != null ? old('tipeumr') : ''}}">
                                    {{old('tipeumr') != null ? $key : 'Pilih Tipe UMR'}}</option>
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
                            <textarea class="form-control @error('alamatktp') is-invalid @enderror" name="alamatktp"
                                rows="3"
                                placeholder="Alamat KTP">{{old('alamatktp') != null ? old('alamatktp') : ''}}</textarea>
                            @error('alamatktp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-inline my-2">
                        <label class="col-sm-4 col-form-label">Alamat Domisili</label>
                        <div class="col-sm-8">
                            <textarea class="form-control @error('alamatdom') is-invalid @enderror" name="alamatdom"
                                rows="3"
                                placeholder="Alamat Domilisi">{{old('alamatdom')!= null ? old('alamatdom') : ''}}</textarea>
                            @error('alamatdom')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
<div class="container col-4" style="margin-left: 0px; margin-right: 0px; padding-left:0px">
    <div class="card mb-2">
        <div class="card-body">
            <div>
                <h2>Informasi BPJS</h2>
                <hr>
            </div>
            <div class="container pl-3 pt-2" style="margin: auto">
                <div class="form-inline my-2">
                    <label class="col-sm-4 col-form-label">No. BPJS KES</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{old('noBpjsKes')}}" name="noBpjsKes"
                            class="form-control @error('noBpjsKes') is-invalid @enderror" placeholder="No. BPJS KES">
                        @error('noBpjsKes')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-inline mt-4 pt-2">
                    <label class="col-sm-4 col-form-label">No. BPJS TK</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{old('noBpjsKet')}}" name="noBpjsKet"
                            class="form-control @error('noBpjsKet') is-invalid @enderror" placeholder="No. BPJS TK">
                        @error('noBpjsKet')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                        <select name="namaBank" class="form-control @error('namaBank') is-invalid @enderror">
                            {{-- <option value="">Pilih Bank</option> --}}
                            <option value="{{old('namaBank') != null ? old('namaBank') : ''}}">
                                {{old('namaBank') != null ? $key : 'Pilih Bank'}}</option>
                            @foreach ($ketentuan as $item)
                            @if ($item->qualifier == 'BANK')
                            <option value="{{$item->code}}">{{$item->localizedName}}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('namaBank')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-inline my-2">
                    <label class="col-sm-4 col-form-label">Cabang</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{old('cabang')}}" name="cabang"
                            class="form-control @error('cabang') is-invalid @enderror" placeholder="Cabang">
                        @error('cabang')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-inline my-2">
                    <label class="col-sm-4 col-form-label">Nomor Rekening</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{old('noRek')}}" name="noRek"
                            class="form-control @error('noRek') is-invalid @enderror" placeholder="Nomor Rekening">
                        @error('noRek')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-inline my-2">
                    <label class="col-sm-4 col-form-label">Atas Nama</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{old('atasNama')}}" name="atasNama"
                            class="form-control @error('atasNama') is-invalid @enderror" placeholder="Atas Nama">
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
                        <select name="PendidikanTerakhir"
                            class="form-control @error('PendidikanTerakhir') is-invalid @enderror">
                            @foreach ($ketentuan as $item)
                            @if ($item->qualifier == 'PENDIDIKAN')
                            {{-- <option value="{{$item->code}}">{{$item->localizedName}}</option> --}}
                            @if (old('PendidikanTerakhir') != null)
                            @if (old('PendidikanTerakhir')==$item->code)
                            @php
                            $key = $item->localizedName;
                            @endphp
                            @endif
                            @endif
                            @endif
                            @endforeach
                            <option value="{{old('PendidikanTerakhir') != null ? old('PendidikanTerakhir') : ''}}">
                                {{old('PendidikanTerakhir') != null ? $key : 'Pilih Pendidikan Terakhir'}}</option>
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
                        <input type="text" value="{{old('ipk')}}" name="ipk"
                            class="form-control @error('ipk') is-invalid @enderror" placeholder="IPK">
                        @error('ipk')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-inline my-2">
                    <label class="col-sm-4 col-form-label">Status</label>
                    <div class="col-sm-8">
                        <select name="statusPendidikan"
                            class="form-control @error('statusPendidikan') is-invalid @enderror" placeholder="Status">
                            @foreach ($ketentuan as $item)
                            @if ($item->qualifier == 'STATUSPENDIDIKAN')
                            {{-- <option value="{{$item->code}}">{{$item->localizedName}}</option> --}}
                            @if (old('statusPendidikan') != null)
                            @if (old('statusPendidikan')==$item->code)
                            @php
                            $key = $item->localizedName;
                            @endphp
                            @endif
                            @endif
                            @endif
                            @endforeach
                            <option value="{{old('statusPendidikan') != null ? old('statusPendidikan') : ''}}">
                                {{old('statusPendidikan') != null ? $key : 'Pilih Status Pendidikan'}}</option>
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
                        <input type="text" value="{{old('tahunLulus')}}" name="tahunLulus"
                            class="form-control @error('tahunLulus') is-invalid @enderror" placeholder="Tahun Ajaran">
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
                            @foreach ($ketentuan as $item)
                            @if ($item->qualifier == 'JABATAN')
                            {{-- <option value="{{$item->code}}">{{$item->localizedName}}</option> --}}
                            @if (old('jabatan') != null)
                            @if (old('jabatan')==$item->code)
                            @php
                            $key = $item->localizedName;
                            @endphp
                            @endif
                            @endif
                            @endif
                            @endforeach
                            <option value="{{old('jabatan') != null ? old('jabatan') : ''}}">
                                {{old('jabatan') != null ? $key : 'Pilih Jabatan'}}</option>
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
                            @foreach ($ketentuan as $item)
                            @if ($item->qualifier == 'DIVISI')
                            {{-- <option value="{{$item->code}}">{{$item->localizedName}}</option> --}}
                            @if (old('divisi') != null)
                            @if (old('divisi')==$item->code)
                            @php
                            $key = $item->localizedName;
                            @endphp
                            @endif
                            @endif
                            @endif
                            @endforeach
                            <option value="{{old('divisi') != null ? old('divisi') : ''}}">
                                {{old('divisi') != null ? $key : 'Pilih Divisi'}}</option>
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
                        <select name="penempatan" class="form-control @error('penempatan') is-invalid @enderror"
                            placeholder="penempatan">
                            @foreach ($ketentuan as $item)
                            @if ($item->qualifier == 'PENEMPATAN')
                            {{-- <option value="{{$item->code}}">{{$item->localizedName}}</option> --}}
                            @if (old('penempatan') != null)
                            @if (old('penempatan')==$item->code)
                            @php
                            $key = $item->localizedName;
                            @endphp
                            @endif
                            @endif
                            @endif
                            @endforeach
                            <option value="{{old('penempatan') != null ? old('penempatan') : ''}}">
                                {{old('penempatan') != null ? $key : 'Pilih Penempatan'}}</option>
                            @foreach ($ketentuan as $item)
                            @if ($item->qualifier == 'PENEMPATAN')
                            <option value="{{$item->code}}">{{$item->localizedName}}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('penempatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-inline my-2">
                    <label class="col-sm-4 col-form-label">Tanggal Masuk</label>
                    <div class="col-sm-8">
                        <input type="date" name="tanggalMasuk" value="{{old('tanggalMasuk')}}"
                            class="form-control @error('tanggalMasuk') is-invalid @enderror"
                            placeholder="Tanggal Masuk">
                        @error('tanggalMasuk')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-inline my-2">
                    <label class="col-sm-4 col-form-label">Nomor PKWT</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{old('noPkwt')}}" name="noPkwt"
                            class="form-control @error('noPkwt') is-invalid @enderror" placeholder="Nomor PKWT">
                        @error('noPkwt')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-inline my-2">
                    <label class="col-sm-4 col-form-label">Tanggal Mulai</label>
                    <div class="col-sm-8">
                        <input type="date" name="mulai" value="{{old('mulai')}}"
                            class="form-control @error('mulai') is-invalid @enderror" placeholder="Tanggal Mulai">
                        @error('mulai')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-inline my-2">
                    <label class="col-sm-4 col-form-label">Tanggal Berakhir</label>
                    <div class="col-sm-8">
                        <input type="date" name="berakhir" value="{{old('berakhir')}}"
                            class="form-control @error('berakhir') is-invalid @enderror" placeholder="Tanggal Berakhir">
                        @error('berakhir')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="row d-flex justify-content-end">
    <div class="col-md-2 py-4 ml-2 text-right" style="padding-right:0px">
        <button type="button" class="btn btn-danger" style="width: 80%" data-toggle="modal" data-target="#exampleModal">
            Batal
        </button>
    </div>
    <div class="col-md-2 py-4 text-center" style="padding-left:0px">
        <button type="submit" class="btn btn-primary" style="width: 80%">Submit</button>
    </div>
</div>
</form>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content col-sm-4" style="margin: auto">
            <div class="modal-body mt-4">
                Batal untuk menambah karyawan ?
            </div>
            <div class="modal-footer ">
                <div class="col-sm-2">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
                <div class="col-sm-2">
                    <a href="{{url()->previous()}}" class="btn btn-danger">OK</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection