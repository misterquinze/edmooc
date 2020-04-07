@extends('layouts.template-student')

@section('tab-title')
    
    <title>{{$ac_content->title}}</title>
   
@endsection

@section('menu')
    
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
            @foreach ($ac_topics as $topic)
            <li><a href=""><i class="fa fa-circle-o"></i>{{$ac_topic->name}}</a></li>
            @endforeach
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
                    <h5 class="title"> <a href="{{route('tutor.actopic.index', [$ac_topic->Ac_course->id]) }}">{{$ac_topic->Ac_course->name}}</a> > <a href="{{ URL('/dashboard/tutor/' .$ac_topic->Ac_course->id.  '/actopic/'.$ac_topic->id) }}">{{$ac_topic->name}}</a> > {{$ac_content->title}} </h5>
                    </div>
                    <hr>
                    <div class="topic-content">
                        <div class="gridspan">
                            
                            <div class="left-section">
                                
                                <div class="content-detail">
                                    <div class="content-title">
                                        <h2>{{$ac_content->title}}</h2>
                                    </div>
                                    @if($ac_content->type == 'video')
                                    <div class="content-video">
                                        <video src="{{asset ( $ac_content->source)}}" frameborder="1" width="700" controls></video>
                                    </div>
                                    <div class="explanation" style="text-justify">
                                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates saepe corruptiasperiores quas tempore. Quibusdam repudiandae officia ex consequuntur voluptatum, reprehenderit numquam doloremque quam cupiditate eum fuga necessitatibus sequi consectetur!
                                        </p>
                                    </div>
                                    @elseif($ac_content->type == 'slide')
                                    <div class="topic-slide">
                                        {{asset ( $ac_content->source)}}
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