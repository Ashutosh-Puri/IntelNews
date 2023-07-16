@extends('frontend.home_dashboard')

@section('home')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="contact-wrpp">
                    <h4 class="contactAddess-title text-center">Register</h4>
                    <form method="POST" action="{{ route('register') }}" class="wpcf7-form init" enctype="multipart/form-data"
                        novalidate="novalidate" data-status="init">
                        @csrf
                        <div class="main_section">
                            <div class="row">

                                <div class="col-md-12 col-sm-12">
                                    <div class="contact-title">Name</div>
                                    <div class="contact-form">
                                        <input type="text" name="name" id="name" size="40"class="@error('name') is-invalid @enderror wpcf7-text"  placeholder="Name" />
                                        @error('name')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                        @enderror
                                      </div>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <div class="contact-title">Email *</div>
                                    <div class="contact-form">
                                        <input type="email" name="email"id="email" size="40" class="@error('email') is-invalid @enderror wpcf7-form-control wpcf7-text"placeholder="Email" />
                                        @error('email')
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                      @enderror
                                      </div>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <div class="contact-title">Password</div>
                                    <div class="contact-form">
                                        <input type="password"name="password" id="password" size="40"class=" @error('password') is-invalid @enderror wpcf7-form-control wpcf7-text" placeholder="Password" />
                                        @error('password')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                        @enderror
                                      </div>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <div class="contact-title">Password Confirmation</div>
                                    <div class="contact-form">
                                       <input type="password"name="password_confirmation" id="password_confirmation" size="40"class="@error('password_confirmation') is-invalid @enderror wpcf7-form-control wpcf7-text" placeholder="Password Confirmation" />
                                        @error('password_confirmation')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                        @enderror
                                      </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="contact-btn">
                                        <input type="submit" value="Register Now"
                                            class="wpcf7-form-control has-spinner wpcf7-submit" /><span
                                            class="wpcf7-spinner"></span>
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
