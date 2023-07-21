@extends('admin.admin_dashboard')
@section('title')
    Add Site Setting
@endsection
@section('admin')

<div class="content">

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <a href="{{ route('all.site.setting') }}" class="btn btn-success waves-effect waves-light">
                            Back<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                        </a>
                    </div>
                    <h4 class="page-title">Datatables</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- Form row -->
        <div class="row">

            <div class="col-12">

                <div class="card">

                    <div class="card-body">

                        <h4 class="header-title">Add Site Setting</h4>


                        <form method="post" action="{{ route('store.site.setting') }}" id="myForm" enctype="multipart/form-data">

                            @csrf

                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="dev_name" class="form-label">Developer Name</label>
                                        <input type="text" class="form-control @error('dev_name') is-invalid @enderror" name="dev_name" value="{{ old('dev_name') }}" id="dev_name" placeholder="Enter Developer Name" value="{{ old('dev_name') }}">
                                        @error('dev_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="dev_company" class="form-label">Developer Company</label>
                                        <input type="text" class="form-control @error('dev_company') is-invalid @enderror" name="dev_company"value="{{ old('dev_company') }}" id="dev_company" placeholder="Enter Developer Company" value="{{ old('dev_company') }}">
                                        @error('dev_company')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="dev_site" class="form-label">Developer Site</label>
                                        <input type="text" class="form-control @error('dev_site') is-invalid @enderror" name="dev_site" value="{{ old('dev_site') }}"id="dev_site" placeholder="Enter Developer Site" value="{{ old('dev_site') }}">
                                        @error('dev_site')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" id="address" placeholder="Enter Address" value="{{ old('address') }}">
                                        @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" placeholder="Enter Email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" id="phone" placeholder="Enter Phone" value="{{ old('phone') }}">
                                        @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <div class="mb-3 form-group">
                                        <label for="social_icon_1" class="form-label">Social Icon One</label>
                                        <input type="text" class="form-control @error('social_icon_1') is-invalid @enderror" name="social_icon_1" value="{{ old('social_icon_1') }}" id="social_icon_1" placeholder="Enter Social Icon One" value="{{ old('social_icon_1') }}">
                                        @error('social_icon_1')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="mb-3 form-group">
                                        <label for="social_1_url" class="form-label">Social URL One</label>
                                        <input type="text" class="form-control @error('social_1_url') is-invalid @enderror" name="social_1_url" value="{{ old('social_1_url') }}" id="social_1_url" placeholder="Enter Social URL One" value="{{ old('social_1_url') }}">
                                        @error('social_1_url')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="mb-3 form-group">
                                        <label for="social_icon_2" class="form-label">Social Icon Two</label>
                                        <input type="text" class="form-control @error('social_icon_2') is-invalid @enderror" name="social_icon_2" value="{{ old('social_icon_2') }}" id="social_icon_2" placeholder="Enter Social Icon Two" value="{{ old('social_icon_2') }}">
                                        @error('social_icon_2')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="mb-3 form-group">
                                        <label for="social_2_url" class="form-label">Social URL Two</label>
                                        <input type="text" class="form-control @error('social_2_url') is-invalid @enderror" name="social_2_url" value="{{ old('social_2_url') }}" id="social_2_url" placeholder="Enter Social URL Two" value="{{ old('social_2_url') }}">
                                        @error('social_2_url')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="mb-3 form-group">
                                        <label for="social_icon_3" class="form-label">Social Icon Three</label>
                                        <input type="text" class="form-control @error('social_icon_3') is-invalid @enderror" name="social_icon_3" value="{{ old('social_icon_3') }}" id="social_icon_3" placeholder="Enter Social Icon Three" value="{{ old('social_icon_3') }}">
                                        @error('social_icon_3')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="mb-3 form-group">
                                        <label for="social_3_url" class="form-label">Social URL Three</label>
                                        <input type="text" class="form-control @error('social_3_url') is-invalid @enderror" name="social_3_url" value="{{ old('social_3_url') }}" id="social_3_url" placeholder="Enter Social URL Three" value="{{ old('social_3_url') }}">
                                        @error('social_3_url')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="mb-3 form-group">
                                        <label for="social_icon_4" class="form-label">Social Icon Four</label>
                                        <input type="text" class="form-control @error('social_icon_4') is-invalid @enderror" name="social_icon_4" value="{{ old('social_icon_4') }}" id="social_icon_4" placeholder="Enter Social Icon Four" value="{{ old('social_icon_4') }}">
                                        @error('social_icon_4')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="mb-3 form-group">
                                        <label for="social_4_url" class="form-label">Social URL Four</label>
                                        <input type="text" class="form-control @error('social_4_url') is-invalid @enderror" name="social_4_url" value="{{ old('social_4_url') }}" id="social_4_url" placeholder="Enter Social URL Four" value="{{ old('social_4_url') }}">
                                        @error('social_4_url')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-9 col-md-3">                                  
                                    <div class="mb-3 form-group">
                                        <label for="logo_small" class="form-label">Logo Small</label>
                                        <input type="file" class="form-control  @error('logo_small') is-invalid @enderror" name="logo_small" id="logo_small"   >
                                        @error('logo_small')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-3 col-md-1">
                                    <div class="mb-3 form-group">
                                        <label for="logo_small" class="form-label"></label>
                                        <img id="showImage1" src="{{ asset('upload/no_image.jpg') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                    </div>
                                </div>
                                <div class="col-9 col-md-3">
                                    <div class="mb-3 form-group">
                                        <label for="logo_large" class="form-label">Logo Large</label>
                                        <input type="file" class="form-control  @error('logo_large') is-invalid @enderror" name="logo_large" id="logo_large"   >
                                        @error('logo_large')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-3 col-md-1">
                                    <div class="mb-3 form-group">
                                        <label for="logo_large" class="form-label"></label>
                                        <img id="showImage2" src="{{ asset('upload/no_image.jpg') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                    </div>
                                </div>
                                <div class="col-9 col-md-3">
                                    <div class="mb-3 form-group">
                                        <label for="favicon" class="form-label">Favicon</label>
                                        <input type="file" class="form-control  @error('favicon') is-invalid @enderror" name="favicon" id="favicon"   >
                                        @error('favicon')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-3 col-md-1">
                                    <div class="mb-3 form-group">
                                        <label for="favicon" class="form-label"></label>
                                        <img id="showImage3" src="{{ asset('upload/no_image.jpg') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#logo_small').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage1').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

    $(document).ready(function() {
        $('#logo_large').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage2').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

    $(document).ready(function() {
        $('#favicon').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage3').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
