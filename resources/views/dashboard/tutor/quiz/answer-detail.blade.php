@extends('layouts.template-student')

@section('tab-title')
    <title>Preview Kuis - EdMOOC</title>
@endsection

@section('menu')
    <li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
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