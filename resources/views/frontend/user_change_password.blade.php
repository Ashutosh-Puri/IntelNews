@extends('frontend.home_dashboard')
@section('title') 
    User Password Change
@endsection
@section('home')
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="contact-wrpp">
                <figure class="authorPage-image">
                  <img  src="{{ (!empty($userData->photo)) ? asset($userData->photo) : asset('upload/no_image.jpg') }}" class="avatar avatar-96 photo"  height="96"  width="96" loading="lazy" />
                </figure>
                <h1 class="authorPage-name">
                  <a href=" "> {{ $userData->name }} </a>
                </h1>
                <h6 class="authorPage-name">{{ $userData->email }}</h6>

                <ul>
                  <li>
                    <a href="{{ route('user.dashboard') }}"><b>🟢 Your Profile </b></a>
                  </li>
                  <li>
                    <a href="{{ route('user.logout') }}"> <b>🟠 Logout </b> </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-8">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="contact-wrpp">
                <h4 class="contactAddess-title text-center">
                  Change Password
                </h4>
                <div
                  role="form"
                  class="wpcf7"
                  id="wpcf7-f437-o1"
                  lang="en-US"
                  dir="ltr"
                >
                  <div class="screen-reader-response">
                    <p
                      role="status"
                      aria-live="polite"
                      aria-atomic="true"
                    ></p>
                    <ul></ul>
                  </div>

                    <div style="display: none"></div>

                    <form action="{{ route('user.change.password.store') }}" method="post" enctype="multipart/form-data">

                        @csrf

                        <div class="main_section">

                        <div class="row">

                            @if (session('status'))

                                <div class="alert alert-success" role="alert">

                                    {{ session('status') }}

                                </div>

                            @elseif(session('error'))

                                <div class="alert alert-danger" role="alert">

                                    {{ session('error') }}

                                </div>

                            @endif

                            <div class="col-md-12 col-sm-12">
                                <div class="contact-title">Old Password</div>
                                <div class="contact-form">
                                    <span class="wpcf7-form-control-wrap sub_title"
                                    ><input
                                        type="password"
                                        name="old_password"
                                        value=""
                                        size="40"
                                        class="wpcf7-form-control wpcf7-text @error('old_password') is-invalid @enderror"
                                        aria-invalid="false"
                                        placeholder="old_password"
                                    /></span>

                                    @error('old_password')

                                            <span class="text-danger">

                                                {{ $message }}

                                            </span>

                                        @enderror

                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="contact-title">New Password</div>
                                <div class="contact-form">
                                    <span class="wpcf7-form-control-wrap sub_title"><input
                                        type="password"
                                        name="new_password"
                                        value=""
                                        size="40"
                                        class="wpcf7-form-control wpcf7-text @error('new_password') is-invalid @enderror"
                                        aria-invalid="false"
                                        placeholder="new_password"/>
                                    </span>

                                    @error('new_password')

                                        <span class="text-danger">

                                            {{ $message }}

                                        </span>

                                    @enderror

                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="contact-title">Password Confirmation</div>
                                <div class="contact-form">
                                    <span class="wpcf7-form-control-wrap sub_title"
                                    ><input
                                        type="password"
                                        name="confirm_password"
                                        value=""
                                        size="40"
                                        class="wpcf7-form-control wpcf7-text @error('confirm_password') is-invalid @enderror"
                                        aria-invalid="false"
                                        placeholder="confirm_password"
                                    /></span>

                                    @error('confirm_password')

                                            <span class="text-danger">

                                                {{ $message }}

                                            </span>

                                        @enderror

                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                            <div class="contact-btn">
                                <input
                                type="submit"
                                value="Save Changes"
                                class="wpcf7-form-control has-spinner wpcf7-submit"
                                /><span class="wpcf7-spinner"></span>
                            </div>
                            </div>
                        </div>
                        </div>

                    </form>

                    <div
                      class="wpcf7-response-output"
                      aria-hidden="true"
                    ></div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--  // end row -->
    </div>

    <script type="text/javascript">

        // Code untuk mengganti foto sesuai dengan input type file dengan change event jquery.

        $(document).ready(function() {

            $('#image').change(function(e) {

                var reader = new FileReader();

                reader.onload = function(e) {

                    $('#showImage').attr('src',e.target.result);

                }

                reader.readAsDataURL(e.target.files['0']);

            });

        });

    </script>


@endsection
