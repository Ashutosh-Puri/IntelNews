@extends('admin.admin_dashboard')

@section('admin')

<div class="content">

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <a href="{{ route('add.permission') }}" class="btn btn-success waves-effect waves-light">
                            Add Permission<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
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
                        <h4 class="header-title">Add Permission</h4>


                        <form method="post" action="{{ route('store.permission') }}" id="myForm">

                            @csrf


                            <div class="mb-3 form-group">
                                <label for="name" class="form-label">Permission Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="1234 Main St">
                            </div>

                            <div class="mb-3 form-group">

                                <label for="group_name" class="form-label">Group Name</label>

                                <select class="form-select" id="group_name" name="group_name">

                                    <option>Select One Category</option>

                                    <option value="category">Category</option>

                                    <option value="subcategory">Sub Category</option>

                                    <option value="banner">Banner</option>

                                    <option value="news">News Post</option>

                                    <option value="photo">Photo</option>

                                    <option value="video">Video</option>

                                    <option value="live">Live Video</option>

                                    <option value="review">Review</option>

                                    <option value="seo">SEO</option>

                                    <option value="admin">Admin Setting</option>

                                    <option value="role">Role & Permission</option>

                                </select>

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

@endsection
