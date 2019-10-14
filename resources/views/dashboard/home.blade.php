@extends('layouts.template-tutor')

@section('tab-title')
    <title>Dashboard - EdMOOC</title>
@endsection

@section('menu')
    @if($userLogin->role == 'student')
        <li class="active"><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
        <li><a href="{{ URL('dashboard/favorite') }}"><i class="fa fa-heart"></i> <span>Favorit Saya</span></a></li>
        <li><a href="{{ URL('dashboard/course/me') }}"><i class="fa fa-book"></i> <span>Kursus Saya</span></a></li>
        <li><a href="{{ URL('dashboard/transaction') }}"><i class="fa fa-list"></i> <span>Riwayat Transaksi</span></a></li>
        <li><a href="{{ URL('dashboard/settings') }}"><i class="fa fa-gear"></i> <span>Pengaturan</span></a></li>
        <li class="header">DAFTAR KURSUS</li>
        <li><a href="{{ URL('course') }}"><i class="fa fa-book"></i> <span>Katalog</span></a></li>
    @elseif($userLogin->role == 'company')
        <li class="active"><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
        <li><a href="{{ URL('dashboard/course/list') }}"><i class="fa fa-book"></i> <span>Kursus Saya</span></a></li>
        <li><a href="{{ URL('dashboard/revenue') }}"><i class="fa fa-list"></i> <span>Pendapatan</span></a></li>
        <li><a href="{{ URL('dashboard/settings') }}"><i class="fa fa-gear"></i> <span>Pengaturan</span></a></li>
    @elseif($userLogin->role == 'tutor')
        <li class="active"><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
        <li><a href="{{ URL('dashboard/list/course') }}"><i class="fa fa-book"></i> <span>Kursus Saya</span></a></li>
        <li><a href="{{ URL('dashboard/settings') }}"><i class="fa fa-gear"></i> <span>Pengaturan</span></a></li>    
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

    <section class="content">
        <h3 class="title"></h3>

        <div class="course-list">
            <div class="gridspan">
                <div class="col-left">
                    <div class="label-container">
                        <span class="label">Company name</span>
                    </div>
                    <h4 class="course-name">Android Basics: User Interface</h4>
                    <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore quibusdam quam incidunt magni ullam, assumenda eveniet a mollitia velit earum accusamus veritatis placeat natus quod. Officiis provident necessitatibus adipisci rem.</p>
                </div>
                <div class="col-right">
                    <div class="proceed-btn">
                        Lanjutkan
                        <span class="fa fa-arrow-right"></span>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection