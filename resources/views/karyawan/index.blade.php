@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mt-4">
        <div class="card ">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col" colspan="6">Filter</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            NIP
                        </td>
                        <td>
                           <input type="text" class="form-control" id="nip">
                        </td>
                        <td>
                            NIK
                        </td>
                        <td>
                            <input type="text" class="form-control" id="nip">
                        </td>
                        <td>
                            Tipe Karyawan
                        </td>
                        <td>
                            <select class="form-control" id="" >
                                <option value=""></option>
                                <option value="">3</option>
                                <option value="">2</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Nama
                        </td>
                        <td>
                            <input type="text" class="form-control" id="nip">
                        </td>
                        <td>
                            Status
                        </td>
                        <td>
                            <select class="form-control" id="" >
                                <option value=""></option>
                                <option value="">3</option>
                                <option value="">2</option>
                            </select>
                        </td>
                        <td>
                            Jenis Kelamin
                        </td>
                        <td>
                            <select class="form-control" id="" >
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
        <div class="row d-flex justify-content-between">
            <div class="ml-4">
                <h5>Data Karyawan</h5>
            </div>
            <div class="mr-4">
                <h5><a href="/karyawan/create">Masukan Data Karyawan</a> | <a href="">Upload Data Karyawan</a></h5>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="mt-2">
        <div class="card">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIK</th>
                        <th scope="col">No. Telpon</th>
                        <th scope="col">Status Karyawan</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th class="text-center" scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            Mark
                        </td>
                        <td>
                            Otto
                        </td>
                        <td>
                            @mdo
                        </td>
                        <td>
                            Mark
                        </td>
                        <td>
                            Otto
                        </td>
                        <td>
                            @mdo
                        </td>
                        <td>
                            <a href="">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                </svg>
                            </a>
                        </td>
                        <td>
                            <a href="">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-square-fill" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
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