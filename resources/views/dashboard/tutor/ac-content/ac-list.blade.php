@extends('layouts.template-student')

@section('tab-title')
    <title>{{ $ac_topic->name }}</title>
@endsection

@section('menu')
    
    <li><a href="{{route('tutor.actopic.index', [$ac_topic->Ac_course->id]) }}"><i class="fa fa-book"></i> <span>Ringkasan</span></a></li>
    <li class="treeview active">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Topik</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">        
            @foreach($ac_topics as $topic)
                <li><a href=""><i class="fa fa-circle-o"></i>{{$topic->name}}</a></li>
            @endforeach
        </ul> 
    </li>
    <li>
        <a href="{{ URL('classroom/1/discussion') }}">
            <i class="fa fa-comment"></i> <span>Forum Diskusi</span>
            <span class="pull-right-container">
            
            </span>
        </a>
    </li>
    <li><a href="{{ route('tutor.quiz.index', [$ac_topic->id]) }}"><i class="fa fa-book"></i> <span>Kuis</span></a></li>
@endsection

@section('content')

    <link rel="stylesheet" href="{{ URL('css/classroom/topic.css') }}">

    <section class="content">
        <div class="topic-detail-header">
            <div class="top-section">
                <h2 class="topic-name">{{ $ac_topic->name }}</h2>
                <a href="{{route('tutor.accontent.create', [$ac_topic->id])}}" class="add-content-button">
                    Tambah Materi
                </a>
            </div>
            <div class="bottom-section">
                {{ $ac_topic->Ac_course->name }}
            </div>
        </div>

        @foreach($ac_contents as $index => $content)     
            <a href="{{ URL('/dashboard/'.$ac_topic->Ac_course->id. '/tutor/' .$ac_topic->id. '/accontent/'.$content->id) }}" class="topic-content">
                <div class="topic-content-index">Materi {{ $index+1 }}</div>
                <div class="topic-content-name">{{ $content->title }}</div>
                <span class="fa fa-angle-right"></span>
            </a>
        @endforeach
    </section>


    <script src="{{ URL('js/vue.js') }}"></script>
    <script>
        new Vue({
            el: '#topic',
            data() {
                return {
                courseType: 'free',
                }
            },
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
    <script>
        function deleteTopic(id) {
            swal({   
                title: "Apakah anda yakin?",
                text: "Data topik yang dihapus tidak dapat dikembalikan",
                icon: "warning",
                closeOnClickOutside: true,
                buttons: ["Batal","Hapus"],
            })
            .then((willDelete) => {
                if(willDelete){
                    $('.form-delete#deleteTopic-'+id).submit();
                }
            });
        }
    </script>
@endsection