@extends('layouts.template-student')

@section('tab-title')
    <title>Overview Class</title>
@endsection

@section('menu')
    <li><a href="{{ URL('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
    <li><a href="{{ URL('dashboard/tutor/course/list') }}"><i class="fa fa-book"></i> <span>Kursus Saya</span></a></li>

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
                <li><a href="{{ route('tutor.topic.index', [$topic->id]) }}"><i class="fa fa-circle-o"></i>{{$topic->name}}</a></li>
            @endforeach
        </ul>
    </li>
    <li><a href="{{ URL('classroom/1/task') }}"><i class="fa fa-book"></i> <span>Tugas</span></a></li>
    <li><a href="{{ route('tutor.score.list', [$course->id]) }}"><i class="fa fa-list"></i> <span>Nilai</span></a></li>
@endsection

@section('content')
    <link rel="stylesheet" href="{{ URL('css/classroom/overview.css') }}"> 

    <section class="content">
        <div id="course">
            <template>
                <div id="display-container">
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
                                    <a href="{{ route('tutor.content.index', [$topic->id]) }}" class="topic-name">
                                        {{$topic->name}}
                                    </a>
                                </div>
                                <div class="right-section">
                                    <span @click.prevent="changeType('edit',{{ $topic->id }})" class="edit-btn">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                    <span class="delete-btn" onclick="deleteTopic({{ $topic->id }})">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </div>
                            </div>
                            <form class="form-delete" id="delete-{{ $topic->id }}" action="{{ route('tutor.topic.delete', [$topic->id]) }} "  method="POST" style="display: none;">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                            </form>
                        @endforeach
                    </div>
                </div>

                @foreach($topics as $topic)
                    <div id="form-edit-{{ $topic->id }}" class="form-create form-edit">
                        <div class="form-header">Edit Topik</div>
                        <form action="{{ route('tutor.topic.update', [$topic->id]) }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">

                            <div class="form-body">
                                <div class="input-container">
                                    <h4 class="input-title">Judul Materi</h4>
                                    <p class="input-sub-title">Beri Judul Materi</p>
                                    <input type="text" name="name" class="regular-input" value="{{ $topic->name }}" required>
                                </div>
                                <div class="input-container">
                                    <h4 class="input-title">Deskripsi Topik</h4>
                                    <p class="input-sub-title">Beri deskripri kursus anda sejelas mungkin</p>
                                    <textarea name="description" class="regular-textarea" required>{{ $topic->description }}</textarea>
                                </div>
                            </div>
                            <div class="form-footer gridspan">
                                <span class="cancel-btn" @click.prevent="changeType('display')">Batal</span>
                                <button type="submit" class="submit-btn">Kirim</button>
                            </div>
                        </form>
                    </div>
                @endforeach

                <div id="form-container" class="form-create">
                    <div class="form-header">
                        Buat Topik Baru
                    </div>
                    
                    <form action="{{ route('tutor.topic.create', [$course->id]) }}" method="POST">
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
                changeType(type,id){
                    console.log(type)
                    console.log(id)
                    if(type == 'display'){
                        $("#display-container").show()
                        $("#form-container").hide()
                        $(".form-edit").hide()
                    }else if(type == 'create'){
                        $("#display-container").hide()
                        $("#form-container").show()
                        $(".form-edit").hide()
                    }else{
                        $("#display-container").hide()
                        $("#form-container").hide()
                        $("#form-edit-"+id).show()
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