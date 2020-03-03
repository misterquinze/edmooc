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
        <h3 class="title"></h3>

        <div class="course-list">
            <div class="gridspan">
                <div class="col-left">
                    <div class="label-container">
                        
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
                        <p> Selamat datang di halaman dasbor Institusi</p>
                        <p> Untuk membuat kursus professional silahan membuka menu Professioanl</p>
                        <p> Untuk membuat kursus akademik silahan membuka menu Akaedmik</p>
                        
                    </div>
                    
                </div>
                <div class="col-right">
                    <div class="proceed-btn">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    @elseif($userLogin->role == 'tutor')
    <section class="content">
        <h3 class="title">tutor</h3>
            
        <div class="course-list">
            <div class="gridspan">
                <div class="col-left">
                    <div class="label-container">

                    </div>
                    
                </div>
                <div class="col-right">
                    <div class="proceed-btn">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection