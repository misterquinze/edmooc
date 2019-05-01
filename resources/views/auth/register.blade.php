@extends('layouts.template-visitor')

@section('menu')
    <li class="nav-item">
        <a class="nav-link" href="{{ URL('/') }}">Home</a>
    </li>
    <li class="nav-item">
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
    <link rel="stylesheet" href="{{ URL('css/register.css') }}">

    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                            <h2>Sign Up</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="register-content">
        <div class="register-box">
            <h2 class="title">Sign Up</h2>
            <p class="sub-title">Build skills for today, tomorrow, and beyond. Education to future-proof your career.</p>

            <div class="form">
                <form action="{{ route('register') }}" method="post">
                    <input type="text" name="name" placeholder="Full Name">
                    <input type="email" name="email" placeholder="Email Address">
                    <input type="password" name="password" placeholder="Password">
                    <input type="text" name="address" placeholder="Address">
                    <input type="tel" name="phone" placeholder="Phone">
                    
                    <button type="submit" class="submit-button">SIGN UP</button>
                </form>
            </div>
        </div>
    </div>

@endsection