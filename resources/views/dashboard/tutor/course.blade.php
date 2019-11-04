@extends('layouts.template-tutor')

@section('tab-title')
    <title>My Course - EdMOOC</title>
@endsection

@section('menu')
    <li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
    <li class="active"><a href="{{ URL('dashboard/course/me') }}"><i class="fa fa-book"></i> <span>Kursus Saya</span></a></li>
    <li><a href="{{ URL('dashboard/settings') }}"><i class="fa fa-gear"></i> <span>Pengaturan</span></a></li>
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/tutor/course.css') }}">

    <section class="content-header">
        <h1>
            KURSUS TERBARU
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
                        <img src="{{ URL('img/dummy.jpg') }}" class="course-image">
                        <div class="col-left">
                        <div class="course-detail">
                            <h3 class="course-name">{{ $course->name }}</h3> 
                            <h5 class="course-description">{{$course->description}}
                            </h5>
                        </div>
                    </div>                     
                    <div class="col-right">
                        <div class="proceed-btn">
                            <a class=" nav-link" href="{{URL ('classroom/'.$course->id.'/overview')}}">Materi</a>  
                        </div>
                    </div> 
                </div>
            </div> 
        @endforeach
        @endif
    </section>
@endsection