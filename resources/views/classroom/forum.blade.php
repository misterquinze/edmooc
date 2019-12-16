@extends('layouts.template-student')

@section('tab-title')
    <title>Forum Diskusi</title>
@endsection

@section('menu')
@foreach($courses as $c)
    <li><a href="{{ URL('/classroom/1') }}"><i class="fa fa-book"></i> <span>Ringkasan</span></a></li>
        
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Materi</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ URL('classroom/1/topic/1') }}"><i class="fa fa-circle-o"></i> Minggu Ke-1</a></li>
            <li><a href="{{ URL('classroom/1/topic/2') }}"><i class="fa fa-circle-o"></i> Minggu Ke-2</a></li>
            <li><a href="{{ URL('classroom/1/topic/3') }}"><i class="fa fa-circle-o"></i> Minggu Ke-3</a></li>
            <li><a href="{{ URL('classroom/1/topic/4') }}"><i class="fa fa-circle-o"></i> Minggu Ke-4</a></li>
        </ul>
    </li>
    <li>
            <a href="{{ URL('classroom/'.$c->id.'/forum') }}">
                <i class="fa fa-th"></i> <span>Forum Diskusi</span>
                {{-- <span class="pull-right-container">
                    <small class="label pull-right bg-green">1</small>
                </span> --}}
            </a>
    </li>
    

    <li><a href="{{ URL('classroom/1/task') }}"><i class="fa fa-book"></i> <span>Tugas</span></a></li>
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/classroom/discussion.css') }}">
    
    <section class="content">
        <div id="forum">
            <template>
                <div id="display-container">
                    <div class="gridspan">
                    <h3 class="title">Fourm Diskusi </h3>
                    
                        <a href="{{route('discussion.create', [$c->id])}}">
                            <span class="add-btn">Buat Diskusi</span>
                        </a>
                    
                    </div>
                    <hr>
                    <div class="course-list">
                        <div class="top-section gridspan">
                            <div class="col-left">
                                <div class="course-detail">
                                    @if ($discussions->isEmpty())
                                        @if (session('discussion'))
                                            <div class="card-body">
                                                <h2 class="alert alert-info">
                                                    {{ session('discussion') }}
                                                </h2>
                                            </div>
                                        @endif
                                    @else
                                        @foreach($discussions as $disc)
                                        <div class="course-detail">
                                            <a href="{{route('discussion.index', [$disc->id])}}">
                                            <h3 class="course-name"> {{$disc->title}}</h3> 
                                            </a>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>                      
                        </div>
                        <div class="bottom-section gridspan">  
                        
                        </div>     
                    </div>
                </div>
                {{--<div id="form-container" class="form-create">
                    <div class="form-header">Buat Diskusi</div>
                    
                    <form action="{{action('DiscussionController@store', ['discId' => $discussions->id])}}" method="POST">
                    
                        <div class="form-body">
                            {{ csrf_field() }}

                            <div class="input-container">
                                <h4 class="input-title">Judul Disukusi</h4>
                                <p class="input-sub-title">Beri judul diskusi anda sejelas mungkin</p>
                                <input type="text" name="title" class="regular-input" required>
                            </div>
    
                            <div class="input-container">
                                <h4 class="input-title">Isi Diskusi</h4>
                                <p class="input-sub-title">Jelaskan diskusi yang ingin anda bahas sejelas mungkin</p>
                                <textarea name="content" class="regular-textarea" required></textarea>
                            </div>


                        </div>
                        <div class="form-footer gridspan">
                            <span class="cancel-btn" @click.prevent="changeType('display')">Batal</span>
                            <button type="submit" class="submit-btn">Kirim</button>
                        </div>
                    </form>
                </div> --}}
            </template>

        </div>
@endforeach    
    </section>
    <script src="{{ URL('js/vue.js') }}"></script>
    {{-- <script src="{{ URL('js/sweetalert.min.js') }}"></script> --}}

    <script>
        new Vue({
            el: '#forum',
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
@endsection