@extends('layouts.app')

@section('title', 'Data Absensi')

@section('content')
<div class="container">
    <div class="mt-4">
        <div>
            <h5>SIM PT. Artha Kreasi Utama</h5>
        </div>
        <div>
            <label>Form Tambah Karyawan</label>
        </div>
    </div>
    <div class="mt-4">
        <div class="card">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col" colspan="6" class="pl-3 pr-3 py-2">Filter</th>
                    </tr>
                </thead>
                <tbody >
                    <tr>
                        <th class="pl-3 pr-3">
                            NIP
                        </th>
                        <th style="width: 30%" class="pl-3 pr-3">
                            <input type="text" class="form-control" id="nip" >
                        </th>
                        <th class="pl-3 pr-3">
                            Status
                        </th>
                        <th class="pl-3 pr-3">
                            <select class="form-control" id="" style="width: 100%">
                                <option value=""></option>
                                <option value="">3</option>
                                <option value="">2</option>
                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th class="pl-3 pr-3">
                            Nama
                        </th>
                        <th style="width: 30%" class="pl-3 pr-3">
                            <input type="text" class="form-control" id="nip" >
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container">
    <div class="mt-4">
        <div class="d-flex">
            <div class="mr-auto p-2"><h5>Data Absensi</h5></div>
            <div class="p-2">
                <a href="/absen/create" class="btn btn-oval"><h5 style="margin-bottom: 0rem">Input Absen</h5></a>
            </div>
            <div class="p-2">
                <button type="button" class="btn btn-oval" data-toggle="modal" data-target="#exampleModal">
                    <h5 style="margin-bottom: 0rem">Upload  Absen</h5>
                  </button>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="mt-2">
        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th class="pl-3 pr-3" scope="col">No.</th>
                        <th class="pl-3 pr-3" scope="col">NIP</th>
                        <th class="pl-3 pr-3" scope="col">Nama</th>
                        <th class="pl-3 pr-3" scope="col">Masuk</th>
                        <th class="pl-3 pr-3" scope="col">Sakit</th>
                        <th class="pl-3 pr-3" scope="col">Izin</th>
                        <th class="pl-3 pr-3" scope="col">Cuti</th>
                        <th class="pl-3 pr-3" scope="col">Libur</th>
                        <th class="pl-3 pr-3" scope="col">Total</th>
                        <th class="pl-3 pr-3" scope="col">Tipe Karyawan</th>
                        <th class="text-center" class="pl-3 pr-3" scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td class="pl-3 pr-3">
                            {{-- {{dd($item)}} --}}
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->nip}}
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->karyawan->nama}}
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->jmlMasuk}}
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->jmlSakit}}
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->jmlIzin}}
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->jmlCuti}}
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->jmlLibur}}
                        </td>
                        <td class="pl-3 pr-3">
                            {{$item->TotalHari}}
                        </td>
                        <td class="pl-3 pr-3">
                            @foreach ($ketentuan as $row)
                                @if ($row->qualifier == 'STATUSKERJA')
                                    @if ($row->code == $item->karyawan->statusKerja)
                                        {{$row->localizedName}}
                                    @endif
                                @endif
                            @endforeach
                        </td>
                        <td class="pl-3 pr-3">
                            <a href="/karyawan/edit">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                </svg>
                            </a>
                        </td>
                        <td class="pl-3 pr-3">
                            <a href="/karyawan/show">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-square-fill"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Button trigger modal -->  
  <!-- Modal -->
<div class="modal fade pl-2 pr-2 mt-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content"  style="height: 50%;width: 50%; margin:auto">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Data Absen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-inline my-2">
                    <label class="col-sm-4 col-form-label">Upload File</label>
                    <div class="col-sm-8">
                        <input type="file" name="path" class="form-control @error('path') is-invalid @enderror">
                        @error('path')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex">
                        <div class="py-2 mr-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        <div class="py-2">
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>
</div>
@endsection
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