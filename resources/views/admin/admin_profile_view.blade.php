@extends('admin.admin_dashboard')
@section('title')
    Admin Profile
@endsection
@section('admin')

<div class="content">

    <!-- Start Content-->

    <div class="container-fluid">

        <!-- start page title -->

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Profile</h4>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-4 col-xl-4">

                <div class="card text-center">

                    <div class="card-body">

                        <img src="{{ (!empty($adminData->photo)) ? url($adminData->photo) : url('upload/no_image.jpg') }}" class="rounded-circle avatar-xxl img-thumbnail" alt="profile-image">
                      
                        <a  id="delete" href="{{ route('admin.delete.profile.photo',$adminData->id) }}" class="align-top btn btn-sm btn-danger"> <i class="fa fa-trash"></i></a>
                        <h4 class="mb-0">{{ $adminData->name }}</h4>

                        <div class="text-start mt-3">

                            <p class="text-muted mb-2 font-13"><strong>Username :</strong> <span class="ms-2">{{ $adminData->username }}</span></p>

                            <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">{{ $adminData->name }}</span></p>

                            <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ms-2">{{ $adminData->phone }}</span></p>

                            <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2">{{ $adminData->email }}</span></p>

                            <p class="text-muted mb-2 font-13"><strong>Role :</strong> <span class="ms-2">{{ $adminData->role }}</span></p>
                        </div>
                    </div>
                </div> <!-- end card -->

            </div> <!-- end col-->

            <div class="col-lg-8 col-xl-8">

                <div class="card">

                    <div class="card-body">

                        <form action="{{ route('admin.store.profile') }}" method="post" enctype="multipart/form-data">

                            @csrf

                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i>Admin Personal Info</h5>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="mb-3">

                                        <label for="name" class="form-label">Name</label>

                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your name" value="{{ $adminData->name }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="mb-3">

                                        <label for="username" class="form-label">Username</label>

                                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Enter your username" value="{{ $adminData->username }}">
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="mb-3">

                                        <label for="email" class="form-label">Email</label>

                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" value="{{ $adminData->email }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="mb-3">

                                        <label for="phone" class="form-label">Phone Number</label>

                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Enter your phone" value="{{ $adminData->phone }}">
                                        @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="mb-3">

                                        <label for="image" class="form-label">Admin Profile Picture</label>

                                        <input type="file" id="image" name="photo" class="form-control @error('photo') is-invalid @enderror">
                                        @error('photo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="mb-3">

                                        <img id="showImage" src="{{ (!empty($adminData->photo)) ? asset($adminData->photo) : url('upload/no_image.jpg') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                                    </div>

                                </div>

                            </div>

                            <div class="text-end">

                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Update</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script type="text/javascript">

    // Code untuk mengganti foto sesuai dengan input type file dengan change event jquery.

    $(document).ready(function() {

        $('#image').change(function(e) {

            var reader = new FileReader();

            reader.onload = function(e) {

                $('#showImage').attr('src',e.target.result);

            }

            reader.readAsDataURL(e.target.files['0']);

        });

    });

</script>

@endsection
