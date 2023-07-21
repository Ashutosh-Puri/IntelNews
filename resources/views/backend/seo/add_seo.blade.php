@extends('admin.admin_dashboard')
@section('title')
    Add SEO
@endsection
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
                        <h4 class="header-title">Add SEO</h4>
                      
                        <form method="post" action="{{ route('store.seo') }}" id="myForm">

                            @csrf

                            <div class="mb-3 form-group">
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" id="meta_title" placeholder="Enter Meta Title" value="{{ old('meta_title') }}">
                                @error('meta_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">
                                <label for="meta_author" class="form-label">Meta Author</label>
                                <input type="text" class="form-control @error('meta_author') is-invalid @enderror" name="meta_author" id="meta_author" placeholder="Enter Meta Author" value="{{ old('meta_author') }}">
                                @error('meta_author')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror                           
                            </div>

                            <div class="mb-3 form-group">

                                <label class="form-label">Meta Keyword</label>
                                <input type="text" class="selectize-close-btn @error('meta_keyword') is-invalid @enderror" name="meta_keyword" placeholder="Enter Meta Keyword" value="{{ old('meta_keyword')=='News,Breaking News'?'News,Breaking News':old('meta_keyword'); }}">
                                @error('meta_keyword')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">

                                <label for="meta_description" class="form-label">Meta Description</label>

                                <input type="text" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" id="meta_description" placeholder="Enter Meta Description" value="{{ old('meta_description')  }}">
                                @error('meta_description')
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
@endsection
