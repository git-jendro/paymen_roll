@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mt-5">
        <div class="ml-4">
            <h5>SIM PT. Artha Kreasi Utama</h5>
        </div>
        <div class="ml-4">
            <label>Input Absen Manual</label>
        </div>
    </div>
</div>
<div class="container" style="margin-left: 0.25rem">
    <form action="/absen/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mt-4 ml-1">
            <div class="container col-12" style="margin-left: 0px; margin-right: 0px">
                <div class="card">
                    <div class="card-body" style="padding: 0.25rem">
                        <div class="container col-5" style="margin-left: 0rem; margin-right:0rem">
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Bulan</label>
                                <div class="col-sm-8">
                                    {{-- <select id="bulan" class="form-control">
                                        <option value="">Pilih Bulan</option>
                                    </select> --}}
                                    <label class="col-sm-4 col-form-label" id="bulan"></label>
                                </div>
                            </div>
                        </div>
                        <div class="auto text-center">
                            <table class="table table-bordered" id="table">
                            </table>
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
<script>
    $(document).ready(function(){
        var month = new Array();
        month[0] = "January";
        month[1] = "February";
        month[2] = "March";
        month[3] = "April";
        month[4] = "May";
        month[5] = "June";
        month[6] = "July";
        month[7] = "August";
        month[8] = "September";
        month[9] = "October";
        month[10] = "November";
        month[11] = "December";
        
        var d = new Date();
        var m = month[d.getMonth()];
        var n = d.getMonth();
        var y = d.getFullYear();
        var t = n+1;
        function daysInMonth (t, y) {
            return new Date(y, t, 0).getDate();
        }
        document.getElementById("bulan").innerHTML = m;
        $('#table').append('<thead><tr><th rowspan="2" class="pb-4">No.</th><th rowspan="2" class="pb-4">No. Pegawai</th><th colspan="'+daysInMonth (t, y)+'">Tanggal</th></tr><tr id="tgl"></tr></thead><tbody><tr id="cek"><td>1</td><td>Nama</td></tr></tbody>');
        for (let i = 1; i <= daysInMonth (t, y); i++) {
            $('#tgl').append('<td>'+i+'</td>');
            $('#cek').append('<td><input type=checkbox name="check" id="check"></td>');
        }
    });
</script>
@endsection