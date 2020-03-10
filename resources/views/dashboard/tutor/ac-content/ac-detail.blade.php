@extends('layouts.template-student')

@section('tab-title')
    @foreach($ac_contents as $cont)
    <title>{{$cont->title}}</title>
    @endforeach
@endsection

@section('menu')
    <li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
    <li><a href="{{route('tutor.actopic.index', [$ac_topic->Ac_course->id]) }}"><i class="fa fa-book"></i> <span>Ringkasan</span></a></li>
    <li><a href="{{ URL('/dashboard/tutor/' .$ac_topic->Ac_course->id.  '/actopic/'.$ac_topic->id) }}"><i class="fa fa-book"></i> <span>{{$ac_topic->name}}</span></a></li>
    
    {{--<li class="treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Topik</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu active">
            <li><a href="{{ route('tutor.actopic.index', [$ac_topic->id]) }}"><i class="fa fa-circle-o"></i>{{$ac_topic->name}}</a></li>
        </ul>
    </li>--}}
    <li>
        <a href="{{ URL('classroom/1/discussion') }}">
            <i class="fa fa-comment"></i> <span>Forum Diskusi</span>
            <span class="pull-right-container">
            
            </span>
        </a>
    </li>

    <li><a href="{{ URL('classroom/1/topic/1/task') }}"><i class="fa fa-book"></i> <span>Tugas</span></a></li>
@endsection

@section('content')

    <link rel="stylesheet" href="{{ URL('css/dashboard/tutor/topic/content.css') }}">

    
    <section class="content">
        <div id="content">
            <template>
                <div id="display-container">
                    <div class="gridspan">
                    <h5 class="title"> <a href="{{route('tutor.actopic.index', [$ac_topic->Ac_course->id]) }}">{{$ac_topic->Ac_course->name}}</a> > <a href="{{ URL('/dashboard/tutor/' .$ac_topic->Ac_course->id.  '/actopic/'.$ac_topic->id) }}">{{$ac_topic->name}}</a> > <a href="">{{$cont->title}}</a> </h5>
                    </div>
                    <hr>
                    <div class="topic-content">
                        <div class="gridspan">
                            <div class="right-section">
                                <div class="filter-box">
                                    <div class="filter-header">
                                        {{$ac_topic->name}}
                                    </div>
                                    @foreach ($ac_contents as $ac)
                                    <div class="filter-body">
                                        <a href="">{{$ac->title}}</a> 
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="left-section">
                                @if ($ac_content->isEmpty())
                                @if (session('content'))
                                    <div class="card-body">
                                        <h2 class="alert alert-info">
                                            {{ session('content') }}
                                        </h2>
                                    </div>
                                @endif
                                @else
                                @foreach ($ac_content as $cont)
                                    
                                
                                <div class="content-detail">
                                    <div class="content-title">
                                        <h2>{{$cont->title}}</h2>
                                    </div>
                                    @if($cont->type == 'video')
                                    <div class="content-video">
                                        <video src="{{asset ( $cont->source)}}" frameborder="1" width="700" controls></video>
                                    </div>
                                    <div class="explanation" style="text-justify">
                                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates saepe corruptiasperiores quas tempore. Quibusdam repudiandae officia ex consequuntur voluptatum, reprehenderit numquam doloremque quam cupiditate eum fuga necessitatibus sequi consectetur!
                                        </p>
                                    </div>
                                    @elseif($cont->type == 'slide')
                                    <div class="topic-slide">
                                        {{asset ( $cont->source)}}
                                    </div>
                                    <div class="explanation">
                                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates saepe corrupti asperiores quas tempore. Quibusdam repudiandae officia ex consequuntur voluptatum, reprehenderit numquam doloremque quam cupiditate eum fuga necessitatibus sequi consectetur!
                                        </p>
                                    </div>
                                    @else 
                                    <div class="explanation">
                                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates saepe corrupti asperiores quas tempore. Quibusdam repudiandae officia ex consequuntur voluptatum, reprehenderit numquam doloremque quam cupiditate eum fuga necessitatibus sequi consectetur!
                                        </p>
                                    </div>
                                    @endif
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </section>


<script src="{{ URL('js/vue.js') }}"></script>
{{-- <script src="{{ URL('js/sweetalert.min.js') }}"></script> --}}

<script>
    new Vue({
        el: '#content',
        
        methods: {
            changeType(type){
                if(type == 'display'){
                    $("#display-container").show()
                    $("#form-container").hide()
                }else{
                    $("#display-container").hide()
                    $("#form-container").show()
                }
            }
        }

    });
</script>
@endsection