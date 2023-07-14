@extends('admin.admin_dashboard')

@section('admin')

<div class="content">

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <a href="{{ route('all.live.tv') }}" class="btn btn-success waves-effect waves-light">
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

                        <h4 class="header-title">Edit Live TV</h4>


                        <form method="post" action="{{ route('update.live.tv',$livetv->id) }}" id="myForm" enctype="multipart/form-data">

                            @csrf
                            

                            <div class="mb-3 form-group">
                                <label for="live_url" class="form-label">Live URL</label>
                                <input type="text" class="form-control @error('live_url') is-invalid @enderror" name="live_url" id="live_url" placeholder="Enter Live URL" value="{{ $livetv->live_url }}">
                                @error('live_url')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">
                                <label for="live_image" class="form-label">Live Image</label>
                                <input type="file" class="form-control @error('live_image') is-invalid @enderror" name="live_image" id="live_image" >
                                @error('live_image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">
                                <label for="live_image" class="form-label"></label>
                                <img id="showImage" src="{{ asset($livetv->live_image)!=null?asset($livetv->live_image):asset('upload/no_image.jpg');  }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
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

    // Code untuk mengganti foto sesuai dengan input type file dengan change event jquery.

    $(document).ready(function() {

        $('#live_image').change(function(e) {

            var reader = new FileReader();

            reader.onload = function(e) {

                $('#showImage').attr('src',e.target.result);

            }

            reader.readAsDataURL(e.target.files['0']);

        });

    });

</script>

@endsection
