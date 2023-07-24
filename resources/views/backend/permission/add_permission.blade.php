@extends('admin.admin_dashboard')
@section('title')
    Add Permission
@endsection
@section('admin')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a href="{{ route('all.permission') }}" class="btn btn-success waves-effect waves-light">
                                Back<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                            </a>
                        </div>
                        <h4 class="page-title">Datatables</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Add Permission</h4>
                            <form method="post" action="{{ route('store.permission') }}" id="myForm">
                                @csrf
                                <div class="mb-3 form-group">
                                    <label for="name" class="form-label">Permission Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter Permission Name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="group_name" class="form-label @error('group_name') is-invalid @enderror">Group Name</label>
                                    <select class="form-select" id="group_name" name="group_name">
                                        <option hidden value="">Select One Category</option>
                                        <option value="category">Category</option>
                                        <option value="subcategory">Sub Category</option> 
                                        <option value="news">News Post</option>
                                        <option value="banner">Banner</option>
                                        <option value="photo">Photo Gallery</option>
                                        <option value="video">Video Gallery</option>
                                        <option value="live">Live Tv</option>
                                        <option value="review">Review</option>
                                        <option value="seo">SEO Setting</option>
                                        <option value="site">Site Setting</option>
                                        <option value="admin">Admin Setting</option>
                                        <option value="user">User Setting</option>
                                        <option value="role">Role & Permission</option>
                                        <option value="contact">Contacts</option>
                                        <option value="subscriber">Subscribers</option>
                                        <option value="ad">Ads</option>
                                        <option value="audio">Audio</option>
                                        <option value="notification">Notification</option>

                                    </select>
                                    @error('group_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
