@extends('layouts.app')

@section('title', 'Data Gaji')

@section('content')
<div class="container">
    <div class="mt-4">
        <div class="card ">
            <table class="table table-borderless mt-2">
                <thead>
                    <tr>
                        <th scope="col" colspan="6" class="pl-2 pr-2">Filter</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="pl-2 pr-2">
                            NIP
                        </td>
                        <td class="pl-2 pr-2">
                            <input type="text" class="form-control" id="nip">
                        </td>
                        <td class="pl-2 pr-2">
                            NIK
                        </td>
                        <td class="pl-2 pr-2">
                            <input type="text" class="form-control" id="nip">
                        </td>
                    </tr>
                    <tr>
                        <td class="pl-2 pr-2">
                            Nama
                        </td>
                        <td class="pl-2 pr-2">
                            <input type="text" class="form-control" id="nip">
                        </td>
                        <td class="pl-2 pr-2">
                            Status
                        </td>
                        <td class="pl-2 pr-2">
                            <select class="form-control" id="">
                                <option value=""></option>
                                <option value="">3</option>
                                <option value="">2</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container">
    <div class="mt-4">
        <div class="d-flex">
            <div class="mr-auto p-2"><h5>Data Gaji</h5></div>
            <div class="p-2"><a href="" class="btn btn-oval"><h5 style="margin-bottom: 0rem">Cetak Slip</h5></a></div>
            <div class="p-2"><a href="" class="btn btn-oval"><h5 style="margin-bottom: 0rem">Hitung</h5></a></div>
        </div>
    </div>
</div>
<div class="container">
    <div class="mt-2">
        <div class="card">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col" class="pl-2 pr-2">NIP</th>
                        <th scope="col" class="pl-2 pr-2">Nama</th>
                        <th scope="col" class="pl-2 pr-2">Masuk</th>
                        <th scope="col" class="pl-2 pr-2">Sakit</th>
                        <th scope="col" class="pl-2 pr-2">Izin</th>
                        <th scope="col" class="pl-2 pr-2">Cuti</th>
                        <th scope="col" class="pl-2 pr-2">Alfa</th>
                        <th scope="col" class="pl-2 pr-2">Lembur</th>
                        <th scope="col" class="pl-2 pr-2">Total Gaji</th>
                        <th scope="col" class="pl-2 pr-2">Status Hitung</th>
                        <th scope="col" class="pl-2 pr-2">Status Bayar</th>
                        <th class="text-center pl-2 pr-2" scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="pl-2 pr-2">
                            Mark
                        </td>
                        <td class="pl-2 pr-2">
                            Otto
                        </td>
                        <td class="pl-2 pr-2">
                            @mdo
                        </td>
                        <td class="pl-2 pr-2">
                            Mark
                        </td>
                        <td class="pl-2 pr-2">
                            Otto
                        </td>
                        <td class="pl-2 pr-2">
                            @mdo
                        </td>
                        <td class="pl-2 pr-2">
                            Otto
                        </td>
                        <td class="pl-2 pr-2">
                            @mdo
                        </td>
                        <td class="pl-2 pr-2">
                            Otto
                        </td>
                        <td class="pl-2 pr-2">
                            @mdo
                        </td>
                        <td class="pl-2 pr-2">
                            @mdo
                        </td>
                        <td class="pl-2 pr-2">
                            <a href="/karyawan/edit">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                </svg>
                            </a>
                        </td>
                        <td class="pl-2 pr-2">
                            <a href="/karyawan/show">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-square-fill"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection