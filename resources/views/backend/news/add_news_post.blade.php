@extends('admin.admin_dashboard')

@section('admin')

<div class="content">

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <a href="{{ route('all.news.post') }}" class="btn btn-success waves-effect waves-light">
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
                        <h4 class="header-title">Add News Post</h4>


                        <form method="post" action="{{ route('news.post.store') }}" id="myForm" enctype="multipart/form-data">

                            @csrf

                            <div class="mb-3">

                                <label for="category_id" class="form-label">Category</label>

                                <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">

                                    <option value="" hidden>Select Category</option>

                                    @foreach ($categories as $category)

                                        <option {{ $category->id==old('category_id')?'selected':''; }} value="{{ $category->id }}"> {{ $category->category_name }} </option>

                                    @endforeach

                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <div class="mb-3">

                                <label for="subcategory_id" class="form-label">Sub Category</label>

                                <select class="form-select @error('subcategory_id') is-invalid @enderror" id="subcategory_id" name="subcategory_id">

                                    <option value="" hidden> Select Sub Category</option>

                                </select>
                                @error('subcategory_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <div class="mb-3">

                                <label for="user_id" class="form-label">Writter</label>

                                <select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id">

                                    <option value="" hidden>Select Writter</option>

                                    @foreach ($adminuser as $user)

                                        <option {{ $user->id==old('user_id')?'selected':''; }} value="{{ $user->id }}"> {{ $user->name }} </option>

                                    @endforeach

                                </select>
                                @error('user_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <div class="mb-3 form-group">

                                <label for="news_title" class="form-label">News Title</label>

                                <input type="text" class="form-control @error('news_title') is-invalid @enderror" value="{{ old('news_title') }}" name="news_title" id="news_title" placeholder="Enter News Title">
                                @error('news_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <div class="mb-3 form-group">

                                <label class="form-label">Tags</label>

                                <input type="text" class="selectize-close-btn @error('tags') is-invalid @enderror" value="{{ old('tags')=='News,Breaking News'?'News,Breaking News':old('tags'); }}" name="tags" >
                                @error('tags')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group form-check-primary form-check">

                                <input class="form-check-input @error('breaking_news') is-invalid @enderror" type="checkbox" value="1" {{ old('breaking_news')==true?'checked':''; }} id="breaking_news" name="breaking_news" >

                                <label class="form-check-label" for="breaking_news">Breaking News</label>
                                @error('breaking_news')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group form-check-success form-check">

                                <input class="form-check-input @error('top_slider') is-invalid @enderror" type="checkbox" value="1" {{ old('top_slider')==true?'checked':''; }}  id="top_slider" name="top_slider" >

                                <label class="form-check-label" for="top_slider">Top Slider</label>
                                @error('top_slider')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group form-check-danger form-check">

                                <input class="form-check-input @error('first_section_three') is-invalid @enderror" type="checkbox" value="1" {{ old('first_section_three')==true?'checked':''; }}  id="first_section_three" name="first_section_three" >

                                <label class="form-check-label" for="first_section_three">First Section Three</label>
                                @error('first_section_three')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group form-check-warning form-check">

                                <input class="form-check-input @error('first_section_nine') is-invalid @enderror" type="checkbox" value="1" {{ old('first_section_nine')==true?'checked':''; }}  id="first_section_nine" name="first_section_nine" >

                                <label class="form-check-label" for="first_section_nine">First Section Nine</label>
                                @error('first_section_nine')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">

                                <label for="image" class="form-label">News Post Picture</label>

                                <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" >
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">

                                <img id="showImage" src="{{ url('upload/no_image.jpg') }}" class="img-fluid rounded" width="200" alt="profile-image">

                            </div>

                            <div class="mb-3 form-group">

                                <label for="news_details" class="form-label">News Details</label>

                                <textarea name="news_details"  class="form-control @error('news_details') is-invalid @enderror" cols="30" rows="10" placeholder="Enter News Details"> {{ old('news_details') }}</textarea>
                                {{-- <textarea name="news_details" id="mytextarea" cols="30" rows="10"></textarea> --}}
                                @error('news_details')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save Data</button>

                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->


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

<script type="text/javascript">

    $(document).ready(function(){

        $('select[name="category_id"]').on('change', function(){

            var category_id = $(this).val();

            if (category_id) {

                $.ajax({

                    url: "{{ url('/subcategory/ajax') }}/"+category_id,
                    type: "GET",
                    dataType: "json",

                    success:function(data){

                        $('select[name="subcategory_id"]').html('');
                        var d =$('select[name="subcategory_id"]').empty();

                        $.each(data, function(key, value){

                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'"> ' + value.subcategory_name + '</option>');

                        });

                    },

                });

            }

            else{

                alert('danger');

            }

        });

    });

</script>

@endsection
