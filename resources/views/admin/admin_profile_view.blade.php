@extends('dashboard')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                       <table width="300px">
                        <tr>
                            <td>
                                Nama Depan
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                {{ $adminData->nama_depan }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nama Belakang
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                {{ $adminData->nama_belakang }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tanggal Lahir
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                {{ $adminData->tgl_lahir }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Jenis Kelamin
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                {{ $adminData->jenis_kelamin }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Email
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                {{ $adminData->email }}
                            </td>
                        </tr>

                       </table>

                       <center class="mt-3">
                        <a href="{{ route('admin.profile.edit') }}">
                            <button class="btn btn-primary btn-rounded waves-effect waves-light">
                             Edit Profile
                            </button>
                         </a>
                       </center>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
