@extends('layouts.template-visitor')

@section('menu')
    
    <li class="nav-item">
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
                            <h2>Program Catalog</h2>
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
                        Institution
                    </div>
                    <div class="filter-body">
                        
                        <form action="{{URL('')}}" method="post">
                            {{ csrf_field() }}
                            @foreach($companies as $company)
                            <label class="filter-container">
                                {{$company->name}}
                                <input type="checkbox" name="Academic">
                                <span class="checkmark"></span>
                            </label>
                            @endforeach
                        </form>
                    </div>
                </div>
               
                <div class="filter-box">
                    <div class="filter-header">
                        Category
                    </div>
                   
                    <div class="filter-body">
                        @foreach($categories as $cat)
                        <label class="filter-container">
                            {{$cat->name}}
                            <input type="checkbox"  data-id="{{ $cat->id }}" name="category_id">
                            <span class="checkmark"></span>
                        </label>
                        @endforeach
                    </div>
                    
                </div>
        
            </div>
            <div class="right-section">
                @foreach ($program as $p)
                @if($p->status == '1')
                <a href="">
                <div class="course-list ">
                    <div class="top-section gridspan">
                            <img src="{{ URL('img/dummy.jpg') }}" class="course-image">
                        <div class="col-left">
                            <div class="course-detail">
                                    <h3 class="course-name">{{ $p->name }}</h3>
                                <div class="label-container">
                                    <span class="label">{{$p->company->name}}</span>
                                </div>
                                <hr>
                                <h5 class="course-description">{{str_limit($p->description, 80)}}
                                </h5>  
                            </div>
                        </div>  
                    </div>
                    <div class="bottom-section gridspan">
                        <div class="col-left">
                            
                        </div>
                        <div class="col-right">
                        <a class="enroll-btn" type="button" href="{{route('enroll' ,[$p->id] )}}">Enroll</a>    
                          
                        </div>    
                    </div>
                </div>
                </a>
               
                @else 
                <div>

                </div>
                @endif
               
                @endforeach
                
               
                
               
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