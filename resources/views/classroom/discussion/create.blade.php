@extends('layouts.template-student')

@section('tab-title')
    <title>Buat Diskusi</title>
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

    <li class="active">
        <a href="{{ URL('classroom/1/discussion') }}">
            <i class="fa fa-th"></i> <span>Forum Diskusi</span>
            <span class="pull-right-container">
                <small class="label pull-right bg-green">1</small>
            </span>
        </a>
    </li>

    <li><a href="{{ URL('classroom/1/task') }}"><i class="fa fa-book"></i> <span>Tugas</span></a></li>
@endsection
@section('content')
<link rel="stylesheet" href="{{ URL('css/classroom/discussion/create.css') }}">
<section class="content">
    <div id="forum">
        <template>
            <div id="form-container" class="form-create">
            <div class="form-header">Buat Diskusi</div>
      
            <form action="{{route('discussion.store', [$c->id])}}" method="POST">
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
                <a href="{{ url()->previous() }}">
                    <span class="cancel-btn">Batal</span>
                </a>
                <button type="submit" class="submit-btn">Kirim</button>
            </div>
            </form>
            </div>
        </template>
    </div>
@endforeach   
</section>
<script src="{{ URL('js/vue.js') }}"></script>
    <script>
        new Vue({
            el: '#forum',
            
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