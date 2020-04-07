@extends('layouts.template-visitor')

@section('menu')
    
    <li class="nav-item active">
        <a class="nav-link" href="{{ URL('course') }}">Courses</a>
    </li>
   
@endsection

@section('content')
    {{--<link rel="stylesheet" href="{{ URL('css/all.css') }}">--}}
    <link rel="stylesheet" href="{{ URL('css/visitor/course.css') }}">

    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                            <h2>Courses</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
      
    <div class="course-content">
        <div class="gridspan">
            <div class="left-section">
                <h4 class="filter-title">FILTER BY</h4>
                <div class="filter-box">
                    <div class="filter-header">
                        Type
                    </div>
                    <div class="filter-body">
                        
                        <form action="{{URL('')}}" method="post">
                            {{ csrf_field() }}
                            
                            <label class="filter-container">
                                Free Courses
                                <input type="checkbox" name="free">
                                <span class="checkmark"></span>
                            </label>
                            <label class="filter-container">
                                Paid Courses
                                <input type="checkbox" name="paid">
                                <span class="checkmark"></span>
                            </label>
                        </form>
                    </div>
                </div>
                <div class="filter-box">
                    <div class="filter-header">
                        Program
                    </div>
                    <div class="filter-body">
                        
                        <form action="{{URL('')}}" method="post">
                            {{ csrf_field() }}
                            
                            <label class="filter-container">
                                Academic
                                <input type="checkbox" name="free">
                                <span class="checkmark"></span>
                            </label>
                            <label class="filter-container">
                                Professional
                                <input type="checkbox" name="paid">
                                <span class="checkmark"></span>
                            </label>
                        </form>
                    </div>
                </div>
               
                <div class="filter-box">
                    <div class="filter-header">
                        Category
                    </div>
                    <div class="filter-body">
                        <form action="{{ URL('') }}" method="post">
                            {{ csrf_field() }}
                            
                            <label class="filter-container">
                                Business
                                <input type="checkbox" name="free">
                                <span class="checkmark"></span>
                            </label>
                            <label class="filter-container">
                                Technology
                                <input type="checkbox" name="paid">
                                <span class="checkmark"></span>
                            </label>
                        </form>
                    </div>
                </div>
        
            </div>
            <div class="right-section">
                @foreach ($courses as $course)
                <a href="{{ URL('course/' .$course->id. '/preview')}}">
                <div class="course-list ">
                    <div class="top-section gridspan">
                            <img src="{{ URL('img/dummy.jpg') }}" class="course-image">
                        <div class="col-left">
                            <div class="course-detail">
                                    <h3 class="course-name">{{ $course->name }}</h3>
                                <div class="label-container">
                                    <span class="label">{{$course->company->name}}</span>
                                </div>
                                <hr>
                                <h5 class="course-description">{{$course->description}}
                                </h5>  
                            </div>
                        </div>  
                    </div>
                    <div class="bottom-section gridspan">
                        <div class="col-left">
                            @if ($course->type == 'paid')
                                <span class="price">Rp {{ number_format($course->price) }}</span>
                            @else
                                <span class="price">Gratis</span>
                            @endif
                        </div>
                        <div class="col-right">
                        <a class="enroll-btn" type="button" href="{{route('enroll' ,[$course->id] )}}">Enroll</a>    
                          
                        </div>    
                    </div>
                </div>
                </a>
                @endforeach
                @foreach ($accourse as $ac)
                <a href="{{ URL('accourse/' .$ac->id. '/preview')}}"> 
                <div class="course-list ">
                    <div class="top-section gridspan">
                            <img src="{{ URL('img/dummy.jpg') }}" class="course-image">
                        <div class="col-left">
                            <div class="course-detail">
                                
                                <h3 class="course-name">{{ $ac->name }} </h3>
                               
                                <div class="label-container">
                                    <span class="label">{{$ac->company->name}}</span>
                                    <span class="label">kursus akademik</span>
                                    <span class="label">{{$ac->program->name}}</span>
                                </div>
                                <hr>
                                <h5 class="course-description">{{$ac->description}}
                                </h5>  
                            </div>
                        </div>  
                    </div>
                    <div class="bottom-section gridspan">
                        <div class="col-left">
                            <span class="price">Rp {{ number_format($ac->price) }}</span>
                        </div>
                        <div class="col-right">
                        <a class="enroll-btn" type="button" href="{{route('enroll' ,[$ac->id] )}}">Enroll</a>    
                          
                        </div>    
                    </div>
                </div>
                </a>
                @endforeach
                {{$courses->links()}}
            </div>
        </div>
        
    </div> 
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
          alert(msg);
        }
    </script>   
@endsection