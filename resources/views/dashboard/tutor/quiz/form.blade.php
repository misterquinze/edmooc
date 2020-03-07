@extends('layouts.template-student')

@section('tab-title')
    <title>Create Kuis - EdMOOC</title>
@endsection

@section('menu')
    <li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
@endsection

@section('content')
    {{-- <link rel="stylesheet" href="{{ URL('css/classroom/discussion/create.css') }}"> --}}
    <link rel="stylesheet" href="{{ URL('css/tutor/quiz/form.css') }}">

    <section class="content">
        <div id="forum">
            <template>
                <div id="form-container" class="form-create">
                    <div class="form-input-header">
                        <h3>Buat Kuis Baru</h3>
                        <input type="text" class="input-long-text" value="" autocomplete="off" placeholder="Deskripsi Kuis" required>
                        
                    </div>
                
                    <form action="{{route('content.store', [$topic->id])}}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-input">
                            <span class="fa fa-close remove"></span>
                            <div class="input-container">
                                <input type="text" name="title" class="input-title" value="" autocomplete="off" placeholder="Pertanyaan" required>
                                <input type="text" class="input-long-text" value="" autocomplete="off" placeholder="Teks jawaban essay" disabled readonly required>
                            </div>
                        </div>

                        <div class="form-input">
                            <span class="fa fa-close remove"></span>
                            <div class="input-container">
                                <input type="text" name="title" class="input-title" value="" autocomplete="off" placeholder="Pertanyaan" required>
                                <div class="input-option gridspan">
                                    <span class="bullet"></span>
                                    <input type="text" class="input-answer-option" value="" autocomplete="off" placeholder="Opsi 1" required>
                                </div>
                                <div class="input-option gridspan">
                                    <span class="bullet"></span>
                                    <input type="text" class="input-answer-option" value="" autocomplete="off" placeholder="Opsi 1" required>
                                </div>
                                <div class="input-option gridspan">
                                    <span class="bullet"></span>
                                    <input type="text" class="input-answer-option" value="" autocomplete="off" placeholder="Opsi 1" required>
                                </div>
                                <div class="input-option gridspan">
                                    <span class="bullet"></span>
                                    <input type="text" class="input-answer-option" value="" autocomplete="off" placeholder="Opsi 1" required>
                                </div>
                                <div class="input-option gridspan">
                                    <span class="bullet"></span>
                                    <input type="text" class="input-answer-option" value="" autocomplete="off" placeholder="Opsi 1" required>
                                </div>
                                <p class="add-option">Tambahkan opsi</p>
                            </div>
                        </div>
                        



                        <div class="form-input-footer gridspan">
                            <button type="submit" class="submit-button">Kirim</button>
                            <span class="cancel-button" @click.prevent="changeType('display')">Batal</span>
                        </div>
                    </form>

                    
                    <nav class="float-action-button">
                        <div href="#" class="buttons" title="Essay" data-toggle="tooltip" data-placement="left">
                            <i class="fa fa-paragraph"></i>
                        </div>
                        <div href="#" class="buttons" title="Pilihan Ganda" data-toggle="tooltip" data-placement="left">
                            <i class="fa fa-list-ul"></i>
                        </div>
                        <div href="#" class="buttons main-button">
                            <i class="fa fa-plus"></i>
                        </div>
                    </nav>
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