@extends('frontend.home_dashboard')

@section('home')
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="contact-wrpp">
            <figure class="authorPage-image">
              <img alt="" src="{{ !empty($userData->photo) ? asset($userData->photo) : asset('upload/no_image.jpg') }}"
                class="avatar avatar-96 photo" height="96" width="96" loading="lazy" />

              <a id="delete" href="{{ route('user.delete.profile.photo', $userData->id) }}"
                class="align-top btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </figure>
            <h1 class="authorPage-name">{{ $userData->name }} </h1>

            <ul>

              <li class=""> Name : {{ $userData->name }}</li>
              <li class=""> Username : {{ $userData->username }}</li>
              <li class=""> Email : {{ $userData->email }}</li>
              <li class=""> Phone : {{ $userData->phone }}</li>
              <li class=""> Role: {{ $userData->role }}</li>
              <li><br></li>
              <li>
                <a href="{{ route('user.change.password') }}"> <b>🔵 Change Password </b> </a>
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
              User Account
            </h4>
            <form action="{{ route('user.store.profile') }}" method="post" enctype="multipart/form-data">

              @csrf

              <div class="main_section">

                <div class="row">

                  @if (session('status'))
                  <div class="alert alert-success p-2" role="alert">

                    {{ session('status') }}

                  </div>
                  @elseif(session('error'))
                  <div class="alert alert-danger p-2" role="alert">

                    {{ session('error') }}

                  </div>
                  @endif

                  <div class="col-md-12 col-sm-12">
                    <lable>User Name *</lable>
                    <div class="contact-form">
                      <input type="text" name="username"value="{{ $userData->username }}" size="40" class=" @error('username') is-invalid @enderror wpcf7-text"placeholder="username" /></span>
                      @error('username')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-12 col-sm-12">
                    <label>Name </label>
                    <div class="contact-form">
                      <input type="text" name="name" value="{{ $userData->name }}" size="40" class="@error('name') is-invalid @enderror wpcf7-form-control wpcf7-text"placeholder="name" /></span>
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
                      <input type="email" name="email"value="{{ $userData->email }}" size="40" class="@error('email') is-invalid @enderror wpcf7-form-control wpcf7-text" placeholder="Email" /></div>
                      @error('email')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>

                  <div class="col-md-12 col-sm-12">
                    <div class="contact-title">Phone *</div>
                    <div class="contact-form">
                    <input type="text" name="phone" value="{{ $userData->phone }}" size="40" class="@error('phone') is-invalid @enderror wpcf7-form-control wpcf7-text" placeholder="Phone" />
                    @error('phone')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                  </div>
                  </div>

                  <div class="col-md-8 col-sm-12">
                    <div class="contact-title">Photo *</div>
                    <div class="contact-form">
                        <input type="file" name="photo" size="40" class="@error('photo') is-invalid @enderror wpcf7-form-control wpcf7-text"  id="image" />
                        @error('photo')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                  </div>

                  <div class="col-md-4 col-sm-12">

                    <img id="showImage" src="{{ !empty($userData->photo) ? asset($userData->photo) :asset('upload/no_image.jpg') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image" style="width: 100px; height:100px;">

                  </div>

                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="contact-btn">
                      <input type="submit" value="Save Changes" class="wpcf7-form-control has-spinner wpcf7-submit" /><span class="wpcf7-spinner"></span>
                    </div>
                  </div>
                </div>
              </div>

            </form>



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

                    $('#showImage').attr('src', e.target.result);

                }

                reader.readAsDataURL(e.target.files['0']);

            });

        });
</script>
@endsection