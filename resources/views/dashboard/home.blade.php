@extends('layouts.template-tutor')

@section('tab-title')
    <title>Dashboard - EdMOOC</title>
@endsection

@section('menu')
    @if($userLogin->role == 'student')
        <li class="active"><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
        {{--<li><a href="{{ URL('dashboard/favorite') }}"><i class="fa fa-heart"></i> <span>Favorit Saya</span></a></li>--}}
        <li><a href="{{ URL('dashboard/course/me') }}"><i class="fa fa-book"></i> <span>Kursus Saya</span></a></li>
        <li><a href="{{ URL('dashboard/transaction') }}"><i class="fa fa-list"></i> <span>Riwayat Transaksi</span></a></li>
        {{-- <li><a href="{{ URL('dashboard/settings') }}"><i class="fa fa-gear"></i> <span>Pengaturan</span></a></li> --}}
        <li class="header">DAFTAR KURSUS</li>
        <li><a href="{{ URL('course') }}"><i class="fa fa-book"></i> <span>Katalog</span></a></li>
    @elseif($userLogin->role == 'company')
        <li class="active"><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
        <li><a href="{{ URL('dashboard/course/list') }}"><i class="fa fa-book"></i> <span>Professional</span></a></li>
        <li><a href="{{ URL('dashboard/company/program') }}"><i class="fa fa-graduation-cap"></i> <span>Akademik</span></a></li>
        <li><a href="{{ URL('dashboard/revenue') }}"><i class="fa fa-list"></i> <span>Pendapatan</span></a></li>
        {{-- <li><a href="{{ URL('dashboard/settings') }}"><i class="fa fa-gear"></i> <span>Pengaturan</span></a></li> --}}
    @elseif($userLogin->role == 'tutor')
        <li class="active"><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
        <li><a href="{{ URL('dashboard/tutor/course/list') }}"><i class="fa fa-book"></i> <span>Kursus Saya</span></a></li>
        {{-- <li><a href="{{ URL('dashboard/settings') }}"><i class="fa fa-gear"></i> <span>Pengaturan</span></a></li>     --}}
    @endif
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/dashboard/home.css') }}">

    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <hr>
    </section>
    @if($userLogin->role == 'student')
    <section class="content">
        <div class="student-box">
            
                <div class="student-box-1">
                    <div class="gridspan">
                        <div class="col-left">
                            <div class="label-container">
                                <div class="card-title">
                                    EdMOOC
                                </div>
                                <div class="card-content ">
                                    {{$userLogin->name}}
                                    <br>
                                    {{$userLogin->email}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="student-box-2">
                    <div class="gridspan">
                        <div class="col-left">
                            <div class="label-container">
                                <div class="card-title text-center">
                                    Member sejak
                                </div>
                                 <div class="card-content text-center">
                                    {{$userLogin->created_at->format('d M Y')}} 
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="student-box-2">
                    <div class="gridspan">
                        <div class="col-left">
                            <div class="label-container">
                                <div class="card-title text-center">
                                    0
                                </div>
                                 <div class="card-content text-center">
                                    Lulus Kursus
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="student-box-2">
                    <div class="gridspan">
                        <div class="col-left">
                            <div class="label-container">
                                <div class="card-title text-center">
                                    0
                                </div>
                                 <div class="card-content text-center">
                                    Lulus Kursus
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
        <div class="student-course">
            <div class="student-course-head">
                <h1>
                    MY COURSES
                </h1>
                <hr>
            </div>
            <div class="student-course-body">
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
                <div class="student-course-list ">
                    <div class="top-section gridspan">
                        <ul style="list-style-type:none" class="dropdown">
                            <li class="dropdown-list">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i type="button" class="fa fa-ellipsis-v" ></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="">Unenroll</a>
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
                    </div>
                </div> 
                @endforeach
                @endif
            </div>
        </div>
    </section>
    @elseif($userLogin->role == 'company')
    <section class="content">
        <div class="course-list">
            <div class="gridspan">
                <div class="col-left">
                    <div class="label-container">
                        <img src="{{ URL('img/book.jpg') }}" class="card-image">
                    </div>
                </div>
                <div class="col-right">
                    <div class="label-container">
                        <div class="title">
                            Selamat datang di halaman dasbor Institusi!
                        </div>
                        <div class="desc">
                            <p class="JustifyFull">
                                Anda sebagai institusi dapat membuat kursus sesuai dengan tujuan anda, terdapat 2 pilihan dalam membuat kursus. Kursus Professional dan Kursus Akademik. 
                            </p>
                            <a href="">Pelajari lebih lanjut</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="student-box">
            
            <div class="student-box-1">
                <div class="gridspan">
                    <div class="col-left">
                        <div class="label-container">
                            <div class="card-title">
                                EdMOOC
                            </div>
                            <div class="card-content ">
                                {{$userLogin->name}}
                                <br>
                                {{$userLogin->email}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="student-box-2">
                <div class="gridspan">
                    <div class="col-left">
                        <div class="label-container">
                            <div class="card-title text-center">
                                0
                            </div>
                             <div class="card-content text-center">
                                Program Dibuat
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="student-box-2">
                <div class="gridspan">
                    <div class="col-left">
                        <div class="label-container">
                            <div class="card-title text-center">
                                0
                            </div>
                             <div class="card-content text-center">
                                Kursus Dibuat
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="student-box-2">
                <div class="gridspan">
                    <div class="col-left">
                        <div class="label-container">
                            <div class="card-title text-center">
                                0
                            </div>
                             <div class="card-content text-center">
                                Jumlah Siswa
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="student-course-head">
            <h1>
                FITUR
            </h1>
            <hr>
        </div>
        <div class="row">
            <div class="column">
                <div class="card">
                    <div class="gridspan">
                        <div class="col-left">
                            <div class="label-container">
                                <img src="{{ URL('img/prof.jpg') }}" class="card-image">
                            </div>
                        </div>
                        <div class="col-right">
                            <div class="label-container">
                                <div class="title">
                                    Kursus Professional
                                </div>
                                <div class="desc">
                                    <p class="JustifyFull">
                                        Kursus professioanal merupakan kursus yang menawarkan sertifikat professioanal terakreditasi
                                    </p>
                                    <a href="{{ URL('dashboard/course/list') }}">Pelajari lebih lanjut</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="gridspan">
                        <div class="col-left">
                            <div class="label-container">
                                <img src="{{ URL('img/academic.jpg') }}" class="card-image">
                            </div>
                        </div>
                        <div class="col-right">
                            <div class="label-container">
                                <div class="title">
                                    Kursus Akademik
                                </div>
                                <div class="desc">
                                    <p class="JustifyFull">
                                        Kursus akademik merupakan kursus berjenjang yang menawarkan gelar jika telah menyelesaikan keseluruhan kursus...
                                    </p>
                                    <a href="{{ URL('dashboard/company/program') }}">Pelajari lebih lanjut</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>

        </div>
    </section>
    @elseif($userLogin->role == 'tutor')
    <section class="content">
        <div class="student-box">
            
            <div class="student-box-1">
                <div class="gridspan">
                    <div class="col-left">
                        <div class="label-container">
                            <div class="card-title">
                                EdMOOC
                            </div>
                            <div class="card-content ">
                                {{$userLogin->name}}
                                <br>
                                {{$userLogin->email}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="student-box-2">
                <div class="gridspan">
                    <div class="col-left">
                        <div class="label-container">
                            <div class="card-title text-center">
                                2
                            </div>
                             <div class="card-content text-center">
                                Kursus Diajar
                             </div>
                        </div>
                    </div>
                </div>
            </div>
          
           
        </div>
        <div class="tutor-course">
            <div class="tutor-course-head">
                <h1>
                    MY COURSES
                </h1>
                <hr>
            </div>
            <div class="tutor-course-body">
                
                {{--@foreach ($tcourses as $course)--}}
                    
                <div class="tutor-course-list ">
                    <div class="top-section gridspan">
                        <div class="col-left">
                            <img src="{{ URL('img/dummy.jpg') }}" class="course-image">
                        </div>
                        <a href="" class="link">
                        <div class="col-right">
                            <div class="course-detail">
                               
                                <h3 class="course-name">Ekonomi Makro & Mikro
                                </h3> 
                                <span class="label">Institution A</span>
                                <span class="label">Kursus Professional</span>
                                <h5 class="course-description">Kursus mempelajari teori eknonomi makro dan mikro
                                </h5>
                            </div>
                        </div>
                        </a>                          
                    </div>
                </div>
                
                {{--@endforeach--}}
                {{--@foreach ($taccourse as $course)    
                <div class="tutor-course-list ">
                    <div class="top-section gridspan">
                       
                        
                        <div class="col-left">
                            <img src="{{ URL('img/dummy.jpg') }}" class="course-image">
                        </div>
                        <div class="col-right">
                            <div class="course-detail">
                                
                                <h3 class="course-name">Programming Dasar
                                </h3> 
                                <span class="label">Company1</span>
                            <span class="label">Kursus Professional</span>
                           
                            <h5 class="course-description">tes
                            </h5>
                        </div>
                        </div>                     
                        
                    </div>
                </div> 
                @endforeach--}}
                
            </div>
        </div>
    </section>
    @endif
@endsection