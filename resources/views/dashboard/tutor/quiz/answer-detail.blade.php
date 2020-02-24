@extends('layouts.template-student')

@section('tab-title')
    <title>Preview Kuis - EdMOOC</title>
@endsection

@section('menu')
    <li class="treeview active">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Materi</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            @foreach($topics as $topic)
                <li><a href="{{ URL('classroom/topic/'.$topic->id) }}"><i class="fa fa-circle-o"></i>{{ $topic->name }}</a></li>
            @endforeach
        </ul>
    </li>

    {{-- <li>
        <a href="{{ URL('classroom/1/discussion') }}">
            <i class="fa fa-th"></i> <span>Forum Diskusi</span>
            <span class="pull-right-container">
                <small class="label pull-right bg-green">1</small>
            </span>
        </a>
    </li>

    <li><a href="{{ URL('classroom/1/topic/1/task') }}"><i class="fa fa-book"></i> <span>Tugas</span></a></li> --}}
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/dashboard/tutor/quiz/answer-detail.css') }}">

    <section class="content">
        <div id="forum">
            <template>
                <div id="form-container" class="form-create">
                    
                    <form action="{{route('tutor.quiz.store', [$topic->id])}}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-input-header">
                            <h3>Kuis - {{ $topic->name }}</h3>
                            <div class="description">Ini deskripsi kuis heheh Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate tenetur repudiandae perspiciatis! Et odit ut, atque eius quaerat excepturi fugit eos consectetur quis sequi recusandae? In quibusdam repellat accusantium praesentium.</div>
                        </div>

                        <div class="form-input">
                            <div class="input-container">
                                <h4 class="form-label">Ini Pertanyaan Paragraf</h4>
                                <p class="answer">ini jawaban. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam accusantium suscipit voluptate quas error animi quae non ab voluptates ea illo dolor voluptatibus nulla hic excepturi est, voluptatum possimus rem?</p>
                            </div>
                        </div>
                        <div class="form-input">
                            <div class="input-container">
                                <h4 class="form-label">Ini Prtanyaan Pilihan Ganda</h4>
                                <p class="answer">ini jawaban. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam accusantium suscipit voluptate quas error animi quae non ab voluptates ea illo dolor voluptatibus nulla hic excepturi est, voluptatum possimus rem?</p>
                            </div>
                        </div>
                            
                        <div id="add-question-container"></div>

                        <div class="form-input-footer gridspan">
                            <form action="" method="post">
                                {{ csrf_field() }}
                                <div class="score-bottom">Nilai :</div>
                                <input type="text" class="input-answer-option score-input" name="score" autocomplete="off">
                            </form>
                            <button type="submit" class="submit-button">Kirim</button>
                            <span class="cancel-button" @click.prevent="changeType('display')">Batal</span>
                        </div>
                    </form>
                </div>
            </template>
        </div>

    </section>

    <script src="{{ URL('js/vue.js') }}"></script>
    <script>
        new Vue({
            el: '#forum',
            
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
        $(function () {
            $('body').tooltip({
                selector: '[data-toggle="tooltip"]',
                container: 'body'
            });
        });
    </script>
  
@endsection