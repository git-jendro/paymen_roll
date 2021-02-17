@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')
<div class="container">
    <div class="mt-5">
        <div class="ml-4">
            <h5>SIM PT. Artha Kreasi Utama</h5>
        </div>
        <div class="ml-4">
            <label>Form User</label>
        </div>
    </div>
</div>
@if (session('store'))
    <div class="container">
        <div class="alert alert-success mt-2 ml-4">
            {{ session('store') }}
        </div>
    </div>
@endif
<div class="container">
    <form action="/user/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mt-4 ml-1">
            <div class="container" style="margin-right: 1rem">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h2>Tambah User PT. Artha Kreasi Utama</h2>
                            <hr>
                        </div>
                        <div class="row d-flex">
                            <div class="container text-left" style="margin-left: 1rem; margin-right:0rem">
                                <div class="form-inline my-2">
                                    <label class="pl-5 col-sm-6 col-form-label">Nama</label>
                                    <div class="col-sm-6" style="padding-left: 0rem">
                                        <input type="text" placeholder="Masukin Nama" name="name" style="width: 100%" class="form-control  @error('name') is-invalid @enderror" value="{{old('name')}}">
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="pl-5 col-sm-6 col-form-label">Role</label>
                                    <div class="col-sm-6" style="padding-left: 0rem">
                                        <select name="role" class="form-control @error('role') is-invalid @enderror" placeholder="role" style="width: 100%">
                                            @foreach ($ketentuan as $item)
                                                @if ($item->qualifier == 'ROLE')
                                                    @if (old('role') != null)
                                                        @if (old('role')==$item->code)
                                                            @php
                                                            $key = $item->localizedName;
                                                            @endphp
                                                        @endif
                                                    @endif
                                                @endif
                                            @endforeach
                                            <option value="{{old('role') != null ? old('role') : ''}}">
                                                {{old('role') != null ? $key : 'Pilih Role'}}</option>
                                            @foreach ($ketentuan as $item)
                                                @if ($item->qualifier == 'ROLE')
                                                    <option value="{{$item->code}}">{{$item->localizedName}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="pl-5 col-sm-6 col-form-label">Email</label>
                                    <div class="col-sm-6" style="padding-left: 0rem">
                                        <input type="email" placeholder="Masukan Email" name="email" style="width: 100%" class="form-control  @error('email') is-invalid @enderror" value="{{old('email')}}">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="pl-5 col-sm-6 col-form-label">Password</label>
                                    <div class="col-sm-6" style="padding-left: 0rem">
                                        <input type="password" placeholder="Masukan Password" name="password" style="width: 100%" class="form-control  @error('password') is-invalid @enderror">
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
{{-- 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('#umr'); //Input field wrapper
        var x = $('#cumr').val(); //Initial field counter is 1
        var area = area;
        var umr = umr;
        $('#errors').html('');
        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapper).append('<div class="form-inline my-2" id="div"><label class="pl-5 col-sm-2 col-form-label" style="padding: 0rem">UMR '+x+'</label><div class="col-sm-5"><input type="text" name="area'+x+'" class="form-control" placeholder="Area UMR '+x+'"></div><div class="col-sm-5 input-group"><div class="input-group-prepend"><div class="input-group-text">Rp</div></div><input type="text" placeholder="Jumlah UMR '+x+'" name="umr'+x+'" class="form-control"></div></div>'); //Add field html
            }
        });
        
        //Once remove button is clicked
        $('#div').on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
        
    });

    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_potongan'); //Add button selector
        var wrapper = $('#potongan'); //Input field wrapper
        var x = $('#cpotongan').val(); //Initial field counter is 1
        var area = area;
        var umr = umr;
        $('#errors').html('');
        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapper).append('<div class="form-inline my-2" id="div"><label class="pl-5 col-sm-2 col-form-label" style="padding: 0rem">Potongan '+x+'</label><div class="col-sm-5"><input type="text" name="namapotongan'+x+'" class="form-control" placeholder="Potongan '+x+'"></div><div class="col-sm-5 input-group"><div class="input-group-prepend"><div class="input-group-text">Rp</div></div><input type="text" placeholder="Jumlah Potongan '+x+'" name="potongan'+x+'" class="form-control"></div></div>'); //Add field html
            }
        });
        
        //Once remove button is clicked
        $('#div').on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
        
    });
</script> --}}
