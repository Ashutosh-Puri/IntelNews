@extends('admin.admin_dashboard')

@section('admin')

<div class="content">

    <!-- Start Content-->

    <div class="container-fluid">

        <!-- start page title -->

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Admin Change Password</h4>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12 col-xl-12">

                <div class="card">

                    <div class="card-body">

                        <form action="{{ route('admin.update.password') }}" method="post">

                            @csrf

                            @if (session('status'))

                                <div class="alert alert-success" role="alert">

                                    {{ session('status') }}

                                </div>

                            @elseif(session('error'))

                                <div class="alert alert-danger" role="alert">

                                    {{ session('error') }}

                                </div>

                            @endif

                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i>Admin Personal Info</h5>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="mb-3">

                                        <label for="old_password" class="form-label">Old Password</label>

                                        <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" name="old_password" placeholder="Enter your old Password">

                                        @error('old_password')

                                            <span class="invalid-feedback">

                                                {{ $message }}

                                            </span>

                                        @enderror

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="mb-3">

                                        <label for="new_password" class="form-label">New Password</label>

                                        <input type="password" class="form-control  @error('new_password') is-invalid @enderror" name="new_password" id="new_password" placeholder="Enter your New Password">

                                        @error('new_password')

                                            <span class="invalid-feedback">

                                                {{ $message }}

                                            </span>

                                        @enderror

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="mb-3">

                                        <label for="confirm_password" class="form-label">Confirm Password</label>

                                        <input type="password" class="form-control  @error('confirm_password') is-invalid @enderror" id="confirm_password" name="confirm_password" placeholder="Confirm Your Password">

                                        @error('confirm_password')

                                            <span class="invalid-feedback">

                                                {{ $message }}

                                            </span>

                                        @enderror

                                    </div>

                                </div>

                            </div>

                            <div class="text-end">

                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i>  Change Password</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
@endsection
