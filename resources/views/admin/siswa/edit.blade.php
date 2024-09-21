@extends('dashboard')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ubah Data Siswa</h4>
                        <br><br>
                        <form method="post" action="{{ route('admin.siswa.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $siswa->id }}">
                            <div class="row mb-3">
                                <label for="nama_depan" class="col-sm-2 col-form-label">Nama Depan</label>
                                <div class="col-sm-10">
                                    <input name="nama_depan" class="form-control" type="text" id="nama_depan" value="{{ $siswa->nama_depan }}">
                                    @error('nama_depan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nama_belakang" class="col-sm-2 col-form-label">Nama Belakang</label>
                                <div class="col-sm-10">
                                    <input name="nama_belakang" class="form-control" type="text" id="nama_belakang" value="{{ $siswa->nama_belakang  }}">
                                    @error('nama_belakang')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="no_hp" class="col-sm-2 col-form-label">No Induk Siswa</label>
                                <div class="col-sm-10">
                                    <input name="no_induk_siswa" class="form-control" type="number" id="no_hp" value="{{ $siswa->no_induk_siswa }}">
                                    @error('no_induk_siswa')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="no_hp" class="col-sm-2 col-form-label">No Handphone</label>
                                <div class="col-sm-10">
                                    <input name="no_hp" class="form-control" type="text" id="no_hp" value="{{ $siswa->no_hp }}">
                                    @error('no_hp')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input name="alamat" class="form-control" type="text" id="alamat" value="{{ $siswa->alamat }}">
                                    @error('alamat')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <select name="jenis_kelamin" class="form-select" id="jenis_kelamin">
                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                        <option value="L" {{ $siswa->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ $siswa->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="ekstrakulikuler_id" class="col-sm-2 col-form-label">Ekstrakulikuler</label>
                                <div class="col-sm-10">
                                    <select name="ekstrakulikuler_id" class="form-select" id="ekstrakulikuler_id">
                                        @foreach($ekstrakulikulers as $ekstrakulikuler)
                                            <option value="{{ $ekstrakulikuler->id }}" {{ $siswa->ekstrakulikuler_id == $ekstrakulikuler->id ? 'selected' : '' }}>
                                                {{ $ekstrakulikuler->nama_ekstrakulikuler }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('ekstrakulikuler_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="foto" class="col-sm-2 col-form-label">Photo Siswa</label>
                                <div class="col-sm-10">
                                    <input name="foto" class="form-control" type="file" id="foto" value="{{ $siswa->foto }}">
                                    @error('foto')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="showImage" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg mt-3" src="{{ asset($siswa->foto) }} " alt="Card image cap">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Siswa">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#foto').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>
@endsection
