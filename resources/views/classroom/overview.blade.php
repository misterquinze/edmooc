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
                <li><a href="{{ route('topic.index', [$topic->id]) }}"><i class="fa fa-circle-o"></i>{{$topic->name}}</a></li>
            @endforeach
        </ul>
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
                            <button class="add-topic-button" @click.prevent="changeType('create')">Tambah Topik</button>
                        </div>
                        <div class="topic-list gridspan">
                            <div class="left-section header">Nama Topik</div>
                            <div class="right-section header">Opsi</div>
                        </div>
                        @foreach($topics as $topic)
                            <div class="topic-list gridspan">
                                <div class="left-section">
                                    <a href="{{ route('topic.index', [$topic->id]) }}" class="topic-name">
                                        {{$topic->name}}
                                    </a>
                                </div>
                                <div class="right-section">
                                    <a href="{{ URL('/classroom/topic/' .$topic->id.'/edit') }}" class="edit-btn">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <span class="delete-btn" onclick="deleteTopic({{ $topic->id }})">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                             {{-- <div class="course-list ">
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
                                            <a href="{{ URL('/classroom/'.$course->id.'/topic/' .$topic->id.'/quiz/create') }}" class="edit-btn">
                                                Quiz
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
                            </div>         --}}

                            {{-- <div class="filter-box">
                                <div class="filter-header">
                                        Tipe Kursus
                                </div>
                                <div class="filter-body">
                                    <h5>{{$course->type}}</h5> 
                                </div>
                            </div>
                            <div class="filter-box">
                                <div class="filter-header">
                                    Update Terakhir
                                </div>
                                <div class="filter-body">
                                    <h5>{{$course->updated_at}}</h5> 
                                </div>    
                            </div> --}}
                        
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