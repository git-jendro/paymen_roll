@extends('layouts.app')

@section('title')
    Profile {{$karyawan->nama}}
@endsection

@section('content')
<div class="container">
    <div class="mt-5">
        <div class="ml-4 mb-3">
                <a href="{{url()->previous()}}">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-left-square-fill" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm9.5 8.5a.5.5 0 0 0 0-1H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5z" />
                    </svg>
                    Kembali
                </a>
        </div>
        <div class="ml-4">
            <h4>SIM PT. Artha Kreasi Utama</h4>
        </div>
        <div class="ml-4">
            <h5>Informasi Karyawan</h5>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-4 ml-1">
        <div class="container col-8" style="margin-left: 0px; margin-right: 0px">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h5>Informasi Personal</h5>
                        <hr>
                    </div>
                    <div class="row d-flex">
                        <div class="container col-5 text-left" style="margin-left: 1rem; margin-right:0rem">
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nomor Pegawai</label>
                                <div class="col-sm-8 py-2">
                                    : {{$karyawan->nip}}
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8 py-2">
                                    : {{$karyawan->nama}}
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8 py-2">
                                    @foreach ($ketentuan as $row)
                                        @if ($row->qualifier == 'JENISKELAMIN')
                                            @if ($row->code == $karyawan->JK)
                                                : {{$row->localizedName}}
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-8 py-2">
                                    : {{$karyawan->tempatlahir}}
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8 py-2">
                                    : {{$karyawan->dob}}
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nomor Telepon</label>
                                <div class="col-sm-8 py-2">
                                    : {{$karyawan->notel}}
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8 py-2">
                                    : {{$karyawan->email}}
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nomor KTP</label>
                                <div class="col-sm-8 py-2">
                                    : {{$karyawan->noktp}}
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nomor KK</label>
                                <div class="col-sm-8 py-2">
                                    : {{$karyawan->nokk}}
                                </div>
                            </div>
                        </div>
                        <div class="container col-5 text-left" style="margin-right:0rem">
                            <div class="form-inline mt-3">
                                <label class="col-sm-4 col-form-label">NPWP</label>
                                <div class="col-sm-8 py-2">
                                    : {{$karyawan->npwp}}
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Status Pernikahan</label>
                                <div class="col-sm-8 py-2">
                                    @foreach ($ketentuan as $row)
                                        @if ($row->qualifier == 'STATUSNIKAH')
                                            @if ($row->code == $karyawan->statusNikah)
                                                : {{$row->localizedName}}
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nama Ayah</label>
                                <div class="col-sm-8 py-2">
                                    : {{$karyawan->namaAyah}}
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nama Ibu</label>
                                <div class="col-sm-8 py-2">
                                    : {{$karyawan->namaIbu}}
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Status Kerja</label>
                                <div class="col-sm-8 py-2">
                                    @foreach ($ketentuan as $row)
                                        @if ($row->qualifier == 'STATUSKERJA')
                                            @if ($row->code == $karyawan->statusKerja)
                                                : {{$row->localizedName}}
                                            @endif
                                        @endif
                                    @endforeach 
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Status Karyawan</label>
                                <div class="col-sm-8 py-2">
                                    @foreach ($ketentuan as $row)
                                        @if ($row->qualifier == 'STATUSKARYAWAN')
                                            @if ($row->code == $karyawan->statusKaryawan)
                                                : {{$row->localizedName}}
                                            @endif
                                        @endif
                                    @endforeach 
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tipe UMR</label>
                                <div class="col-sm-8 py-2">
                                    @foreach ($ketentuan as $row)
                                        @if ($row->qualifier == 'TIPEUMR')
                                            @if ($row->code == $karyawan->tipeumr)
                                                : {{$row->localizedName}}
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Alamat KTP</label>
                                <div class="col-sm-8 py-2">
                                    : {{$karyawan->alamatktp}}
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Alamat Domisili</label>
                                <div class="col-sm-8 py-2">
                                    : {{$karyawan->alamatdom}}
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
                        <h5>Informasi BPJS</h5>
                        <hr>
                    </div>
                    <div class="container pl-3 pt-2" style="margin: auto">
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">No. BPJS TK</label>
                            <div class="col-sm-8 py-2">
                                : {{$karyawan->noBpjsKet}}
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">No. BPJS KES</label>
                            <div class="col-sm-8 py-2">
                                : {{$karyawan->noBpjsKes}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card my-2">
                <div class="card-body">
                    <div>
                        <h5>Informasi Rekening</h5>
                        <hr>
                    </div>
                    <div class="container pl-3 pt-2" style="margin: auto">
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Nama Bank</label>
                            <div class="col-sm-8 py-2">
                                @foreach ($ketentuan as $row)
                                        @if ($row->qualifier == 'BANK')
                                            @if ($row->code == $karyawan->namaBank)
                                                : {{$row->localizedName}}
                                            @endif
                                        @endif
                                    @endforeach
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Cabang</label>
                            <div class="col-sm-8 py-2">
                                : {{$karyawan->cabang}}
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Nomor Rekening</label>
                            <div class="col-sm-8 py-2">
                                : {{$karyawan->noRek}}
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Atas Nama</label>
                            <div class="col-sm-8 py-2">
                                : {{$karyawan->atasNama}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card my-2">
                <div class="card-body">
                    <div>
                        <h5>Informasi Jenjang Pendidikan</h5>
                        <hr>
                    </div>
                    <div class="container pl-3 pt-2" style="margin: auto">
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Jenjang Terakhir</label>
                            <div class="col-sm-8 py-2">
                                @foreach ($ketentuan as $row)
                                    @if ($row->qualifier == 'PENDIDIKAN')
                                        @if ($row->code == $karyawan->PendidikanTerakhir)
                                            : {{$row->localizedName}}
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">IPK</label>
                            <div class="col-sm-8 py-2">
                                : {{$karyawan->ipk}}
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8 py-2">
                                @foreach ($ketentuan as $row)
                                    @if ($row->qualifier == 'STATUSPENDIDIKAN')
                                        @if ($row->code == $karyawan->statusPendidikan)
                                            : {{$row->localizedName}}
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Tahun Ajaran</label>
                            <div class="col-sm-8 py-2">
                                : {{$karyawan->tahunLulus}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card my-2">
                <div class="card-body">
                    <div>
                        <h5>Informasi Kontrak</h5>
                        <hr>
                    </div>
                    <div class="container pl-3 pt-2" style="margin: auto">
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Jabatan</label>
                            <div class="col-sm-8 py-2">
                                @foreach ($ketentuan as $row)
                                    @if ($row->qualifier == 'JABATAN')
                                        @if ($row->code == $karyawan->jabatan)
                                            : {{$row->localizedName}}
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Divisi</label>
                            <div class="col-sm-8 py-2">
                                @foreach ($ketentuan as $row)
                                    @if ($row->qualifier == 'DIVISI')
                                        @if ($row->code == $karyawan->divisi)
                                            : {{$row->localizedName}}
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Penempatan</label>
                            <div class="col-sm-8 py-2">
                                {{-- : {{$karyawan->penempatan}} --}}
                                @foreach ($ketentuan as $row)
                                    @if ($row->qualifier == 'PENEMPATAN')
                                        @if ($row->code == $karyawan->divisi)
                                            : {{$row->localizedName}}
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                            
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Tanggal Masuk</label>
                            <div class="col-sm-8 py-2">
                                : {{$karyawan->tanggalMasuk}}
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Nomor PKWT</label>
                            <div class="col-sm-8 py-2">
                                : {{$karyawan->noPkwt}}
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Tanggal Mulai</label>
                            <div class="col-sm-8 py-2">
                                : {{$karyawan->mulai}}
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Tanggal Berakhir</label>
                            <div class="col-sm-8 py-2">
                                : {{$karyawan->berakhir}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection