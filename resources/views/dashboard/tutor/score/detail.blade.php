@extends('layouts.template-student')

@section('tab-title')
    <title>Overview Class</title>
@endsection

@section('menu')
    <li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
    <li><a href="{{ URL('dashboard/tutor/course/list') }}"><i class="fa fa-book"></i> <span>Kursus Saya</span></a></li>

    <li><a href="{{ URL('classroom/'.$course->id.'/overview' ) }}"><i class="fa fa-book"></i> <span>Ringkasan</span></a></li>
        
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Topik</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">        
            @foreach($topics as $topic)
                <li><a href="{{ route('tutor.topic.index', [$topic->id]) }}"><i class="fa fa-circle-o"></i>{{$topic->name}}</a></li>
            @endforeach
        </ul>
    </li>
    <li><a href="{{ URL('classroom/1/task') }}"><i class="fa fa-book"></i> <span>Tugas</span></a></li>
    <li class="active"><a href=""><i class="fa fa-list"></i> <span>Nilai</span></a></li>
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/dashboard/tutor/score/detail.css') }}"> 

    <section class="content">
        <div id="score">
            <template>
                <div class="score-detail">

                    <div class="score-detail__header gridspan">
                        <img src="{{ URL('img/dummy.jpg') }}" class="student-photo">
                        <div class="student-name">Budi Sudarson</div>
                        <div class="score">100</div>
                    </div>

                    <div class="quiz-score-list__header gridspan">
                        <div class="header-title">
                            Nilai Kuis
                        </div>    
                        <div class="header-score">
                            100
                        </div>
                    </div>
                    <template v-for="n in 5">
                        <div class="quiz-score-list__list gridspan">
                            <div class="content-name">Materi 1</div>
                            <div class="content-score">100</div>
                        </div>
                    </template>

                    <div class="task-score-list__header gridspan">
                        <div class="header-title">
                            Nilai Tugas
                        </div>    
                        <div class="header-score">
                            100
                        </div>
                    </div>
                </div>
            </template>
        </div>  
    </section>

    <script src="{{ URL('js/vue.js') }}"></script>

    <script>
        new Vue({
            el: '#score',
            data() {
                return {
                    type: 'free'
                }
            },
            methods: {
                showData(){
                    return 'hehehe'
                }
            }
        });
    </script>
    
@endsection