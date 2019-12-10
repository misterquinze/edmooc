@extends('layouts.template-student')

@section('tab-title')
    @foreach($topics as $topic)
    <title>{{$topic->name}}</title>
    @endforeach
@endsection

@section('menu')
@foreach($topics as $topic)
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
            <li><a href="{{ URL('classroom/1/topic/4') }}"><i class="fa fa-circle-o"></i> 4: Basisdata</a></li>--}}
            @foreach($topics as $topic)
            <li><a href="{{ URL('classroom/'.$topic->id.'/topic') }}"><i class="fa fa-circle-o"></i>{{$topic->name}}</a></li>
            @endforeach
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

    <section class="content-header">
    
    </section>

    <section class="content">
        <div id="topic">
            <template>
                <div id="display-container">
                    <div class="gridpan">
                        <span class="add-content" @click.prevent="changeType('create')">Tambah Konten
                        </span>
                    </div>
                    <div class="topic-content">
                        @if ($contents->isEmpty())
                            @if (session('content'))
                                <div class="card-body">
                                    <h2 class="alert alert-info">
                                        {{ session('content') }}
                                    </h2>
                                </div>
                            @endif
                        @else    
                        <div class="topic-title">
                            <h2>
                                {{$topic->name}}
                            </h2>
                        </div>
                        <div class="topic-video">
                            @foreach($contents as $content)
                            <iframe 
                                class="topic-video"
                                src="{{$content->src}}" 
                                frameborder="1" 
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" a
                                llowfullscreen>
                            </iframe>
                            @endforeach
                        </div>
                        <div class="explanation">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates saepe corrupti asperiores quas tempore. Quibusdam repudiandae officia ex consequuntur voluptatum, reprehenderit numquam doloremque quam cupiditate eum fuga necessitatibus sequi consectetur!
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
                <div id="form-container" class="form-create">
                    <div class="form-header">
                        konten
                    </div>
                    
                    <form action="{{ URL('classroom/' .$topic->id.'/topic') }}" method="POST">
                        <div class="form-body">
                            {{ csrf_field() }}
                            <div class="input-container">
                                    <h4 class="input-title">Nama Konten</h4>
                                    <p class="input-sub-title">Beri nama kursus anda sejelas mungkin</p>
                                    <input type="text" name="title" class="regular-input" value="" required>
                                </div>
                                <div class="input-container">
                                    <h4 class="input-title">Deskripsi Kursus</h4>
                                    <p class="input-sub-title">Beri deskripri kursus anda sejelas mungkin</p>
                                        <textarea name="description" class="regular-textarea" required>
                                        </textarea>
                                </div>
                                <div class="input-container">
                                    <h4 class="input-title">Tipe Konten</h4>
                                    <p class="input-sub-title">Tentukan tipe konten</p>
                                    <label class="radio-container">
                                            Video
                                        <input type="radio" name="type" value="video"><span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">
                                            Artikel
                                            <input type="radio" name="type" value="video"><span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">
                                            Audio
                                            <input type="radio" name="type" value="video"><span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="input-container">
                                    <h4 class="input-title">Upload Materi</h4>
                                    <p class="input-sub-title">Silahkan unggah materi disini</p>
                                    <input type="text" name="source"
                                            class="regular-input" value="">
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