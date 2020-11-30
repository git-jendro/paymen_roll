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
    <form action="/karyawan/" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mt-4 ml-1">
            <div class="container col-8" style="margin-left: 0px; margin-right: 0px">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h2>Informasi Personal</h2>
                            <hr>
                        </div>
                        <div class="row d-flex">
                            <div class="container col-5 text-left" style="margin-left: 1rem; margin-right:0rem">
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nomor Pegawai</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nip" class="form-control">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nama</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nama" class="form-control">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
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
                                    <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="tempatLahir">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="dob">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nomor Telepon</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="notel">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nomor KTP</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="noktp">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nomor KK</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nokk">
                                    </div>
                                </div>
                            </div>
                            <div class="container col-5 text-left" style="margin-right:0rem">
                                <div class="form-inline mt-3">
                                    <label class="col-sm-4 col-form-label">NPWP</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="npwp">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Status Pernikahan</label>
                                    <div class="col-sm-8">
                                        <select name="statusNikah" class="form-control">
                                            <option value="">Option 1</option>
                                            <option value="">Option 2</option>
                                            <option value="">Option 3</option>
                                            {{-- @foreach ($collection as $item)
                                                                                
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nama Ayah</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="namaAyah" class="form-control">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nama Ibu</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="namaIbu" class="form-control">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Status Karyawan</label>
                                    <div class="col-sm-8">
                                        <select name="statusKerja" class="form-control">
                                            <option value="">Option 1</option>
                                            <option value="">Option 2</option>
                                            <option value="">Option 3</option>
                                            {{-- @foreach ($collection as $item)
                                                                                                                
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Tipe UMR</label>
                                    <div class="col-sm-8">
                                        <select name="tipeumr" class="form-control">
                                            <option value="">Option 1</option>
                                            <option value="">Option 2</option>
                                            <option value="">Option 3</option>
                                            {{-- @foreach ($collection as $item)
                                                                                                                
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Alamat KTP</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" name="alamatktp" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Alamat Domisili</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" name="alamatdom" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card my-3">
                    <div class="card-body">
                        <div>
                            <h2>Informasi Keluarga</h2>
                            <hr>
                        </div>
                        <div class="row d-flex">
                            <div class="container col-5 text-left" style="margin-left: 1rem; margin-right:0rem">
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nama Pasangan</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="namaPas" class="form-control">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-8">
                                        <select name="jkPas" class="form-control">
                                            <option value="">Option 1</option>
                                            <option value="">Option 2</option>
                                            <option value="">Option 3</option>
                                            {{-- @foreach ($collection as $item)
                                                
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nomor KTP</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="noKtpPas" class="form-control">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="tempatLahirPas" class="form-control">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="date" name="dobPas" class="form-control">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nama Anak 1</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="namaAn2" class="form-control">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-8">
                                        <select name="jkAn2" class="form-control">
                                            <option value="">Option 1</option>
                                            <option value="">Option 2</option>
                                            <option value="">Option 3</option>
                                            {{-- @foreach ($collection as $item)
                                                
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="tempatLahirAn2" class="form-control">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="date" name="dobAn2" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="container col-5 text-left" style="margin-right:0rem">
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nama Anak 2</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="namaAn2" class="form-control">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-8">
                                        <select name="jkAn2" class="form-control">
                                            <option value="">Option 1</option>
                                            <option value="">Option 2</option>
                                            <option value="">Option 3</option>
                                            {{-- @foreach ($collection as $item)
                                                                                
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="tempatLahirAn2" class="form-control">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="date" name="dobAn2" class="form-control">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Nama Anak 3</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="namaAn3" class="form-control">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-8">
                                        <select name="jkAn3" class="form-control">
                                            <option value="">Option 1</option>
                                            <option value="">Option 2</option>
                                            <option value="">Option 3</option>
                                            {{-- @foreach ($collection as $item)
                                                                                
                                                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="tempatLahirAn3" class="form-control">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="date" name="dobAn3" class="form-control">
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
                            <h2>Informasi Rekening</h2>
                            <hr>
                        </div>
                        <div class="container pl-3 pt-2" style="margin: auto">
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <select name="namaBank" class="form-control">
                                        <option value="">Option 1</option>
                                        <option value="">Option 2</option>
                                        <option value="">Option 3</option>
                                        {{-- @foreach ($collection as $item)
                                                                                                            
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Cabang</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="cabang">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nomor Rekening</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="noRek">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Atas Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="atasNama">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card my-2">
                    <div class="card-body">
                        <div>
                            <h2>Informasi Jenjang Pendidikan</h2>
                            <hr>
                        </div>
                        <div class="container pl-3 pt-2" style="margin: auto">
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Jenjang Terakhir</label>
                                <div class="col-sm-8">
                                    <select name="PendidikanTerakhir" class="form-control">
                                        <option value="">Option 1</option>
                                        <option value="">Option 2</option>
                                        <option value="">Option 3</option>
                                        {{-- @foreach ($collection as $item)
                                                                                                                                                        
                                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">IPK</label>
                                <div class="col-sm-8">
                                    <input type="text" name="ipk" class="form-control">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Status</label>
                                <div class="col-sm-8">
                                    <input type="text" name="" class="form-control">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tahun Ajaran</label>
                                <div class="col-sm-8">
                                    <input type="text" name="tahunLulus" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card my-2">
                    <div class="card-body">
                        <div>
                            <h2>Informasi Kontrak</h2>
                            <hr>
                        </div>
                        <div class="container pl-3 pt-2" style="margin: auto">
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Jabatan</label>
                                <div class="col-sm-8">
                                    <select name="jabatan" class="form-control">
                                        <option value="">Option 1</option>
                                        <option value="">Option 2</option>
                                        <option value="">Option 3</option>
                                        {{-- @foreach ($collection as $item)
                                                                                                                                        
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Divis</label>
                                <div class="col-sm-8">
                                    <select name="divisi" class="form-control">
                                        <option value="">Option 1</option>
                                        <option value="">Option 2</option>
                                        <option value="">Option 3</option>
                                        {{-- @foreach ($collection as $item)
                                                                                                                                        
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Penempatan</label>
                                <div class="col-sm-8">
                                    <select name="penempatan" class="form-control">
                                        <option value="">Option 1</option>
                                        <option value="">Option 2</option>
                                        <option value="">Option 3</option>
                                        {{-- @foreach ($collection as $item)
                                                                                                                                        
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tanggal Masuk</label>
                                <div class="col-sm-8">
                                    <input type="date" name="tanggalMasuk" class="form-control">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Nomor PKWT</label>
                                <div class="col-sm-8">
                                    <input type="text" name="noPkwt" class="form-control">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tanggal Mulai</label>
                                <div class="col-sm-8">
                                    <input type="text" name="" class="form-control">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">Tanggal Berakhir</label>
                                <div class="col-sm-8">
                                    <input type="text" name="berakhir" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card my-2">
                    <div class="card-body">
                        <div>
                            <h2>Informasi BPJS</h2>
                            <hr>
                        </div>
                        <div class="container pl-3 pt-2" style="margin: auto">
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">No. BPJS TK</label>
                                <div class="col-sm-8">
                                    <input type="text" name="noBpjsKet" class="form-control">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">No. BPJS KES</label>
                                <div class="col-sm-8">
                                    <input type="text" name="noBpjsKes" class="form-control">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">No. BPJS KES Pasangan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="noBpjsKesPas" class="form-control">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">No. BPJS KES Anak 1</label>
                                <div class="col-sm-8">
                                    <input type="text" name="noBpjsAnk1" class="form-control">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">No. BPJS KES Anak 2</label>
                                <div class="col-sm-8">
                                    <input type="text" name="noBpjsAnk2" class="form-control">
                                </div>
                            </div>
                            <div class="form-inline my-2">
                                <label class="col-sm-4 col-form-label">No. BPJS KES Anak 3</label>
                                <div class="col-sm-8">
                                    <input type="text" name="noBpjsAnk3" class="form-control">
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