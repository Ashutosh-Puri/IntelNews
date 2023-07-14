@extends('admin.admin_dashboard')

@section('admin')

<div class="content">

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <a href="{{ route('all.video.gallery') }}" class="btn btn-success waves-effect waves-light">
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

                        <h4 class="header-title">Edit Video</h4>


                        <form method="post" action="{{ route('update.video.gallery',$video->id) }}" id="myForm" enctype="multipart/form-data">

                            @csrf
                            <div class="mb-3 form-group">
                                <label for="video_title" class="form-label">Video Title</label>
                                <input type="text" class="form-control @error('video_title') is-invalid @enderror" name="video_title" id="video_title" placeholder="Video Title" value="{{ $video->video_title }}">
                                @error('video_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">
                                <label for="video_url" class="form-label @error('video_url') is-invalid @enderror">Video URL</label>
                                <input type="text" class="form-control" name="video_url" id="video_url" placeholder="Video URL" value="{{ $video->video_url }}">
                                @error('video_url')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">
                                <label for="video_image" class="form-label">Video Image</label>
                                <input type="file" class="form-control @error('video_image') is-invalid @enderror" name="video_image" id="video_image">
                                @error('video_image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">
                                <label for="video_image" class="form-label"></label>
                                <img id="showImage" src="{{ asset($video->video_image)  }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                            </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Update Data</button>

                        </form>

                    </div> <!-- end card-body -->

                </div> <!-- end card-->

            </div> <!-- end col -->

        </div>

    </div>

</div>

<script type="text/javascript">

    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                category_name: {
                    required : true,
                },
            },
            messages :{
                category_name: {
                    required : 'Please Enter Category Name',
                },
            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>

<script type="text/javascript">

    // Code untuk mengganti foto sesuai dengan input type file dengan change event jquery.

    $(document).ready(function() {

        $('#video_image').change(function(e) {

            var reader = new FileReader();

            reader.onload = function(e) {

                $('#showImage').attr('src',e.target.result);

            }

            reader.readAsDataURL(e.target.files['0']);

        });

    });

</script>

@endsection
