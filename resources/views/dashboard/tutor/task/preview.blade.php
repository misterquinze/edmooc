@extends('layouts.template-student')

@section('tab-title')
    <title>Preview Tugas - EdMOOC</title>
@endsection

@section('menu')
    <li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/dashboard/tutor/quiz/preview.css') }}">

    <section class="content">
        <div id="forum">
            <template>
                <div id="form-container" class="form-create">
                    
                    <form action="{{route('tutor.task.store', [$courses->id])}}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-input-header">
                            <h3>Tugas -  {{ $courses->name }}  </h3>
                            <div class="description">Ini deskripsi kuis heheh Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate tenetur repudiandae perspiciatis! Et odit ut, atque eius quaerat excepturi fugit eos consectetur quis sequi recusandae? In quibusdam repellat accusantium praesentium.</div>
                        </div>

                        @foreach ($questions as $index => $question)
                            {{-- {{ dd($question) }} --}}
                            @if($question->type == 'Paragraph')
                                <div id="essay-'+question+'" class="form-input">
                                    <div class="input-container">
                                        <input type="hidden" name="type[{{ $index - 1 }}]" value="Paragraph">
                                        <h4 class="form-label">{{ $question->questions }}</h4>
                                        <input type="text" class="input-long-text" name="question[{{ $index - 1 }}]" autocomplete="off" placeholder="Teks jawaban essay" required>
                                    </div>
                                </div>
                            @elseif($question->type == 'Multiple Choice')
                                <div id="multiple-{{ $index }}" class="form-input">
                                    <div class="input-container">
                                        <input type="hidden" name="type[{{ $index - 1 }}]" value="Multiple Choice">
                                        <h4 class="form-label">{{ $question->questions }}</h4>
                                        
                                        @foreach ($question->options as $option)
                                            <label class="radio-container">
                                                {{ $option->option }}
                                                <input type="radio" name="week" value="1">
                                                <span class="checkmark"></span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div id="add-question-container"></div>

                        <div class="form-input-footer gridspan">
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

    <script>
        let question = 0
        $('#add-essay').click(function(){
            question++
			$('#add-question-container').before('<div id="essay-'+question+'" class="form-input"><span class="fa fa-close remove" onclick="removeQuestion('+1+','+question+')"></span><div class="input-container"><input type="hidden" name="type['+(question-1)+']" value="Paragraph"><input type="text" name="question['+(question-1)+']" class="input-title" autocomplete="off" placeholder="Pertanyaan" required><input type="text" class="input-long-text" value="" autocomplete="off" placeholder="Teks jawaban essay" disabled readonly required></div></div>');
        });
        
        let opsi = new Array();
        opsi[1] = 1

        let multiple = 0
        $('#add-multiple-choice').click(function(){
            question++
            $('#add-question-container').before('<div id="multiple-'+question+'" class="form-input"><span class="fa fa-close remove" onclick="removeQuestion('+2+','+question+')"></span><div class="input-container"><input type="text" name="question['+(question-1)+']" class="input-title" value="" autocomplete="off" placeholder="Pertanyaan" required><input type="hidden" name="type['+(question-1)+']" value="Multiple Choice"><div class="input-option gridspan"><span class="bullet"></span><input type="text" class="input-answer-option" name="opsi['+(question-1)+'][]" autocomplete="off" placeholder="Opsi 1" required></div><p class="add-option" id="add-option-'+question+'-'+(question-1)+'" onclick="addOption('+question+', '+(question-1)+')">Tambahkan opsi</p></div></div>');
            opsi[question] = 0
        });

        function removeQuestion(type, n){
            if(type == 1){
                $('#essay-'+n).remove();
            }else if(type == 2){
                $('#multiple-'+n).remove();
            }
        }
        
        function addOption(n, m){
            opsi[n]++
			$('#add-option-'+n+'-'+m).before('<div id="option-'+n+'-'+opsi[n]+'" class="input-option gridspan"><span class="bullet"></span><input type="text" class="input-answer-option" name="opsi['+m+'][]" autocomplete="off" placeholder="Opsi 1" required></div>');
        }
        

    </script>

  
@endsection