@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container">
        <div class="mt-5">
            <div class="ml-4">
                <h5>SIM PT. Artha Kreasi Utama</h5>
            </div>
        </div>
    </div>
    <form action="">
        <div class="row mt-5">
            <div class="container col-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex">
                            <div class="container text-left">
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nama</label>
                                    <div class="col-sm-8">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">NIP</label>
                                    <div class="col-sm-8">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Jabatan</label>
                                    <div class="col-sm-6 input-group">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Divisi</label>
                                    <div class="col-sm-6 input-group">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Status</label>
                                    <div class="col-sm-6 input-group">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container col-5">
                <div class="card">
                    <div class="card-body">
                        <div class="container pl-3 pt-2">
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label" style="padding: 0rem">No Rekening</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label" style="padding: 0rem">Bank</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label" style="padding: 0rem">Periode</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="container col-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex">
                            <div class="container text-left">
                                <div class="">
                                    <h5 class="text-underline">Kalkulasi Gaji</h5>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Gaji Pokok</label>
                                    <div class="col-sm-8">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Insentif Kehadiran</label>
                                    <div class="col-sm-8">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Lembur</label>
                                    <div class="col-sm-6 input-group">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Total Gaji Kotor</label>
                                    <div class="col-sm-6 input-group">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Status</label>
                                    <div class="col-sm-6 input-group">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container col-5">
                <div class="card">
                    <div class="card-body">
                        <div class="container pl-3 pt-2">
                            <div class="">
                                <h5 class="text-underline">Potongan</h5>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label" style="padding: 0rem">BPJS Kesehatan</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label" style="padding: 0rem">BPJS Ketenagakerjaan</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label" style="padding: 0rem">BPJS Pensiun</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label" style="padding: 0rem">Potongan</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label" style="padding: 0rem">Total Potongan</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-around" style="margin-top: 5rem">
            <div class="col-md-2 py-4 ml-2 text-right" style="padding-right:0px">
                <a href="{{url()->previous()}}" class="btn btn-primary" style="width: 80%">Upload</a>
            </div>
            <div class="col-md-2 py-4 text-center" style="padding-left:0px">
                <button type="submit" class="btn btn-primary" style="width: 80%">Simpan</button>
            </div>
        </div>
    </form>
</div>
@endsection