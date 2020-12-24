@extends('layouts.app')

@section('title', 'Tambah Absensi')

@section('content')
<div class="container">
    <div class="mt-4">
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
                                <thead id="thead">

                                </thead>
                                <tbody id="body">
                                    <input type="text" name="nip" class="form-control">
                                </tbody>
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
<style>
    body {
        counter-reset: Serial;
        /* Set the Serial counter to 0 */
    }
    table {
        border-collapse: separate;
    }
    tr td:first-child:before {
        counter-increment: Serial;
        /* Increment the Serial counter */
        content: counter(Serial);
        /* Display the counter */
    }
</style>
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
        $('#thead').append('<tr><th rowspan="2" class="pb-4">No.</th><th rowspan="2" class="pb-4">No. Pegawai</th><th colspan="'+daysInMonth (t, y)+'">Tanggal</th></tr><tr id="tgl"></tr>');
        for (let i = 1; i <= daysInMonth (t, y); i++) {
            $('#tgl').append('<th>'+i+'</th>');
        }
        $.ajax({
            type : 'GET',
            url : 'http://localhost:8000/absen/get/',
            success : function (res) {
                $.each(res, function (i, item) {
                    try {
                        $('#body').append('<tr id="cek'+i+'"><td style="width:2%;"></td><td style="width:15%"><input type="text" name="nip('+i+')[]" class="form-control" value="'+item.nip+'" readonly id="nip('+item.nip+')"></td></tr>')
                        for (let x = 1; x <= daysInMonth (t, y); x++) {
                            $('#cek'+i).append('<td style="width:2.25%;"><input type="text" name="absen[]" class="form-control text-center absen'+item.id+'" onkeyup="absen('+item.id+')" style="padding:0.3rem"></td>');
                        }
                    } catch (error) {
                        console.log(error);
                    }
                })
            }
        })
    });

    function absen(id) {
        var inputs = document.getElementsByClassName( 'absen'+id ),
        names  = [].map.call(inputs, function( input ) {
            return input.value;
        });
        console.log(names);
        
    }
    
</script>
@endsection