@extends('layouts.app')

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
            <div class="container col-5" style="margin-right: 1rem">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h2>Ketentuan Penggajian PT. Artha Kreasi Utama</h2>
                            <hr>
                        </div>
                        <div class="row d-flex">
                            <div class="container text-left" style="margin-left: 1rem; margin-right:0rem">
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Ketentuan Lembur</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nip" class="form-control">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Tarif Insentif</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nama" class="form-control">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Ketentuan BPJS TK</label>
                                    <div class="col-sm-6 input-group">
                                        <input type="text" class="form-control">
                                            <div class="input-group-append">
                                                <div class="input-group-text">%</div>
                                            </div>
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Ketentuan BPJS KES</label>
                                    <div class="col-sm-6 input-group">
                                        <input type="text" class="form-control">
                                            <div class="input-group-append">
                                                <div class="input-group-text">%</div>
                                            </div>
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Ketentuan BPJS JP</label>
                                    <div class="col-sm-6 input-group">
                                        <input type="text" class="form-control">
                                            <div class="input-group-append">
                                                <div class="input-group-text">%</div>
                                            </div>
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Jumlah Hari Kerja</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="notel">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container col-6" style="margin-left: 0rem; margin-right: 0rem">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h2>Potongan Untuk Karyawan Kontrak</h2>
                            <hr>
                        </div>
                        <div class="container pl-3 pt-2" style="margin: auto">
                            <div class="form-inline my-2">
                                <label class="col-sm-2 col-form-label" style="padding: 0rem">Potongan 1</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="noRek" style="width: 100%">
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="noRek" style="width: 100%">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-2 col-form-label" style="padding: 0rem">Potongan 2</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="noRek" style="width: 100%">
                                </div>
                                <div class="col-sm-5 input-group">
                                    <input type="text" class="form-control">
                                    <div class="input-group-append">
                                        <div class="input-group-text">+</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <div>
                            <h2>Ketentuan UMR</h2>
                            <hr>
                        </div>
                        <div class="container pl-3 pt-2" style="margin: auto">
                            <div class="form-inline my-2">
                                <label class="col-sm-2 col-form-label" style="padding: 0rem">UMR 1</label>
                                <div class="col-sm-5">
                                    <select name="" class="form-control" style="width: 100%">
                                        <option value="">Option 1</option>
                                        <option value="">Option 2</option>
                                        <option value="">Option 3</option>
                                    </select>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="noRek" style="width: 100%">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-2 col-form-label" style="padding: 0rem">UMR 2</label>
                                <div class="col-sm-5">
                                    <select name="" class="form-control" style="width: 100%">
                                        <option value="">Option 1</option>
                                        <option value="">Option 2</option>
                                        <option value="">Option 3</option>
                                    </select>    
                                </div>
                                <div class="col-sm-5 input-group">
                                    <input type="text" class="form-control">
                                    <div class="input-group-append">
                                        <div class="input-group-text">+</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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