@extends('layouts.template-tutor')

@section('tab-title')
    <title>My Course - EdMOOC</title>
@endsection

@section('menu')
    <li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
    <li class="active"><a href="{{ URL('dashboard/tutor/course/list') }}"><i class="fa fa-book"></i> <span>Kursus Saya</span></a></li>
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/tutor/course.css') }}">

    <section class="content-header">
        <h1>
            KURSUS DIAJAR
        </h1>
        <hr>
    </section>

    <section class="content">
        <div class="gridspan">
            <div class="right-section">
                <div class="filter-box">
                    <div class="filter-header">
                        Search
                    </div>
                    <div class="filter-body">
                        <form class="search-group" action="/dashboard/course/search" method="GET">
                            <span>
                                <input type="text" name="search" class="search-input" placeholder="Search course name">
                                <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
            <div class="left-section">

                {{--@if ($courses->isEmpty())
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
                                    <span class="label">Kursus Professional</span>
                                    <h5 class="course-description">{{$course->description}}
                                    </h5>
                                </div>
                            </div>                     
                            <div class="col-right">
                                <div class="proceed-btn">
                                    <a class=" nav-link" href="{{ route('tutor.topic.index', [$course->id]) }}">Materi</a>  
                                </div>
                            </div> 
                        </div>
                    </div> 
                @endforeach
                @foreach ($accourse as $ac)    
                    <div class="course-list ">
                        <div class="top-section gridspan">
                                <img src="{{ URL('img/dummy.jpg') }}" class="course-image">
                                <div class="col-left">
                                <div class="course-detail">
                                    <h3 class="course-name">{{ $ac->name }}</h3> 
                                    <span class="label">Kursus Akademik</span>
                                    <h5 class="course-description">{{$ac->description}}
                                    </h5>
                                </div>
                            </div>                     
                            <div class="col-right">
                                <div class="proceed-btn">
                                    <a class=" nav-link" href="{{route ('tutor.actopic.index', [$ac->id])}} ">Materi</a>  
                                </div>
                            </div> 
                        </div>
                    </div> 
                @endforeach
                @endif--}}
                <table class="table table-bordered">
                    <thead>
                       <tr>
                          <th>Nama Kursus</th>
                          <th>Institusi Kursus</th>
                          <th>Jenis Kursus</th>
                          <th>Kelola</th>
                       </tr> 
                    </thead>
                    <tbody>
                       @foreach($courses as $course)
                          <tr>
                             <td>{{ $course->name }}</td>
                             <td>{{ $course->company->name }}</td>
                             <td> Kursus Professional</td>
                             <td>
                                <a href="{{ route('tutor.topic.index', [$course->id]) }}" class="edit-btn">
                                    Materi
                                </a>
                             </td>
                          </tr>
                       @endforeach
                       @foreach($accourse as $ac)
                          <tr>
                             <td>{{ $ac->name }}</td>
                             <td>{{ $ac->company->name }}</td>
                             <td> Kursus Akademik </td>
                             <td>
                                <a href="{{route ('tutor.actopic.index', [$ac->id]) }}" class="edit-btn">
                                    Materi
                                </a>
                             </td>
                          </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>    
        
    </section>
@endsection