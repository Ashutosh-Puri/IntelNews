@extends('admin.admin_dashboard')
@section('title')
    Add Contact
@endsection
@section('admin')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a href="{{ route('all.contact') }}" class="btn btn-success waves-effect waves-light">
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
                            <h4 class="header-title">Add Contact</h4>
                            <form method="post" action="{{ route('store.contact') }}" id="myForm">
                                @csrf
                                <div class="mb-3 form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="name" placeholder="Enter Name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" placeholder="Enter Email">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone"  value="{{ old('phone') }}" id="phone" placeholder="Enter Phone">
                                    @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" value="{{ old('subject') }}" placeholder="Enter Subject">
                                    @error('subject')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea name="message"class="form-control @error('message') is-invalid @enderror" id="" cols="30" rows="10"> {{ old('message') }}</textarea>
                                   
                                    @error('message')
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
