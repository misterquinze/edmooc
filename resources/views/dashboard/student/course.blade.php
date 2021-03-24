@extends('layouts.template-student')

@section('tab-title')
    <title>My Course - EdMOOC</title>
@endsection

@section('menu')
    <li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
    {{--<li><a href="{{ URL('dashboard/favorite') }}"><i class="fa fa-heart"></i> <span>Favorit Saya</span></a></li>--}}
    <li class="active"><a href="{{ URL('dashboard/course/me') }}"><i class="fa fa-book"></i> <span>Kursus Saya</span></a></li>
    <li><a href="{{ URL('dashboard/transaction') }}"><i class="fa fa-list"></i> <span>Riwayat Transaksi</span></a></li>
    {{-- <li><a href="{{ URL('dashboard/settings') }}"><i class="fa fa-gear"></i> <span>Pengaturan</span></a></li> --}}
    <li class="header">DAFTAR KURSUS</li>
    <li><a href="{{ URL('course') }}"><i class="fa fa-book"></i> <span>Katalog</span></a></li>
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/tutor/course.css') }}">
    

    <section class="content-header">
        <h1>
            MY COURSES
        </h1>
        <hr>
    </section>

    <section class="content">
        @if ($courses->isEmpty())
            @if (session('course'))
                <div class="card-body">
                    <h2 class="alert alert-info">
                        {{ session('course') }}
                    </h2>
                </div>
            @endif
        @else
        @foreach ($courses as $course)    
            <div class="course-list ">
                    
                <div class="top-section gridspan">
                    <ul style="list-style-type:none" class="dropdown">
                        <li class="dropdown-list">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i type="button" class="fa fa-ellipsis-v" ></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{route('unenroll' ,[$course->id] )}}">Unenroll</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>       
                            </ul> 
                        </li> 
                    </ul>
                    
                    <img src="{{ URL('img/dummy.jpg') }}" class="course-image">
                    <div class="col-left">
                        <div class="course-detail">
                            <a href="{{URL ('dashboard/student/course/'.$course->id.'/overview')}}">
                                <h3 class="course-name">{{ $course->name }}
                                </h3> 
                            </a>
                            <h5 class="course-description">{{$course->description}}
                            </h5>
                        </div>
                    </div>                     
                    <div class="col-right">
                           
                        <div class="proceed-btn">
                            <a class="nav-link" href="{{route ('student.overview', [$course->id])}}">Materi</a>
                        </div>
                       
                    </div>  
                </div>
                <div class="bottom-section gridspan">
                    <div class="col-left">
                        <span class="company">{{$course->company->name}}</span>
                    </div>
                    <div class="col-right">
                        
                    </div>
                      
                    {{--<div class="love-btn">
                        @if (Auth::check())
                            <favorite class=""
                                :post={{ $course->id }}
                                :favorited={{ $course->favorited() ? 'true' : 'false' }}>
                            </favorite>
                        @endif
                    </div>--}}
                </div>
            </div> 
        @endforeach
        @foreach ($ac_courses as $course)    
            <div class="course-list ">
                    
                <div class="top-section gridspan">
                    <ul style="list-style-type:none" class="dropdown">
                        <li class="dropdown-list">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i type="button" class="fa fa-ellipsis-v" ></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{route('unenroll' ,[$course->id] )}}">Unenroll</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>       
                            </ul> 
                        </li> 
                    </ul>
                    
                    <img src="{{ URL('img/dummy.jpg') }}" class="course-image">
                    <div class="col-left">
                        <div class="course-detail">
                            <a href="{{URL ('dashboard/student/course/'.$course->id.'/overview')}}">
                                <h3 class="course-name">{{ $course->name }}
                                </h3> 
                            </a>
                            <h5 class="course-description">{{$course->description}}
                            </h5>
                        </div>
                    </div>                     
                    <div class="col-right">
                           
                        <div class="proceed-btn">
                            <a class="nav-link" href="{{route ('student.overview', [$course->id])}}">Materi</a>
                        </div>
                       
                    </div>  
                </div>
                <div class="bottom-section gridspan">
                    <div class="col-left">
                        <span class="company">{{$course->company->name}}</span>
                    </div>
                    <div class="col-right">
                        
                    </div>
                      
                    {{--<div class="love-btn">
                        @if (Auth::check())
                            <favorite class=""
                                :post={{ $course->id }}
                                :favorited={{ $course->favorited() ? 'true' : 'false' }}>
                            </favorite>
                        @endif
                    </div>--}}
                </div>
            </div> 
        @endforeach
        @endif
    </section>
    <script src="{{ URL('js/vue.js') }}"></script>    
    <script>
       $(document).ready(function(){
        $(".dropdown-toggle").dropdown();
        }); 
    </script>
@endsection