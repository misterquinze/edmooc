@extends('layouts.template-student')

@section('tab-title')
    
    <title>{{$topics->name}}</title>
    
@endsection

@section('menu')

    {{--<li class="active"><a href="{{ URL('classroom/'.$topic->course->id.'/overview' ) }}"><i class="fa fa-book"></i> <span>Ringkasan</span></a></li>--}}
    
    <li class="treeview active">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Materi</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            {{--<li class="active"><a href="{{ URL('classroom/1/topic/1') }}"><i class="fa fa-circle-o"></i> 1: Sistem Informasi</a></li>
            <li><a href="{{ URL('classroom/1/topic/2') }}"><i class="fa fa-circle-o"></i> 2: Rekayasa Perangkat Lunak</a></li>
            <li><a href="{{ URL('classroom/1/topic/3') }}"><i class="fa fa-circle-o"></i> 3: Web Development</a></li>
            <li><a href="{{ URL('classroom/1/topic/4') }}"><i class="fa fa-circle-o"></i> 4: Basisdata</a></li>
            @foreach($tops as $top)
            <li><a href="{{ URL('classroom/'.$top->id.'/topic') }}"><i class="fa fa-circle-o"></i>{{$top->name}}</a></li>
            @endforeach--}}
        </ul>
    </li>

    <li>
        <a href="{{ URL('classroom/1/discussion') }}">
            <i class="fa fa-th"></i> <span>Forum Diskusi</span>
            <span class="pull-right-container">
                <small class="label pull-right bg-green">1</small>
            </span>
        </a>
    </li>

    <li><a href="{{ URL('classroom/1/topic/1/task') }}"><i class="fa fa-book"></i> <span>Tugas</span></a></li>
@endsection

@section('content')

    <link rel="stylesheet" href="{{ URL('css/classroom/topic.css') }}">

    <section class="content">
        {{-- <h5>
            Materi Topik {{$topics->name}}
        </h5> --}}

        {{-- @if(auth()->user()->role == 'tutor')

                <a href="{{route('content.create', [$topics->id])}}">
                    <span class="add-btn">Tambah Konten</span>
                </a>
            
            <hr>
            @if ($contents->isEmpty())
                @if (session('content'))
                    <div class="card-body">
                        <h2 class="alert alert-info">
                            {{ session('content') }}
                        </h2>
                    </div>
                @endif
            @else 
            @foreach($contents as $cont)     
            <div class="course-list">
                <div class="top-section gridspan">
                    <div class="col-left">
                        <div class="course-detail">
                        <a href="{{route('content.index', [$cont->id])}}">
                            <h3 class="course-name">{{$cont->title}}</h3>
                        </a>
                            
                        </div>
                    </div>
                </div>
            </div>
            @endforeach 
            @endif   
        @else
            @if ($contents->isEmpty())
                @if (session('content'))
                    <div class="card-body">
                        <h2 class="alert alert-info">
                            {{ session('content') }}
                        </h2>
                    </div>
                @endif
            @else   
            @foreach($contents as $cont)
            <div class="course-list">
                <div class="top-section gridspan">
                    <div class="col-left">
                        <div class="course-detail">
                            <h3 class="course-name">{{$cont->title}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        @endif --}}

        <div class="topic-detail-header">
            <div class="top-section">
                <h2 class="topic-name">{{ $topics->name }}</h2>
                <a href="{{route('content.create', [$topics->id])}}" class="add-content-button">
                    Tambah Materi
                </a>
            </div>
            <div class="bottom-section">
                {{ $topics->course->name }}
            </div>
        </div>

        @foreach($contents as $index => $content)     
            <a href="{{route('content.index', [$content->id])}}" class="topic-content">
                <div class="topic-content-index">Materi {{ $index+1 }}</div>
                <div class="topic-content-name">{{ $content->title }}</div>
                <span class="fa fa-angle-right"></span>
            </a>
        @endforeach
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