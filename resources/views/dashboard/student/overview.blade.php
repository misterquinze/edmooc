@extends('layouts.template-student')

@section('tab-title')
    <title>Overview Class</title>
@endsection

@section('menu')
    <li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
    <li><a href="{{ URL('dashboard/list/course') }}"><i class="fa fa-book"></i> <span>Kursus Saya</span></a></li>

{{-- @foreach ($courses as $course) --}}
    <li class="active"><a href="{{ URL('classroom/'.$course->id.'/overview' ) }}"><i class="fa fa-book"></i> <span>Ringkasan</span></a></li>
        
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
                <li><a href="{{ route('student.topic.index',  [ $topic->id]) }}"><i class="fa fa-circle-o"></i>{{$topic->name}}</a></li>
            @endforeach
        </ul>
    </li>
    <li>
        <a href="{{ URL('classroom/'.$course->id.'/forum') }}">
            <i class="fa fa-comment"></i> <span>Forum Diskusi</span>
            {{-- <span class="pull-right-container">
                <small class="label pull-right bg-green">1</small>
            </span> --}}
        </a>
    </li>
    <li><a href="{{ URL('classroom/1/task') }}"><i class="fa fa-book"></i> <span>Tugas</span></a></li>
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/classroom/overview.css') }}"> 

    <section class="content">
        <div id="course">
            <template>
                <div id="display-container">
                    {{-- <div class="gridspan">
                        <h3 class="title">{{$course->name}}</h3>  
                    </div> --}}
                    {{-- <hr> --}}
                    
                    <div class="course-content">    
                        <div class="gridspan">
                            <div class="left-section">
                                <img src="{{ URL('img/dummy.jpg') }}" class="course-image">
                            </div>

                            <div class="right-section">
                                <h2 class="course-name">{{ $course->name }}</h2>

                                <div class="course-detail-title">Deskripsi</div>
                                <div class="course-detail-value">{{ $course->description }}</div>

                                <div class="course-detail-title">Type</div>
                                <div class="course-detail-value">{{ $course->type }}</div>

                                <div class="course-detail-title">Price</div>
                                <div class="course-detail-value">Rp {{ number_format($course->price) }}</div>

                                <div class="course-detail-title">Last Update</div>
                                <div class="course-detail-value">{{ $course->updated_at }}</div>
                            </div>
                        </div>    
                    </div>

                    <div class="topic-content">
                        <div class="topic-content-header gridspan">
                            <h3 class="topic-title">Topik</h3>
                            
                        </div>
                        <div class="topic-list gridspan">
                            <div class="left-section header">Nama Topik</div>
                            <div class="right-section header">Opsi</div>
                        </div>
                        @foreach($topics as $topic)
                            <div class="topic-list gridspan">
                                <div class="left-section">
                                    <a href="{{ route('student.topic.index', [$topic->id]) }}" class="topic-name">
                                        {{$topic->name}}
                                    </a>
                                </div>
                                <div class="right-section">
                                   
                                </div>
                            </div>
                        @endforeach
                    </div> 
                    {{--<div class="course-content">
                        <div class="gridpsan">
                            <div class="left-section">
                                <img src="{{ URL('img/dummy.jpg') }}" class="course-image">
                            </div>
                            <div class="right-section">
                                <h2 class="course-title">Welcome to {{$course->name}}</h2>
                                <h5 class="course-detail">{{$course->description}}
                                </h5>
                            </div>

                        </div>
                    </div>
                    
                    <div class="topic-content">
                        @foreach($topics as $topic)
                        <div class="topic-list gridspan"> 
                            <div class="left-section">
                                <a href="{{ route('student.content.index', [$topic->id]) }}" class="topic-name">
                                    {{$topic->name}}
                                  
                                </a>
                            </div>
                            <div class="right-section">
                                  
                            </div>
                        </div>
                        @endforeach            
                    </div>--}}
                
                </div>
                
            </template>
        </div>  
    </section>

    <script src="{{ URL('js/vue.js') }}"></script>

    <script>
        new Vue({
            el: '#course',
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
        $("#filterDate").daterangepicker()
        $("#startDate").datepicker()
        $("#endDate").datepicker()

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
                    $('.form-delete#delete-'+id).submit();
                }
            });
        }
    </script>
    
@endsection