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
    <link rel="stylesheet" href="{{ URL('css/dashboard/tutor/score/list.css') }}"> 

    <section class="content">
        <div id="score">
            <template>
                <h2 class="score-title">Rekap Nilai</h2>
                <div class="score-title-underline"></div>

                <template v-for="(n,index) in 5">
                    <a href="{{ route('tutor.score.detail', [$course->id,1]) }}" class="score-list gridspan">
                        <div class="number-list">@{{ index+1 }}</div>
                        <img src="{{ URL('img/dummy.jpg') }}" class="student-photo">
                        <p class="student-name">Budi Sudarson</p>
                        <div class="student-score">100</div>
                        <span class="fa fa-angle-right"></span>
                    </a>
                </template>
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