@extends('layouts.template-student')

@section('tab-title')
    <title>Jawaban Kuis - EdMOOC</title>
@endsection

@section('menu')
    <li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
@endsection

@section('content')

    <link rel="stylesheet" href="{{ URL('css/dashboard/tutor/quiz/answer-list.css') }}">

    <section class="content">
        <div class="quiz-answer-list">
            <div class="answer-header">
                <div class="answer-header-name">Jawaban Kuis Topik A</div>
            </div>
            <div class="answer-container">
                <div class="answer-list gridspan">
                    <div class="student-name header">Nama</div>
                    <div class="submit-time header">Submit Time</div>
                    <div class="score header">Nilai</div>
                </div>
                <div v-for="n in 5" class="answer-list gridspan">
                    <a href="{{ URL('/dashboard/tutor/topic/'.$topic->id.'/quiz/result/'.$topic->id) }}" class="student-name">Budi</a>
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