@extends('layouts.template-student')

@section('tab-title')
<title>Forum Diskusi</title>
@endsection

@section('menu')
    <li><a href="{{ URL('/classroom/1') }}"><i class="fa fa-book"></i> <span>Ringkasan</span></a></li>
        
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Topik</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            {{--@foreach($topics as $topic)
            <li><a href="{{ route('student.topic.index', [$topic->id]) }}"><i class="fa fa-circle-o"></i>{{$topic->name}}</a></li>
            @endforeach--}}
        </ul>
    </li>

    <li class="active">
        <a href="{{ URL('classroom/1/forum') }}">
            <i class="fa fa-comment"></i> <span>Forum Diskusi</span>
        </a>
    </li>

    <li><a href="{{ URL('classroom/1/task') }}"><i class="fa fa-book"></i> <span>Tugas</span></a></li>
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/classroom/discussion.css') }}">
    
    <section class="content">

        <div id="display-container">
            <div class="gridspan">
                <h3 class="title"> Forum Diskusi </h3>
            </div>
            <hr>
            <div class="course-content">
                <div class="gridspan">
                    <div class="right-section">
                        <div class="filter-box">
                            <div class="filter-header">
                                Deskripsi
                            </div>
                            <div class="filter-body">
                                <p>
                                Selamat datang di forum diskusi kursus! silahkan bertanya, berdiskusi dan berdebat materi kursus.
                                </p>
                            </div>
                        </div>
                        <div class="filter-box">
                            <div class="filter-header">
                                Tutor Kursus
                            </div>
                            <div class="filter-body">
                                Sudarjo
                            </div>
                        </div>
                        
                    </div>
                    <div class="left-section">
                        <div class="disc-header gridspan">
                            <div class="head">
                                <a href="{{ url()->previous() }}">
                                <i class="fa fa-arrow-left"></i><span style="margin-left: 3px;">back</span>
                                </a>
                            </div>
                            <div class="head"></div>
                        </div>
                        <div class="disc-list">
                            <div class="course-list">
                                <div class="top-section gridspan">
                                    <div class="col-left">
                                        <img src="{{URL('template/1/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                                    </div>
                                    <div class="col-right">
                                        <div class="course-title" style="margin-bottom: 20px;">
                                            <h2 class="course-name" style="margin-top: 5px; margin-bottom: 5px;"> {{$discussions->title}}</h2>
                                            <span>posted by {{$discussions->user_id}}</span> 
                                        </div>
                                        <div class="course-detail">   
                                            <h5 class="course-description">{{$discussions->content}}</h5>
                                        </div>
                                        <div class="bottom-right gridspan">
                                            <a data-toggle="collapse" href="#1-collapse1reply">
                                                <i class="fa fa-comment-o"></i><span style="margin-left: 5px;">Reply</span>
                                            </a>
                                            
                                        </div>
                                    </div>                      
                                </div>
                            </div>
                            <div id="1-collapse1reply" class="comment-form card-collapse collapse">
                                <div class="top-section gridspan">
                                    <div class="col-left">
                                        <img src="{{URL('template/1/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                                    </div>
                                    <div class="col-right">
                                        <form action="{{route('addComment', $discussions->id)}}" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-comment">
                                                <input type="text" name="content" placeholder="Your comment here" required>
                                            </div>
                                            <div class="button">
                                                <button class="add" type="submit">Submit</button>
                                            </div>
                                        </form>
                                        <div class="bottom-section gridspan">
                                
                                        </div>                      
                                    </div>
                                </div>
                            </div>
                            @forelse($discussions->comments as $c)
                            <div class="show-comment">
                                
                                <div id="comment-box" class="top-section gridspan">
                                    <div class="col-left">
                                        <img src="{{URL('template/1/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                                    </div>
                                    <div class="col-right">
                                        <div class="course-detail">
                                            <h5>{{ $c->id}}</h5>
                                            <h5>
                                            {{$c->content}}
                                            </h5>
                                            <br>
                                            <span></span>
                                        </div>
                                        <div class="bottom-section gridspan">
                                            <a href="">
                                                <i class="fa fa-comment-o"></i><span style="margin-left: 5px;">Reply</span>
                                            </a>
                                        </div>     
                                    </div>                      
                                </div>
                                @forelse($comment->comments as $reply)
                                <div class="show-reply">
                                    <div class="top-section gridspan">
                                        <div class="col-left">
                                            <img src="{{URL('template/1/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                                        </div>
                                        <div class="col-right">
                                            <div class="course-detail">
                                                <h5>
                                                {{$reply->content}}
                                                </h5>
                                                <br>
                                                <span></span>
                                            </div>
                                            <div class="bottom-section gridspan">
                                             
                                            </div>     
                                        </div>                      
                                    </div>
                                </div>
                                @empty
                                <div>no reply</div>
                                @endforelse  
                                <div id="" class="reply-form ">
                                    <div class="top-section gridspan">
                                        <div class="col-left">
                                            <img src="{{URL('template/1/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                                        </div>
                                        <div class="col-right">
                                            <form action="{{route('replyComment', $c->id)}}" method="post">
                                                {{ csrf_field() }}
                                                <div class="form-comment">
                                                    <input type="text" name="content" placeholder="Your reply here" required>
                                                </div>
                                                <div class="button">
                                                    <button class="ad-btn" type="submit">Submit</button>
                                                </div>
                                            </form>
                                            <div class="bottom-section gridspan">
                                            </div>                      
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            @empty
                            <div>no comment</div>
                            @endforelse  
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </section>
@endsection