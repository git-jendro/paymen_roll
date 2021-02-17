<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Print Data Laporan</title>
    <style type="text/css">
        body {
            font-size: 10pt;
            padding-top: 1rem;
        }
        table {
            border-left: 0.01em solid #ccc;
            border-right: 0;
            border-top: 0.01em #ccc;
            border-bottom: 0;
            border-collapse: collapse;
            margin:auto;
        }
        table td,
        table th {
            border-left: 0;
            border-right: 0.01em solid #ccc;
            border-top: 0;
            border-bottom: 0.01em solid #ccc;
        }
        /* table td, table th {
            border: 1px solid; margin:auto
        } */
        .rowspan {
            border-left-width: 10px;
        }
        thead {
            display: table-header-group;
        }
        
    </style>
</head>
<body>
    <table style="border: 0rem;">
        <tr>
            <td style="width: 100px; border: 0rem; margin: auto">
                <img src="{{ public_path('img/logo.png')}}">
            </td>
            <td style="width: 800px; border: 0rem;">
                <center>
                    <p><h1><u>PT. Artha Kreasi Utama</u></h1>
                        <h3> Jl. Kebayoran Lama Raya No. 198, Jakarta Selatan<br>
                        Phone (021)727 8816 / 28126440</h3></p>
                </center>
            </td>
            <td style="width: 100px; border: 0rem;">
                <img src="{{ public_path('img/lazada.jpg')}}">
            </td>
        </tr>
    </table>
	<table style="margin-top: 3rem">
		<thead>
			{{-- <tr>
				<th style="border: 1px solid; margin:auto" rowspan="2">No</th>
				<th style="border: 1px solid; margin:auto" rowspan="2">MATA PELAJARAN</th>
				<th style="border: 1px solid; margin:auto" rowspan="2" style="width: 200px;">KKM</th>
				<th colspan="2" style="width: 150px; border: 1px solid; margin:auto">Pengetahuan</th>
				<th colspan="2" style="width: 150px; border: 1px solid; margin:auto">Keterampilan</th>
			</tr>
			<tr>
				<th style="border: 1px solid; margin:auto">Angka</th>
				<th style="border: 1px solid; margin:auto">Predikat</th>
				<th style="border: 1px solid; margin:auto">Angka</th>
				<th style="border: 1px solid; margin:auto">Predikat</th>
			</tr> --}}
            <tr>
                <th style="border: 1px solid; margin:auto; width: 20px">No</th>
                <th style="border: 1px solid; margin:auto; width: 70px">NIK</th>
                <th style="border: 1px solid; margin:auto; width: 100px">NAMA</th>
                <th style="border: 1px solid; margin:auto; width: 50px">BANK</th>
                <th style="border: 1px solid; margin:auto; width: 70px">NO REK</th>
                <th style="border: 1px solid; margin:auto; width: 100px">AN</th>
                <th style="border: 1px solid; margin:auto; width: 55px">TOTAL GAJI</th>
                <th style="border: 1px solid; margin:auto; width: 100px">Divisi</th>
                <th style="border: 1px solid; margin:auto; width: 100px">Status</th>
                <th style="border: 1px solid; margin:auto; width: 40px">Masuk</th>
                <th style="border: 1px solid; margin:auto; width: 40px">Sakit</th>
                <th style="border: 1px solid; margin:auto; width: 40px">Ijin</th>
                <th style="border: 1px solid; margin:auto; width: 40px">Cuti</th>
                <th style="border: 1px solid; margin:auto; width: 40px">Libur</th>
                <th style="border: 1px solid; margin:auto; width: 55px">GAJI POKOK</th>
                <th style="border: 1px solid; margin:auto; width: 55px">LEMBUR</th>
                <th style="border: 1px solid; margin:auto; width: 55px">INSENTIF</th>
                <th style="border: 1px solid; margin:auto; width: 40px">BPJS KES</th>
                <th style="border: 1px solid; margin:auto; width: 40px">BPJS TK</th>
                <th style="border: 1px solid; margin:auto; width: 40px">BPJS JP</th>
            </tr>
		</thead>
		<tbody>
            @php
                $i = 1;
            @endphp
            {{-- {{dd($data)}} --}}
            @foreach ($data as $item)
            <tr>
                <th style="border: 1px solid; margin:auto;">{{$i++}}</th>
                <th style="border: 1px solid; margin:auto;">{{$item->karyawan->noktp}}</th>
                <th style="border: 1px solid; margin:auto;">{{$item->karyawan->nama}}</th>
                <th style="border: 1px solid; margin:auto;">
                @foreach ($bank as $row)
                    @if ($row->code == $item->karyawan->namaBank)
                        {{$row->localizedName}}
                    @endif
                @endforeach
                </th>
                <th style="border: 1px solid; margin:auto;">{{$item->karyawan->noRek}}</th>
                <th style="border: 1px solid; margin:auto;">{{$item->karyawan->atasNama}}</th>
                <th style="border: 1px solid; margin:auto;">{{$item->gajiBersih}}</th>
                <th style="border: 1px solid; margin:auto;">
                    @foreach ($divisi as $row)
                        @if ($row->code == $item->karyawan->divisi)
                            {{$row->localizedName}}
                        @endif
                    @endforeach
                </th>
                <th style="border: 1px solid; margin:auto;">
                    @foreach ($ket as $row)
                        @if ($row->code == $item->karyawan->statusKaryawan)
                            {{$row->localizedName}}
                        @endif
                    @endforeach
                </th>
                <th style="border: 1px solid; margin:auto;">{{$item->jmlMasuk}}</th>
                <th style="border: 1px solid; margin:auto;">{{$item->jmlSakit}}</th>
                <th style="border: 1px solid; margin:auto;">{{$item->jmlIzin}}</th>
                <th style="border: 1px solid; margin:auto;">{{$item->jmlIzin}}</th>
                <th style="border: 1px solid; margin:auto;">{{$item->jmlLibur}}</th>
                <th style="border: 1px solid; margin:auto;">{{$item->gajiPokok}}</th>
                <th style="border: 1px solid; margin:auto;">{{$item->lembur}}</th>
                <th style="border: 1px solid; margin:auto;">{{$item->insentif}}</th>
                <th style="border: 1px solid; margin:auto;">{{$item->bpjsKes}}</th>
                <th style="border: 1px solid; margin:auto;">{{$item->bpjsTK}}</th>
                <th style="border: 1px solid; margin:auto;">{{$item->bpjsJp}}</th>
            </tr>
            @endforeach
		</tbody>
	</table>
</body>
{{-- <body>
    <ul class="list-inline">
        <li class="item">
            <img src="{{ public_path('img/logo.png')}}">
        </li>
        <li class="item">
            <p><h4><u>PT. Artha Kreasi Utama</u></h4>
                Jl. Kebayoran Lama Raya No. 198, Jakarta Selatan<br>
                Phone (021)727 8816 / 28126440</p>
        </li>
        <li class="item">
            <img src="{{ public_path('img/lazada.jpg')}}">
        </li>
    </ul>
    
    <table>
        <thead>
            <tr>
                <th style="border: 1px solid; margin:auto">No</th>
                <th style="border: 1px solid; margin:auto">NIK</th>
                <th style="border: 1px solid; margin:auto">NAMA</th>
                <th style="border: 1px solid; margin:auto">BANK</th>
                <th style="border: 1px solid; margin:auto">NO REK</th>
                <th style="border: 1px solid; margin:auto">AN</th>
                <th style="border: 1px solid; margin:auto">TOTAL GAJI</th>
                <th style="border: 1px solid; margin:auto">Divisi</th>
                <th style="border: 1px solid; margin:auto">Status</th>
                <th style="border: 1px solid; margin:auto">Masuk</th>
                <th style="border: 1px solid; margin:auto">Sakit</th>
                <th style="border: 1px solid; margin:auto">Ijin</th>
                <th style="border: 1px solid; margin:auto">Cuti</th>
                <th style="border: 1px solid; margin:auto">Libur</th>
                <th style="border: 1px solid; margin:auto">GAJI POKOK</th>
                <th style="border: 1px solid; margin:auto">LEMBUR</th>
                <th style="border: 1px solid; margin:auto">INSENTIF</th>
                <th style="border: 1px solid; margin:auto">BPJS KES</th>
                <th style="border: 1px solid; margin:auto">BPJS TK</th>
                <th style="border: 1px solid; margin:auto">BPJS JP</th>
            </tr>
        </thead>
        <tbody id="tbody">
            @php
                $i = 1;
            @endphp
            @foreach ($data as $item)
            <th style="border: 1px solid; margin:auto">{{$i++}}</th>
            <th style="border: 1px solid; margin:auto">{{$item->karyawan->noktp}}</th>
            <th style="border: 1px solid; margin:auto">{{$item->karyawan->nama}}</th>
            <th style="border: 1px solid; margin:auto">BANK</th>
            <th style="border: 1px solid; margin:auto">{{$item->karyawan->noRek}}</th>
            <th style="border: 1px solid; margin:auto">{{$item->karyawan->atasNama}}</th>
            <th style="border: 1px solid; margin:auto">{{$item->gajiBersih}}</th>
            <th style="border: 1px solid; margin:auto">Divisi</th>
            <th style="border: 1px solid; margin:auto">Status</th>
            <th style="border: 1px solid; margin:auto">{{$item->jmlMasuk}}</th>
            <th style="border: 1px solid; margin:auto">{{$item->jmlSakit}}</th>
            <th style="border: 1px solid; margin:auto">{{$item->jmlIzin}}</th>
            <th style="border: 1px solid; margin:auto">{{$item->jmlIzin}}</th>
            <th style="border: 1px solid; margin:auto">{{$item->jmlLibur}}</th>
            <th style="border: 1px solid; margin:auto">{{$item->gajiPokok}}</th>
            <th style="border: 1px solid; margin:auto">{{$item->lembur}}</th>
            <th style="border: 1px solid; margin:auto">{{$item->insentif}}</th>
            <th style="border: 1px solid; margin:auto">{{$item->bpjsKes}}</th>
            <th style="border: 1px solid; margin:auto">{{$item->bpjsTK}}</th>
            <th style="border: 1px solid; margin:auto">{{$item->bpjsJp}}</th>
            @endforeach
        </tbody>
    </table>
    
</body> --}}
</html>