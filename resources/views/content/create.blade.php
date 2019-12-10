@extends('layouts.template-student')

@section('tab-title')
    <title>My Course - EdMOOC</title>
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
    <link rel="stylesheet" href="{{ URL('css/dashboard/company/course-edit.css') }}">

    <section class="content">
        <div id="course">
                <div id="form-container" class="form-create">
                    <div class="form-header">
                       konten
                    </div>
                    @foreach($topics as $topic)
                    <form action="{{ URL('classroom/' .$topic->id.'/topic') }}" method="POST">
                    @endforeach
                        <div class="form-body">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">

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
                                <h4 class="input-title">Upload Materi</h4>
                                <p class="input-sub-title">Silahkan unggah materi disini</p>
                                <input type="text" name="source"
                                class="regular-input" value="">

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
                        </div>
                        <div class="form-footer gridspan">
                            <span class="cancel-btn" @click.prevent="changeType('display')">Batal</span>
                            <button type="submit" class="submit-btn">Kirim</button>
                        </div>
                    </form>
                </div>
        </div>

    </section>

    <script src="{{ URL('js/vue.js') }}"></script>

    <script>
        
    </script>

  
@endsection