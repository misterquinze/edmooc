@extends('layouts.template-student')

@section('tab-title')
    <title>Create Course - EdMOOC</title>
@endsection

@section('menu')
@foreach($ac_topics as $topic)
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
            @foreach($ac_topics as $topic)
                <li><a href="{{ URL('classroom/topic/'.$topic->id) }}"><i class="fa fa-circle-o"></i>{{ $topic->name }}</a></li>
            @endforeach
        </ul>
    </li>

    <li>
        <a href="{{ URL('classroom/1/discussion') }}">
            <i class="fa fa-comment"></i> <span>Forum Diskusi</span>
            <span class="pull-right-container">
                
            </span>
        </a>
    </li>

    <li><a href="{{ URL('classroom/1/topic/1/task') }}"><i class="fa fa-book"></i> <span>Tugas</span></a></li>
@endsection

@section('content')
    
    <link rel="stylesheet" href="{{ URL('css/classroom/discussion/create.css') }}">

    <section class="content">
        <div id="forum">
            <template>
                <div id="form-container" class="form-create">
                    <div class="form-header">
                        Konten 
                    </div>
                
                    <form action="{{ route('tutor.accontent.store', [$topic->id]) }}" method="POST" enctype="multipart/form-data">
                        <div class="form-body">
                            {{ csrf_field() }}
                            <div class="input-container">
                                <h4 class="input-title">Nama Konten</h4>
                                <p class="input-sub-title">Beri nama kursus anda sejelas mungkin</p>
                                <input type="text" name="title" class="regular-input" value="" required>
                            </div>
    
                            <div class="input-container">
                                <h4 class="input-title">Deskripsi Konten</h4>
                                <p class="input-sub-title">Beri deskripri konten anda sesingkat mungkin</p>
                                <textarea name="description" class="regular-textarea" required></textarea>
                            </div>

                            <div class="input-container">
                                <h4 class="input-title">Tipe Konten</h4>
                                <p class="input-sub-title">Tentukan tipe konten</p>
                                <label class="radio-container">
                                    Video
                                    <input type="radio" name="type" value="video" v-model="contentType"><span class="checkmark"></span>
                                </label>
                                <label class="radio-container">
                                    Slide
                                    <input type="radio" name="type" value="slide" v-model="contentType"><span class="checkmark"></span>
                                </label>
                                <label class="radio-container">
                                    Artikel
                                    <input type="radio" name="type" value="artikel" v-model="contentType"><span class="checkmark"></span>
                                </label>
                            </div>
                            <div v-if="contentType == 'video'" class="input-container">
                                <h4 class="input-title">Upload Video</h4>
                                <p class="input-sub-title">Ukuran video tidak boleh lebih dari 4 GB </p>
                                <input type="file" name="source" class="regular-input" required>
                            </div>
                            <div v-if="contentType == 'slide'" class="input-container">
                                <h4 class="input-title">Upload Slide Presentasi</h4>
                                <p class="input-sub-title">Ukuran file tidak boleh lebih dari 500 MB </p>
                                <input type="file" name="source" class="regular-input" required>
                            </div>
                            <div  v-if="contentType == 'artikel'" class="input-container">
                                <h4 class="input-title">Tambahkan Artikel</h4>
                                <p class="input-sub-title">Silahkan Upload file pdf disini </p>
                                <input type="file" name="source" class="regular-input" required>
                            </div>
                        </div>
                        
                        <div class="form-footer gridspan">
                            <a href="{{URL('/dashboard/tutor/' .$accourse->id. '/actopic/' .$topic->id)}}" class="cancel-btn">Batal</a>
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
            el: '#forum',
            data() {
                return {
                    contentType: 'video',   
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