@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mt-4">
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
            <h5>Form Tambah Karyawan</h5>
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
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nomor Telepon</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nomor KTP</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nomor KK</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                        </div>
                        <div class="container col-5 text-left" style="margin-right:0rem">
                            <div class="form-inline mt-3">
                                <label class="col-sm-4 col-form-label">NPWP</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Status Pernikahan</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nama Ayah</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nama Ibu</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Status Karyawan</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tipe UMR</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Alamat KTP</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Alamat Domisili</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card my-3">
                <div class="card-body">
                    <div>
                        <h5>Informasi Keluarga</h5>
                        <hr>
                    </div>
                    <div class="row d-flex">
                        <div class="container col-5 text-left" style="margin-left: 1rem; margin-right:0rem">
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nama Pasangan</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nomor KTP</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-8">

                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nama Anak 1</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-8">

                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                        </div>
                        <div class="container col-5 text-left" style="margin-right:0rem">
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nama Anak 2</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-8">

                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nama Anak 3</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-8">

                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8">
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
                        <h5>Informasi Rekening</h5>
                        <hr>
                    </div>
                    <div class="container pl-3 pt-2" style="margin: auto">
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-8">
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Cabang</label>
                            <div class="col-sm-8">
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Nomor Rekening</label>
                            <div class="col-sm-8">
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Atas Nama</label>
                            <div class="col-sm-8">
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
                            <div class="col-sm-8">
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">IPK</label>
                            <div class="col-sm-8">
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Tahun Ajaran</label>
                            <div class="col-sm-8">
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
                            <div class="col-sm-8">
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Divis</label>
                            <div class="col-sm-8">
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Penempatan</label>
                            <div class="col-sm-8">
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Tanggal Masuk</label>
                            <div class="col-sm-8">
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Nomor PKWT</label>
                            <div class="col-sm-8">
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Tanggal Mulai</label>
                            <div class="col-sm-8">
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">Tanggal Berakhir</label>
                            <div class="col-sm-8">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card my-2">
                <div class="card-body">
                    <div>
                        <h5>Informasi BPJS</h5>
                        <hr>
                    </div>
                    <div class="container pl-3 pt-2" style="margin: auto">
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">No. BPJS TK</label>
                            <div class="col-sm-8">
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">No. BPJS KES</label>
                            <div class="col-sm-8">
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">No. BPJS KES Pasangan</label>
                            <div class="col-sm-8">
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">No. BPJS KES Anak 1</label>
                            <div class="col-sm-8">
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">No. BPJS KES Anak 2</label>
                            <div class="col-sm-8">
                            </div>
                        </div>
                        <div class="form-inline my-2">
                            <label class="col-sm-4 col-form-label">No. BPJS KES Anak 3</label>
                            <div class="col-sm-8">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection