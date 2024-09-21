@extends('dashboard')
@section('admin')

 <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Data Ekstrakulikuler</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Ekstrakulikuler</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Ekstrakulikuler</th>
                            <th>Tahun Mulai</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        	@php($i = 1)
                        	@foreach($ekstrakulikulers as $item)
                        <tr>
                            <td> {{ $i++}} </td>
                            <td> {{ $item->nama_ekstrakulikuler }} </td>
                            <td> {{ $item->tahun_mulai }} </td>
                            <td>
                            <a href="{{ route('admin.ekstrakulikuler.edit', $item->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                            <a href="{{ route('admin.ekstrakulikuler.delete', $item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
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
