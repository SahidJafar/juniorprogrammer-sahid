@extends('dashboard')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h4 class="mb-2">Welcome, {{ $adminData->nama_depan }}! </h4>
                            </div>
                        </div>
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row">
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>

</div>

@endsection
