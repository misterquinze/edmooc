@extends('layouts.template-student')

@section('tab-title')
    <title>{{ $topic->name }}</title>
@endsection

@section('menu')
    <li><a href="{{ URL('dashboard/list/course') }}"><i class="fa fa-book"></i> <span>Kursus Saya</span></a></li>

    <li class="active"><a href="{{ URL('classroom/'.$topic->course->id.'/overview' ) }}"><i class="fa fa-book"></i> <span>Ringkasan</span></a></li>
        
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Topik</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        {{-- <ul class="treeview-menu">        
            @foreach($topics as $topic)
                <li><a href="{{ route('tutor.topic.index', [$topic->id]) }}"><i class="fa fa-circle-o"></i>{{$topic->name}}</a></li>
            @endforeach
        </ul> --}}
    </li>
    <li><a href="{{ route('tutor.quiz.index', [$topic->id]) }}"><i class="fa fa-book"></i> <span>Kuis</span></a></li>
@endsection

@section('content')

    <link rel="stylesheet" href="{{ URL('css/classroom/topic.css') }}">

    <section class="content">
        <div class="topic-detail-header">
            <div class="top-section">
                <h2 class="topic-name">{{ $topic->name }}</h2>
                <a href="{{route('tutor.content.create', [$topic->id])}}" class="add-content-button">
                    Tambah Materi
                </a>
            </div>
            <div class="bottom-section">
                {{ $topic->course->name }}
            </div>
        </div>

        @foreach($contents as $index => $content)     
            <a href="{{ URL('/dashboard/'.$topic->course->id.'/tutor/'.$topic->id.'/content/'.$content->id) }}" class="topic-content">
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