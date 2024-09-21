@extends('dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Ubah Data Ekstrakulikuler</h4> <br><br>
            <form method="post" action="{{ route('admin.ekstrakulikuler.update') }}" >
                @csrf
                <input type="hidden" name="id" value="{{ $ekstrakulikuler->id }}">
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Nama Ekstrakulikuler</label>
                <div class="col-sm-10">
                    <input name="nama_ekstrakulikuler" class="form-control" type="text" id="example-text-input" value="{{ $ekstrakulikuler->nama_ekstrakulikuler }}">
                    @error('nama_ekstrakulikuler')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Tahun Mulai</label>
                <div class="col-sm-10">
                    <input name="tahun_mulai" class="form-control" type="number" id="example-text-input" value="{{ $ekstrakulikuler->tahun_mulai }}">
                    @error('tahun_mulai')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Ekstrakulikuler">
            </form>
        </div>
    </div>
</div> <!-- end col -->
</div>
</div>
</div>
@endsection
