
@php

$id = Auth::user()->id;



$adminData =  App\Models\User::find($id);

@endphp

<div class="navbar-custom">

    <div class="container-fluid">
        
        <ul class="list-unstyled topnav-menu float-end mb-0">
            <li>
                <a href="{{ route('home.index') }}" class="text-white nav-link dropdown-toggle arrow-none waves-effect waves-light" >
    
                    <i class="fe-home noti-icon"></i>
                </a>
            </li>
            <li class="dropdown d-none d-lg-inline-block">

               
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">

                    <i class="fe-maximize noti-icon"></i>

                </a>

            </li>

            @php

                $reviewcount = Auth::user()->unreadNotifications()->count();

            @endphp

            <li class="dropdown notification-list topbar-dropdown">

                <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">

                    <i class="fe-bell noti-icon"></i>

                    <span class="badge bg-danger rounded-circle noti-icon-badge">{{ $reviewcount }}</span>

                </a>

                <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                    <div class="dropdown-item noti-title">

                        <h5 class="m-0">

                            <span class="float-end">

                                <a href="{{ route('read.all.notification') }}" class="text-dark">

                                    <small> <i class="mdi mdi-check-all"></i> &nbsp; Mark Read All</small>

                                </a>

                            </span>Notification

                        </h5>

                    </div>

                    <!-- item-->

                    @php

                        $user =  Auth::user()->unreadNotifications()->get();

                    @endphp

                    @forelse ($user as $notification)

                        <div class="noti-scroll" data-simplebar>

                            <!-- item-->

                            <a href="{{ route('all.notification') }}" class="dropdown-item notify-item">

                                <div class="notify-icon bg-secondary">

                                    <i class="mdi mdi-heart"></i>

                                </div>

                                <p class="notify-details">{{ $notification->data['message'] }}

                                   

                                    <small class="text-muted">{{ Carbon\Carbon::parse($notification->created_at->diffForHumans()) }}</small>

                                </p>

                            </a>

                        </div>

                    @empty

                    @endforelse

                    <!-- All-->
                    <a href="{{ route('all.notification') }}" class="dropdown-item text-center text-primary notify-item notify-all">
                        View all
                        <i class="fe-arrow-right"></i>
                    </a>

                </div>
            </li>

            <li class="dropdown notification-list topbar-dropdown">

                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">

                    <img src="{{ (!empty($adminData->photo)) ? url($adminData->photo) : url('upload/no_image.jpg') }}" alt="user-image" class="rounded-circle">

                    <span class="pro-user-name ms-1">

                        {{ $adminData->name }} <i class="mdi mdi-chevron-down"></i>

                    </span>

                </a>

                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">

                    <!-- item-->

                    <div class="dropdown-header noti-title">

                        <h6 class="text-overflow m-0">Welcome !</h6>

                    </div>

                    <!-- item-->
                  

                        <a href="{{ route('user.dashboard') }}" class="dropdown-item notify-item">
    
                            <i class="mdi mdi-view-dashboard-outline"></i>
    
                            <span>User Dashboard </span>
    
                        </a>
    
                  

                    <a href="{{ route('admin.profile') }}" class="dropdown-item notify-item">

                        <i class="fa fa-user-circle"></i>

                        <span>My Account</span>

                    </a>


                    <!-- item-->

                    <a href="{{ route('admin.change.password') }}" class="dropdown-item notify-item">

                        <i class="fa fa-lock"></i>

                        <span>Change Password</span>

                    </a>

                    <div class="dropdown-divider"></div>

                    <!-- item-->

                    <a href="{{ route('admin.logout') }}" class="dropdown-item notify-item">

                        <i class="fa fa-sign-out"></i>

                        <span>Logout</span>

                    </a>

                </div>

            </li>

        </ul>

        <!-- LOGO -->

        <div class="logo-box">

            <a href="{{ route('admin.dashboard') }}" class="logo logo-dark text-center">

                <span class="logo-sm">

                    <img src="{{ isset($sitesetting->logo_small)? asset($sitesetting->logo_small):''; }}" alt="" height="50">

                   {{-- <span class="logo-lg-text-light">{{ env('APP_NAME') }}</span> --}}

                </span>

                <span class="logo-lg">

                    <img src="{{ isset($sitesetting->logo_large)? asset($sitesetting->logo_large):''; }}" alt="" height="50">

             {{-- <span class="logo-lg-text-light">{{ env('APP_NAME') }}</span>

                </span> --}}

            </a>


            <a href="{{ route('admin.dashboard') }}" class="logo logo-light text-center">

                <span class="logo-sm">

                    <img src="{{ isset($sitesetting->logo_small)? asset($sitesetting->logo_small):''; }}" alt="" height="50">

                </span>

                <span class="logo-lg">

                    <img src="{{ isset($sitesetting->logo_large)? asset($sitesetting->logo_large):''; }}" alt="" height="50">

                </span>

            </a>

        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">

            <li>

                <button class="button-menu-mobile waves-effect waves-light">

                    <i class="fe-menu"></i>

                </button>

            </li>

            <li>

                <!-- Mobile menu toggle (Horizontal Layout)-->

                <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">

                    <div class="lines">

                        <span></span>

                        <span></span>

                        <span></span>

                    </div>

                </a>

            </li>

        </ul>

        <div class="clearfix"></div>

    </div>

</div>
