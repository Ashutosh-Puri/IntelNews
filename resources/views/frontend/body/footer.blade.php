<footer class="footer-area">
    <div class="container">
        <div class="footer-menu">
            <div class="menu-footer-menu-container">
                <ul id="menu-footer-menu" class="menu">
                    <li id="menu-item-553" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-553">
                        <a href="{{ url('/#livetv') }}">LIVE TV</a>
                    </li>
                    <li id="menu-item-553" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-553">
                        <a href="{{ url('/#photogallery') }}">PHOTO GALLERY</a>
                    </li>
                    <li id="menu-item-554" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-554">
                        <a href="{{ url('/#videogallery') }}">VIDOE GALLERY</a>
                    </li>
                    <li id="menu-item-552" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-552">
                        <a href=" ">ABOUT US</a>
                    </li>
                    <li id="menu-item-556" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-556">
                        <a href=" ">CONTACT US</a>
                    </li>
                    <li id="menu-item-557" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-557">
                        <a href="{{ route('login') }}">LOGIN</a>
                    </li>
                    <li id="menu-item-557" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-557">
                        <a href="{{ route('register') }}">REGISTER</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footerColor">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <h3 class="footer-title">
                        Our Office : </h3>
                    <div class="footer-content">                
                        <p style="text-align: left;">ADDRESS : {{ isset($sitesetting->address)?$sitesetting->address:''; }} </p>
                        <p style="text-align: left;">EMAIL : {{ isset($sitesetting->email)?$sitesetting->email:''; }}</p>
                        <p style="text-align: left;">MOBILE : +91 {{ isset($sitesetting->phone)?$sitesetting->phone:''; }}</p>
                        <div class="author-social float-start text-center fw-bold">
                            <a href="{{ isset($sitesetting->social_icon_1_url)?$sitesetting->social_icon_1_url:'#'; }}" target="_black" >
                                {!! isset($sitesetting->social_icon_1)?$sitesetting->social_icon_1:''; !!}
                            </a>
                            <a href="{{ isset($sitesetting->social_icon_2_url)?$sitesetting->social_icon_2_url:'#'; }}" target="_black" >
                                {!! isset($sitesetting->social_icon_2)?$sitesetting->social_icon_2:''; !!}
                            </a>
                            <a href="{{ isset($sitesetting->social_icon_3_url)?$sitesetting->social_icon_3_url:'#'; }}" target="_black" >
                                {!! isset($sitesetting->social_icon_3)?$sitesetting->social_icon_3:''; !!}
                            </a>
                            <a href="{{ isset($sitesetting->social_icon_4_url)?$sitesetting->social_icon_4_url:'#'; }}" target="_black" >
                                {!! isset($sitesetting->social_icon_4)?$sitesetting->social_icon_4:''; !!}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <h3 class="footer-title">
                                Quick Links 
                            </h3>
                            <div class="footer-content">
                                <a class="text-start text-white" href="{{ url('/') }}"><p>Home</p></a>
                                <a class="text-start text-white" href="{{ url('/aboutus') }}"><p>About Us</p></a>
                                <a class="text-start text-white "href="{{ url('/contactus') }}"><p>Contact Us</p></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h3 class="footer-title">
                                Quick Links </h3>
                            <div class="footer-content">
                                <a class="text-start text-white" href="{{ route('login') }}"><p>Login</p></a>
                                <a class="text-start text-white" href="{{ route('register') }}"><p>Register</p></a>
                                <a class="text-start text-white" href="{{ route('admin.login') }}"><p>Admin Login</p></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy_right_section">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="copy-right">
                            © All rights reserved © {{ isset($sitesetting->dev_company)?$sitesetting->dev_company:''; }} </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="design-developed">
                            Theme Developed BY <a href="{{ isset($sitesetting->dev_site)?$sitesetting->dev_site:''; }}" target="_blank">{{ isset($sitesetting->dev_company)?$sitesetting->dev_company:''; }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href=" " class="scrollToTop" style=""><i
                class="las la-long-arrow-alt-up"></i></a>
    </div>
</footer>
