@extends('layouts.template-student')

@section('tab-title')
    <title>Overview Class</title>
@endsection

@section('menu')
@foreach ($courses as $course)
    
    <li class="active"><a href="{{ URL('classroom/'.$course->id.'/overview' ) }}"><i class="fa fa-book"></i> <span>Ringkasan</span></a></li>
        
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Materi</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            
            @foreach($topics as $topic)
            <li><a href="{{ route('topic.index', [$topic->id]) }}"><i class="fa fa-circle-o"></i>{{$topic->name}}</a></li>
            @endforeach
            {{--<li><a href="{{ URL('classroom/'.$course->topics->id.'/topic') }}"><i class="fa fa-circle-o"></i> Minggu Ke-2</a></li>
            <li><a href="{{ URL('classroom/'.$course->topics->id.'/topic') }}"><i class="fa fa-circle-o"></i> Minggu Ke-3</a></li>
            <li><a href="{{ URL('classroom/'.$course->topics->id.'/topic') }}"><i class="fa fa-circle-o"></i> Minggu Ke-4</a></li>--}}
           
        </ul>
    </li>
    <li>
        <a href="{{ URL('classroom/'.$course->id.'/forum') }}">
            <i class="fa fa-th"></i> <span>Forum Diskusi</span>
            {{-- <span class="pull-right-container">
                <small class="label pull-right bg-green">1</small>
            </span> --}}
        </a>
    </li>
    <li><a href="{{ URL('classroom/1/task') }}"><i class="fa fa-book"></i> <span>Tugas</span></a></li>
@endsection
@section('content')
    <link rel="stylesheet" href="{{ URL('css/classroom/overview.css') }}"> 

    {{-- <div class="register-content">
        <div id="register">
            <template>
                <div class="tab-menu">
                    <ul class="gridspan">
                        <li @click.prevent="changeType('course')" :class="{'is-active': type=='course'}">Kursus</li>
                        
                        
                    </ul>
                </div>
    
                <div v-if="type == 'course'" class="register-box">
                
                    <h2 class="title">{{$course->name}}</h2>
                    <p class="sub-title">{{$course->description}}</p>
                
                  
                </div>
                
                    
                </template>
            </div>
        </div> --}}
        <section class="content">
            <div id="course">
                <template>
                    <div id="display-container">
                        <div class="gridspan">
                            <h3 class="title">{{$course->name}}</h3>  
                        </div>
                        <hr>
                        <div class="course-content">    
                            <div class="gridspan">
                                <div class="right-section">
                                    <div class="filter-box">
                                        <div class="filter-header">
                                                Tipe Kursus
                                        </div>
                                        <div class="filter-body">
                                            <h5>{{$course->type}}</h5> 
                                        </div>
                                    </div>
                                    <div class="filter-box">
                                        <div class="filter-header">
                                            Kursus Dimulai
                                        </div>
                                        <div class="filter-body">
                                            <h5>{{$course->start_date}}</h5> 
                                        </div>    
                                    </div>
                                    <div class="filter-box">
                                        <div class="filter-header">
                                            Kursus Berakhir
                                        </div>
                                        <div class="filter-body">
                                            <h5>{{$course->end_date}}</h5> 
                                        </div>
                                    </div>
                                </div>
                                <div class="left-section">
                                    <div class="course-list ">
                                        <div class="top-section gridspan">
                                            <h2 class="course-title">Welcome to {{$course->name}}</h2>
                                            <h5 class="course-description">{{$course->description}}</h5>
                                            <hr>
                                            @if (auth()->user()->role == 'tutor')
                                                <span class="add-topic" @click.prevent="changeType('create')">Tambah Topik
                                                </span>    
                                        </div>
                                            @foreach($topics as $topic)
                                        <div class="bottom-section gridspan">
                                            <div class="col-left">
                                                
                                                <a href="{{ route('topic.index', [$topic->id]) }}" class="">
                                                <h5 class="topic-title">
                                                    {{$topic->name}}
                                                </h5>
                                                </a>
                                            </div>
                                            <div class="col-right">
                                                <span class="delete-btn" onclick="deleteTopic({{ $topic->id }})">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                                <a href="{{ URL('/classroom/topic/' .$topic->id.'/edit') }}" class="edit-btn">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <form class="form-delete" id="delete-{{ $topic->id }}" action="{{route ('topic.delete', [$topic->id])}} "  method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="delete">
                                        </form>
                                        @endforeach
                                        @else
                                            @foreach($topics as $topic)
                                            <div class="bottom-section"> 
                                                <a href="{{ URL('classroom/'.$topic->id.'/topic') }}">
                                                    
                                                    <h5 class="topic-title">
                                                        <span class="play-btn" onclick="">
                                                            <i class="fa fa-play-circle"></i>
                                                        </span>
                                                        {{$topic->name}}
                                                    </h5>
                                                </a> 
                                            </div>
                                            @endforeach     
                                        @endif    
                                    </div>        
                                </div>
                            </div>    
                        </div>
                    </div>
                    <div id="form-container" class="form-create">
                        <div class="form-header">
                            Buat Topik Baru
                        </div>
                        <form action="{{ URL('classroom/' .$course->id. '/topic') }}" method="POST">
                            <div class="form-body">
                                {{ csrf_field() }}
                                <div class="input-container">
                                    <h4 class="input-title">Judul Materi</h4>
                                    <p class="input-sub-title">Beri Judul Materi</p>
                                    <input type="text" name="name" class="regular-input" required>
                                </div>
                                <div class="input-container">
                                    <h4 class="input-title">Deskripsi Topik</h4>
                                    <p class="input-sub-title">Beri deskripri kursus anda sejelas mungkin</p>
                                    <textarea name="description" class="regular-textarea" required></textarea>
                                </div>
                                
                            </div>
                            <div class="form-footer gridspan">
                                <span class="cancel-btn" @click.prevent="changeType('display')">Batal</span>
                                <button type="submit" class="submit-btn">Kirim</button>
                            </div>
                        </form>
                    </div>
                </template>
            </div>  
        </section>
@endforeach
    <script src="{{ URL('js/vue.js') }}"></script>

    {{--<script>
        new Vue({
            el: '#register',
            data() {
                return {
                    type: 'course'
                }
            },
            methods: {
                changeType(type){
                    this.type = type
                }
            }
        });
    </script>--}}
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