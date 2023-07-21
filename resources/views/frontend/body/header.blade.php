@php
    $cddate = new DateTime();
@endphp
<header class="themesbazar_header">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="date">
                            <i class="lar la-calendar"></i>  {{ $cddate->format('l d-m-Y') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <form class="header-search" action="{{ route('news.search') }}" method="post">
                    @csrf
                    <input type="text" name="search" placeholder="Search Here" required class="@error('search') is-invalid @enderror">
                    <button type="submit" value="Search"> <i class="las la-search text-white"></i> </button>
                </form>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="header-social">
                    <ul>
                    
                        @auth
                        <li class="dropdown topbar-dropdown">

                            <a class="dropdown-toggle nav-user waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            
                                <img src="{{ (!empty(auth()->user()->photo)) ? asset(auth()->user()->photo) : asset('upload/no_image.jpg') }}" alt="user-image" class="rounded-circle" style="height: 35px;width:35px;">
            
                                <span class="pro-user-name ms-1">
            
                                    {{ auth()->user()->name }} <i class="mdi mdi-chevron-down"></i>
            
                                </span>
            
                            </a>
            
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                @if (auth()->user()->role=='admin')
                                    <a href="{{ route('admin.dashboard') }}" class="dropdown-item notify-item">
                                        <i class="fa fa-dashboard"></i>
                                        <span>Admin Dashboard </span>
                                    </a>
                                @endif
                                <a href="{{ route('user.dashboard') }}" class="dropdown-item notify-item">
                                    <i class="fa fa-user-circle"></i>
                                    <span>My Profile</span>
                                </a>
                                <a href="{{ route('user.change.password') }}" class="dropdown-item notify-item">
                                    <i class="fa fa-lock"></i>
                                    <span>Change Password</span>
                                </a>
                                <div class="dropdown-divider"></div>
            
                                <!-- item-->
            
                                <a href="{{ route('user.logout') }}" class="dropdown-item notify-item">
            
                                    <i class="fa fa-sign-out"></i>
            
                                    <span>Logout</span>
        
                                </a>
                            </div>
                        </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}">
                                    <b> Login </b>
                                </a> 
                            </li>
                            <li> 
                                <a href="{{ route('register') }}"> 
                                    <b>Register</b> 
                                </a> 
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="logo-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="logo">
                        <a href="{{ url('/') }}" title="{{ env('APP_NAME') }}">
                            <img src="{{ isset($sitesetting->logo_large) ?asset($sitesetting->logo_large):''; }}" alt="{{ env('APP_NAME') }}" title="{{ env('APP_NAME') }}">
                        </a>
                    </div>      
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="banner">
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
</header>
<div class="menu_section sticky" id="myHeader">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="mobileLogo">
                    <a href="{{ url('/') }}" title="{{ env('APP_NAME') }}">
                        <img src="{{ isset($sitesetting->logo_large) ?asset($sitesetting->logo_large):''; }}" alt="{{ env('APP_NAME') }}" title="{{ env('APP_NAME') }}">
                    </a>
                </div>
                <div class="stellarnav dark desktop">
                    <a href="{{ url('/') }}" class="menu-toggle full">
                        <span class="bars"></span> 
                    </a>
                    <ul id="menu-main-menu" class="menu">
                        <li id="menu-item-89"  class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-89">
                            <a href="{{ url('/') }}" aria-current="page"> 
                                <i  class="fa-solid fa-house-user"></i> Home
                            </a>
                        </li>
                        @php
                            $categories = App\Models\Category::orderBy('id','DESC')->limit(10)->get();
                        @endphp
                        @foreach ( $categories as $category)
                            <li id="menu-item-291" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-291 has-sub">
                                <a href="{{ url('news/category/'.$category->id.'/'.$category->category_slug) }} ">{{ $category->category_name }}</a>
                                @php
                                    $subcategories = App\Models\Subcategory::where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
                                @endphp
                                <ul class="sub-menu">
                                    @foreach ($subcategories as $subcategory)
                                        <li id="menu-item-294" class="menu-item menu-item-type-taxonomy menu-item--category menu-item-294">
                                            <a href="{{ url('news/subcategory/'.$subcategory->id.'/'.$subcategory->subcategory_slug) }}">{{ $subcategory->subcategory_name  }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <a class="dd-toggle" href=" "><span class="icon-plus"></span></a>
                            </li>
                        @endforeach
                    </ul>
                    <a class="dd-toggle" href=" "><span class="icon-plus"></span></a>
                </div>
            </div>
        </div>
    </div>
</div>


