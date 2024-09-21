<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- DataTables -->
        <link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    </head>
    <body>
        @include('layouts.navbar')

        <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Siswa</h4>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Induk Siswa</th>
                                <th>Nama Depan</th>
                                <th>No Handphone</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Ekstrakulikuler</th>
                                <th>Foto</th>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($siswas as $item)
                            <tr>
                                <td> {{ $i++}} </td>
                                <td> {{ $item->no_induk_siswa }} </td>
                                <td> {{ $item->nama_depan }} </td>
                                <td> {{ $item->no_hp }} </td>
                                <td> {{ $item->alamat }} </td>
                                <td> {{ $item->jenis_kelamin }} </td>
                                <td> {{ $item->ekstrakulikuler->nama_ekstrakulikuler }} </td>
                                <td> <img src="{{ asset($item->foto) }}" width="100px" height="100px"> </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        </div> <!-- container-fluid -->

    </body>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</html>
