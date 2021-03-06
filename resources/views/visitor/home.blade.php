<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>EduMOOC</title>
        
        <link rel="icon" href="{{ URL('template/2/img/favicon.png') }}" type="image/png') }}" />
        <link rel="stylesheet" href="{{ URL('template/2/css/bootstrap.css') }}" />
        <link rel="stylesheet" href="{{ URL('template/2/css/flaticon.css') }}" />
        <link rel="stylesheet" href="{{ URL('template/2/css/themify-icons.css') }}" />
        <link rel="stylesheet" href="{{ URL('template/1/bower_components/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ URL('template/2/vendors/owl-carousel/owl.carousel.min.css') }}" />
        <link rel="stylesheet" href="{{ URL('template/2/vendors/nice-select/css/nice-select.css') }}" />
        <link rel="stylesheet" href="{{ URL('template/2/css/style.css') }}" />
        <link rel="stylesheet" href="{{ URL('css/visitor/home.css') }}" />
    </head>

    <body>
        
        <header class="header_area">
            <div class="main_menu">

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
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL('course') }}">Courses</a>
                                </li>
                                
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

        <section class="home_banner_area">
            <div class="banner_inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="banner_content text-center">
                                <p class="text-uppercase">
                                    Education Massive Open Online Course
                                </p>
                                <h2 class="text-uppercase mt-4 mb-5">
                                    Universitas Islam Indonesia
                                </h2>
                                {{-- <div>
                                    <a href="#" class="primary-btn2 mb-3 mb-sm-0">learn more</a>
                                    <a href="#" class="primary-btn ml-sm-3 ml-0">see course</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <section class="feature_area section_gap_top">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="main_title">
                        <h2 class="mb-4">Awesome Feature</h2>
                        <p>
                            Replenish man have thing gathering lights yielding shall you
                        </p>
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single_feature">
                            <div class="icon"><span class="flaticon-student"></span></div>
                            <div class="desc">
                                <h4 class="mt-3 mb-2">Scholarship Facility</h4>
                                <p>
                                One make creepeth, man bearing theira firmament won't great
                                heaven
                                </p>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-lg-4 col-md-6">
                        <div class="single_feature">
                            <div class="icon"><span class="flaticon-book"></span></div>
                            <div class="desc">
                                <h4 class="mt-3 mb-2">Sell Online Course</h4>
                                <p>
                                One make creepeth, man bearing theira firmament won't great
                                heaven
                                </p>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-lg-4 col-md-6">
                        <div class="single_feature">
                            <div class="icon"><span class="flaticon-earth"></span></div>
                            <div class="desc">
                                <h4 class="mt-3 mb-2">Global Certification</h4>
                                <p>
                                One make creepeth, man bearing theira firmament won't great
                                heaven
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        {{-- <div class="popular_courses">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="main_title">
                            <h2 class="mb-3">Our Popular Courses</h2>
                            <p>
                                Replenish man have thing gathering lights yielding shall you
                            </p>
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-lg-12">
                        <div class="owl-carousel active_course">
                            <div class="single_course">
                                <div class="course_head">
                                    <img class="img-fluid" src="{{ URL('template/2/img/courses/c1.jpg') }}" alt="" />
                                </div>
                                <div class="course_content">
                                    <span class="price">$25</span>
                                    <span class="tag mb-4 d-inline-block">design</span>
                                    <h4 class="mb-3">
                                        <a href="course-details.html">Custom Product Design</a>
                                    </h4>
                                    <p>
                                        One make creepeth man bearing their one firmament won't fowl
                                        meat over sea
                                    </p>
                                    <div class="course_meta d-flex justify-content-lg-between align-items-lg-center flex-lg-row flex-column mt-4">
                                        <div class="authr_meta">
                                            <img src="{{ URL('template/2/img/courses/author1.png') }}" alt="" />
                                            <span class="d-inline-block ml-2">Cameron</span>
                                        </div>
                                        <div class="mt-lg-0 mt-3">
                                            <span class="meta_info mr-4">
                                                <a href="#"> <i class="ti-user mr-2"></i>25 </a>
                                            </span>
                                            <span class="meta_info"
                                                ><a href="#"> <i class="ti-heart mr-2"></i>35 </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="single_course">
                                <div class="course_head">
                                    <img class="img-fluid" src="{{ URL('template/2/img/courses/c2.jpg') }}" alt="" />
                                </div>
                                <div class="course_content">
                                    <span class="price">$25</span>
                                    <span class="tag mb-4 d-inline-block">design</span>
                                    <h4 class="mb-3">
                                        <a href="course-details.html">Social Media Network</a>
                                    </h4>
                                    <p>
                                        One make creepeth man bearing their one firmament won't fowl
                                        meat over sea
                                    </p>
                                    <div class="course_meta d-flex justify-content-lg-between align-items-lg-center flex-lg-row flex-column mt-4">
                                        <div class="authr_meta">
                                            <img src="{{ URL('template/2/img/courses/author2.png') }}" alt="" />
                                            <span class="d-inline-block ml-2">Cameron</span>
                                        </div>
                                        <div class="mt-lg-0 mt-3">
                                            <span class="meta_info mr-4">
                                                <a href="#"> <i class="ti-user mr-2"></i>25 </a>
                                            </span>
                                            <span class="meta_info"
                                                ><a href="#"> <i class="ti-heart mr-2"></i>35 </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="single_course">
                                <div class="course_head">
                                    <img class="img-fluid" src="{{ URL('template/2/img/courses/c3.jpg') }}" alt="" />
                                </div>
                                <div class="course_content">
                                    <span class="price">$25</span>
                                    <span class="tag mb-4 d-inline-block">design</span>
                                    <h4 class="mb-3">
                                        <a href="course-details.html">Computer Engineering</a>
                                    </h4>
                                    <p>
                                        One make creepeth man bearing their one firmament won't fowl
                                        meat over sea
                                    </p>
                                    <div class="course_meta d-flex justify-content-lg-between align-items-lg-center flex-lg-row flex-column mt-4">
                                        <div class="authr_meta">
                                            <img src="{{ URL('template/2/img/courses/author3.png') }}" alt="" />
                                            <span class="d-inline-block ml-2">Cameron</span>
                                        </div>
                                        <div class="mt-lg-0 mt-3">
                                            <span class="meta_info mr-4">
                                                <a href="#"> <i class="ti-user mr-2"></i>25 </a>
                                            </span>
                                            <span class="meta_info"
                                                ><a href="#"> <i class="ti-heart mr-2"></i>35 </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    
        {{-- <div class="section_gap registration_area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="row clock_sec clockdiv" id="clockdiv">
                            <div class="col-lg-12">
                                <h1 class="mb-3">Register Now</h1>
                                <p>
                                    There is a moment in the life of any aspiring astronomer that
                                    it is time to buy that first telescope. It???s exciting to think
                                    about setting up your own viewing station.
                                </p>
                            </div>
                            <div class="col clockinner1 clockinner">
                                <h1 class="days">150</h1>
                                <span class="smalltext">Days</span>
                            </div>
                            <div class="col clockinner clockinner1">
                                <h1 class="hours">23</h1>
                                <span class="smalltext">Hours</span>
                            </div>
                            <div class="col clockinner clockinner1">
                                <h1 class="minutes">47</h1>
                                <span class="smalltext">Mins</span>
                            </div>
                            <div class="col clockinner clockinner1">
                                <h1 class="seconds">59</h1>
                                <span class="smalltext">Secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-1">
                        <div class="register_form">
                            <h3>Courses for Free</h3>
                            <p>It is high time for learning</p>
                            <form class="form_area" id="myForm" action="mail.html" method="post">
                                <div class="row">
                                    <div class="col-lg-12 form_group">
                                        <input
                                            name="name"
                                            placeholder="Your Name"
                                            required=""
                                            type="text"
                                        />
                                        <input
                                            name="name"
                                            placeholder="Your Phone Number"
                                            required=""
                                            type="tel"
                                        />
                                        <input
                                            name="email"
                                            placeholder="Your Email Address"
                                            pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                            required=""
                                            type="email"
                                        />
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    
        <section class="trainer_area section_gap_top">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="main_title">
                            <h2 class="mb-3 white-text">Our Expert Trainers</h2>
                            <p>
                                Replenish man have thing gathering lights yielding shall you
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center d-flex align-items-center">
                    <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
                        <div class="thumb d-flex justify-content-sm-center">
                            <img class="img-fluid" src="{{ URL('template/2/img/trainer/t1.jpg') }}" alt="" />
                        </div>
                        <div class="meta-text text-sm-center">
                            <h4>Mated Nithan</h4>
                            <p class="designation">Sr. web designer</p>
                            <div class="mb-3">
                                <p>
                                    If you are looking at blank cassettes on the web, you may be
                                    very confused at the.
                                </p>
                            </div>
                            <div class="align-items-center justify-content-center d-flex">
                                <a href="#"><i class="ti-facebook"></i></a>
                                <a href="#"><i class="ti-twitter"></i></a>
                                <a href="#"><i class="ti-linkedin"></i></a>
                                <a href="#"><i class="ti-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
                        <div class="thumb d-flex justify-content-sm-center">
                            <img class="img-fluid" src="{{ URL('template/2/img/trainer/t2.jpg') }}" alt="" />
                        </div>
                        <div class="meta-text text-sm-center">
                            <h4>David Cameron</h4>
                            <p class="designation">Sr. web designer</p>
                            <div class="mb-3">
                                <p>
                                    If you are looking at blank cassettes on the web, you may be
                                    very confused at the.
                                </p>
                            </div>
                            <div class="align-items-center justify-content-center d-flex">
                                <a href="#"><i class="ti-facebook"></i></a>
                                <a href="#"><i class="ti-twitter"></i></a>
                                <a href="#"><i class="ti-linkedin"></i></a>
                                <a href="#"><i class="ti-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
                        <div class="thumb d-flex justify-content-sm-center">
                            <img class="img-fluid" src="{{ URL('template/2/img/trainer/t3.jpg') }}" alt="" />
                        </div>
                        <div class="meta-text text-sm-center">
                            <h4>Jain Redmel</h4>
                            <p class="designation">Sr. Faculty Data Science</p>
                            <div class="mb-3">
                                <p>
                                    If you are looking at blank cassettes on the web, you may be
                                    very confused at the.
                                </p>
                            </div>
                            <div class="align-items-center justify-content-center d-flex">
                                <a href="#"><i class="ti-facebook"></i></a>
                                <a href="#"><i class="ti-twitter"></i></a>
                                <a href="#"><i class="ti-linkedin"></i></a>
                                <a href="#"><i class="ti-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
                        <div class="thumb d-flex justify-content-sm-center">
                            <img class="img-fluid" src="{{ URL('template/2/img/trainer/t4.jpg') }}" alt="" />
                        </div>
                        <div class="meta-text text-sm-center">
                            <h4>Nathan Macken</h4>
                            <p class="designation">Sr. web designer</p>
                            <div class="mb-4">
                                <p>
                                    If you are looking at blank cassettes on the web, you may be
                                    very confused at the.
                                </p>
                            </div>
                            <div class="align-items-center justify-content-center d-flex">
                                <a href="#"><i class="ti-facebook"></i></a>
                                <a href="#"><i class="ti-twitter"></i></a>
                                <a href="#"><i class="ti-linkedin"></i></a>
                                <a href="#"><i class="ti-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        {{-- <div class="events_area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="main_title">
                            <h2 class="mb-3 text-white">Upcoming Events</h2>
                            <p>
                                Replenish man have thing gathering lights yielding shall you
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="single_event position-relative">
                            <div class="event_thumb">
                                <img src="{{ URL('template/2/img/event/e1.jpg') }}" alt="" />
                            </div>
                            <div class="event_details">
                                <div class="d-flex mb-4">
                                    <div class="date"><span>15</span> Jun</div>
    
                                    <div class="time-location">
                                        <p>
                                            <span class="ti-time mr-2"></span> 12:00 AM - 12:30 AM
                                        </p>
                                        <p>
                                            <span class="ti-location-pin mr-2"></span> Hilton Quebec
                                        </p>
                                    </div>
                                </div>
                                <p>
                                    One make creepeth man for so bearing their firmament won't
                                    fowl meat over seas great
                                </p>
                                <a href="#" class="primary-btn rounded-0 mt-3">View Details</a>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-lg-6 col-md-6">
                        <div class="single_event position-relative">
                            <div class="event_thumb">
                                <img src="{{ URL('template/2/img/event/e2.jpg') }}" alt="" />
                            </div>
                            <div class="event_details">
                                <div class="d-flex mb-4">
                                    <div class="date"><span>15</span> Jun</div>
    
                                    <div class="time-location">
                                        <p>
                                            <span class="ti-time mr-2"></span> 12:00 AM - 12:30 AM
                                        </p>
                                        <p>
                                            <span class="ti-location-pin mr-2"></span> Hilton Quebec
                                        </p>
                                    </div>
                                </div>
                                <p>
                                    One make creepeth man for so bearing their firmament won't
                                    fowl meat over seas great
                                </p>
                                <a href="#" class="primary-btn rounded-0 mt-3">View Details</a>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-lg-12">
                        <div class="text-center pt-lg-5 pt-3">
                            <a href="#" class="event-link">
                                View All Event <img src="{{ URL('template/2/img/next.png') }}" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    
        <div class="testimonial_area section_gap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="main_title">
                            <h2 class="mb-3">Client say about me</h2>
                            <p>
                                Replenish man have thing gathering lights yielding shall you
                            </p>
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="testi_slider owl-carousel">
                        <div class="testi_item">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <img src="{{ URL('template/2/img/testimonials/t1.jpg') }}" alt="" />
                                </div>
                                <div class="col-lg-8">
                                    <div class="testi_text">
                                        <h4>Elite Martin</h4>
                                        <p>
                                            Him, made can't called over won't there on divide there
                                            male fish beast own his day third seed sixth seas unto.
                                            Saw from
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="testi_item">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <img src="{{ URL('template/2/img/testimonials/t2.jpg') }}" alt="" />
                                </div>
                                <div class="col-lg-8">
                                    <div class="testi_text">
                                        <h4>Davil Saden</h4>
                                        <p>
                                            Him, made can't called over won't there on divide there
                                            male fish beast own his day third seed sixth seas unto.
                                            Saw from
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="testi_item">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <img src="{{ URL('template/2/img/testimonials/t1.jpg') }}" alt="" />
                                </div>
                                <div class="col-lg-8">
                                    <div class="testi_text">
                                        <h4>Elite Martin</h4>
                                        <p>
                                            Him, made can't called over won't there on divide there
                                            male fish beast own his day third seed sixth seas unto.
                                            Saw from
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="testi_item">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <img src="{{ URL('template/2/img/testimonials/t2.jpg') }}" alt="" />
                                </div>
                                <div class="col-lg-8">
                                    <div class="testi_text">
                                        <h4>Davil Saden</h4>
                                        <p>
                                            Him, made can't called over won't there on divide there
                                            male fish beast own his day third seed sixth seas unto.
                                            Saw from
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="testi_item">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <img src="{{ URL('template/2/img/testimonials/t1.jpg') }}" alt="" />
                                </div>
                                <div class="col-lg-8">
                                    <div class="testi_text">
                                        <h4>Elite Martin</h4>
                                        <p>
                                            Him, made can't called over won't there on divide there
                                            male fish beast own his day third seed sixth seas unto.
                                            Saw from
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="testi_item">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <img src="{{ URL('template/2/img/testimonials/t2.jpg') }}" alt="" />
                                </div>
                                <div class="col-lg-8">
                                    <div class="testi_text">
                                        <h4>Davil Saden</h4>
                                        <p>
                                            Him, made can't called over won't there on divide there
                                            male fish beast own his day third seed sixth seas unto.
                                            Saw from
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
    </body>
</html>