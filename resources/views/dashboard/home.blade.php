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
        <li><a href="{{ URL('dashboard/company/program') }}"><i class="fa fa-book"></i> <span>Akademik</span></a></li>
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
        <div class="gridspan">
            <div class="course-left">
                <div class="gridspan">
                    <div class="col-left">
                        <div class="label-container">
                            <div class="card-title text-center">
                                Member Sejak
                            </div>
                            <div class="card-content text-center">
                                {{$userLogin->created_at->format('d M Y')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="course-middle">
                <div class="gridspan">
                    <div class="col-left">
                        <div class="label-container">
                            <div class="card-title text-center">
                                0
                            </div>
                             <div class="card-content text-center">
                                Kursus 
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="course-right">
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
        <div class="gridspan">
            <div class="card-left">
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
            <div class="card-right">
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
    </section>
    @elseif($userLogin->role == 'tutor')
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
                            Selamat datang di halaman dasbor Tutor!
                        </div>
                        <div class="desc">
                            <p class="JustifyFull">
                                Anda sebagai tutor dapat membuat materi kursus pada kursus yang anda ajar 

                                
                            </p>

                            <a href="">Pelajari lebih lanjut</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gridspan">
            
            <div class="course-left">
                <div class="gridspan">
                    <div class="col-left">
                        <div class="label-container">
                            <div class="card-title text-center">
                                Member Sejak
                            </div>
                            <div class="card-content text-center">
                                {{$userLogin->created_at->format('d M Y')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="course-middle">
                <div class="gridspan">
                    <div class="col-left">
                        <div class="label-container">
                            <div class="card-title text-center">
                                0
                            </div>
                             <div class="card-content text-center">
                                Kursus Diajar
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection