@extends('layouts.template-student')

@section('tab-title')
    <title>AdminLTE 2 | Dashboard</title>
@endsection

@section('menu')
    <li><a href="{{ URL('/classroom/1') }}"><i class="fa fa-book"></i> <span>Ringkasan</span></a></li>
    
    <li class="treeview active">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Materi</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="active"><a href="{{ URL('classroom/1/topic/1') }}"><i class="fa fa-circle-o"></i> 1: Sistem Informasi</a></li>
            <li><a href="{{ URL('classroom/1/topic/2') }}"><i class="fa fa-circle-o"></i> 2: Rekayasa Perangkat Lunak</a></li>
            <li><a href="{{ URL('classroom/1/topic/3') }}"><i class="fa fa-circle-o"></i> 3: Web Development</a></li>
            <li><a href="{{ URL('classroom/1/topic/4') }}"><i class="fa fa-circle-o"></i> 4: Basisdata</a></li>
        </ul>
    </li>

    <li>
        <a href="{{ URL('classroom/1/discussion') }}">
            <i class="fa fa-th"></i> <span>Forum Diskusi</span>
            <span class="pull-right-container">
                <small class="label pull-right bg-green">1</small>
            </span>
        </a>
    </li>

    <li><a href="{{ URL('classroom/1/topic/1/task') }}"><i class="fa fa-book"></i> <span>Tugas</span></a></li>
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/classroom/topic.css') }}">

    <section class="content-header">
        <h1>
            Topik 1: Sistem Informasi
        </h1>
    </section>

    <section class="content">
        <iframe 
            class="topic-video"
            src="https://www.youtube.com/embed/9xwazD5SyVg" 
            frameborder="0" 
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" a
            llowfullscreen>
        </iframe>

        <div class="explanation">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates saepe corrupti asperiores quas tempore. Quibusdam repudiandae officia ex consequuntur voluptatum, reprehenderit numquam doloremque quam cupiditate eum fuga necessitatibus sequi consectetur!</p>
        </div>
        
        
    </section>
@endsection