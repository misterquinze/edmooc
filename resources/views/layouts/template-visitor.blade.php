<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        @yield('tab-title')
        
        <link rel="icon" href="{{ URL('template/2/img/favicon.png') }}" type="image/png" />
        {{--<link rel="stylesheet" href="{{ mix('css/all.css') }}" />--}}
        <link rel="stylesheet" href="{{ URL('template/2/css/bootstrap.css') }}" />
        <link rel="stylesheet" href="{{ URL('template/2/css/flaticon.css') }}" />
        <link rel="stylesheet" href="{{ URL('template/1/bower_components/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ URL('template/2/css/themify-icons.css') }}" />
        <link rel="stylesheet" href="{{ URL('template/2/vendors/owl-carousel/owl.carousel.min.css') }}" />
        <link rel="stylesheet" href="{{ URL('template/2/vendors/nice-select/css/nice-select.css') }}" />
        <link rel="stylesheet" href="{{ URL('template/2/css/style.css') }}" />
        <link rel="stylesheet" href="{{ URL('css/template-2.css') }}" />

       
    </head>

    <body>
        
        <header class="header_area white-header">
            <div class="main_menu">
                {{-- <div class="search_input" id="search_input_box">
                    <div class="container">
                        <form class="d-flex justify-content-between" method="" action="">
                            <input
                                type="text"
                                class="form-control"
                                id="search_input"
                                placeholder="Search Here"
                            />
                            <button type="submit" class="btn"></button>
                            <span
                                class="ti-close"
                                id="close_search"
                                title="Close Search"
                            ></span>
                        </form>
                    </div>
                </div> --}}

                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        
                        <a class="navbar-brand logo_h" href="{{ URL('/') }}">
                            <img src="{{ URL('template/2/img/logo.png') }}" alt=""/>
                        </a>
                        <button
                            class="navbar-toggler"
                            type="button"
                            data-toggle="collapse"
                            data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                        >
                            <span class="icon-bar"></span> <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <form action="/course/search" method="GET">
                            <span class="input-group">
                                <input type="text" max="200" class="search-box"  name="search" placeholder="Search Course"  value="{{old ('search')}}" >
                                <button class="submit-btn" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                            
                        </form>
                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav ml-auto">
                                
                                @yield('menu')
                                
                                @if($userLogin)
                                    @if($userLogin->role == 'student')
                                    <li class="login">
                                        <a class="login-btn" href="{{ URL('dashboard') }}">My Course</a>
                                    </li>
                                    @else
                                    <li class="login">
                                        <a class="login-btn" href="{{ URL('dashboard') }}">Dashboard</a>
                                    </li>
                                    @endif
                                    
                                @else
                                    <li class="login">
                                        <a class="login-btn" href="{{ route('login') }}">Login</a>
                                    </li>
                                    <li class="nav-item signup">
                                        <a class="signup-btn" href="{{ route('register') }}">Sign Up</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        @yield('content')

        <footer class="footer-area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 single-footer-widget">
                        <h4>EdMOOC</h4>
                        <ul>
                            <li><a href="{{ URL('about') }}">About</a></li>
                            <li><a href="{{ URL('contact') }}">Career</a></li>
                            <li><a href="#">Professional Program</a></li>
                            <li><a href="#">Academic Program</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 single-footer-widget">
                        <h4>Community</h4>
                        <ul>
                            <li><a href="#">Learners</a></li>
                            <li><a href="#">Partners</a></li>
                            <li><a href="#">Developers</a></li>
                            <li><a href="#">Beta Testers</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 single-footer-widget">
                        <h4>More</h4>
                        <ul>
                            <li><a href="#">Terms</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Accessibilty</a></li>
                            <li><a href="{{ URL('contact') }}">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 single-footer-widget">
                        <h4>Newsletter</h4>
                        <p>You can trust us. we only send promo offers,</p>
                        <div class="form-wrap" id="mc_embed_signup">
                            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
                                <input
                                    class="form-control"
                                    name="EMAIL"
                                    placeholder="Your Email Address"
                                    onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Your Email Address'"
                                    required=""
                                    type="email"
                                />
                                <button class="click-btn btn btn-default">
                                    <span>subscribe</span>
                                </button>
                                <div style="position: absolute; left: -5000px;">
                                    <input
                                        name="b_36c4fd991d266f23781ded980_aefe40901a"
                                        tabindex="-1"
                                        value=""
                                        type="text"
                                    />
                                </div>

                                <div class="info"></div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row footer-bottom d-flex justify-content-between">
                    <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Universitas Islam Indonesia</a>
                    </p>
                    <div class="col-lg-4 col-sm-12 footer-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter"></i></a>
                        <a href="#"><i class="ti-dribbble"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        
        <script src="{{ URL('template/2/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ URL('template/2/js/popper.js') }}"></script>
        <script src="{{ URL('template/2/js/bootstrap.min.js') }}"></script>
        <script src="{{ URL('template/2/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ URL('template/2/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ URL('template/2/js/owl-carousel-thumb.min.js') }}"></script>
        <script src="{{ URL('template/2/js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ URL('template/2/js/mail-script.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="{{ URL('template/2/js/gmaps.min.js') }}"></script>
        <script src="{{ URL('template/2/js/theme.js') }}"></script>
        {{--<script src="{{ mix ('js/all.js')}}"></script>--}}
    </body>
</html>
