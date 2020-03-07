@extends('layouts.template-student')

@section('tab-title')
    <title>Create Tugas - EdMOOC</title>
@endsection

@section('menu')
    <li ><a href="{{ URL('dashboard/tutor/course/1/overview') }}"><i class="fa fa-book"></i> <span>Ringkasan</span></a></li> 
    {{-- <li class="active"><a href="{{ URL('classroom/1/task') }}"><i class="fa fa-book"></i> <span>Tugas</span></a></li> --}}
    <li class="active"><a href="{{ route('tutor.task.index', [$courses ->id]) }}"><i class="fa fa-book"></i> <span>Tugas</span></a></li>
    <li ><a href="{{ URl('dashboard/tutor/course/1/score') }}"><i class="fa fa-list"></i> <span>Nilai</span></a></li>
@endsection

{{-- @section('content')
    <section class="content-header">
        
    </section>

    <section class="content">

    </section>
@endsection --}}

@section('content')

    <link rel="stylesheet" href="{{ URL('css/dashboard/tutor/quiz/detail.css') }}">

    <section class="content">
        <div class="quiz-detail">
            <div class="quiz-detail__header">
                <div class="top-section">
                    <h2 class="topic-name">Tugas</h2>
                    <a href= "{{route('tutor.task.create', [$courses->id])}}" class="add-content-button">
                        Tambah Tugas
                    </a>
                </div>
                <div class="bottom-section">
                    {{ $courses ->name }}
                </div>
                
            </div>

            <a href="{{route ('tutor.task.preview', [$courses->id])}} "  class="quiz-detail__clickable">
                <div class="quiz-detail__clickable-index">Preview</div>
                <div class="quiz-detail__clickable-name">Lihat Preview Tugas</div>
                <span class="fa fa-angle-right"></span>
            </a>

            <a href="{{ route('tutor.task.answer.list', [$courses->id]) }}" class="answer-header">
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
                    <a href="{{ route('tutor.task.answer.index', [$courses->id,1]) }}" class="student-name">Budi</a>
                    <div class="submit-time">2020-02-15, 12:50</div>
                    <div class="score">100</div>
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