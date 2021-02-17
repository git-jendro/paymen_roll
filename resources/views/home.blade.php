@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container ml-4">
    <div class="mt-5 ml-5">
        {{-- <div class="row">
            <div class="col-md-4 py-4">
                <div class="card pt-5" style="height: 200px; width: 300px">
                    <a href="/karyawan">
                        <div class="card-body pt-4">
                            Data Karyawan
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 py-4">
                <div class="card pt-5" style="height: 200px; width: 300px">
                    <a href="/absen">
                        <div class="card-body pt-4">
                            Data Absensi
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 py-4">
                <div class="card pt-5" style="height: 200px; width: 300px">
                    <a href="/gaji">
                        <div class="card-body pt-4">
                            Data Gaji
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 py-4">
                <div class="card pt-5" style="height: 200px; width: 300px">
                    <a href="/gaji/ketentuan">
                        <div class="card-body pt-4">
                            Data Ketentuan Gaji
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 py-4">
                <div class="card pt-5" style="height: 200px; width: 300px">
                    <a href="/laporan">
                        <div class="card-body pt-4">
                            Data Laporan
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 py-4">
                <div class="card pt-5" style="height: 200px; width: 300px">
                    <a href="/user">
                        <div class="card-body pt-4">
                            Data User
                        </div>
                    </a>
                </div>
            </div>
        </div> --}}
        @if (Auth::user()->role == 1)
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 py-4">
                <div class="card pt-5" style="height: 200px; width: 300px">
                    <a href="/karyawan">
                        <div class="card-body pt-4">
                            Data Karyawan
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 py-4">
                <div class="card pt-5" style="height: 200px; width: 300px">
                    <a href="/absen">
                        <div class="card-body pt-4">
                            Data Absensi
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 py-4">
                <div class="card pt-5" style="height: 200px; width: 300px">
                    <a href="/user">
                        <div class="card-body pt-4">
                            Data User
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @elseif (Auth::user()->role == 3)
        <div class="row">
            <div class="col-md-4 py-4">
                <div class="card pt-5" style="height: 200px; width: 300px">
                    <a href="/karyawan">
                        <div class="card-body pt-4">
                            Data Karyawan
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 py-4">
                <div class="card pt-5" style="height: 200px; width: 300px">
                    <a href="/absen">
                        <div class="card-body pt-4">
                            Data Absensi
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 py-4">
                <div class="card pt-5" style="height: 200px; width: 300px">
                    <a href="/gaji">
                        <div class="card-body pt-4">
                            Data Gaji
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 py-4">
                <div class="card pt-5" style="height: 200px; width: 300px">
                    <a href="/gaji/ketentuan">
                        <div class="card-body pt-4">
                            Data Ketentuan Gaji
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 py-4">
                <div class="card pt-5" style="height: 200px; width: 300px">
                    <a href="/laporan">
                        <div class="card-body pt-4">
                            Data Laporan
                        </div>
                    </a>
                </div>
            </div>
        </div>   
        @else
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 py-4">
                <div class="card pt-5" style="height: 200px; width: 300px">
                    <a href="/gaji/ketentuan">
                        <div class="card-body pt-4">
                            Data Ketentuan Gaji
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 py-4">
                <div class="card pt-5" style="height: 200px; width: 300px">
                    <a href="/laporan/lihat">
                        <div class="card-body pt-4">
                            Data Laporan
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 py-4">
                <div class="card pt-5" style="height: 200px; width: 300px">
                    <a href="/karyawan">
                        <div class="card-body pt-4">
                            Data Karyawan
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection