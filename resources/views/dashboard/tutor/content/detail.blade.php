@extends('layouts.template-student')

@section('tab-title')
    
    <title>{{$content->title}}</title>
   
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
            <i class="fa fa-comment"></i> <span>Forum Diskusi</span>
            
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
                    <h5 class="title"> <a href="{{route('tutor.topic.index', [$topic->course->id]) }}">{{$topic->course->name}}</a> > <a href="{{ URL('/dashboard/tutor/' .$topic->course->id.  '/topic/'.$topic->id) }}">{{$topic->name}}</a> > {{$content->title}} </h5>
                    <h5 class="navigation">  <a href=""> < Sebelumnya </a> | <a href=""> Selanjutnya > </a>  </h5>
                    </div>
                    <hr>
                    <div class="topic-content">
                        <div class="gridspan">
                        
                            <div class="left-section">
                                <div class="content-detail">
                                    <div class="content-title">
                                        <h2>{{$content->title}}</h2>
                                    </div>
                                    @if($content->type == 'video')
                                    <div class="content-video">
                                        <video src="{{asset ( $content->source)}}" frameborder="1" width="700" controls></video>
                                    </div>
                                    <div class="explanation" style="text-justify">
                                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates saepe corruptiasperiores quas tempore. Quibusdam repudiandae officia ex consequuntur voluptatum, reprehenderit numquam doloremque quam cupiditate eum fuga necessitatibus sequi consectetur!
                                        </p>
                                    </div>
                                    @elseif($content->type == 'slide')
                                    <div class="topic-slide">
                                        {{asset ( $content->source)}}
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