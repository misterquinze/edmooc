@extends('layouts.template-student')

@section('tab-title')
    @foreach($contents as $cont)
    <title>{{$cont->title}}</title>
    @endforeach
@endsection

@section('menu')

    {{--<li class="active"><a href="{{ URL('classroom/'.$topic->course->id.'/overview' ) }}"><i class="fa fa-book"></i> <span>Ringkasan</span></a></li>--}}
    <li><a href="{{route('tutor.topic.index', [$topic->course->id]) }}"><i class="fa fa-book"></i> <span>Ringkasan</span></a></li>
    <li><a href="{{ URL('/dashboard/tutor/' .$topic->course->id.  '/actopic/'.$topic->id) }}"><i class="fa fa-book"></i> <span>{{$topic->name}}</span></a></li>
    <li class="treeview active">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Materi</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            {{--<li class="active"><a href="{{ URL('classroom/1/topic/1') }}"><i class="fa fa-circle-o"></i> 1: Sistem Informasi</a></li>
            <li><a href="{{ URL('classroom/1/topic/2') }}"><i class="fa fa-circle-o"></i> 2: Rekayasa Perangkat Lunak</a></li>
            <li><a href="{{ URL('classroom/1/topic/3') }}"><i class="fa fa-circle-o"></i> 3: Web Development</a></li>
            <li><a href="{{ URL('classroom/1/topic/4') }}"><i class="fa fa-circle-o"></i> 4: Basisdata</a></li>-
            @foreach($topics as $topic)
            <li><a href="{{ URL('classroom/'.$topic->id.'/topic') }}"><i class="fa fa-circle-o"></i>{{$topic->name}}</a></li>
            @endforeach --}}
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

    <link rel="stylesheet" href="{{ URL('css/dashboard/tutor/topic/content.css') }}">

    
    <section class="content">
        <div id="content">
            <template>
                <div id="display-container">
                    <div class="gridspan">
                    <h5 class="title"> <a href="{{route('student.overview', [$topic->course->id]) }}">{{$topic->course->name}}</a> > <a href="{{ URL('/dashboard/student/' .$topic->course->id.  '/topic/'.$topic->id) }}">{{$topic->name}}</a> > <a href="">{{$cont->title}}</a> </h5>
                    </div>
                    <hr>
                    <div class="topic-content">
                        <div class="gridspan">
                            <div class="right-section">
                                <div class="filter-box">
                                    <div class="filter-header">
                                        {{$topic->name}}
                                    </div>
                                    @foreach ($contents as $cont)
                                    <div class="filter-body">
                                        <a href="">{{$cont->title}}</a> 
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="left-section">
                                @if ($content->isEmpty())
                                @if (session('content'))
                                    <div class="card-body">
                                        <h2 class="alert alert-info">
                                            {{ session('content') }}
                                        </h2>
                                    </div>
                                @endif
                                @else
                                @foreach ($content as $cont)
                                    
                                
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