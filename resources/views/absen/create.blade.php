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
    <form action="" method="POST" enctype="multipart/form-data">
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
                                <label style="font-size: 0.7rem; color: #636262">*Masukan data sesuai dengan ketentuan (M = Masuk, S = Sakit, I = Izin, O = Overtime (Lembur) dan L = Libur) !</label>
                            </div>
                        </div>
                        <div class="auto text-center">
                            <table class="table table-bordered" id="table">
                                <thead id="thead">

                                </thead>
                                <tbody id="body">
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
            {{-- <div class="col-md-2 py-4 text-center" style="padding-left:0px">
                <button type="submit" class="btn btn-primary" style="width: 80%">Submit</button>
            </div> --}}
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
                $.each(res.absen, function (i, item) {
                console.log(item.data);
                    try {
                        $('#body').append('<tr id="cek'+i+'"><td id="absen'+item.id+'" style="width:2%;"></td><td style="width:15%"><input type="text" name="nip('+i+')[]" class="form-control" value="'+item.nip+'" readonly id="nip('+item.nip+')"></td></tr>')
                        $.each(res.data, function (x, val) {
                            try {
                                if (item.id == val.absensi_gaji_id) {
                                    $('#cek'+i).append('<td style="width:2.25%;"><input type="text" name="absen[]" value="'+val.data+'" class="form-control text-center absen'+item.id+'" id="absen'+val.id+'" onkeyup="absen('+item.id+','+val.id+')" style="padding:0.3rem;text-transform: uppercase;"></td>');
                                }
                            } catch (error) {
                                
                            }
                        })
                    } catch (error) {
                        console.log(error);
                    }
                })
            }
        })
    });

    function absen(id,index) {
        var inputs = document.getElementsByClassName( 'absen'+id ),
        names  = [].map.call(inputs, function( input ) {
            return input.value.toUpperCase();
        });
        var data = $('#absen'+index).val().toUpperCase();
        var val = names.map(function(word){
                if (word.length > 1) {
                    alert("Hanya boleh memasukan 1 huruh dalam 1 kolom ! \nHarap untuk mengisi form dengan benar !");
                    return false;
                }
        })
        var count = {};
        names.forEach(function(i) { count[i] = (count[i]||0) + 1;});
        var m = count.M;
        var s = count.S;
        var i = count.I;
        var c = count.C;
        var l = count.L;
        var o = count.O;
        var total = names.length;
        if (count.M == null) {
            var m = 0; 
        }
        if (count.S == null) {
            var s = 0;
        }
        if (count.I == null) {
            var i = 0; 
        }
        if (count.C == null) {
            var c = 0; 
        }
        if (count.L == null) {
            var l = 0; 
        }
        if (count.O == null) {
            var o = 0; 
        }
        $.ajax({
            type : 'GET',
            url : 'http://localhost:8000/absen/store/'+id+'/'+m+'/'+s+'/'+i+'/'+c+'/'+l+'/'+o+'/'+total+'/'+data+'/'+index,
            success : function (res) {
                console.log(res);
            }
        })
    }
    
</script>
@endsection