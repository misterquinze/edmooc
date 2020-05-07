@extends('layouts.template-visitor')

@section('menu')
   
    <li class="nav-item">
        <a class="nav-link" href="{{ URL('course') }}">Courses</a>
    </li>
    
@endsection

@section('content')
<link rel="stylesheet" href="{{URL ('css/visitor/preview.css')}}">
@foreach($accourse as $course)
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                        <h2>{{$course->name}}</h2>
                            {{-- <div class="page_link">
                                <a href="index.html">Home</a>
                                <a href="about-us.html">About Us</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about_area section_gap">
        <div class="container">
            <div class="row h_blog_item">
                <div class="col-lg-6">
                    <div class="h_blog_img">
                        <img class="img-fluid" src="{{ URL('template/2/img/about.png')}}" alt="" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="h_blog_text">
                        <div class="h_blog_text_inner left right">
                        <h4>Welcome to {{$course->name}}</h4>
                            <p>
                                Subdue whales void god which living don't midst lesser
                                yielding over lights whose. Cattle greater brought sixth fly
                                den dry good tree isn't seed stars were.
                            </p>
                            <p>
                                Subdue whales void god which living don't midst lesser yieldi
                                over lights whose. Cattle greater brought sixth fly den dry
                                good tree isn't seed stars were the boring.
                            </p>
                            <a class="primary-btn" href="#">
                                Learn More <i class="ti-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="main_title">
                <h2 class="mb-3 text">Profil Tutor</h2>
            </div>
            <div class="testi_item">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <img src="{{ URL('template/2/img/testimonials/t1.jpg')}}" alt="" />
                    </div>
                    <div class="col-lg-8">
                        <div class="testi_text">
                            <h4>{{$course->tutor->name}}
                            </h4>
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
    
    </section>
  
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
                                <img src="{{ URL('template/2/img/testimonials/t1.jpg')}}" alt="" />
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
                                <img src="{{ URL('template/2/img/testimonials/t2.jpg')}}" alt="" />
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
                                <img src="{{ URL('template/2/img/testimonials/t1.jpg')}}" alt="" />
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
                                <img src="{{ URL('template/2/img/testimonials/t2.jpg')}}" alt="" />
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
                                <img src="{{ URL('template/2/img/testimonials/t1.jpg')}}" alt="" />
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
                                <img src="{{ URL('template/2/img/testimonials/t2.jpg')}}" alt="" />
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
@endforeach
   
@endsection