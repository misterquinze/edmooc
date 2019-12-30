@extends('layouts.template-tutor')

@section('tab-title')
    <title>Kursus - Tutor - MOOC</title>
@endsection

@section('menu')
    <li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
    <li class="active"><a href="{{ URL('dashboard/course/me') }}"><i class="fa fa-book"></i> <span>Kursus</span></a></li>
    {{-- <li><a href="{{ URL('dashboard/settings') }}"><i class="fa fa-gear"></i> <span>Pengaturan</span></a></li> --}}
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/tutor/course.css') }}">

    <section class="content-header">
        <h1>
            Kursus
        </h1>
    </section>

    <section class="content">

        <div class="gridspan">
            <div class="search-section">
                <p>Search by Name</p>
                <input type="text" name="searchQuery" class="search-input" placeholder="Search Course Name">
            </div>
            <div class="search-section">
                <p>Filter by Date</p>
                <input type="text" name="searchQuery" class="search-input" placeholder="">
            </div>
        </div>

        <a href="#">
            <div class="course-list">
                <h4 class="course-name">Android Basics: User Interface</h4>
            </div>
            <div class="course-list">
                <h4 class="course-name">Android Basics: User Interface</h4>
            </div>
            <div class="course-list">
                <h4 class="course-name">Android Basics: User Interface</h4>
            </div>
        </a>

    </section>
@endsection