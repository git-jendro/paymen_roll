@extends('layouts.app')

@section('title', 'Ketentuan Gaji')

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
    <form action="/gaji/store" method="POST" enctype="multipart/form-data">
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
                                    <label class="col-sm-6 col-form-label">Ketentuan Lembur</label>
                                    <div class="col-sm-6" style="padding-left: 0rem">
                                        <input type="text" placeholder="Masukin Ketentuan Lembur" name="lembur" style="width: 100%" class="form-control  @error('lembur') is-invalid @enderror">
                                        @error('lembur')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-6 col-form-label">Tarif Insentif</label>
                                    <div class="col-sm-6" style="padding-left: 0rem">
                                        <input type="text" placeholder="Masukan Tarif Insentif" name="insentif" style="width: 100%" class="form-control  @error('insentif') is-invalid @enderror">
                                        @error('insentif')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-6 col-form-label">Ketentuan Tunjangan</label>
                                    <div class="col-sm-6" style="padding-left: 0rem">
                                        <input type="text" placeholder="Masukan Ketentuan Tunjangan" name="tunjangan" style="width: 100%" class="form-control  @error('tunjangan') is-invalid @enderror">
                                        @error('tunjangan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-6 col-form-label">Ketentuan BPJS TK</label>
                                    <div class="col-sm-6 input-group" style="padding-left: 0rem">
                                        <input type="text" placeholder="Masukan Ketentuan BPJS TK" name="bpjsTK" class="form-control  @error('bpjsTK') is-invalid @enderror">
                                        <div class="input-group-append">
                                            <div class="input-group-text">%</div>
                                        </div>
                                        @error('bpjsTK')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-6 col-form-label">Ketentuan BPJS KES</label>
                                    <div class="col-sm-6 input-group" style="padding-left: 0rem">
                                        <input type="text" placeholder="Masukan Ketentuan BPJS KES" name="bpjsKes" class="form-control  @error('bpjsKes') is-invalid @enderror">
                                        <div class="input-group-append">
                                            <div class="input-group-text">%</div>
                                        </div>
                                        @error('bpjsKes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-6 col-form-label">Ketentuan BPJS JP</label>
                                    <div class="col-sm-6 input-group" style="padding-left: 0rem">
                                        <input type="text" placeholder="Masukan Ketentuan BPJS JP" name="bpjsJp" class="form-control  @error('bpjsJp') is-invalid @enderror">
                                        <div class="input-group-append">
                                                <div class="input-group-text">%</div>
                                            </div>
                                        @error('bpjsJp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
                                    <input type="text" placeholder="Nama Potongan 1" class="form-control  @error('namapotongan1') is-invalid @enderror" name="namapotongan1" style="width: 100%" placeholder="Nama Potongan 1">
                                    @error('namapotongan1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="col-sm-5 input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input type="text" placeholder="Jumlah Potongan 1" name="potongan1" class="form-control  @error('potongan1') is-invalid @enderror" placeholder="Jumlah Potongan 2">
                                    @error('potongan1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-2 col-form-label" style="padding: 0rem">Potongan 2</label>
                                <div class="col-sm-5">
                                    <input type="text" placeholder="Nama Potongan 2" class="form-control  @error('namapotongan2') is-invalid @enderror" name="namapotongan2" style="width: 100%" placeholder="Nama Potongan 2">
                                    @error('namapotongan2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="col-sm-5 input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input type="text" placeholder="Jumlah Potongan 2" name="potongan2" class="form-control  @error('potongan2') is-invalid @enderror" placeholder="Jumlah Potongan 2">
                                    @error('potongan2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
                        <div class="container pl-3 pt-2" style="margin: auto" id="umr">
                            <div class="form-inline my-2">
                                <label class="col-sm-2 col-form-label" style="padding: 0rem">UMR 1</label>
                                <div class="col-sm-5">
                                    <input type="text" name="area1" class="form-control  @error('area1') is-invalid @enderror" placeholder="Area UMR 1">
                                    @error('area1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-5 input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                    </div>
                                    <input type="text" placeholder="Jumlah UMR 1" name="umr1" class="form-control  @error('umr1') is-invalid @enderror">
                                    @error('umr1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-2 col-form-label" style="padding: 0rem">UMR 2</label>
                                <div class="col-sm-5">
                                    <input type="text" name="area2" class="form-control  @error('area2') is-invalid @enderror" placeholder="Area UMR 2">
                                    @error('area2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror 
                                </div>
                                <div class="col-sm-5 input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                    </div>
                                    <input type="text" placeholder="Jumlah UMR 2" name="umr2" class="form-control  @error('umr2') is-invalid @enderror">
                                    @error('umr2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            {{-- <label onclick="tambah()">Tambah Area <svg width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                              </svg>
                            </label> --}}
                            <div>
                                <a href="javascript:void(0);" class="add_button" title="Add field" style="text-align: right">Tambah Field <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                  </svg></a>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('#umr'); //Input field wrapper
        var x = 2; //Initial field counter is 1
        var area = area;
        var umr = umr;
        $('#errors').html('');
        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapper).append('<div class="form-inline my-2" id="div"><label class="col-sm-2 col-form-label" style="padding: 0rem">UMR '+x+'</label><div class="col-sm-5"><input type="text" name="area'+x+'" class="form-control" placeholder="Area UMR '+x+'"></div><div class="col-sm-5 input-group"><div class="input-group-prepend"><div class="input-group-text">Rp</div></div><input type="text" placeholder="Jumlah UMR '+x+'" name="umr'+x+'" class="form-control"></div></div>'); //Add field html
            }
        });
        
        //Once remove button is clicked
        $('#div').on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
        
    });
    </script>
