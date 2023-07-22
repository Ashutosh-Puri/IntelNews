@extends('admin.admin_dashboard')
@section('title')
    Add Subscriber
@endsection
@section('admin')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a href="{{ route('all.subscriber') }}" class="btn btn-success waves-effect waves-light">
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
                            <h4 class="header-title">Add Subscriber</h4>
                            <form method="post" action="{{ route('store.subscriber') }}" id="myForm">
                                @csrf
                                <div class="mb-3 form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" placeholder="Enter Email">
                                    @error('email')
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
