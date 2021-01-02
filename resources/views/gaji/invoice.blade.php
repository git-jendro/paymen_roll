<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Print Laporan Nilai</title>
    <style type="text/css">
        body {
            font-size: 10pt;
            padding-top: 1rem;
        }
        /* table td, table th {
            border: 1px solid;
        } */
        .rowspan {
            border-left-width: 10px;
        }
        .list-inline {
            padding-left: 0;
            list-style: none;
        }
        .item {
            display: inline-block;
        }
        .d-flex {
            display: flex !important;
        }
        .justify-content-around {
            justify-content: space-around !important;
        }
    </style>
</head>
<body>
    {{-- <span><p><h4><u>PT. Artha Kreasi Utama</u></h4>
        Jl. Kebayoran Lama Raya No. 198, Jakarta Selatan<br>
        Phone (021)727 8816 / 28126440</p>
    </span> --}}
    <ul class="list-inline">
        <li class="item">
            <img src="{{ public_path('img/logo.png')}}">
        </li>
        <li class="item">
            <p><h4><u>PT. Artha Kreasi Utama</u></h4>
                Jl. Kebayoran Lama Raya No. 198, Jakarta Selatan<br>
                Phone (021)727 8816 / 28126440</p>
        </li>
    </ul>
    <table style="margin-top: 3rem">
        <tr>
            <td style="width: 150px">
                Nama
            </td>
            <td style="width: 150px">
                : {{$absen->karyawan->nama}}
            </td>
            <td style="width: 150px">
                
            </td>
            <td style="width: 150px">
                No. Rekening
            </td>
            <td style="width: 150px">
                : {{$absen->karyawan->noRek}}
            </td>
        </tr>
        <tr>
            <td style="width: 150px">
                NIK
            </td>
            <td style="width: 150px">
                : {{$absen->karyawan->noktp}}
            </td>
            <td style="width: 150px">
                
            </td>
            <td style="width: 150px">
                Bank
            </td>
            <td style="width: 150px">
                : {{$absen->karyawan->namaBank}}
            </td>
        </tr>
        <tr>
            <td style="width: 150px">
                Jabatan
            </td>
            <td style="width: 150px">
                : @foreach ($ketentuan as $row)
                    @if ($row->qualifier == 'JABATAN')
                        @if ($row->code == $absen->karyawan->jabatan)
                            : {{$row->localizedName}}
                        @endif
                    @endif
                @endforeach
            </td>
            <td style="width: 150px">
                
            </td>
            <td style="width: 150px">
                Periode
            </td>
            <td style="width: 150px">
                : {{$periode->month}}
            </td>
        </tr>
        <tr>
            <td style="width: 150px">
                Divisi
            </td>
            <td style="width: 150px">
                : @foreach ($ketentuan as $row)
                    @if ($row->qualifier == 'DIVISI')
                        @if ($row->code == $absen->karyawan->divisi)
                            : {{$row->localizedName}}
                        @endif
                    @endif
                @endforeach
            </td>
            <td style="width: 150px">
                
            </td>
            <td style="width: 150px">
        
            </td>
            <td style="width: 150px">
                
            </td>
        </tr>
    </table>
    <table style="margin-top: 2rem">
        <tr>
            <td style="width: 150px; margin-bottom:1rem;">
                <b>Salary Calculation</b>
            </td>
            <td style="width: 150px">

            </td>
            <td style="width: 150px">
                
            </td>
            <td style="width: 150px; margin-bottom:1rem;">
                <b>Deduction</b>
            </td>
            <td style="width: 150px">
                
            </td>
        </tr>
        <tr>
            <td style="width: 150px">
                Gaji Pokok
            </td>
            <td style="width: 150px">
                : {{$absen->gajiPokok}}
            </td>
            <td style="width: 150px">
                
            </td>
            <td style="width: 150px">
                BPJS Kesehatan 1%
            </td>
            <td style="width: 150px">
                : {{$absen->bpjsKes}}
            </td>
        </tr>
        <tr>
            <td style="width: 150px">
                Tunjangan Tetap
            </td>
            <td style="width: 150px">
                : Tunjangan Tetap
            </td>
            <td style="width: 150px">
                
            </td>
            <td style="width: 150px">
                BPJS Ketenagakerjaan 2%
            </td>
            <td style="width: 150px">
                : {{$absen->bpjsTK}}
            </td>
        </tr>
        <tr>
            <td style="width: 150px">
                Rapel
            </td>
            <td style="width: 150px">
                : Rapel
            </td>
            <td style="width: 150px">
                
            </td>
            <td style="width: 150px">
                BPJS Pensiun 1%
            </td>
            <td style="width: 150px">
                : {{$absen->bpjsJP}}
            </td>
        </tr>
        <tr>
            <td style="width: 150px">
                Insentif Kehadiran
            </td>
            <td style="width: 150px">
                : {{$absen->insentif}}
            </td>
            <td style="width: 150px">
                
            </td>
            <td style="width: 150px">
                Potongan Absen
            </td>
            <td style="width: 150px">
                : {{$absen->totalPotongan}}
            </td>
        </tr>
        <tr>
            <td style="width: 150px">
                Lembur
            </td>
            <td style="width: 150px">
                : {{$absen->lembur}}
            </td>
            <td style="width: 150px">
                
            </td>
            <td style="width: 150px">
                PPH 21
            </td>
            <td style="width: 150px">
                : PPH 21
            </td>
        </tr>
        <tr>
            <td style="width: 150px">
                Jam Lembur
            </td>
            <td style="width: 150px">
                : Lembur
            </td>
            <td style="width: 150px">
                
            </td>
            <td style="width: 150px">
                Potongan Kas
            </td>
            <td style="width: 150px">
                : Potongan Kas
            </td>
        </tr>
        <tr>
            <td style="width: 150px">
                Hari Kerja
            </td>
            <td style="width: 150px">
                : {{$absen->jmlMasuk}}
            </td>
            <td style="width: 150px">
                
            </td>
            <td style="width: 150px">
                
            </td>
            <td style="width: 150px">
                
            </td>
        </tr>
    </table>
    <table style="margin-top: 2rem">
        <tr>
            <td style="width: 150px; margin-bottom:1rem;">
                <b>Gross Salary</b>
            </td>
            <td style="width: 150px">
                <b>: {{$absen->gajiKotor}}</b>
            </td>
            <td style="width: 150px">
                
            </td>
            <td style="width: 150px; margin-bottom:1rem;">
                <b>Total Deduction</b>
            </td>
            <td style="width: 150px">
                <b>: {{$absen->totalPotongan}}</b>
            </td>
        </tr>
    </table>
    <table style="margin-top: 1rem">
        <tr>
            <td style="width: 400px; margin-bottom:1rem;">
                <hr>
                <hr>
            </td>
            <td style="width: 130px; margin-bottom:1rem; padding-left:1rem">
                <b>Total Salary</b>
            </td>
            <td style="width: 130px">
                <b>: {{$absen->gajiBersih}}</b>
            </td>
        </tr>
    </table>
    <table style="margin-top: 1rem">
        <tr>
            <td style="width: 400px; margin-bottom:1rem;">
                <p>
                    <i><u><b>Note :</b></u><br>
                        Complai lewat dari 5 hari kerja setelah menerima Slip Gaji ini <b>tidak akan dilayani.</b><br>
                    </i>
                    <b>Slip Gaji</b>ini sah tanpa stampel dan tanda tangan.
                </p>
            </td>
        </tr>
    </table>
    
</body>
</html>