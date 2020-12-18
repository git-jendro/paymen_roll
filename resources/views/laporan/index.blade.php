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
    <form action="/laporan/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mt-4 ml-1">
            <div class="container col-5" style="margin-left: 0px; margin-right: 0px">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h2>Informasi Personal</h2>
                            <hr>
                        </div>
                        <div class="container text-left" style="margin-left: 1rem; margin-right:0rem">
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Bulan</label>
                                <div class="col-sm-8">
                                    <select name="JK" class="form-control">
                                        <option value="">Option 1</option>
                                        <option value="">Option 2</option>
                                        <option value="">Option 3</option>
                                        {{-- @foreach ($collection as $item)
                                                                            
                                                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tahun</label>
                                <div class="col-sm-8">
                                    <select name="JK" class="form-control">
                                        <option value="">Option 1</option>
                                        <option value="">Option 2</option>
                                        <option value="">Option 3</option>
                                        {{-- @foreach ($collection as $item)
                                                                            
                                                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Status Karyawan</label>
                                <div class="col-sm-8">
                                    <select name="JK" class="form-control">
                                        <option value="">Option 1</option>
                                        <option value="">Option 2</option>
                                        <option value="">Option 3</option>
                                        {{-- @foreach ($collection as $item)
                                                                            
                                                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <div class="col-md-5 py-4 text-center" style="padding-left:0px">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Launch demo modal
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="col-12 py-4">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Laporan</th>
                            <th>Nama Laporan</th>
                            <th>Status Laporan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Lap01</td>
                            <td>LAPORAN GAJI KARYAWAN TETAP OKTOBER 2019</td>
                            <td>DIKIRIM</td>
                            <td>Lihat</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Lap02</td>
                            <td>LAPORAN GAJI KARYAWAN KONTRAK OKTOBER 2019</td>
                            <td>DITERIMA</td>
                            <td>Lihat</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ml-3">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="font-size: 12px;">No</th>
                            <th style="font-size: 12px;">NIK</th>
                            <th style="font-size: 12px;">NAMA</th>
                            <th style="font-size: 12px;">BANK</th>
                            <th style="font-size: 12px;">NO REK</th>
                            <th style="font-size: 12px;">AN</th>
                            <th style="font-size: 12px;">TOTAL GAJI</th>
                            <th style="font-size: 12px;">Divisi</th>
                            <th style="font-size: 12px;">Status</th>
                            <th style="font-size: 12px;">Masuk</th>
                            <th style="font-size: 12px;">Sakit</th>
                            <th style="font-size: 12px;">Ijin</th>
                            <th style="font-size: 12px;">Cuti</th>
                            <th style="font-size: 12px;">Alfa</th>
                            <th style="font-size: 12px;">Libur</th>
                            <th style="font-size: 12px;">GAJI POKOK</th>
                            <th style="font-size: 12px;">LEMBUR</th>
                            <th style="font-size: 12px;">INSENTIF</th>
                            <th style="font-size: 12px;">BPJS KES</th>
                            <th style="font-size: 12px;">BPJS TK</th>
                            <th style="font-size: 12px;">BPJS JP</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <tr>
                            <td style="font-size: 12px;">111</td>
                            <td style="font-size: 12px;">111</td>
                            <td style="font-size: 12px;">111</td>
                            <td style="font-size: 12px;">111</td>
                            <td style="font-size: 12px;">111</td>
                            <td style="font-size: 12px;">111</td>
                            <td style="font-size: 12px;">111</td>
                            <td style="font-size: 12px;">111</td>
                            <td style="font-size: 12px;">111</td>
                            <td style="font-size: 12px;">111</td>
                            <td style="font-size: 12px;">111</td>
                            <td style="font-size: 12px;">111</td>
                            <td style="font-size: 12px;">111</td>
                            <td style="font-size: 12px;">111</td>
                            <td style="font-size: 12px;">111</td>
                            <td style="font-size: 12px;">111</td>
                            <td style="font-size: 12px;">111</td>
                            <td style="font-size: 12px;">111</td>
                            <td style="font-size: 12px;">111</td>
                            <td style="font-size: 12px;">111</td>
                            <td style="font-size: 12px;">111</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-oval">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection