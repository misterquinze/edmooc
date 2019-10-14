@extends('layouts.template-visitor')

@section('menu')
    <li class="nav-item">
        <a class="nav-link" href="{{ URL('/') }}">Home</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ URL('course') }}">Courses</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ URL('about') }}">About</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ URL('contact') }}">Contact</a>
    </li>
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/visitor/course.css') }}">

    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                            <h2>Courses</h2>
                            <input type="text" class="search-box" placeholder="Search">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
      
    <div class="course-content">
        <div class="gridspan">
            <div class="left-section">
                <h4 class="filter-title">FILTER BY</h4>
                <div class="filter-box">
                    <div class="filter-header">
                        Type
                    </div>
                    <div class="filter-body">
                        <form action="{{ URL('') }}" method="post">
                            {{ csrf_field() }}
                            
                            <label class="filter-container">
                                Free Courses
                                <input type="checkbox" name="free">
                                <span class="checkmark"></span>
                            </label>
                            <label class="filter-container">
                                Paid Courses
                                <input type="checkbox" name="paid">
                                <span class="checkmark"></span>
                            </label>
                        </form>
                    </div>
                </div>
               
                <div class="filter-box">
                    <div class="filter-header">
                        Category
                    </div>
                    <div class="filter-body">
                        <form action="{{ URL('') }}" method="post">
                            {{ csrf_field() }}
                            
                            <label class="filter-container">
                                Business
                                <input type="checkbox" name="free">
                                <span class="checkmark"></span>
                            </label>
                            <label class="filter-container">
                                Education
                                <input type="checkbox" name="paid">
                                <span class="checkmark"></span>
                            </label>
                        </form>
                    </div>
                </div>
                
                <div class="filter-box">
                    <div class="filter-header">
                        Date
                    </div>
                    <div class="filter-body">
                        <input type="text" name="date" id="daterangepicker" class="date-input">
                    </div>
                </div>
            </div>
            <div class="right-section">
                @foreach ($courses as $course)
                <div class="course-list ">
                    
                    <div class="top-section gridspan">
                        <img src="{{ URL('img/dummy.jpg') }}" class="course-image">
                            <div class="course-detail">
                                <h3 class="course-name">{{ $course->name }}</h3>
                                
                                <div class="label-container">
                                <span class="label">{{$course->company->name}}</span>
                                </div>
                                <hr>
                                <h5 class="course-description">{{$course->description}}
                                </h5>  
                            </div>
                    </div>
                    <div class="bottom-section gridspan">
                        <div class="col-left">
                            @if ($course->type == 'paid')
                                <span class="price">Rp {{ number_format($course->price) }}</span>
                            @else
                                <span class="price">Gratis</span>
                            @endif
                        </div>
                        <div class="col-right">
                        <a class="enroll-btn" type="button" href="{{route('enroll' ,[$course->id] )}}">Enroll</a>    
                          
                        </div>    
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>    
@endsection