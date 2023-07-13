@extends('admin.admin_dashboard')

@section('admin')

<div class="content">

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <a href="{{ route('all.seo') }}" class="btn btn-success waves-effect waves-light">
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
                        <h4 class="header-title">Update SEO</h4>
                       

                        <form method="post" action="{{ route('update.seo',$seo->id) }}" id="myForm">

                            @csrf

                            <div class="mb-3 form-group">
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="1234 Main St" value="{{ $seo->meta_title }}">
                            </div>

                            <div class="mb-3 form-group">
                                <label for="meta_author" class="form-label">Meta Author</label>
                                <input type="text" class="form-control" name="meta_author" id="meta_author" placeholder="1234 Main St" value="{{ $seo->meta_author }}">
                            </div>

                            <div class="mb-3 form-group">

                                <label class="form-label">Meta Keyword</label>

                                <input type="text" class="selectize-close-btn" name="meta_keyword" value="{{ $seo->meta_keyword }}"">

                            </div>

                            <div class="mb-3 form-group">

                                <label for="meta_description" class="form-label">Meta Description</label>

                                <input type="text" class="form-control" name="meta_description" id="meta_description" placeholder="1234 Main St" value="{{ $seo->meta_description }}">

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
