@extends('layouts.app')

@section('title', 'Edit Karyawan')

@section('content')
<div class="container">
    <div class="mt-5">
        <div class="ml-4">
            <h5>SIM PT. Artha Kreasi Utama</h5>
        </div>
        <div class="ml-4">
            <label>Form Edit Karyawan</label>
        </div>
    </div>
</div>
<div class="container">
    <form action="/karyawan/{{$karyawan->nip}}" method="POST" enctype="multipart/form-data">
        @method('patch')
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
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nomor Pegawai</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{$karyawan->nip}}" name="nip" class="form-control @error('nip') is-invalid @enderror" placeholder="NIP" readonly>
                                        @error('nip')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nama</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{$karyawan->nama}}" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama">
                                        @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-8">
                                        <select name="JK" class="form-control @error('JK') is-invalid @enderror" placeholder="JK">
                                            @foreach ($ketentuan as $row)
                                                @if ($row->qualifier == 'JENISKELAMIN')
                                                    <option value="{{$row->code}}" {{$row->code == $karyawan->JK ? 'selected' : ''}}>{{$row->localizedName}}</option>
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
                                        <input type="text" class="form-control @error('tempatlahir') is-invalid @enderror" value="{{$karyawan->tempatlahir}}" name="tempatlahir"
                                        placeholder="Tempat Lahir">
                                    @error('tempatlahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control @error('dob') is-invalid @enderror" value="{{$karyawan->dob}}" name="dob">
                                    @error('dob')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nomor Telepon</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control @error('notel') is-invalid @enderror" value="{{$karyawan->notel}}" name="notel"
                                        placeholder="Nomor Telpon">
                                    @error('notel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{$karyawan->email}}" name="email"
                                        placeholder="Email">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nomor KTP</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control @error('noktp') is-invalid @enderror" value="{{$karyawan->noktp}}" name="noktp"
                                        placeholder="Nomor KTP">
                                    @error('noktp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nomor KK</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control @error('nokk') is-invalid @enderror" value="{{$karyawan->nokk}}" name="nokk"
                                        placeholder="Nomor KK">
                                    @error('nokk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-inline mt-4 pt-2">
                                    <label class="col-sm-4 col-form-label">No. BPJS TK</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{$karyawan->noBpjsKet}}" name="noBpjsKet" class="form-control @error('noBpjsKet') is-invalid @enderror" placeholder="No. BPJS TK">
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
                                        <input type="text" class="form-control @error('npwp') is-invalid @enderror" value="{{$karyawan->npwp}}" name="npwp"
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
                                            @foreach ($ketentuan as $row)
                                                @if ($row->qualifier == 'STATUSNIKAH')
                                                    <option value="{{$row->code}}" {{$row->code == $karyawan->statusNikah ? 'selected' : ''}}>{{$row->localizedName}}</option>
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
                                        <input type="text" value="{{$karyawan->namaAyah}}" name="namaAyah" class="form-control @error('namaAyah') is-invalid @enderror" placeholder="Nama Ayah">
                                    @error('namaAyah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nama Ibu</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{$karyawan->namaIbu}}" name="namaIbu" class="form-control @error('namaIbu') is-invalid @enderror" placeholder="Nama Ibu">
                                        @error('namaIbu')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Status Karyawan</label>
                                    <div class="col-sm-8">
                                        <select name="statusKaryawan" class="form-control @error('statusKerja') is-invalid @enderror">
                                            @foreach ($ketentuan as $row)
                                                @if ($row->qualifier == 'STATUSKARYAWAN')
                                                    <option value="{{$row->code}}" {{$row->code == $karyawan->statusKaryawan ? 'selected' : ''}}>{{$row->localizedName}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('statusKerja')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Status Kerja</label>
                                    <div class="col-sm-8">
                                        <select name="statusKerja" class="form-control @error('statusKerja') is-invalid @enderror">
                                            @foreach ($ketentuan as $row)
                                                @if ($row->qualifier == 'STATUSKERJA')
                                                    <option value="{{$row->code}}" {{$row->code == $karyawan->statusKerja ? 'selected' : ''}}>{{$row->localizedName}}</option>
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
                                            @foreach ($ketentuan as $row)
                                                @if ($row->qualifier == 'TIPEUMR')
                                                    <option value="{{$row->code}}" {{$row->code == $karyawan->tipeumr ? 'selected' : ''}}>{{$row->localizedName}}</option>
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
                                        <textarea class="form-control @error('alamatktp') is-invalid @enderror" name="alamatktp" rows="3">{{$karyawan->alamatktp}}</textarea>
                                        @error('alamatktp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Alamat Domisili</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control @error('alamatdom') is-invalid @enderror" name="alamatdom" rows="3">{{$karyawan->alamatdom}}</textarea>
                                        @error('alamatdom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">No. BPJS KES</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{$karyawan->noBpjsKes}}" name="noBpjsKes" class="form-control @error('noBpjsKes') is-invalid @enderror" placeholder="No. BPJS KES">
                                        @error('noBpjsKes')
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
                                        @foreach ($ketentuan as $row)
                                            @if ($row->qualifier == 'BANK')
                                                <option value="{{$row->code}}" {{$row->code == $karyawan->namaBank ? 'selected' : ''}}>{{$row->localizedName}}</option>
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
                                    <input type="text" value="{{$karyawan->cabang}}" name="cabang" class="form-control @error('cabang') is-invalid @enderror" placeholder="Cabang">
                                    @error('cabang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nomor Rekening</label>
                                <div class="col-sm-8">
                                    <input type="text" value="{{$karyawan->noRek}}" name="noRek" class="form-control @error('noRek') is-invalid @enderror" placeholder="Nomor Rekening">
                                    @error('noRek')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Atas Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" value="{{$karyawan->atasNama}}" name="atasNama"  class="form-control @error('atasNama') is-invalid @enderror" placeholder="Atas Nama">
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
                                        @foreach ($ketentuan as $row)
                                            @if ($row->qualifier == 'PENDIDIKAN')
                                                <option value="{{$row->code}}" {{$row->code == $karyawan->PendidikanTerakhir ? 'selected' : ''}}>{{$row->localizedName}}</option>
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
                                    <input type="text" value="{{$karyawan->ipk}}" name="ipk" class="form-control @error('ipk') is-invalid @enderror" placeholder="IPK">
                                        @error('ipk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Status</label>
                                <div class="col-sm-8">
                                    <select name="statusPendidikan" class="form-control @error('statusPendidikan') is-invalid @enderror" placeholder="Status">
                                        @foreach ($ketentuan as $row)
                                            @if ($row->qualifier == 'STATUSPENDIDIKAN')
                                                <option value="{{$row->code}}" {{$row->code == $karyawan->statusPendidikan ? 'selected' : ''}}>{{$row->localizedName}}</option>
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
                                    <input type="text" value="{{$karyawan->tahunLulus}}" name="tahunLulus" class="form-control @error('tahunLulus') is-invalid @enderror" placeholder="Tahun Ajaran">
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
                                        @foreach ($ketentuan as $row)
                                            @if ($row->qualifier == 'JABATAN')
                                                <option value="{{$row->code}}" {{$row->code == $karyawan->jabatan ? 'selected' : ''}}>{{$row->localizedName}}</option>
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
                                        @foreach ($ketentuan as $row)
                                            @if ($row->qualifier == 'DIVISI')
                                                <option value="{{$row->code}}" {{$row->code == $karyawan->divisi ? 'selected' : ''}}>{{$row->localizedName}}</option>
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
                                        @foreach ($ketentuan as $row)
                                            @if ($row->qualifier == 'PENEMPATAN')
                                                <option value="{{$row->code}}" {{$row->code == $karyawan->penempatan ? 'selected' : ''}}>{{$row->localizedName}}</option>
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
                                    <input type="date" value="{{$karyawan->tanggalMasuk}}" name="tanggalMasuk" class="form-control @error('tanggalMasuk') is-invalid @enderror" placeholder="Tanggal Masuk">
                                        @error('tanggalMasuk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nomor PKWT</label>
                                <div class="col-sm-8">
                                    <input type="text" value="{{$karyawan->noPkwt}}" name="noPkwt" class="form-control @error('noPkwt') is-invalid @enderror" placeholder="Nomor PKWT">
                                        @error('noPkwt')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tanggal Mulai</label>
                                <div class="col-sm-8">
                                    <input type="date" value="{{$karyawan->mulai}}" name="mulai" class="form-control @error('mulai') is-invalid @enderror" placeholder="Tanggal Mulai">
                                        @error('mulai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tanggal Berakhir</label>
                                <div class="col-sm-8">
                                    <input type="date" value="{{$karyawan->berakhir}}" name="berakhir" class="form-control @error('berakhir') is-invalid @enderror" placeholder="Tanggal Berakhir">
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
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                    Batal
                </button>
            </div>
            <div class="col-md-2 py-4 text-center" style="padding-left:0px">
                <button type="submit" class="btn btn-primary" style="width: 80%">Submit</button>
            </div>
        </div>
    </form>
</div>  
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                Batal untuk melakukan perubahan ?
            </div>
            <div class="modal-footer">
                <a href="{{url()->previous()}}" class="btn btn-danger" style="width: 80%">OK</a>
            </div>
        </div>
    </div>
</div>
@endsection