@extends('admin.admin_dashboard')
@section('title')
    Edit Sub Category
@endsection
@section('admin')

<div class="content">

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                         <a href="{{ route('all.sub.category') }}" class="btn btn-success waves-effect waves-light">
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
                        <h4 class="header-title">Edit Sub Category</h4>

                        <form method="post" action="{{ route('sub.category.update',$subcategory->id) }}" id="myForm">

                            @csrf
                            <div class="mb-3 form-group">

                                <label for="category_name" class="form-label">Select One Category</label>

                                <select class="form-select @error('category_name') is-invalid @enderror" id="category_name" name="category_name">

                                    <option hidden value="">Select One Category</option>

                                    @foreach ($categories as $category)

                                        <option value="{{ $category->id }}" {{ ($category->id == $subcategory->category_id ? 'selected' : '' ) }} > {{ $category->category_name }} </option>

                                    @endforeach

                                </select>
                                @error('category_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            </div>

                            <div class="mb-3 form-group">
                                <label for="subcategory_name" class="form-label">Sub Category Name</label>
                                <input type="text" class="form-control @error('subcategory_name') is-invalid @enderror" name="subcategory_name" id="subcategory_name" placeholder="Enter Sub Category Name" value="{{ $subcategory->subcategory_name }}">
                                @error('subcategory_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <button type="submit" class="btn btn-primary waves-effect waves-light">Update Data</button>

                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->


    </div>

</div>
@endsection
