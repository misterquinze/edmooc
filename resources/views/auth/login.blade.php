@extends('layouts.template-visitor')

@section('menu')
    
    <li class="nav-item">
        <a class="nav-link" href="{{ URL('course') }}">Courses</a>
    </li>
  
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/login.css') }}">

    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                            <h2>Login</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="login-content">
        <div class="login-box">
            <h2 class="title">Login to your account</h2>
            <p class="sub-title">Build skills for today, tomorrow, and beyond. Education to future-proof your career.</p>

            <div class="form">
                <form action="{{ route('login') }}" method="POST">
                    {{ csrf_field() }}

                    <input id="input-box" type="email" name="email" placeholder="Email Address">
                    <input id="input-box" type="password" name="password" placeholder="Password">
                    
                    <button type="submit" class="submit-button">LOGIN</button>
                </form>
            </div>
        </div>
    </div>

@endsection