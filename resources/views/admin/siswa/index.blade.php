@extends('dashboard')
@section('admin')

 <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Data Siswa</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
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
                            <th>Action</th>
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
                            <td>
                            <a href="{{ route('admin.siswa.edit', $item->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                            <a href="{{ route('admin.siswa.delete', $item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
@endsection
