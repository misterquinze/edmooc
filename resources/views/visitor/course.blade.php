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
                <div class="course-list ">
                    <div class="top-section gridspan">
                        <img src="{{ URL('img/dummy.jpg') }}" class="course-image">
                        <div class="course-detail">
                            <h3 class="course-name">Introduction to Machine Learning Nanodegree Program</h3>
                            <p class="course-company">Company name</p>
                            <p class="category">Category: Education</p>
                        </div>
                    </div>
                    <div class="bottom-section gridspan">
                        <div class="col-left">
                            <span class="price">Rp {{ number_format(250000) }}</span>
                        </div>
                        <div class="col-right">
                            <form action="{{ URL('') }}" method="post">
                                {{ csrf_field() }}
                                <button type="submit" class="enroll-btn">Enroll</button>
                            </form>
                        </div>

                    </div>
                </div>
               
            </div>
        </div>
    </div>

    <script>
        $("#daterangepicker").daterangepicker()
    </script>
@endsection