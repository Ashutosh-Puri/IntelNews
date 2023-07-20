@extends('frontend.home_dashboard')
@section('title')
  Login
@endsection
@section('home')

<div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-12">
        <div class="contact-wrpp">
          <h4 class="contactAddess-title text-center">Login</h4>
            <form action="{{ route('login') }}" method="POST" class="wpcf7-form init" enctype="multipart/form-data" novalidate="novalidate" data-status="init">

            @csrf

            @if (session('status'))

                <div class="alert alert-success p-2 m-1" role="alert">

                    {{ session('status') }}

                </div>

            @elseif(session('error'))

                <div class="alert alert-danger p-2 m-1" role="alert">

                    {{ session('error') }}

                </div>

            @endif
              <div class="main_section">
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="contact-title">Email *</div>
                    <div class="contact-form">
                      <input type="email"name="email" id="email"size="40"class="@error('email') is-invalid @enderror wpcf7-text" placeholder="Email"/>
                      @error('email')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-12 col-sm-12">
                    <div class="contact-title">Password *</div>
                      <input type="password"name="password"id="password"size="40"class="@error('password') is-invalid @enderror wpcf7-form-control wpcf7-text"placeholder="Password"/>
                      @error('password')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="contact-btn">
                      <input type="submit"value="Login Now"class="wpcf7-form-control has-spinner wpcf7-submit"/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wpcf7-response-output" aria-hidden="true"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
