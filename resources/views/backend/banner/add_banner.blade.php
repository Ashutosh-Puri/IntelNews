@extends('admin.admin_dashboard')
@section('title')
    Add Banner
@endsection
@section('admin')

<div class="content">

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <a href="{{ route('all.banner') }}" class="btn btn-success waves-effect waves-light">
                           Back <span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
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
                        <h4 class="header-title">Add Banner</h4>


                        <form method="post" action="{{ route('store.banner') }}" id="myForm" enctype="multipart/form-data">

                            @csrf
                            <div class="mb-3 form-group">

                                <label for="image" class="form-label">Home Banner One</label>

                                <input type="file" id="image1" name="home_one" class="form-control @error('home_one') is-invalid @enderror">
                                @error('home_one')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">

                                <img id="showImage" src="{{  url('upload/no_image.jpg') }}" class="rounded img-fluid" width="200" alt="profile-image">

                            </div>

                            <div class="mb-3 form-group">

                                <label for="image" class="form-label">Home Banner Two</label>

                                <input type="file" id="image2" name="home_two" class="form-control @error('home_two') is-invalid @enderror">
                                @error('home_two')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">

                                <img id="showImage2" src="{{ url('upload/no_image.jpg') }}" class="rounded img-fluid" width="200" alt="profile-image">

                            </div>

                            <div class="mb-3 form-group">

                                <label for="image" class="form-label">Home Banner Three</label>

                                <input type="file" id="image3" name="home_three" class="form-control @error('home_three') is-invalid @enderror">
                                @error('home_three')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">

                                <img id="showImage3" src="{{  url('upload/no_image.jpg') }}" class="rounded img-fluid" width="200" alt="profile-image">

                            </div>

                            <div class="mb-3 form-group">

                                <label for="image" class="form-label">Home Banner Four</label>

                                <input type="file" id="image4" name="home_four" class="form-control @error('home_four') is-invalid @enderror">
                                @error('home_four')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">

                                <img id="showImage4" src="{{  url('upload/no_image.jpg') }}" class="rounded img-fluid" width="200" alt="profile-image">

                            </div>

                            <div class="mb-3 form-group">

                                <label for="image" class="form-label">News Category Banner</label>

                                <input type="file" id="image5" name="news_category_one" class="form-control @error('news_category_one') is-invalid @enderror">
                                @error('news_category_one')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">

                                <img id="showImage5" src="{{  url('upload/no_image.jpg') }}" class="rounded img-fluid" width="200" alt="profile-image">

                            </div>

                            <div class="mb-3 form-group">

                                <label for="image" class="form-label">News Detail Banner</label>

                                <input type="file" id="image6" name="news_details_one" class="form-control @error('news_details_one') is-invalid @enderror">
                                @error('news_details_one')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">

                                <img id="showImage6" src="{{  url('upload/no_image.jpg') }}" class="rounded img-fluid" width="200" alt="profile-image">

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

    // Code untuk mengganti foto sesuai dengan input type file dengan change event jquery.

    $(document).ready(function() {

        $('#image1').change(function(e) {

            var reader = new FileReader();

            reader.onload = function(e) {

                $('#showImage').attr('src',e.target.result);

            }

            reader.readAsDataURL(e.target.files['0']);

        });

    });

</script>

<script type="text/javascript">

    // Code untuk mengganti foto sesuai dengan input type file dengan change event jquery.

    $(document).ready(function() {

        $('#image2').change(function(e) {

            var reader = new FileReader();

            reader.onload = function(e) {

                $('#showImage2').attr('src',e.target.result);

            }

            reader.readAsDataURL(e.target.files['0']);

        });

    });

</script>

<script type="text/javascript">

    // Code untuk mengganti foto sesuai dengan input type file dengan change event jquery.

    $(document).ready(function() {

        $('#image3').change(function(e) {

            var reader = new FileReader();

            reader.onload = function(e) {

                $('#showImage3').attr('src',e.target.result);

            }

            reader.readAsDataURL(e.target.files['0']);

        });

    });

</script>

<script type="text/javascript">

    // Code untuk mengganti foto sesuai dengan input type file dengan change event jquery.

    $(document).ready(function() {

        $('#image4').change(function(e) {

            var reader = new FileReader();

            reader.onload = function(e) {

                $('#showImage4').attr('src',e.target.result);

            }

            reader.readAsDataURL(e.target.files['0']);

        });

    });

</script>

<script type="text/javascript">

    // Code untuk mengganti foto sesuai dengan input type file dengan change event jquery.

    $(document).ready(function() {

        $('#image5').change(function(e) {

            var reader = new FileReader();

            reader.onload = function(e) {

                $('#showImage5').attr('src',e.target.result);

            }

            reader.readAsDataURL(e.target.files['0']);

        });

    });

</script>

<script type="text/javascript">

    // Code untuk mengganti foto sesuai dengan input type file dengan change event jquery.

    $(document).ready(function() {

        $('#image6').change(function(e) {

            var reader = new FileReader();

            reader.onload = function(e) {

                $('#showImage6').attr('src',e.target.result);

            }

            reader.readAsDataURL(e.target.files['0']);

        });

    });


</script>

@endsection
