@extends('admin.admin_dashboard')

@section('admin')

<div class="content">

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <a href="{{ route('all.category') }}" class="btn btn-success waves-effect waves-light">
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
                        <h4 class="header-title">Edit Category</h4>


                        <form method="post" action="{{ route('category.update',$category->id) }}" id="myForm">

                            @csrf
                            <div class="mb-3 form-group">
                                <label for="category_name" class="form-label">Category Name</label>
                                <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" id="category_name" value="{{ $category->category_name }}" placeholder="Enter Category Name">
                                @error('category_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Update Data</button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
@endsection
