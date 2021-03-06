@extends('layouts.template-student')

@section('tab-title')
    <title>{{ $topic->name }}</title>
@endsection

@section('menu')
    <li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
    <li><a href="{{ URL('dashboard/list/course') }}"><i class="fa fa-book"></i> <span>Kursus Saya</span></a></li>

    <li><a href="{{ URL('classroom/'.$topic->course->id.'/overview' ) }}"><i class="fa fa-book"></i> <span>Ringkasan</span></a></li>
        
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
    <li class="active"><a href="{{ route('tutor.quiz.index', [$topic->id]) }}"><i class="fa fa-book"></i> <span>Kuis</span></a></li>
@endsection

@section('content')

    <link rel="stylesheet" href="{{ URL('css/dashboard/tutor/quiz/detail.css') }}">

    <section class="content">
        <div class="quiz-detail">
            <div class="quiz-detail__header">
                <div class="top-section">
                    <h2 class="topic-name">Kuis</h2>
                    <a href="{{route('tutor.quiz.create', [$topic->id])}}" class="add-content-button">
                        Tambah Kuis
                    </a>
                </div>
                <div class="bottom-section">
                    {{ $topic->name }}
                </div>
            </div>

            <a href="{{ route('tutor.quiz.preview', [$topic->id]) }}" class="quiz-detail__clickable">
                <div class="quiz-detail__clickable-index">Preview</div>
                <div class="quiz-detail__clickable-name">Lihat Preview Kuis</div>
                <span class="fa fa-angle-right"></span>
            </a>

            <a href="{{ route('tutor.quiz.answer.list', [$topic->id]) }}" class="answer-header">
                <div class="answer-header-name">Jawaban Kuis</div>
                <span class="fa fa-angle-right"></span>
            </a>
            <div class="answer-container">
                <div class="answer-list gridspan">
                    <div class="student-name header">Nama</div>
                    <div class="submit-time header">Submit Time</div>
                    <div class="score header">Nilai</div>
                </div>
                <div v-for="n in 5" class="answer-list gridspan">
                    <a href="{{ route('tutor.quiz.answer.index', [$topic->id,1]) }}" class="student-name">Budi</a>
                    <div class="submit-time">2020-02-15, 12:50</div>
                    <div class="score">100</div>
                </div>
            </div>
        </div>
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