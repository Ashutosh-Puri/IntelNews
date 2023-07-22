@extends('admin.admin_dashboard')
@section('title')
    Edit Permission
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
                            <h4 class="header-title">Edit Permission</h4>                
                            <form method="post" action="{{ route('update.permission',$permission->id) }}" id="myForm">
                                @csrf
                                <div class="mb-3 form-group">
                                    <label for="name" class="form-label">Permission Name</label>
                                    <input type="text" value="{{ $permission->name }}" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="1234 Main St">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="group_name" class="form-label">Group Name</label>
                                    <select class="form-select @error('group_name') is-invalid @enderror" id="group_name" name="group_name">
                                        <option hidden value="">Select One Category</option>
                                        <option value="category" {{ $permission->group_name == 'category' ? 'selected' : '' }} >Category</option>
                                        <option value="subcategory" {{ $permission->group_name == 'subcategory' ? 'selected' : '' }}>Sub Category</option>                                       
                                        <option value="news" {{ $permission->group_name == 'news' ? 'selected' : '' }}>News Post</option>
                                        <option value="banner" {{ $permission->group_name == 'banner' ? 'selected' : '' }}>Banner</option>
                                        <option value="photo" {{ $permission->group_name == 'photo' ? 'selected' : '' }}>Photo</option>
                                        <option value="video" {{ $permission->group_name == 'video' ? 'selected' : '' }}>Video</option>
                                        <option value="live" {{ $permission->group_name == 'live' ? 'selected' : '' }}>Live TV</option>
                                        <option value="review"{{ $permission->group_name == 'review' ? 'selected' : '' }}>Review</option>
                                        <option value="seo"{{ $permission->group_name == 'seo' ? 'selected' : '' }}>SEO Setting</option>
                                        <option value="site"{{ $permission->group_name == 'site' ? 'selected' : '' }}>Site Setting</option>
                                        <option value="admin"{{ $permission->group_name == 'admin' ? 'selected' : '' }}>Admin Setting</option>
                                        <option value="user"{{ $permission->group_name == 'user' ? 'selected' : '' }}>User Setting</option>
                                        <option value="role" {{ $permission->group_name == 'role' ? 'selected' : '' }}>Role & Permission</option>
                                        <option value="contact" {{ $permission->group_name == 'contact' ? 'selected' : '' }}>Contacts</option>
                                        <option value="subscriber" {{ $permission->group_name == 'subscriber' ? 'selected' : '' }}>Subscribers</option>
                                        <option value="ad" {{ $permission->group_name == 'ad' ? 'selected' : '' }}>Ads</option>
                                        <option value="audio" {{ $permission->group_name == 'audio' ? 'selected' : '' }}>Audio</option>
                                    </select>
                                    @error('group_name')
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
