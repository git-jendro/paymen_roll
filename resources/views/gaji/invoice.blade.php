<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

        <title>PT. Artha Kreasi Utama</title>

        <!-- Scripts -->
        <script src="js/app.js" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

        <!-- Styles -->
        <link href="css/app.css" rel="stylesheet">
    </head>
    <style>
        .container,
        .container-fluid,
        .container-xl,
        .container-lg,
        .container-md,
        .container-sm {
        width: 100%;
        /* padding-left: 5px; */
        margin-right: 50px;
        margin-left: 50px;
        }
        .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
        }
        .col-12 {
        flex: 0 0 100%;
        max-width: 100%;
        position: relative;
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        }
    </style>

    <body>
        <div class="container" style="margin: 0rem">
            <div class="col-12 mt-2">
                <div class="d-flex flex-row bd-highlight">
                    <div class="p-2 bd-highlight">
                        {{-- <img src="{{asset('img/logo.png')}}"> --}}
                    </div>
                    <div class="p-2 bd-highlight">
                        <h4><u>PT. Artha Kreasi Utama</u></h4>
                        Jl. Kebayoran Lama Raya No. 198, Jakarta Selatan<br>
                        Phone (021)727 8816 / 28126440
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row mt-5">
                    <div class="container col-5">
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
                    <div class="container col-5">
                        <div class="row d-flex">
                            <div class="container pl-3 pt-2">
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">No Rekening</label>
                                    <div class="col-sm-8">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Bank</label>
                                    <div class="col-sm-8">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Periode</label>
                                    <div class="col-sm-8">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row mt-3">
                    <div class="container col-5">
                        <div class="row d-flex">
                            <div class="container text-left">
                                <div>
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
                    <div class="container col-5">
                        <div class="row d-flex">
                            <div class="container pl-3 pt-2">
                                <div>
                                    <h5 class="text-underline">Potongan</h5>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">BPJS Kesehatan</label>
                                    <div class="col-sm-8">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">BPJS
                                        Ketenagakerjaan</label>
                                    <div class="col-sm-8">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">BPJS Pensiun</label>
                                    <div class="col-sm-8">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Potongan</label>
                                    <div class="col-sm-8">
                                    </div>
                                </div>
                                <div class="form-inline my-2">
                                    <label class="col-sm-4 col-form-label">Total Potongan</label>
                                    <div class="col-sm-8">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 py-5">
                <div class="form-inline my-2">
                    <label class="col-sm-4 col-form-label">Salary</label>
                    <div class="col-sm-8">
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>