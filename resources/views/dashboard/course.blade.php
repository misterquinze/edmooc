@extends('layouts.template-student')

@section('tab-title')
    <title>AdminLTE 2 | Dashboard</title>
@endsection

@section('menu')
    <li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
    <li><a href="{{ URL('dashboard/favorite') }}"><i class="fa fa-heart"></i> <span>Favorit</span></a></li>
    <li class="active"><a href="{{ URL('dashboard/course/me') }}"><i class="fa fa-book"></i> <span>Kursus Saya</span></a></li>
    <li><a href="{{ URL('dashboard/transaction') }}"><i class="fa fa-list"></i> <span>Riwayat Transaksi</span></a></li>
    <li><a href="{{ URL('dashboard/settings') }}"><i class="fa fa-gear"></i> <span>Pengaturan</span></a></li>
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/dashboard/home.css') }}">

    <section class="content-header">
        <h1>
            Dashboard
        </h1>
    </section>

    <section class="content">
        <h3 class="title">KURSUS TERBARU</h3>

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